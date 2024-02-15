<?php

namespace App\View\Composers;

use App\Enums\CartStatusEnum;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Contracts\View\View;

class CartComposer
{
    public function compose(View $view): void
    {
        $cart = [];
        $cartProdIds = [];
        if (auth('web')->user()) {
            $cart = auth('web')->user()->cart;
            if (isset($cart)) {
                $cartItems = CartItem::where('cart_id', $cart->id)->get();
                foreach ($cartItems as $cart_item) {
                    $cartProdIds[] = Product::where('id', $cart_item->product_id)->pluck('id')->first();
                }
            }
        }
        $view->with('cart', $cart)
            ->with('cartProdIds', $cartProdIds);
    }
}
