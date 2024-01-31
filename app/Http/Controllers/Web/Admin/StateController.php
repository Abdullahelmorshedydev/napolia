<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\CityStatusEnum;
use App\Enums\CountryStatusEnum;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Enums\StateStatusEnum;
use App\Traits\TranslateTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\State\StoreStateRequest;
use App\Http\Requests\Web\Admin\State\UpdateStateRequest;

class StateController extends Controller
{
    use TranslateTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::with('city')->paginate();
        return view('web.admin.pages.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        $cities = City::where('status', CityStatusEnum::ACTIVE->value)->get();
        return view('web.admin.pages.state.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        State::create($data);
        return redirect()->route('admin.states.index')->with('success',  __('admin/state/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $status = StateStatusEnum::cases();
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        $cities = City::where('country_id', $state->country_id)->where('status', CityStatusEnum::ACTIVE->value)->get();
        return view('web.admin.pages.state.edit', compact('state', 'cities', 'status', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        $state->update($data);
        return redirect()->route('admin.states.index')->with('success',  __('admin/state/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('admin.states.index')->with('success',  __('admin/state/index.success'));
    }

    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->get();
        return response()->json(['data' => $cities]);
    }
}
