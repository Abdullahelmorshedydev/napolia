@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/order.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/order.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/order.all_pending') }}</span>
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
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/city/index.name') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->user->name }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/auth/login.email') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->user->email }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/contact/index.phone') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->user->profile->phone }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/order.address') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">
                                    {{ $order->address . '|' . $order->state->name . '|' . $order->city->name . '|' . $order->country->name }}
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/order.id') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->id }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('admin/order.shipping_price') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->shipping_price }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('site/order.total') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->total }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('site/order.status') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->status->lang() }}</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title d-inline">{{ __('site/order.payment_method') }}:</h5>
                                <h6 class="card-subtitle mb-2 text-muted d-inline">{{ $order->payment_method }}</h6>
                            </div>
                        </div>
                        @foreach ($order->orderItems as $item)
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <img width="200px"
                                        src="{{ asset('storage/' . $item->product->images->first()->image) }}"
                                        alt="product_image">
                                </div>
                                <div class="col-md-9">
                                    <h5 class="card-title">{{ $item->product->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->prod_total }}</h6>
                                    <p class="card-text">{{ __('site/order.quantity') . ': ' . $item->quantity }}</p>
                                    <p class="card-text">{{ __('site/cart.color') . ': ' . $item->productColor->name . '(' . $item->productColor->code . ')' }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-3">
                            @can('order-edit')
                                @if ($order->status->value != 'canceled' || $order->status->value != 'completed')
                                    <form class="d-inline" action="{{ route($order->status->adminButtonLink(), $order->id) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="{{ $order->status->adminButtonClass() }}"
                                            type="submit">{{ $order->status->adminButtonLang() }}</button>
                                    </form>
                                    <form class="d-inline" action="{{ route('admin.orders.cancel', $order->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger" type="submit">{{ __('admin/order.cancel') }}</button>
                                    </form>
                                @endif
                            @endcan
                            @can('order-delete')
                                <form class="d-inline" action="{{ route('admin.orders.delete', $order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">{{ __('admin/order.delete') }}</button>
                                </form>
                            @endcan
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
