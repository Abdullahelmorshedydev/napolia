<?php

namespace App\Http\Controllers\Web\Site;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Traits\FilesTrait;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Enums\OrderStatusEnum;
use App\Enums\CountryStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;
use App\Events\Site\SendInvoiceEvent;
use App\Http\Requests\Web\Site\CheckoutRequest;

class OrderController extends Controller
{
    use FilesTrait;

    public function checkout()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        $payments = PaymentMethodEnum::cases();
        return view('web.site.pages.order.checkout', compact('countries', 'payments'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();
        $coupon = Coupon::where('code', $data['coupon'])->first();
        $data['discount'] = $coupon ? $data['total'] - $coupon->type->calc($data['total'], $coupon->value) : 0;
        $data['user_id'] = auth('web')->user()->id;

        UserProfile::updateOrCreate(['user_id' => auth('web')->user()->id], $data);
        $order = Order::create($data);
        if ($request->has('vodafone_image')) {
            $order->vodafoneImage()->create([
                'image' => FilesTrait::store($data['vodafone_image'], Order::$img_path),
            ]);
        }
        if ($coupon) {
            $coupon->update([
                'number_of_usage' => $coupon->number_of_usage + 1,
            ]);
        }
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
        $payments = PaymentMethodEnum::cases();
        return view('web.site.pages.order.success_order', compact('order', 'shippingTime', 'subTotal', 'taxPrice', 'payments'));
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
