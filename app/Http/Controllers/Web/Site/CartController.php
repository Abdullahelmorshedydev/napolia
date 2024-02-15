<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __invoke()
    {
        return view('web.site.pages.cart');
    }
}
