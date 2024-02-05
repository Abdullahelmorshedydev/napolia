<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Product;
use App\Enums\OrderStatusEnum;
use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products_count = Product::where('status', ProductStatusEnum::ACTIVE->value)->count();
        $complete_order_count = Order::where('status', OrderStatusEnum::COMPLETED->value)->count();
        return view('web.admin.pages.index', compact('products_count', 'complete_order_count'));
    }
}
