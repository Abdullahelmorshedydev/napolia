<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Enums\BlogStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Web\Admin\Blog\UpdateBlogRequest;
use App\Traits\FilesTrait;
use App\Traits\TranslateTrait;

class BlogController extends Controller
{
    use FilesTrait, TranslateTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware(['permission:blog-list|blog-create|blog-edit|blog-delete'], ['only' => ['index', 'show']]);
        // $this->middleware(['permission:blog-create'], ['only' => ['create', 'store']]);
        // $this->middleware(['permission:blog-edit'], ['only' => ['edit', 'update']]);
        // $this->middleware(['permission:blog-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('admin')->paginate();
        return view('web.admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.admin.pages.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $data['title'] = TranslateTrait::translate($request->title_en, $request->title_ar);
        $data['slug'] = TranslateTrait::translate($request->title_en, $request->title_ar, true);
        $data['article'] = TranslateTrait::translate($request->article_en, $request->article_ar);
        $data['admin_id'] = auth('admin')->user()->id;
        $blog = Blog::create($data);
        $blog->image()->create([
            'image' => FilesTrait::store($request->file('image'), Blog::$img_path),
        ]);
        return redirect()->route('admin.blogs.index')->with('success',  __('admin/blog/create.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('web.admin.pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $status = BlogStatusEnum::cases();
        return view('web.admin.pages.blog.edit', compact('blog', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data['title'] = TranslateTrait::translate($request->title_en, $request->title_ar);
        $data['slug'] = TranslateTrait::translate($request->title_en, $request->title_ar, true);
        $data['article'] = TranslateTrait::translate($request->article_en, $request->article_ar);
        if ($request->hasFile('image')) {
            FilesTrait::delete($blog->image->image);
            $blog->image->update([
                'image' => FilesTrait::store($request->file('image'), Blog::$img_path),
            ]);
        }
        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', __('admin/blog/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        FilesTrait::delete($blog->image->image);
        $blog->image()->delete();
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', __('admin/blog/index.success'));
    }
}
