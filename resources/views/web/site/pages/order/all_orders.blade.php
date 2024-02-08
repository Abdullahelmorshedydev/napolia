@extends('web.site.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2>{{ __('site/order.all_orders') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/order.all_orders') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section order-history section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">{{ __('site/order.order_id') }}</th>
                                <th scope="col">{{ __('site/order.shipping_address') }}</th>
                                <th scope="col">{{ __('site/order.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.orders.show_order', $order->id) }}"><span class="dark-data">{{ $order->id }}</span></a>
                                    </td>
                                    <td>
                                        <h4>{{ $order->address }}</h4>
                                        <h4>
                                            {{ $order->state->name . ', ' . $order->city->name . ', ' . $order->country->name }}
                                        </h4>
                                    </td>
                                    <td>
                                        <div class="responsive-data">
                                            <h4 class="price">{{ $order->address }}</h4>
                                            <span>{{ $order->state->name }}</span>|
                                            <span>{{ $order->city->name }}</span>|
                                            <span>{{ $order->country->name }}</span>
                                        </div>
                                        <span class="dark-data">{{ $order->status->lang() }}</span>
                                        ({{ ' ' . \Carbon\Carbon::parse($order->updated_at)->toDateString() }})
                                        <br>
                                        <a href="{{ route('order.track_order', $order->id) }}" class="btn btn-solid">{{ __('site/order.track') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </section>
    <!--section end-->
@endsection

@push('script')
@endpush
