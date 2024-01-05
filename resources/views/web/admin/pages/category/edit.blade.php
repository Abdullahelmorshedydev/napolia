@extends('web.admin.layouts.app')

@section('style')
@endsection

@section('title', __('admin/category/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/category/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/category/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/category/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputName1">{{ __('admin/category/edit.name_label') }}</label>
                                    <input type="text" value="{{ old('name', $category->name) }}" name="name"
                                        class="form-control" id="exampleInputName1"
                                        placeholder="{{ __('admin/category/edit.name_place') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputImage1">{{ __('admin/category/edit.image_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/category/edit.choose_file') }}
                                        </label>
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                    <label for="exampleInputStatus1">{{ __('admin/category/edit.status_label') }}</label>
                                    <select name="status" id="exampleInputStatus1" class="form-control">
                                        <option disabled selected>{{ __('admin/category/edit.status_place') }}</option>
                                        @foreach ($status as $stat)
                                            <option {{ old('status', $category->status) == $stat ? 'selected' : '' }}
                                                value="{{ $stat }}">
                                                @if (app()->currentLocale() == 'ar' && $stat == 'active')
                                                    مفعلة
                                                @elseif (app()->currentLocale() == 'ar' && $stat == 'desactive')
                                                    غير مفعلة
                                                @else
                                                    {{ $stat }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="alert alert-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/category/edit.submit') }}
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
