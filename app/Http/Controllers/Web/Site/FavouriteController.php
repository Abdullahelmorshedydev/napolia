<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function index()
    {
        return view('web.site.pages.favourite');
    }

    public function store($id)
    {
        $fav = Favourite::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ]);
        return back()->with('success', 'product added in favourite list successfully');
    }

    public function delete($id)
    {
        Favourite::where('user_id', auth('web')->user()->id)->where('product_id', $id)->delete();
        return back();
    }
}
