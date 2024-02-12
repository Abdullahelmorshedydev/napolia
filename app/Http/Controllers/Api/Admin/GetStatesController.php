<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetStatesController extends Controller
{
    public function getStates($id)
    {
        $states = State::where('city_id', $id)->doesntHave('shipping')->get();
        return response()->json(['data' => $states]);
    }
}
