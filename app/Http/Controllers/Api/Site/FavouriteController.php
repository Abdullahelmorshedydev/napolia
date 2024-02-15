<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function store(Request $request)
    {
        Favourite::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->id,
        ]);
        return response()->json(['message' => 'product added in favourite list successfully']);
    }

    public function delete(Request $request)
    {
        $favourite = Favourite::where('user_id', auth('web')->user()->id)->where('product_id', $request->id)->delete();
        return response()->json(['message' => 'product deleted from favourite list successfully']);
    }
}
