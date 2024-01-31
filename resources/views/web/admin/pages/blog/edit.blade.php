@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/blog/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/blog/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/blog/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/blog/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.blogs.update', $blog->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputtitle_en1">{{ __('admin/blog/edit.title_en_label') }}</label>
                                            <input type="text"
                                                value="{{ old('title_en', $blog->getTranslation('title', 'en')) }}"
                                                name="title_en" class="form-control" id="exampleInputtitle_en1"
                                                placeholder="{{ __('admin/blog/edit.title_en_place') }}">
                                            @error('title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputtitle_ar1">{{ __('admin/blog/edit.title_ar_label') }}</label>
                                            <input type="text"
                                                value="{{ old('title_ar', $blog->getTranslation('title', 'ar')) }}"
                                                name="title_ar" class="form-control" id="exampleInputtitle_ar1"
                                                placeholder="{{ __('admin/blog/edit.title_ar_place') }}">
                                            @error('title_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="article_en">
                                        {{ __('admin/blog/edit.article_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="article_en">{!! old('article_en', $blog->getTranslation('article', 'en')) !!}</textarea>
                                    @error('article_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="article_ar">
                                        {{ __('admin/blog/edit.article_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="article_ar">{!! old('article_ar', $blog->getTranslation('article', 'ar')) !!}</textarea>
                                    @error('article_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">{{ __('admin/blog/edit.image_label') }}</label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/blog/edit.choose_file') }}
                                                </label>
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputStatus1">{{ __('admin/blog/edit.status_label') }}</label>
                                            <select name="status" id="exampleInputStatus1" class="form-control">
                                                <option disabled selected>{{ __('admin/blog/edit.status_place') }}</option>
                                                @foreach ($status as $stat)
                                                    <option
                                                        {{ old('status', $blog->status->value) == $stat->value ? 'selected' : '' }}
                                                        value="{{ $stat->value }}">
                                                        {{ $stat->lang() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/blog/edit.submit') }}
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
