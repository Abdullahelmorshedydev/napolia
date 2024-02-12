<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Shipping;
use App\Enums\PriceTypeEnum;
use Illuminate\Http\Request;
use App\Enums\CityStatusEnum;
use App\Enums\CountryStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Shipping\StoreShippingRequest;
use App\Http\Requests\Web\Admin\Shipping\UpdateShippingRequest;

class ShippingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.admin.permission:shipping-list'], ['only' => ['index', 'show']]);
        $this->middleware(['check.admin.permission:shipping-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.admin.permission:shipping-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.admin.permission:shipping-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings = Shipping::with('state')->paginate();
        return view('web.admin.pages.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)
            ->has('cities')
            ->get();
        $priceTypes = PriceTypeEnum::cases();
        return view('web.admin.pages.shipping.create', compact('countries', 'priceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShippingRequest $request)
    {
        Shipping::create($request->validated());
        return redirect()->route('admin.shippings.index')->with('success', __('admin/shipping/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)
            ->has('cities')
            ->get();
        $cities = City::where('status', CityStatusEnum::ACTIVE->value)
            ->has('states')
            ->get();
        $priceTypes = PriceTypeEnum::cases();
        return view('web.admin.pages.shipping.edit', compact('shipping', 'countries', 'cities', 'priceTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShippingRequest $request, Shipping $shipping)
    {
        $shipping->update($request->validated());
        return redirect()->route('admin.shippings.index')->with('success', __('admin/shipping/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();
        return redirect()->route('admin.shippings.index')->with('success', __('admin/shipping/index.success'));
    }
}
