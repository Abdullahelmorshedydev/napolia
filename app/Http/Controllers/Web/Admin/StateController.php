<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Enums\StateStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\State\StoreStateRequest;
use App\Http\Requests\Web\Admin\State\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::with('city')->with('country')->paginate();
        return view('web.admin.pages.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::get();
        $cities = City::get();
        return view('web.admin.pages.state.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        State::create([
            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ],
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('admin.states.index')->with('success',  __('admin/state/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $status = StateStatusEnum::cases();
        $countries = Country::get();
        $cities = City::where('country_id', $state->country_id)->get();
        return view('web.admin.pages.state.edit', compact('state', 'cities', 'status', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $state->update($request->validated());
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
