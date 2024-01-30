<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products_count = Product::where('status', ProductStatusEnum::ACTIVE->value)->count();
        return view('web.admin.pages.index', compact('products_count'));
    }
}
