<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetCitiesController extends Controller
{
    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->get();
        return response()->json(['data' => $cities]);
    }
}
