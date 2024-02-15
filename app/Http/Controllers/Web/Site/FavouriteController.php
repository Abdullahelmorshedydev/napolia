<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function __invoke()
    {
        return view('web.site.pages.favourite');
    }
}
