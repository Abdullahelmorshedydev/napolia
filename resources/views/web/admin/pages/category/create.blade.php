@extends('web.admin.layouts.app')

@section('style')
@endsection

@section('title', __('admin/category/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/category/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/category/create.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/category/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameEn1">{{ __('admin/category/create.name_en_label') }}</label>
                                            <input type="text" value="{{ old('name_en') }}" name="name_en"
                                                class="form-control" id="exampleInputNameEn1"
                                                placeholder="{{ __('admin/category/create.name_en_place') }}">
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameAr1">{{ __('admin/category/create.name_ar_label') }}</label>
                                            <input type="text" value="{{ old('name_ar') }}" name="name_ar"
                                                class="form-control" id="exampleInputNameAr1"
                                                placeholder="{{ __('admin/category/create.name_ar_place') }}">
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="exampleInputCategoryId1">{{ __('admin/product/create.category_id_label') }}</label>
                                    <select name="category_id" id="exampleInputCategoryId1" class="form-control">
                                        <option disabled selected>{{ __('admin/product/create.category_id_place') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="alert alert-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputImage1">{{ __('admin/category/create.image_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/category/create.choose_file') }}
                                        </label>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/category/create.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
