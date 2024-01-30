<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\CategoryStatusEnum;
use App\Enums\ColorEnum;
use App\Enums\DiscountTypeEnum;
use App\Enums\ProductConditionEnum;
use App\Enums\ProductStatusEnum;
use App\Models\Product;
use App\Models\Category;
use App\Traits\FilesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Product\StoreImageRequest;
use App\Http\Requests\Web\Admin\Product\StoreProductRequest;
use App\Http\Requests\Web\Admin\Product\UpdateImageRequest;
use App\Http\Requests\Web\Admin\Product\UpdateProductRequest;
use App\Models\Image;
use App\Traits\TranslateTrait;

class ProductController extends Controller
{
    use FilesTrait, TranslateTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images')->paginate();
        return view('web.admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', CategoryStatusEnum::ACTIVE->value)->get();
        $types = DiscountTypeEnum::cases();
        return view('web.admin.pages.product.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['description'] = TranslateTrait::translate($request->description_en, $request->description_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        $product = Product::create($data);
        foreach ($data['colors'] as $color) {
            $product->colors()->create([
                'name' => TranslateTrait::translate($color['en'], $color['ar']),
                'code' => $color['code'],
            ]);
        }
        foreach ($data['images'] as $image) {
            $product->images()->create([
                'image' => FilesTrait::store($image, 'uploads/products/'),
            ]);
        }
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
        $status = ProductStatusEnum::cases();
        $conditions = ProductConditionEnum::cases();
        $categories = Category::where('status', CategoryStatusEnum::ACTIVE->value)->get();
        $subCategories = Category::where('category_id', $product->category_id)->get();
        $types = DiscountTypeEnum::cases();
        return view('web.admin.pages.product.edit', compact('product', 'status', 'conditions', 'categories', 'subCategories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($request->name_en, $request->name_ar);
        $data['description'] = TranslateTrait::translate($request->description_en, $request->description_ar);
        $data['slug'] = TranslateTrait::translate($request->name_en, $request->name_ar, true);
        if ($data['colors']) {
            $product->colors()->delete();
            foreach ($data['colors'] as $color) {
                $product->colors()->create([
                    'name' => TranslateTrait::translate($color['en'], $color['ar']),
                    'code' => $color['code'],
                ]);
            }
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', __('admin/product/edit.success'));
    }

    public function createImage(Product $product)
    {
        return view('web.admin.pages.product.createImage', compact('product'));
    }

    public function storeImage(StoreImageRequest $request, Product $product)
    {
        $product->images()->create([
            'image' => FilesTrait::store($request->file('image'), 'uploads/products/'),
        ]);
        return redirect()->route('admin.products.show', $product->slug)->with('success',  __('admin/product/create.success_image'));
    }

    public function editImage(Image $image)
    {
        return view('web.admin.pages.product.editImage', compact('image'));
    }

    public function updateImage(UpdateImageRequest $request, Image $image)
    {
        FilesTrait::delete($image->image);
        $image->update([
            'image' => FilesTrait::store($request->file('image'), 'uploads/products/'),
        ]);
        return redirect()->route('admin.products.show', $image->morphable_id)->with('success', __('admin/product/edit.success_image'));
    }

    public function deleteImage(Image $image)
    {
        FilesTrait::delete($image->image);
        $image->delete();
        return redirect()->route('admin.products.show', $image->morphable_id)->with('success', __('admin/product/edit.success_delete_image'));
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
