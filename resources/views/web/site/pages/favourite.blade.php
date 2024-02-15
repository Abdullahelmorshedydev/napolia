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
                        <h2>{{ __('site/favourite.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">
                                    {{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/favourite.header') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="wishlist-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">{{ __('site/favourite.image') }}</th>
                                <th scope="col">{{ __('site/favourite.product_name') }}</th>
                                <th scope="col">{{ __('site/favourite.price') }}</th>
                                <th scope="col">{{ __('site/favourite.availability') }}</th>
                                <th scope="col">{{ __('site/favourite.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($favProducts as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('product.index', $product->slug) }}">
                                            <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td><a href="{{ route('product.index', $product->slug) }}">{{ $product->name }}</a>
                                        <div class="mobile-cart-content row">
                                            <div class="col-xs-3">
                                                <p>
                                                    @if ($product->quantity == 0)
                                                        {{ __('site/favourite.made_order') }}
                                                    @else
                                                        {{ __('site/favourite.in_stock') }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">
                                                    @if (isset($product->discount))
                                                        {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                                    @else
                                                        {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}
                                                    @endif
                                                </h2>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">
                                                    <a data-id="{{ $product->id }}" id="removeWishlistButton"
                                                        tabindex="0" class="removewishlist-box"
                                                        title="remove from wishlist">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>
                                            @if (isset($product->discount))
                                                {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                            @else
                                                {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}
                                            @endif
                                        </h2>
                                    </td>
                                    <td>
                                        <p>
                                            @if ($product->quantity == 0)
                                                {{ __('site/favourite.made_order') }}
                                            @else
                                                {{ __('site/favourite.in_stock') }}
                                            @endif
                                        </p>
                                    </td>
                                    <td>
                                        <a data-id="{{ $product->id }}" id="removeWishlistButton" tabindex="0"
                                            class="removewishlist-box" title="remove from wishlist">
                                            <i class="ti-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6">
                    <a href="{{ route('index') }}" class="btn btn-solid">
                        {{ __('site/home/cart.continue_shopping') }}
                    </a>
                </div>
                <div class="col-6">
                    <a href="{{ route('order.checkout') }}" class="btn btn-solid">
                        {{ __('site/home/cart.checkout') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
@endsection

@push('script')
    @include('web.site.partials.__cartAjax')
    @include('web.site.partials.__wishlistAjax')
@endpush
