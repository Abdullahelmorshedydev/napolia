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
    @if($errors)
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
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
                                            <img src="{{ asset($cartItem->product->images->first()->image) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.index', $cartItem->product->slug) }}">
                                            {{ $cartItem->product->name }}
                                        </a>
                                        <div class="mobile-cart-content row">
                                            <div class="col-xs-3">
                                                <div class="qty-box">
                                                    <div class="input-group">
                                                        <input id="{{ $cartItem->product->id }}" type="number" name="quantity"
                                                            class="form-control input-number"
                                                            value="{{ old('quantity', $cartItem->quantity) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">
                                                    {{ $cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount) . ' ' . __('admin/product/show.pound') }}
                                                </h2>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color">
                                                    <a href="{{ route('cart.delete.item', $cartItem->product->id) }}"
                                                        class="icon"><i class="ti-close"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>
                                            {{ $cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount) . ' ' . __('admin/product/show.pound') }}
                                        </h2>
                                    </td>
                                    <form action="{{ route('cart.add.to.cart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $cartItem->product_id }}" name="id">
                                        <td>
                                            <ul class="color-variant">
                                                @foreach ($cartItem->product->colors as $color)
                                                    <li id="color" style="background-color: {{ $color->code }}"
                                                        class="{{ $cartItem->product_color_id == $color->id ? 'active' : '' }}">
                                                        <input id="radioInput" type="radio" value="{{ $color->id }}" name="color_id"
                                                            class="d-none">
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
                                            <a href="{{ route('cart.delete.item', $cartItem->product->id) }}" class="icon">
                                                <i class="ti-close"></i>
                                            </a>
                                            <button type="submit" data-bs-toggle="modal" class="btn btn-sm btn-solid">
                                                {{ __('site/order.update_cart') }}
                                            </button>
                                        </td>
                                    </form>
                                    <td>
                                        <h2 id="prodPrice" class="td-color">
                                            {{ $cartItem->quantity * $cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount) }}
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
                    <a href="{{ route('order.place_order') }}" class="btn btn-solid">
                        {{ __('site/home/cart.checkout') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
@endsection

@push('script')
    <script>
        if (document.querySelector('li.active')) {
            document.getElementById('radioInput').checked = true;
        }
    </script>
@endpush
