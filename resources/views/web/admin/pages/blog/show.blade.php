@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/blog/show.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/blog/show.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/blog/show.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img width="100px" src="{{ asset($blog->image->image) }}" alt="blog_image">
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title d-inline-block">{{ $blog->title }}</h5>
                                <p class="card-text d-inline-block">{{ $blog->status->lang() }}</p>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ $blog->admin->name }}
                                </h6>
                                <p class="card-text">{!! $blog->article !!}</p>
                                <a href="{{ route('admin.blogs.edit', $blog->slug) }}"
                                    class="card-link text-secondary">{{ __('admin/blog/index.edit') }}</a>
                                <form class="d-inline" action="{{ route('admin.blogs.destroy', $blog->slug) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        type="submit">{{ __('admin/blog/index.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush