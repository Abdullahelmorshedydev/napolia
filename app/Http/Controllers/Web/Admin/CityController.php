<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Enums\CityStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\City\StoreCityRequest;
use App\Http\Requests\Web\Admin\City\UpdateCityRequest;
use App\Models\Country;

class CityController extends Controller
{
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
        $countries = Country::get();
        return view('web.admin.pages.city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        City::create([
            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ],
            'country_id' => $request->country_id,
        ]);
        return redirect()->route('admin.cities.index')->with('success',  __('admin/city/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $status = CityStatusEnum::cases();
        $countries = Country::get();
        return view('web.admin.pages.city.edit', compact('city', 'status', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
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
