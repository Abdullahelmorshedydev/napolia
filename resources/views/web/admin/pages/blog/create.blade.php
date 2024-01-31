@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/blog/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/blog/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/blog/create.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title mb-1">{{ __('admin/blog/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titleEn1">{{ __('admin/blog/create.title_en_label') }}</label>
                                            <input type="text" value="{{ old('title_en') }}" name="title_en"
                                                class="form-control" id="titleEn1"
                                                placeholder="{{ __('admin/blog/create.title_en_place') }}">
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titleAr1">{{ __('admin/blog/create.title_ar_label') }}</label>
                                            <input type="text" value="{{ old('title_ar') }}" name="title_ar"
                                                class="form-control" id="titleAr1"
                                                placeholder="{{ __('admin/blog/create.title_ar_place') }}">
                                            @error('title_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="article_en">
                                        {{ __('admin/blog/create.article_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="article_en">{!! old('article_en') !!}</textarea>
                                    @error('article_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="article_ar">
                                        {{ __('admin/blog/create.article_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="article_ar">{!! old('article_ar') !!}</textarea>
                                    @error('article_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputImage1">{{ __('admin/blog/create.image_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/blog/create.choose_file') }}
                                        </label>
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/blog/create.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
