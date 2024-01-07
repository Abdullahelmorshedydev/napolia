<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Traits\FilesTrait;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Product\StoreProductRequest;
use App\Http\Requests\Web\Admin\Product\UpdateProductRequest;
use App\Models\Image;

class ProductController extends Controller
{
    use FilesTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate();
        $status = Product::$status;
        return view('web.admin.pages.product.index', compact('products', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('web.admin.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create([
            'name' => ['en' => $data['name_en'], 'ar' => $data['name_ar']],
            'description' => ['en' => $data['description_en'], 'ar' => $data['description_ar']],
            'price' => $data['price'],
            'discount' => isset($data['discount']) ? $data['discount'] : null,
            'condition' => isset($data['condition']) ? $data['condition'] : 'default',
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
            'sub_category_id' => $data['sub_category_id'],
        ]);
        $product->images()->create([
            'image' => FilesTrait::store($request->file('image_1'), 'uploads/products/'),
        ]);
        $product->images()->create([
            'image' => FilesTrait::store($request->file('image_2'), 'uploads/products/'),
        ]);
        $product->images()->create([
            'image' => FilesTrait::store($request->file('image_3'), 'uploads/products/'),
        ]);
        $product->images()->create([
            'image' => FilesTrait::store($request->file('image_4'), 'uploads/products/'),
        ]);
        return redirect()->route('admin.products.index')->with('success',  __('admin/product/create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('web.admin.pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $status = Product::$status;
        $conditions = Product::$condition;
        $categories = Category::get();
        $subCategories = Category::where('category_id', $product->category_id)->get();
        $images = $product->images;
        return view('web.admin.pages.product.edit', compact('product', 'status', 'conditions', 'categories', 'subCategories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile('image_1')) {
            FilesTrait::update($product, $data['image_id_1'], $request->file('image_1'), 'uploads/products/');
        }
        if ($request->hasFile('image_2')) {
            FilesTrait::update($product, $data['image_id_2'], $request->file('image_2'), 'uploads/products/');
        }
        if ($request->hasFile('image_3')) {
            FilesTrait::update($product, $data['image_id_3'], $request->file('image_3'), 'uploads/products/');
        }
        if ($request->hasFile('image_4')) {
            FilesTrait::update($product, $data['image_id_4'], $request->file('image_4'), 'uploads/products/');
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', __('admin/product/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            FilesTrait::delete($image->image);
        }
        $product->images()->delete();
        $product->delete();
        return back()->with('success', __('admin/product/index.success'));
    }

    public function getSubCategories($id)
    {
        $sub_categories = Category::where('category_id', $id)->get();
        return response()->json(['data' => $sub_categories]);
    }
}
