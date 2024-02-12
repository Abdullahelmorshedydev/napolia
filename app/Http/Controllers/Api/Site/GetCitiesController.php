<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCitiesController extends Controller
{
    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->has('states')->get();
        return response()->json(['data' => $cities]);
    }
}
