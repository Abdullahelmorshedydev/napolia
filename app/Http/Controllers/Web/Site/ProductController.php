<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $related_products = Product::where('sub_category_id', $product->sub_category_id)->where('status', ProductStatusEnum::ACTIVE->value)->with(['images','colors'])->get();
        return view('web.site.pages.product.index', compact('product', 'related_products'));
    }
}
