<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Enums\CountryStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function placeOrder()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        return view('web.site.pages.order.checkout', compact('countries'));
    }

    public function checkout(Request $request)
    {
        dd($request->all());
    }

    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->has('states')->get();
        return response()->json(['data' => $cities]);
    }

    public function getStates($id)
    {
        $states = State::where('city_id', $id)->has('shipping')->get();
        return response()->json(['data' => $states]);
    }

    public function getShipping($id)
    {
        $shipping_price = Shipping::where('state_id', $id)->first();
        return response()->json(['data' => $shipping_price]);
    }
}
