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
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/home/section.category') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space ratio_square">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <div class="top-banner-content small-section">
                                            <h5>{{ $category->name }}</h5>
                                            <div class="slide-6 no-arrow">
                                                @foreach ($subCategories as $cat)
                                                    <div class="category-wrapper">
                                                        <div class="img-block">
                                                            <a href="{{ route('category.index', $cat->slug) }}">
                                                                <img width="100px"
                                                                    src="{{ asset('storage/' . $cat->image->image) }}"
                                                                    alt="" class=" img-fluid"></a>
                                                        </div>
                                                        <div class="category-title">
                                                            <a href="{{ route('category.index', $cat->slug) }}">
                                                                <h5>{{ $cat->name }}</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid">
                                            <div class="row">
                                                @foreach ($category->products as $product)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-block">
                                                                <a href="{{ route('product.index', $product->slug) }}"><img
                                                                        src="{{ asset('storage/' . $product->images[0]->image) }}"
                                                                        class="productImage img-fluid" alt=""></a>
                                                                <div class="cart-details">
                                                                    <a data-id="{{ $product->id }}" id="cartButton"
                                                                        tabindex="0" class="addcart-box"
                                                                        title="Quick shop">
                                                                        <i class="ti-shopping-cart"></i>
                                                                    </a>
                                                                    @if (in_array($product->id, $favProdIds))
                                                                        <a data-id="{{ $product->id }}"
                                                                            id="removeWishlistButton" tabindex="0"
                                                                            class="removewishlist-box"
                                                                            title="remove from wishlist">
                                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                                        </a>
                                                                    @else
                                                                        <a data-id="{{ $product->id }}"
                                                                            id="addWishlistButton" tabindex="0"
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
                                                                <div>
                                                                    <a href="{{ route('product.index', $product->slug) }}">
                                                                        <h6>{{ $product->name }}</h6>
                                                                    </a>
                                                                    <p>{{ $product->description }}</p>
                                                                    <h5>
                                                                        @if (isset($product->discount))
                                                                            {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) }}
                                                                        @else
                                                                            {{ $product->price_type->calc($product->price, settings()->get('dollar_price')) }}
                                                                        @endif
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="addtocart_box">
                                                                <div class="addtocart_detail">
                                                                    <form id="myForm{{ $product->id }}">
                                                                        <input type="hidden" value="{{ $product->id }}"
                                                                            name="id">
                                                                        <input type="hidden" value="1"
                                                                            name="quantity">
                                                                        <div>
                                                                            <div class="color">
                                                                                <h5>{{ __('site/home/product.color') }}
                                                                                </h5>
                                                                                <ul class="type-box color-variant">
                                                                                    @foreach ($product->colors as $color)
                                                                                        <li id="{{ $color->id }}"
                                                                                            class="color"
                                                                                            style="background-color: {{ $color->code }};">
                                                                                            <input
                                                                                                id="radioInput[{{ $color->id }}]"
                                                                                                type="radio"
                                                                                                class="d-none"
                                                                                                value="{{ $color->id }}"
                                                                                                name="color_id">
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                            <div class="addtocart_btn">
                                                                                <button id="submitCart{{ $product->id }}"
                                                                                    type="button" class="btn btn-primary">
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
                                        <div class="product-pagination mb-0">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <nav aria-label="Page navigation">
                                                                {{ $products->links() }}
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->
@endsection

@push('script')
    @include('web.site.partials.__productColorAjax')
    @include('web.site.partials.__cartAjax')
    @include('web.site.partials.__wishlistAjax')
@endpush
