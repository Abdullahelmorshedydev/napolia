<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __invoke()
    {
        $cartItems = [];
        if (auth()->user()->cart) {
            $cartItems = auth()->user()->cart->cartItems;
        }
        return view('web.site.pages.cart', compact('cartItems'));
    }
}
