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
                        <h2>{{ __('site/blog.title') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/blog.title') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-b-space blog-page ratio2_3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach ($blogs as $blog)
                        <div class="row blog-media">
                            <div class="col-xl-6">
                                <div class="blog-left">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        <img src="{{ asset('storage/' . $blog->image->image) }}" class="img-fluid  bg-img"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="blog-right">
                                    <div>
                                        <h6>{{ $blog->updated_at }}</h6>
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <h4>{{ $blog->title }}.</h4>
                                        </a>
                                        <ul class="post-social">
                                            <li>{{ __('site/blog.posted_by') . ' : ' . $blog->admin->name }}</li>
                                            <li>
                                                <i class="fa fa-comments"></i>
                                                {{ $blog->comments()->count() . ' ' . __('site/blog.comment') }}
                                            </li>
                                        </ul>
                                        <p>{{ $blog->article }}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection

@push('script')
@endpush
