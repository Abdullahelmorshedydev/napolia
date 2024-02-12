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
                                                    <a href="{{ route('favourites.delete', $product->id) }}"
                                                        class="icon me-1">
                                                        <i class="ti-close"></i>
                                                    </a>
                                                    <form class="d-inline-block" action="{{ route('cart.add.to.cart') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                                        <input type="hidden" value="{{ $product->colors->first()->id }}"
                                                            name="color_id">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button type="submit"><i class="ti-shopping-cart"></i></button>
                                                    </form>
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
                                        <a href="{{ route('favourites.delete', $product->id) }}" class="icon me-3">
                                            <i class="ti-close"></i>
                                        </a>
                                        <form class="d-inline-block" action="{{ route('cart.add.to.cart') }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="id">
                                            <input type="hidden" value="{{ $product->colors->first()->id }}"
                                                name="color_id">
                                            <input type="hidden" value="1" name="quantity">
                                            <button type="submit" class="btn btn-solid"><i
                                                    class="ti-shopping-cart"></i></button>
                                        </form>
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
@endpush
