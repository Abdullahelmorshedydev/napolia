<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetStatesController extends Controller
{
    public function getStates($id)
    {
        $states = State::where('city_id', $id)->has('shipping')->get();
        return response()->json(['data' => $states]);
    }
}
