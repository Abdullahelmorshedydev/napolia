@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/category/show.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/category/show.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/category/show.active') }}</span>
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
                                <img width="100px" src="{{ asset($category->image->image) }}" alt="category_image">
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    @if (isset($category->category))
                                        <a href="{{ route('admin.categories.show', $category->category->slug) }}"
                                            class="card-link text-secondary">{{ $category->category->name }}</a>
                                    @else
                                        {{ __('admin/category/show.parent_category') }}
                                    @endif
                                </h6>
                                <p class="card-text">{{ $category->status->lang() }}</p>
                                @can('category-edit')
                                    <a href="{{ route('admin.categories.edit', $category->slug) }}"
                                        class="card-link text-secondary">{{ __('admin/category/index.edit') }}</a>
                                @endcan
                                @can('category-delete')
                                    <form class="d-inline" action="{{ route('admin.categories.destroy', $category->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('admin/category/index.delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/category/show.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/category/show.image') }}</th>
                                <th>{{ __('admin/category/show.name') }}</th>
                                <th>{{ __('admin/category/show.category_name') }}</th>
                                <th>{{ __('admin/category/show.status') }}</th>
                                <th>{{ __('admin/category/show.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->categories as $cat)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img style="width: 50px;" src="{{ asset($cat->image) }}" alt="category_image">
                                    </td>
                                    <th>{{ $cat->name }}</th>
                                    <th>{{ $cat->category->name }}</th>
                                    <td>
                                        @if (app()->currentLocale() == 'ar' && $cat->status == 'active')
                                            مفعلة
                                        @elseif (app()->currentLocale() == 'ar' && $cat->status == 'desactive')
                                            غير مفعلة
                                        @else
                                            {{ $cat->status }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $cat->id) }}" class="btn btn-secondary">
                                            {{ __('admin/category/show.show') }}
                                        </a>
                                        <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-info">
                                            {{ __('admin/category/show.edit') }}
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/category/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/category/show.product_label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/category/show.name') }}</th>
                                <th>{{ __('admin/category/show.sales_count') }}</th>
                                <th>{{ __('admin/category/show.status') }}</th>
                                <th>{{ __('admin/category/show.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->sales_count }}</th>
                                    <td>
                                        @if (app()->currentLocale() == 'ar' && $product->status == 'active')
                                            مفعلة
                                        @elseif (app()->currentLocale() == 'ar' && $product->status == 'desactive')
                                            غير مفعلة
                                        @else
                                            {{ $product->status }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}"
                                            class="btn btn-secondary">
                                            {{ __('admin/category/show.show') }}
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                                            {{ __('admin/category/show.edit') }}
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/category/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
