@extends('web.site.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2>{{ __('site/blog.title_show') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/blog.title_show') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 blog-detail mb-3">
                    <img src="{{ asset('storage/' . $blog->image->image) }}" class="img-fluid " alt="">
                    <h3>{{ $blog->title }}.</h3>
                    <ul class="post-social">
                        <li>{{ $blog->updated_at }}</li>
                        <li>{{ __('site/blog.posted_by') . ' : ' . $blog->admin->name }}</li>
                        <li><i class="fa fa-comments"></i> {{ $commentsCount . ' ' . __('site/blog.comment') }}</li>
                    </ul>
                    <p>{{ $blog->article }}.</p>
                </div>
            </div>
            <div class="row section-b-space">
                <div class="col-sm-12">
                    <ul class="comment-section">
                        @foreach ($comments as $comment)
                            <li>
                                <div class="media">
                                    <img src="{{ asset('admin/assets/img/faces/6.jpg') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h6>{{ $comment->name }} <span>{{ $comment->email }}</span></h6>
                                        <p>{{ $comment->comment }}.</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row blog-contact">
                <div class="col-sm-12">
                    <h2 class="title pt-0">{{ __('site/blog.comment_title') }}</h2>
                    <form action="{{ route('blog.store') }}" method="POST" class="theme-form">
                        @csrf
                        <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">{{ __('site/auth/profile.name') }}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name', auth()->user() ? auth()->user()->name : '') }}"
                                    placeholder="{{ __('site/auth/profile.name_place') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email">{{ __('site/auth/login.email') }}</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', auth()->user() ? auth()->user()->email : '') }}"
                                    placeholder="{{ __('site/auth/login.email_place') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="exampleFormControlTextarea1">{{ __('site/blog.comment') }}</label>
                                <textarea class="form-control" name="comment" placeholder="{{ __('site/blog.comment_place') }}"
                                    id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-solid"
                                    type="submit">{{ __('site/blog.send_comment_btn') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@push('script')
@endpush
