@extends('web.site.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- thank-you section start -->
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>{{ __('site/order.thankyou') }}</h2>
                        <p>{{ __('site/order.header_msg') }}</p>
                        <p>{{ __('site/order.transaction') . $order->id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- order-detail section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-order">
                        <h3 class="title pt-0">{{ __('site/order.order_details') }}</h3>
                        @foreach ($order->orderItems as $orderItem)
                            <div class="row product-order-detail">
                                <div class="col-3">
                                    <img src="{{ asset('storage/' . $orderItem->product->images->first()->image) }}" alt=""
                                        class="img-fluid ">
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{ __('site/order.product_name') }}</h4>
                                        <h5>{{ $orderItem->product->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{ __('site/order.quantity') }}</h4>
                                        <h5>{{ $orderItem->quantity }}</h5>
                                    </div>
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{ __('site/order.price') }}</h4>
                                        <h5>{{ $orderItem->product->price_type->calc($orderItem->product->discount_type->calc($orderItem->product->price, $orderItem->product->discount), settings()->get('dollar_price')) . ' ' . __('admin/product/show.pound') }}</h5>
                                    </div>
                                </div>
                                <div class="col-3 order_detail">
                                    <div>
                                        <h4>{{ __('site/cart.color') }}</h4>
                                        <h5>{{ $orderItem->productColor->name . '(' . $orderItem->productColor->code . ')' }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="total-sec">
                            <ul>
                                <li>{{ __('site/order.sub_total') }} <span>{{ $subTotal . ' ' . __('admin/product/show.pound') }}</span></li>
                                <li>{{ __('site/order.shipping') }} <span>{{ $order->shipping_price . ' ' . __('admin/product/show.pound') }}</span></li>
                                <li>{{ __('site/order.tax') }} <span>{{ $taxPrice . ' ' . __('admin/product/show.pound') }}</span></li>
                            </ul>
                        </div>
                        <div class="final-total">
                            <h3>{{ __('site/order.total') }} <span>{{ $order->total . ' ' . __('admin/product/show.pound') }}</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row order-success-sec">
                        <div class="col-sm-6">
                            <h4>{{ __('site/order.summery') }}</h4>
                            <ul class="order-detail">
                                <li>{{ __('site/order.order_id') . ' ' . $order->id }}</li>
                                <li>{{ __('site/order.order_date') . ' ' . \Carbon\Carbon::parse($order->created_at)->toDateString() }}</li>
                                <li>{{ __('site/order.order_total') . ' ' . $order->total }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4>{{ __('site/order.shipping_address') }}</h4>
                            <ul class="order-detail">
                                <li>{{ $order->address }}</li>
                                <li>{{ $order->state->name }}</li>
                                <li>{{ $order->city->name }}</li>
                                <li>{{ $order->country->name }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 payment-mode">
                            <h4>{{ __('site/order.payment_method') }}</h4>
                            <p>{{ __('site/order.payment') }}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="delivery-sec">
                                <h3>{{ __('site/order.expected_date_delivery') }}</h3>
                                <h2>{{ $shippingTime }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection

@push('script')
@endpush
