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
                        <h2>{{ __('site/cart.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">
                                    {{ __('site/home/nav.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/cart.header') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="cart-section section-b-space m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 m-0">
                    <table class="table cart-table table-responsive-xs striped-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">{{ __('site/cart.image') }}</th>
                                <th scope="col">{{ __('site/cart.product_name') }}</th>
                                <th scope="col">{{ __('site/cart.price') }}</th>
                                <th scope="col">{{ __('site/cart.color') }}</th>
                                <th scope="col">{{ __('site/cart.quantity') }}</th>
                                <th scope="col">{{ __('site/cart.action') }}</th>
                                <th scope="col">{{ __('site/cart.total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td>
                                        <a href="{{ route('product.index', $cartItem->product->slug) }}">
                                            <img src="{{ asset('storage/' . $cartItem->product->images->first()->image) }}"
                                                alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.index', $cartItem->product->slug) }}">
                                            {{ $cartItem->product->name }}
                                        </a>
                                        <div class="mobile-cart-content row">
                                            <form id="myForm{{ $cartItem->product_id }}">
                                                <input type="hidden" value="{{ $cartItem->product_id }}" name="id">
                                                <div class="col-xs-3">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <input id="{{ $cartItem->product->id }}" type="number"
                                                                name="quantity" class="form-control input-number"
                                                                value="{{ old('quantity', $cartItem->quantity) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <ul class="color-variant">
                                                                @foreach ($cartItem->product->colors as $color)
                                                                    <li id="{{ $color->id }}"
                                                                        class="{{ $cartItem->product_color_id == $color->id ? 'active' : '' }} mt-2"
                                                                        style="background-color: {{ $color->code }};">
                                                                        <input id="radioInput[{{ $color->id }}]"
                                                                            type="radio" class="d-none"
                                                                            value="{{ $color->id }}" name="color_id">
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h2 class="td-color">
                                                        <a id="deleteItem" class="deleteItem mt-2 d-inline-block"
                                                            data-id="{{ $cartItem->product_id }}">
                                                            <i class="ti-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <a tabindex="0" data-id="{{ $cartItem->product_id }}"
                                                            class="productCartButton mt-2 d-inline-block">
                                                            <i class="ti-shopping-cart"></i>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>
                                            @if (isset($cartItem->product->discount))
                                                {{ $cartItem->product->price_type->calc($cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount), settings()->get('dollar_price')) }}
                                            @else
                                                {{ $cartItem->product->price_type->calc($cartItem->product->price, settings()->get('dollar_price')) }}
                                            @endif
                                        </h2>
                                    </td>
                                    <form id="myForm{{ $cartItem->product_id }}">
                                        <input type="hidden" value="{{ $cartItem->product_id }}" name="id">
                                        <td>
                                            <ul class="color-variant">
                                                @foreach ($cartItem->product->colors as $color)
                                                    <li id="{{ $color->id }}"
                                                        class="{{ $cartItem->product_color_id == $color->id ? 'active' : '' }}"
                                                        style="background-color: {{ $color->code }};">
                                                        <input id="radioInput[{{ $color->id }}]" type="radio"
                                                            class="d-none" value="{{ $color->id }}" name="color_id">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="quantity" class="form-control input-number"
                                                        value="{{ old('quantity', $cartItem->quantity) }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a id="deleteItem" class="deleteItem" data-id="{{ $cartItem->product_id }}">
                                                <i class="ti-trash" aria-hidden="true"></i>
                                            </a>
                                            <a tabindex="0" data-id="{{ $cartItem->product_id }}"
                                                class="productCartButton">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </td>
                                    </form>
                                    <td>
                                        <h2 id="prodPrice" class="td-color">
                                            {{ $cartItem->quantity * $cartItem->discount
                                                ? $cartItem->product->price_type->calc(
                                                    $cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount),
                                                    settings()->get('dollar_price'),
                                                )
                                                : $cartItem->product->price_type->calc($cartItem->product->price, settings()->get('dollar_price')) }}
                                        </h2>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>{{ __('site/cart.total_price') }} :</td>
                                <td>
                                    <h2>{{ $cart->total }}</h2>
                                </td>
                            </tr>
                        </tfoot>
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
    @include('web.site.partials.__productColorAjax')
    @include('web.site.partials.__cartAjax')
    @include('web.site.partials.__wishlistAjax')
@endpush
