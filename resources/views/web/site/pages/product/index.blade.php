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
                        <h2>{{ __('site/product/index.product_header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('site/product/index.product_header') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            @foreach ($product->images as $image)
                                <div>
                                    <img src="{{ asset('storage/' . $image->image) }}" alt=""
                                        class="img-fluid  image_zoom_cls-{{ $loop->index }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{ $product->name }}</h2>
                            @if (isset($product->discount))
                                <h4>
                                    <del>{{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}</del>
                                    <span>
                                        {{ $product->discount . ' ' . $product->discount_type->char() . ' ' . __('site/product/index.off') }}
                                    </span>
                                </h4>
                            @endif
                            <h3>
                                @if (isset($product->discount))
                                    {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                @else
                                    {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}
                                @endif
                                {{ ' ' . __('admin/product/show.pound') }}
                            </h3>
                            <form id="myForm">
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <ul class="color-variant">
                                    @foreach ($product->colors as $color)
                                        <li id="{{ $color->id }}" style="background-color: {{ $color->code }}">
                                            <input id="radioInput[{{ $color->id }}]" type="radio"
                                                value="{{ $color->id }}" name="color_id" class="d-none">
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="product-description border-product">
                                    <h6 class="product-title">{{ __('site/home/product.quantity') }}</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="ti-angle-left"></i>
                                                </button>
                                            </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="1">
                                            <span class="input-group-prepend">
                                                <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="ti-angle-right"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    @if (in_array($product->id, $cartProdIds))
                                        <a href="{{ route('cart.view') }}" data-bs-toggle="modal"
                                            class="btn btn-solid mt-2">
                                            {{ __('site/home/cart.view') }}
                                        </a>
                                        <a id="deleteItem" class="deleteItem btn btn-solid mt-2"
                                            data-id="{{ $product->id }}">
                                            {{ __('site/home/product.remove_from_cart') }}
                                        </a>
                                    @else
                                        <a tabindex="0" class="productCartButton btn btn-solid">
                                            <i class="ti-shopping-cart"></i>
                                            <span class="">{{ __('site/home/product.add_to_cart') }}</span>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <div class="border-product">
                                <h6 class="product-title">{{ __('site/product/index.product_details') }}</h6>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">{{ __('site/product/index.share_it') }}</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li>
                                            <a href="{{ settings()->get('facebook_link') }}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ settings()->get('google_plus_link') }}">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ settings()->get('x_link') }}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ settings()->get('instgram_link') }}">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    @if (in_array($product->id, $favProdIds))
                                        <a data-id="{{ $product->id }}" id="removeWishlistButton" tabindex="0"
                                            class="removewishlist-box btn btn-solid" title="remove from wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <span class="title-font">
                                                {{ __('site/product/index.remove_from_wishlist') }}
                                            </span>
                                        </a>
                                    @else
                                        <a data-id="{{ $product->id }}" id="addWishlistButton" tabindex="0"
                                            class="addwishlist-box btn btn-solid" title="add to wishlist">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                            <span class="title-font">
                                                {{ __('site/product/index.add_to_wishlist') }}
                                            </span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home"
                                role="tab" aria-selected="true">
                                {{ __('site/product/index.description') }}
                            </a>
                            <div class="material-border"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review"
                                role="tab" aria-selected="false">
                                {{ __('site/product/index.write_review') }}
                            </a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            <p>{{ $product->description }}.</p>
                        </div>
                        <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                            <div class="rating mt-2 mb-2">
                                <label for="name">{{ __('site/product/index.product_rate') }} : </label>
                                <div class="rating">
                                    <span class="star {{ $rate ? ($rate->rate >= 1 ? 'active' : '') : '' }}"
                                        data-value="1">&#9733;</span>
                                    <span class="star {{ $rate ? ($rate->rate >= 2 ? 'active' : '') : '' }}"
                                        data-value="2">&#9733;</span>
                                    <span class="star {{ $rate ? ($rate->rate >= 3 ? 'active' : '') : '' }}"
                                        data-value="3">&#9733;</span>
                                    <span class="star {{ $rate ? ($rate->rate >= 4 ? 'active' : '') : '' }}"
                                        data-value="4">&#9733;</span>
                                    <span class="star {{ $rate ? ($rate->rate == 5 ? 'active' : '') : '' }}"
                                        data-value="5">&#9733;</span>
                                </div>
                            </div>
                            <form class="theme-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">{{ __('site/product/index.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}"
                                            placeholder="{{ __('site/product/index.name_place') }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">{{ __('site/product/index.email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}"
                                            placeholder="{{ __('site/product/index.email_place') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">{{ __('site/product/index.review_title_place') }}</label>
                                        <input type="text" class="form-control" name="review_title"
                                            value="{{ old('review_title') }}"
                                            placeholder="{{ __('site/product/index.review_title_place') }}" required>
                                        @error('review_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">{{ __('site/product/index.review_message') }}</label>
                                        <textarea name="review_message" class="form-control"
                                            placeholder="{{ __('site/product/index.review_message_place') }}" id="exampleFormControlTextarea1"
                                            rows="6">{{ old('review_message') }}</textarea>
                                        @error('review_message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-solid"
                                            type="submit">{{ __('site/product/index.submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->

    <!-- product section start -->
    <section class="section-b-space ratio_square product-related">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2 class="title pt-0">{{ __('site/product/index.related_product') }}</h2>
                </div>
            </div>
            <div class="slide-6">
                @foreach ($related_products as $prod)
                    <div class="">
                        <div class="product-box">
                            <div class="img-block">
                                <a href="{{ route('product.index', $product->slug) }}">
                                    <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                        class="productImage img-fluid" alt="">
                                </a>
                                <div class="cart-right">
                                    <a data-id="{{ $product->id }}" id="cartButton" tabindex="0" class="addcart-box"
                                        title="Quick shop">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                    @if (in_array($product->id, $favProdIds))
                                        <a data-id="{{ $product->id }}" id="removeWishlistButton" tabindex="0"
                                            class="removewishlist-box" title="remove from wishlist">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a data-id="{{ $product->id }}" id="addWishlistButton" tabindex="0"
                                            class="addwishlist-box" title="add to wishlist">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('product.index', $product->slug) }}">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.index', $product->slug) }}">
                                    <h6>{{ $product->name }}</h6>
                                </a>
                                <h5>
                                    @if (isset($product->discount))
                                        {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                    @else
                                        {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}
                                    @endif
                                </h5>
                            </div>
                            <div class="addtocart_box">
                                <div class="addtocart_detail">
                                    <form id="myForm{{ $product->id }}">
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="1" name="quantity">
                                        <div>
                                            <div class="color">
                                                <h5>{{ __('site/home/product.color') }}</h5>
                                                <ul class="type-box color-variant">
                                                    @foreach ($product->colors as $color)
                                                        <li id="{{ $color->id }}" class="color"
                                                            style="background-color: {{ $color->code }};">
                                                            <input id="radioInput[{{ $color->id }}]" type="radio"
                                                                class="d-none" value="{{ $color->id }}"
                                                                name="color_id">
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="addtocart_btn">
                                                <button id="submitCart{{ $product->id }}" type="button"
                                                    class="btn btn-primary">
                                                    {{ __('site/home/product.add_to_cart') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="close-cart">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- product section end -->
@endsection

@push('script')
    @include('web.site.partials.__productColorAjax')
    @include('web.site.partials.__cartAjax')
    @include('web.site.partials.__wishlistAjax')
@endpush
