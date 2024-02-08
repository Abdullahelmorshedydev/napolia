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
        $cartItems = [];
        $cartProducts = [];
        $cartProdIds = [];
        $totalPrice = 0;
        if (auth('web')->user()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('status', CartStatusEnum::CARTED->value)->first();
            if (isset($cart)) {
                $cartItems = CartItem::where('cart_id', $cart->id)->get();
                foreach ($cartItems as $cart_item) {
                    $cartProdIds[] = Product::where('id', $cart_item->product_id)->pluck('id')->first();
                    $totalPrice += $cart_item->quantity * $cart_item->product->discount ? $cart_item->product->discount_type->calc($cart_item->product->price, $cart_item->product->discount) : $cart_item->product->price;
                }
            }
        }
        $view->with('cart', $cart)
            ->with('cartItems', $cartItems)
            ->with('cartProdIds', $cartProdIds)
            ->with('totalPrice', $totalPrice);
    }
}
