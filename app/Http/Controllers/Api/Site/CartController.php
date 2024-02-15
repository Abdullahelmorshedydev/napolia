<?php

namespace App\Http\Controllers\Api\Site;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\Cart\AddToCartRequest;

class CartController extends Controller
{
    public function addToCart(AddToCartRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('web')->user()->id;
        $product = Product::where('id', $data['id'])->first();
        $productPrice = 0;
        if($product->discount) {
            $productPrice = $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price'));
        } else {
            $productPrice = $product->price_type->calc($product->price, settings()->get('dollar_price'));
        }
        $cart = auth('web')->user()->cart;
        if (!isset($cart)) {
            $cart = Cart::create($data);
        }
        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $data['id'])->first();
        if (!isset($cart_item)) {
            $cart_item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $data['id'],
                'product_color_id' => $data['color_id'],
                'quantity' => $data['quantity'],
            ]);
            $cart->update([
                'total' => $cart->total + ($productPrice * $data['quantity']),
            ]);
        } else {
            $cart->update([
                'total' => $cart->total - ($productPrice * $cart_item->quantity),
            ]);
            $cart_item->update([
                'quantity' => $data['quantity'],
                'product_color_id' => $data['color_id'],
            ]);
            $cart->update([
                'total' => $cart->total + ($productPrice * $data['quantity']),
            ]);
        }
        
        return response()->json(['message' => __('site/home/cart.added_success')]);
    }

    public function deleteItem(Request $request)
    {
        $cart = auth('web')->user()->cart;
        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $request->id)->first();
        $cart->update([
            'total' => $cart->total - ($cart_item->product->discount ? $cart_item->product->price_type->calc($cart_item->product->discount_type->calc($cart_item->product->price, $cart_item->product->discount), settings()->get('dollar_price')) : $cart_item->product->price_type->calc($cart_item->product->price, settings()->get('dollar_price')) * $cart_item->quantity),
        ]);
        $cart_item->delete();
        return response()->json(['message' => __('site/home/cart.removed_success')]);
    }
}
