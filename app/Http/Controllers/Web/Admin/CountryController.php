<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\CountryStatusEnum;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Country\StoreCountryRequest;
use App\Http\Requests\Web\Admin\Country\UpdateCountryRequest;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::paginate();
        return view('web.admin.pages.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.pages.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        Country::create([
            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ],
        ]);
        return redirect()->route('admin.countries.index')->with('success',  __('admin/country/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        $status = CountryStatusEnum::cases();
        return view('web.admin.pages.country.edit', compact('country', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        return redirect()->route('admin.countries.index')->with('success',  __('admin/country/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success',  __('admin/country/index.success'));
    }
}
