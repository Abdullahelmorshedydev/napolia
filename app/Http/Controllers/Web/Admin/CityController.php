<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Enums\CityStatusEnum;
use App\Enums\CountryStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\City\StoreCityRequest;
use App\Http\Requests\Web\Admin\City\UpdateCityRequest;
use App\Models\Country;
use App\Traits\TranslateTrait;

class CityController extends Controller
{
    use TranslateTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::with('country')->paginate();
        return view('web.admin.pages.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->get();
        return view('web.admin.pages.city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        City::create($data);
        return redirect()->route('admin.cities.index')->with('success',  __('admin/city/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $status = CityStatusEnum::cases();
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->get();
        return view('web.admin.pages.city.edit', compact('city', 'status', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        $city->update($data);
        return redirect()->route('admin.cities.index')->with('success',  __('admin/city/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success',  __('admin/city/index.success'));
    }
}
