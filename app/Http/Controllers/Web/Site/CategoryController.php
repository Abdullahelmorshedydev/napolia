<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with(['images', 'colors'])->paginate();
        $subCategories = Category::where('category_id', $category->id)->with(['categories', 'image'])->get();
        return view('web.site.pages.category.index', compact('category', 'products', 'subCategories'));
    }
}
