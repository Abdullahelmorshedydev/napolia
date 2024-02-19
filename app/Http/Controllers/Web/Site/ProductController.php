<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\Product;
use App\Models\ProductRate;
use Illuminate\Http\Request;
use App\Enums\ProductStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\ProductRateRequest;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $rate = ProductRate::where(['product_id' => $product->id, 'user_id' => auth('web')->user()->id])->first();
        $related_products = Product::where('sub_category_id', $product->sub_category_id)->where('id', '!=', $product->id)->where('status', ProductStatusEnum::ACTIVE->value)->with(['images', 'colors'])->inRandomOrder()->get();
        return view('web.site.pages.product.index', compact('product', 'related_products', 'rate'));
    }

    public function rateProduct(ProductRateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('web')->user()->id;
        ProductRate::updateOrCreate(
            ['user_id' => $data['user_id'], 'product_id' => $data['product_id']],
            $data
        );
        return back()->with('success', __('site/product/index.rated_success'));
    }
}
