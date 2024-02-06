<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\CartStatusEnum;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\Cart\AddToCartRequest;

class CartController extends Controller
{
    public function index()
    {
        return view('web.site.pages.cart');
    }

    public function addToCart(AddToCartRequest $request)
    {
        $data = $request->validated();
        $product = Product::where('id', $data['id'])->first();
        $cart = Cart::where('user_id', auth('web')->user()->id)->where('status', CartStatusEnum::CARTED->value)->first();
        if (!isset($cart)) {
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
            ]);
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
                'total' => $cart->total + ($product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) * $data['quantity']),
            ]);
        } else {
            $cart->update([
                'total' => $cart->total - ($product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) * $cart_item->quantity),
            ]);
            $cart_item->update([
                'quantity' => $data['quantity'],
                'product_color_id' => $data['color_id'],
            ]);
            $cart->update([
                'total' => $cart->total + ($product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) * $data['quantity']),
            ]);
        }
        
        return back()->with('success', __('site/home/cart.added_success'));
    }

    public function deleteItem($id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('status', CartStatusEnum::CARTED->value)->first();
        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $id)->first();
        $cart->update([
            'total' => $cart->total - ($cart_item->product->price_type->calc($cart_item->product->discount_type->calc($cart_item->product->price, $cart_item->product->discount), settings()->get('dollar_price')) * $cart_item->quantity),
        ]);
        $cart_item->delete();
        return back()->with('success', __('site/home/cart.delete_success'));
    }
}
