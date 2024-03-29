@extends('web.site.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- home slider section start-->
    <div class="slider-bg slider-bg-2 ">
        <div class="container">
            <div class="row">
                <div class="col-12 slider-part">
                    <div class="slide-1 home-slider">
                        @foreach ($sliders as $slider)
                            <div>
                                <div class="home text-center p-right">
                                    <img src="{{ asset('storage/' . $slider->image->image) }}" class="productImage bg-img" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- home slider section end-->

    <!-- category section start -->
    <section class="category category-classic bg-grey">
        <div class="container">
            <div class="slide-6 no-arrow">
                @foreach ($categories as $category)
                    <div>
                        <div class="category-wrapper">
                            <div class="img-block">
                                <a href="{{ route('category.index', $category->slug) }}">
                                    <img src="{{ asset('storage/' . $category->image->image) }}" alt=""
                                        class=" img-fluid"></a>
                            </div>
                            <div class="category-title">
                                <a href="{{ route('category.index', $category->slug) }}">
                                    <h5>{{ $category->name }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- category section end -->

    <!-- collection banner start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row partition-3">
                <div class="col-md-12">
                    <a href="#">
                        <img src="{{ asset('storage/' . settings()->get('home_banner')) }}"
                            class="headerImage img-fluid w-100 " alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- collection banner end -->

    <!-- tab section start -->
    <section class="section-b-space tab-layout1 grey-bg ratio_square">
        <div class="theme-tab">
            <div class="drop-shadow">
                <div class="left-shadow">
                    <img src="{{ asset('site/assets/images/left.png') }}" alt="" class=" img-fluid">
                </div>
                <div class="right-shadow">
                    <img src="{{ asset('site/assets/images/right.png') }}" alt="" class=" img-fluid">
                </div>
            </div>
            <ul class="tabs">
                <li class="current">
                    <a href="tab-1">{{ __('site/home/section.top_rated') }}</a>
                </li>
                <li class="">
                    <a href="tab-2">{{ __('site/home/section.on_sale') }}</a>
                </li>
                {{-- <li class="">
                    <a href="tab-5">{{ __('site/home/section.popular') }}</a>
                </li> --}}
            </ul>
            <div class="tab-content-cls">
                <div id="tab-1" class="tab-content active default">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            @foreach ($products_rated as $product)
                                <div class="box-5">
                                    <div class="product-box product-full">
                                        <div class="img-block">
                                            <a href="{{ route('product.index', $product->slug) }}">
                                                <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                    class="productImage img-fluid" alt="">
                                            </a>
                                            <div class="cart-right">
                                                <a data-id="{{ $product->id }}" id="cartButton" tabindex="0"
                                                    class="addcart-box" title="Quick shop">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>
                                                @if (in_array($product->id, $favProdIds))
                                                    <a data-id="{{ $product->id }}" id="removeWishlistButton"
                                                        tabindex="0" class="removewishlist-box"
                                                        title="remove from wishlist">
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
                                                                        <input id="radioInput[{{ $color->id }}]"
                                                                            type="radio" class="d-none"
                                                                            value="{{ $color->id }}" name="color_id">
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
                </div>
                <div id="tab-2" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            @foreach ($products_sales as $product)
                                <div class="box-5">
                                    <div class="product-box product-full">
                                        <div class="img-block">
                                            <a href="{{ route('product.index', $product->slug) }}">
                                                <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                    class="productImage img-fluid" alt="">
                                            </a>
                                            <div class="cart-right">
                                                <a data-id="{{ $product->id }}" id="cartButton" tabindex="0"
                                                    class="addcart-box" title="Quick shop">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>
                                                @if (in_array($product->id, $favProdIds))
                                                    <a data-id="{{ $product->id }}" id="removeWishlistButton"
                                                        tabindex="0" class="removewishlist-box"
                                                        title="remove from wishlist">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a data-id="{{ $product->id }}" id="addWishlistButton"
                                                        tabindex="0" class="addwishlist-box" title="add to wishlist">
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
                                                                        <input id="radioInput[{{ $color->id }}]"
                                                                            type="radio" class="d-none"
                                                                            value="{{ $color->id }}" name="color_id">
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
                </div>
                {{-- <div id="tab-5" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            @foreach ($products_popular as $product)
                                <div class="box-5">
                                    <div class="product-box product-full">
                                        <div class="img-block">
                                            <a href="{{ route('product.index', $product->slug) }}">
                                                <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                    class="productImage img-fluid" alt="">
                                            </a>
                                            <div class="cart-right">
                                                <a data-id="{{ $product->id }}" id="cartButton" tabindex="0"
                                                    class="addcart-box" title="Quick shop">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>
                                                @if (in_array($product->id, $favProdIds))
                                                    <a data-id="{{ $product->id }}" id="removeWishlistButton"
                                                        tabindex="0" class="removewishlist-box"
                                                        title="remove from wishlist">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a data-id="{{ $product->id }}" id="addWishlistButton"
                                                        tabindex="0" class="addwishlist-box" title="add to wishlist">
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
                                                                        <input id="radioInput[{{ $color->id }}]"
                                                                            type="radio" class="d-none"
                                                                            value="{{ $color->id }}" name="color_id">
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
                </div> --}}
            </div>
        </div>
    </section>
    <!-- tab section start -->

    @if (isset($rooms))
        <!-- section start-->
        <section class="section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="collection-about">
                            <h2 class="title pt-0">{{ __('site/home/section.shop_room') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="collection-section">
                            <div class="collection-4 no-arrow">
                                @foreach ($rooms as $room)
                                    <div>
                                        <div class="card">
                                            <a href="{{ route('category.index', $room->slug) }}"><img
                                                    src="{{ asset('storage/' . $room->image->image) }}" alt=""
                                                    class="img-fluid w-100"></a>
                                            <div class="card-body">
                                                <div class="collection_detail">
                                                    <div>
                                                        <a href="{{ route('category.index', $room->slug) }}">
                                                            <h5>{{ $room->name }}</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    @endif

    <!-- blog section start -->
    <section class="blog-section grey-bg section-b-space ratio3_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">{{ __('site/home/section.from_blog') }}</h2>
                    <div class="slide-3">
                        @foreach ($blogs as $blog)
                            <div>
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <div class="blog-image">
                                        <img src="{{ asset('storage/' . $blog->image->image) }}"
                                            class=" img-fluid bg-img" alt="">
                                    </div>
                                    <div class="blog-info">
                                        <div>
                                            <h5>{{ $blog->updated_at }}</h5>
                                            <p>{{ $blog->title }}</p>
                                            <h6>{{ __('site/home/section.by') }}: {{ $blog->admin->name }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end -->
@endsection

@push('script')
    @include('web.site.partials.__productColorAjax')
    @include('web.site.partials.__cartAjax')
    @include('web.site.partials.__wishlistAjax')
@endpush
