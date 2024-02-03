@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/product/show.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/product/show.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/product/show.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-12  col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title">{{ __('admin/product/show.images') }}:</h5>
                    </div>
                    @foreach ($product->images as $image)
                        <div class="img-fluid card-img-top mt-5 col-md-4">
                            <div class="mb-2">
                                <img width="75%" height="200px" src="{{ asset($image->image) }}" alt="image">
                            </div>
                            <div class="col-md-12">
                                @can('product-edit')
                                    <a class="btn btn-info"
                                        href="{{ route('admin.products.edit.image', $image->id) }}">{{ __('admin/product/index.edit') }}</a>
                                @endcan
                                @can('product-delete')
                                    <form action="{{ route('admin.products.delete.image', $image->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            type="submit">{{ __('admin/product/index.delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 row">
                    @can('product-create')
                        <div class="col-md-12">
                            <a href="{{ route('admin.products.create.image', $product->slug) }}" class="btn btn-success">
                                {{ __('admin/product/show.create_image') }}
                            </a>
                        </div>
                    @endcan
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.name') }}:
                        <h5 class="card-title d-inline">{{ $product->name }}</h5>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.quantity') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $product->quantity }}</h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.price') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">
                            {{ $product->price . ' ' . __('admin/product/show.pound') }}</h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.discount') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">
                            {{ $product->discount ? $product->discount . $product->discount_type->char() : 0 }}
                        </h6>
                    </div>
                    @isset($product->discount)
                        <div class="col-md-12 mt-2">
                            {{ __('admin/product/show.price_after_discount') }}:
                            <h6 class="card-subtitle mb-2 text-muted d-inline">
                                {{ $product->discount_type->calc($product->price, $product->discount) . ' ' . __('admin/product/show.pound') }}
                            </h6>
                        </div>
                    @endisset
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.status') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">
                            {{ $product->status->lang() }}
                        </h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.condition') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">
                            {{ $product->condition->lang() }}
                        </h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.sales_count') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $product->sales_count }}</h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.category') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $product->category->name }}</h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.sub_category') }}:
                        <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $product->subCategory->name }}</h6>
                    </div>
                    <div class="col-md-12 mt-2">
                        {{ __('admin/product/show.description') }}:
                        <p class="card-subtitle mb-2 text-muted d-inline">{{ $product->description }}</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        @can('product-edit')
                            <a href="{{ route('admin.products.edit', $product->slug) }}" class="card-link text-secondary ml-2">
                                {{ __('admin/product/show.edit') }}
                            </a>
                        @endcan
                        @can('product-delete')
                            <form class="d-inline" action="{{ route('admin.products.destroy', $product->slug) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">{{ __('admin/product/index.delete') }}</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
