<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\CategoryStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Web\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\FilesTrait;

class CategoryController extends Controller
{
    use FilesTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('image')->with('category')->paginate();
        return view('web.admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('web.admin.pages.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create([
            'name' => ['en' => $data['name_en'], 'ar' => $data['name_ar']],
            'category_id' => isset($data['category_id']) ? $data['category_id'] : null,
        ]);
        $category->image()->create([
            'image' => FilesTrait::store($request->file('image'), 'uploads/categories/'),
        ]);
        return redirect()->route('admin.categories.index')->with('success',  __('admin/category/create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->with('categories')->with('products')->with('image');
        return view('web.admin.pages.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('status', CategoryStatusEnum::ACTIVE->value)->get()->except($category->id);
        $status = CategoryStatusEnum::cases();
        return view('web.admin.pages.category.edit', compact('category', 'categories', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            FilesTrait::delete($category->image->image);
            $category->image->update([
                'image' => FilesTrait::store($request->file('image'), 'uploads/categories/'),
            ]);
        }
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', __('admin/category/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        FilesTrait::delete($category->image->image);
        $category->image()->delete();
        $category->delete();
        return back()->with('success', __('admin/category/index.success'));
    }
}
