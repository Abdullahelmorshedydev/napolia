<?php

namespace App\Http\Controllers\Web\Site;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Country;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Enums\CountryStatusEnum;
use App\Enums\OrderStatusEnum;
use App\Events\Site\SendInvoiceEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\CheckoutRequest;

class OrderController extends Controller
{
    public function checkout()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        return view('web.site.pages.order.checkout', compact('countries'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('web')->user()->id;

        UserProfile::updateOrCreate(['user_id' => auth('web')->user()->id], $data);
        $order = Order::create($data);
        $cartItems = CartItem::where('cart_id', auth('web')->user()->cart->id)->get();
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'prod_total' => $cartItem->product->discount ? $cartItem->product->price_type->calc($cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount), settings()->get('dollar_price')) : $cartItem->product->price_type->calc($cartItem->product->price, settings()->get('dollar_price')),
                'quantity' => $cartItem->quantity,
                'product_color_id' => $cartItem->product_color_id,
            ]);
            $cartItem->product->update([
                'sales_count' => $cartItem->product->sales_count + 1,
            ]);
        }
        Cart::where('id', auth('web')->user()->cart->id)->delete();
        $shippingTime = 0;
        foreach ($order->orderItems as $orderItem) {
            if ($orderItem->product->shipping_time > $shippingTime) {
                $shippingTime = $orderItem->product->shipping_time;
            }
        }
        $shippingTime = Carbon::parse($order->created_at)->addDays($shippingTime)->toDateString();
        $subTotal = OrderItem::where('order_id', $order->id)->pluck('prod_total')->sum();
        $taxPrice = $subTotal * (settings()->get('tax') / 100);

        event(new SendInvoiceEvent(auth('web')->user()->email, $order, $shippingTime, $subTotal, $taxPrice));
        return redirect()->route('order.order_success', $order->id)->with('success', __('site/order.success'));
    }

    public function orderSuccess(Order $order)
    {
        if ($order->status->value != OrderStatusEnum::PENDING->value) {
            return redirect()->route('order.track_order', $order->id);
        }
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
}
