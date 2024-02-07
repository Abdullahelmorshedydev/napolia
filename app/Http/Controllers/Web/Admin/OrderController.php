<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware(['check.admin.permission:order-list'], ['only' => ['allComplete', 'allPending', 'allProccessing', 'allCanceled', 'allShipping']]);
        $this->middleware(['check.admin.permission:order-edit'], ['only' => ['proccessOrder', 'shipOrder', 'completeOrder', 'cancelOrder']]);
        $this->middleware(['check.admin.permission:order-delete'], ['only' => ['deleteOrder']]);
    }

    public function allComplete()
    {
        $orders = Order::where('status', OrderStatusEnum::COMPLETED->value)->paginate();
        return view('web.admin.pages.order.complete', compact('orders'));
    }

    public function allPending()
    {
        $orders = Order::where('status', OrderStatusEnum::PENDING->value)->paginate();
        return view('web.admin.pages.order.pending', compact('orders'));
    }

    public function allCanceled()
    {
        $orders = Order::where('status', OrderStatusEnum::CANCELED->value)->paginate();
        return view('web.admin.pages.order.canceled', compact('orders'));
    }

    public function allShipping()
    {
        $orders = Order::where('status', OrderStatusEnum::SHIPPED->value)->paginate();
        return view('web.admin.pages.order.shipping', compact('orders'));
    }

    public function allProccessing()
    {
        $orders = Order::where('status', OrderStatusEnum::PROCCESSING->value)->paginate();
        return view('web.admin.pages.order.proccess', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        return view('web.admin.pages.order.show', compact('order'));
    }

    public function proccessOrder(Order $order)
    {
        $order->update([
            'status' => OrderStatusEnum::PROCCESSING->value,
        ]);
        return back()->with('success', __('admin/order.proccess_success'));
    }

    public function shipOrder(Order $order)
    {
        $order->update([
            'status' => OrderStatusEnum::SHIPPED->value,
        ]);
        return back()->with('success', __('admin/order.ship_success'));
    }

    public function completeOrder(Order $order)
    {
        $order->update([
            'status' => OrderStatusEnum::COMPLETED->value,
        ]);
        return back()->with('success', __('admin/order.complete_success'));
    }

    public function cancelOrder(Order $order)
    {
        $order->update([
            'status' => OrderStatusEnum::CANCELED->value,
        ]);
        return back()->with('success', __('admin/order.cancel_success'));
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return back()->with('success', __('admin/order.delete_success'));
    }
}
