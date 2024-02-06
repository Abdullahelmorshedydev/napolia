@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/product/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/product/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/product/index.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/product/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/product/index.name') }}</th>
                                <th>{{ __('admin/product/index.price') }}</th>
                                <th>{{ __('admin/product/index.condition') }}</th>
                                <th>{{ __('admin/product/index.status') }}</th>
                                <th>{{ __('admin/product/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $products->firstItem() + $loop->index }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if (isset($product->discount))
                                            {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                        @else
                                            {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}$
                                        @endif
                                    </td>
                                    <td>{{ $product->condition->lang() }}</td>
                                    <td>{{ $product->status->lang() }}</td>
                                    <td>
                                        @can('product-list')
                                            <a href="{{ route('admin.products.show', $product->slug) }}"
                                                class="btn btn-secondary">
                                                {{ __('admin/product/index.show') }}
                                            </a>
                                            <a href="{{ route('admin.products.showReviews', $product->slug) }}"
                                                class="btn btn-secondary">
                                                {{ __('admin/product/index.reviews') }}
                                            </a>
                                        @endcan
                                        @can('product-edit')
                                            <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-info">
                                                {{ __('admin/product/index.edit') }}
                                            </a>
                                        @endcan
                                        @can('product-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.products.destroy', $product->slug) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/product/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
