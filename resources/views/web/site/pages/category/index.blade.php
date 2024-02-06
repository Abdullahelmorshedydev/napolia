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
                                                                <img width="100px" src="{{ asset('storage/' . $cat->image->image) }}"
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
                                                                        class=" img-fluid bg-img" alt=""></a>
                                                                <div class="cart-details">
                                                                    <button tabindex="0" class="addcart-box"
                                                                        title="Quick shop"><i
                                                                            class="ti-shopping-cart"></i></button>
                                                                    <a href="javascript:void(0)" title="Add to Wishlist"><i
                                                                            class="ti-heart" aria-hidden="true"></i></a>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view" title="Quick View"><i
                                                                            class="ti-search" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-info">
                                                                <div>
                                                                    <a href="{{ route('product.index', $product->slug) }}">
                                                                        <h6>{{ $product->name }}</h6>
                                                                    </a>
                                                                    <p>{{ $product->description }}</p>
                                                                    <h5>
                                                                        {{ $product->price_type->calc($product->discount_type->calc($product->price, $product->discount), settings()->get('dollar_price')) . ' ' . __('admin/product/show.pound') }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="addtocart_box">
                                                                <div class="addtocart_detail">
                                                                    <div>
                                                                        <div class="color">
                                                                            <h5>{{ __('site/home/product.color') }}</h5>
                                                                            <ul class="color-variant">
                                                                                @foreach ($product->colors as $color)
                                                                                    <li
                                                                                        style="background-color: {{ $color->code }}">
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <div class="addtocart_btn">
                                                                            <a href="javascript:void(0)"
                                                                                data-bs-toggle="modal" class="closeCartbox"
                                                                                data-bs-target="#addtocart"
                                                                                tabindex="0">{{ __('site/home/product.add_to_cart') }}</a>
                                                                        </div>
                                                                    </div>
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
@endpush
