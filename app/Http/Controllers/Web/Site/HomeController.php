<?php

namespace App\Http\Controllers\Web\Site;

use App\Models\Blog;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Enums\BlogStatusEnum;
use App\Enums\SliderStatusEnum;
use App\Enums\ProductStatusEnum;
use App\Enums\CategoryStatusEnum;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $sliders = Slider::where('status', SliderStatusEnum::ACTIVE->value)->with('image')->get();
        $categories = Category::where('status', CategoryStatusEnum::ACTIVE->value)
            ->where('name->en', '!=', 'Rooms')->orWhere('name->ar', '!=', 'غرف')
            ->has('categories')
            ->with('image')->get();
        $cats = Category::where('status', CategoryStatusEnum::ACTIVE->value)->get();
        $products_rated = Product::where('status', ProductStatusEnum::ACTIVE->value)->where('discount', null)->with(['images', 'colors'])->inRandomOrder()->limit(8)->get();
        $products_sales = Product::where('status', ProductStatusEnum::ACTIVE->value)->where('discount', '!=', null)->with(['images', 'colors'])->inRandomOrder()->limit(8)->get();
        // $products_popular = Product::where('status', ProductStatusEnum::ACTIVE->value)->orderBy('sales_count', 'desc')->with(['images', 'colors'])->inRandomOrder()->limit(8)->get();
        $blogs = Blog::where('status', BlogStatusEnum::ACTIVE->value)->with(['admin', 'image'])->inRandomOrder()->limit(8)->get();
        $parent = Category::where('name->en', 'Rooms')->orWhere('name->ar', 'غرف')->where('status', CategoryStatusEnum::ACTIVE->value)->first();
        $rooms = [];
        if (isset($parent)) {
            $rooms = Category::where('category_id', $parent->id)->where('status', CategoryStatusEnum::ACTIVE->value)->with('image')->get();
        }
        return view('web.site.pages.index', compact('sliders', 'categories', 'cats', 'products_rated', 'products_sales', 'blogs', 'rooms'));
    }
}
