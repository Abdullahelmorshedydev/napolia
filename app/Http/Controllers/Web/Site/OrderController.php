<?php

namespace App\Http\Controllers\Web\Site;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use App\Models\CartItem;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Enums\CartStatusEnum;
use App\Enums\CountryStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\CheckoutRequest;

class OrderController extends Controller
{
    public function placeOrder()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        return view('web.site.pages.order.checkout', compact('countries'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();
        if (auth('web')->user()->profile) {
            UserProfile::where('user_id', $data['user_id'])->update([
                'address' => $data['address'],
                'country_id' => $data['country_id'],
                'city_id' => $data['city_id'],
                'state_id' => $data['state_id'],
            ]);
        } else {
            UserProfile::create($data);
        }
        $order = Order::create($data);
        $cartItems = CartItem::where('cart_id', $data['cart_id'])->get();
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'prod_total' => $cartItem->product->price_type->calc($cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount), settings()->get('dollar_price')),
                'quantity' => $cartItem->quantity,
                'product_color_id' => $cartItem->product_color_id,
            ]);
        }
        Cart::where('id', $data['cart_id'])->update(['status' => CartStatusEnum::ORDERED->value]);
        return redirect()->route('order.order_success', $order->id)->with('success', __('site/order.success'));
    }

    public function orderSuccess(Order $order)
    {
        $shippingTime = 0;
        foreach ($order->orderItems as $orderItem) {
            if ($orderItem->product->shipping_time > $shippingTime) {
                $shippingTime = $orderItem->product->shipping_time;
            }
        }
        $shippingTime = Carbon::parse($order->created_at)->addDays($shippingTime)->toDateString();
        $subTotal = OrderItem::where('order_id', $order->id)->pluck('prod_total')->sum();
        $taxPrice = $subTotal * (settings()->get('tax') / 100);
        return view('web.site.pages.order.success_order', compact('order', 'shippingTime', 'subTotal', 'taxPrice'));
    }

    public function allOrders()
    {
        $orders = Order::where('user_id', auth('web')->user()->id)->orderBy('updated_at', 'DESC')->with(['state', 'city', 'country'])->paginate();
        return view('web.site.pages.order.all_orders', compact('orders'));
    }

    public function trackOrder(Order $order)
    {
        $shippingTime = 0;
        foreach ($order->orderItems as $orderItem) {
            if ($orderItem->product->shipping_time > $shippingTime) {
                $shippingTime = $orderItem->product->shipping_time;
            }
        }
        $shippingTime = Carbon::parse($order->created_at)->addDays($shippingTime)->toDateString();
        $subTotal = OrderItem::where('order_id', $order->id)->pluck('prod_total')->sum();
        $taxPrice = $subTotal * (settings()->get('tax') / 100);
        return view('web.site.pages.order.track_order', compact('order', 'shippingTime', 'subTotal', 'taxPrice'));
    }

    public function getCities($id)
    {
        $cities = City::where('country_id', $id)->has('states')->get();
        return response()->json(['data' => $cities]);
    }

    public function getStates($id)
    {
        $states = State::where('city_id', $id)->has('shipping')->get();
        return response()->json(['data' => $states]);
    }

    public function getShipping($id)
    {
        $shipping = Shipping::where('state_id', $id)->first();
        $price = $shipping->price_type->calc($shipping->price, settings()->get('dollar_price'));
        $cart = Cart::where('user_id', auth()->user()->id)->where('status', CartStatusEnum::CARTED->value)->first();
        $total_price = $cart->total + ($cart->total * (settings()->get('tax') / 100)) + $price;
        return response()->json(['shipping_price' => $price, 'total_price' => $total_price]);
    }
}
