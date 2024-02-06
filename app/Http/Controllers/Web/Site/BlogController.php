<?php

namespace App\Http\Controllers\Web\Site;

use App\Enums\BlogStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\BlogCommentRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', BlogStatusEnum::ACTIVE->value)->with(['admin', 'image', 'comments'])->orderBy('updated_at', 'DESC')->paginate();
        return view('web.site.pages.blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $comments = BlogComment::where('blog_id', $blog->id)->where('status', BlogStatusEnum::ACTIVE->value)->paginate();
        $commentsCount = BlogComment::where('blog_id', $blog->id)->where('status', BlogStatusEnum::ACTIVE->value)->count();
        return view('web.site.pages.blog.show', compact('blog', 'comments', 'commentsCount'));
    }

    public function store(BlogCommentRequest $request)
    {
        BlogComment::create($request->validated());
        return back()->with('success', __('site/blog.comment_success'));
    }
}
