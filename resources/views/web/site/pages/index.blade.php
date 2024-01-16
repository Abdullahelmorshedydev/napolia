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
                        <div>
                            <div class="home text-center p-right">
                                <img src="{{ asset('site/assets/images/home-banner/23.jpg') }}" class="bg-img " alt="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="slider-contain">
                                                <div>
                                                    <h5>all furniture</h5>
                                                    <h1>latest funrniture</h1>
                                                    <h4>save up to 50% off</h4>
                                                    <a href="#" class="btn btn-solid">shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="home text-center p-right">
                                <img src="{{ asset('site/assets/images/home-banner/24.jpg') }}" class="bg-img "
                                    alt="">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="slider-contain">
                                                <div>
                                                    <h5>all furniture</h5>
                                                    <h1>latest funrniture</h1>
                                                    <h4>save up to 50% off</h4>
                                                    <a href="#" class="btn btn-solid">shop now</a>
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
    <!-- home slider section end-->

    <!-- category section start -->
    <section class="category category-classic bg-grey">
        <div class="container">
            <div class="slide-6 no-arrow">
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/1.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>mobile</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/2.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>t-shirt</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/3.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>camera</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/4.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>table</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/5.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>ps4</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/6.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>shoes</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="category-wrapper">
                        <div class="img-block">
                            <a href="#"><img src="{{ asset('site/assets/images/category/furniture/7.png') }}"
                                    alt="" class=" img-fluid"></a>
                        </div>
                        <div class="category-title">
                            <a href="#">
                                <h5>camera</h5>
                            </a>
                        </div>
                    </div>
                </div>
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
                        <img src="{{ asset('site/assets/images/banner-l.png') }}" class=" img-fluid w-100 " alt="">
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
                    <a href="tab-1">top rated</a>
                </li>
                <li class="">
                    <a href="tab-2">on sale</a>
                </li>
                <li class="">
                    <a href="tab-3">30% off</a>
                </li>
                <li class="">
                    <a href="tab-4">most popular</a>
                </li>
                <li class="">
                    <a href="tab-5">popular</a>
                </li>
            </ul>
            <div class="tab-content-cls">
                <div id="tab-1" class="tab-content active default">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/1.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/2.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/3.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/4.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/5.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/6.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/7.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/8.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/9.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/10.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/1.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/2.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/3.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/4.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/5.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/6.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/7.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/8.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/9.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/10.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-3" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/1.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/2.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/3.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/4.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/5.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/6.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/7.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/8.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/9.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/10.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-4" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/1.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/2.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/3.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/4.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/5.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/6.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/7.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/8.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/9.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/10.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-5" class="tab-content">
                    <div class="container">
                        <div class="row border-row1 grid-5">
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/1.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/2.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/3.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/4.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/5.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/6.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/7.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/8.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/9.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-5">
                                <div class="product-box product-full">
                                    <div class="img-block">
                                        <a href="product-page.html"><img
                                                src="{{ asset('site/assets/images/furniture/10.jpg') }}"
                                                class=" img-fluid bg-img" alt=""></a>
                                        <div class="cart-right">
                                            <button tabindex="0" class="addcart-box" title="Quick shop"><i
                                                    class="ti-shopping-cart"></i></button>
                                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart"
                                                    aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#quick-view" title="Quick View"><i class="ti-search"
                                                    aria-hidden="true"></i></a>
                                            <a href="compare.html" title="Compare"><i class="ti-reload"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="#">
                                            <h6>richard mcClintock</h6>
                                        </a>
                                        <h5>$963.00</h5>
                                    </div>
                                    <div class="addtocart_box">
                                        <div class="addtocart_detail">
                                            <div>
                                                <div class="color">
                                                    <h5>finish</h5>
                                                    <ul class="type-box color-variant">
                                                        <li class="active"><img
                                                                src="{{ asset('site/assets/images/furniture/type/1.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/2.jpg') }}"
                                                                alt=""></li>
                                                        <li><img src="{{ asset('site/assets/images/furniture/type/3.jpg') }}"
                                                                alt=""></li>
                                                    </ul>
                                                </div>
                                                <div class="size">
                                                    <h5>size</h5>
                                                    <ul class="size-box">
                                                        <li class="active">xs</li>
                                                        <li>s</li>
                                                        <li>m</li>
                                                        <li>l</li>
                                                        <li>xl</li>
                                                    </ul>
                                                </div>
                                                <div class="addtocart_btn">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        class="closeCartbox" data-bs-target="#addtocart"
                                                        tabindex="0">add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="close-cart">
                                            <i class="fa fa-times" aria-hidden="true"></i>
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
    <!-- tab section start -->

    <!-- section start-->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="collection-about">
                        <h2 class="title pt-0">shop by room</h2>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                            dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                            fugit,
                            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 p-0">
                    <div class="collection-section">
                        <div class="collection-4 no-arrow">
                            <div>
                                <div class="card">
                                    <a href="#"><img
                                            src="{{ asset('site/assets/images/furniture/banner1.jpg') }}"
                                            alt="" class="img-fluid w-100"></a>
                                    <div class="card-body">
                                        <div class="collection_detail">
                                            <div>
                                                <h6>catch your dream</h6>
                                                <a href="#">
                                                    <h5>bedroom furniture</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <a href="#"><img
                                            src="{{ asset('site/assets/images/furniture/banner.jpg') }}"
                                            alt="" class="img-fluid w-100"></a>
                                    <div class="card-body">
                                        <div class="collection_detail">
                                            <div>
                                                <h6>where story begins</h6>
                                                <a href="#">
                                                    <h5>living room furniture</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <a href="#"><img src="{{ asset('site/assets/images/furniture/b-1.jpg') }}"
                                            alt="" class="img-fluid w-100"></a>
                                    <div class="card-body">
                                        <div class="collection_detail">
                                            <div>
                                                <h6>your home's hearth</h6>
                                                <a href="#">
                                                    <h5>kitchen furniture</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <a href="#"><img
                                            src="{{ asset('site/assets/images/furniture/banner.jpg') }}"
                                            alt="" class="img-fluid w-100"></a>
                                    <div class="card-body">
                                        <div class="collection_detail">
                                            <div>
                                                <h6>where story begins</h6>
                                                <a href="#">
                                                    <h5>living room furniture</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card">
                                    <a href="#"><img
                                            src="{{ asset('site/assets/images/furniture/banner.jpg') }}"
                                            alt="" class="img-fluid w-100"></a>
                                    <div class="card-body">
                                        <div class="collection_detail">
                                            <div>
                                                <h6>where story begins</h6>
                                                <a href="#">
                                                    <h5>living room furniture</h5>
                                                </a>
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
    <!-- section end-->

    <!-- blog section start -->
    <section class="blog-section grey-bg section-b-space ratio3_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="title">from the blog</h2>
                    <div class="slide-3">
                        <div>
                            <a href="#">
                                <div class="blog-image">
                                    <img src="{{ asset('site/assets/images/blog/1.jpg') }}" class=" img-fluid bg-img"
                                        alt="">
                                </div>
                                <div class="blog-info">
                                    <div>
                                        <h5>25 july 2018</h5>
                                        <p>Sometimes on purpose ected humour. dummy text.</p>
                                        <h6>by: admin, 0 comment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="blog-image">
                                    <img src="{{ asset('site/assets/images/blog/3.jpg') }}" class=" img-fluid bg-img"
                                        alt="">
                                </div>
                                <div class="blog-info">
                                    <div>
                                        <h5>25 july 2018</h5>
                                        <p>Sometimes on purpose ected humour. dummy text.</p>
                                        <h6>by: admin, 0 comment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="blog-image">
                                    <img src="{{ asset('site/assets/images/blog/5.jpg') }}" class=" img-fluid bg-img"
                                        alt="">
                                </div>
                                <div class="blog-info">
                                    <div>
                                        <h5>25 july 2018</h5>
                                        <p>Sometimes on purpose ected humour. dummy text.</p>
                                        <h6>by: admin, 0 comment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="blog-image">
                                    <img src="{{ asset('site/assets/images/blog/7.jpg') }}" class=" img-fluid bg-img"
                                        alt="">
                                </div>
                                <div class="blog-info">
                                    <div>
                                        <h5>25 july 2018</h5>
                                        <p>Sometimes on purpose ected humour. dummy text.</p>
                                        <h6>by: admin, 0 comment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <div class="blog-image">
                                    <img src="{{ asset('site/assets/images/blog/4.jpg') }}" class=" img-fluid bg-img"
                                        alt="">
                                </div>
                                <div class="blog-info">
                                    <div>
                                        <h5>25 july 2018</h5>
                                        <p>Sometimes on purpose ected humour. dummy text.</p>
                                        <h6>by: admin, 0 comment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="review-box">
                        <h2 class="title">satisfied customer</h2>
                        <div class="slide-1">
                            <div>
                                <div class="review-content">
                                    <div class="avtar">
                                        <img src="{{ asset('site/assets/images/testimonial/1.jpg') }}" alt="">
                                    </div>
                                    <h5>mark jecno</h5>
                                    <h6>designer</h6>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration dummy text .</p>
                                </div>
                            </div>
                            <div>
                                <div class="review-content">
                                    <div class="avtar">
                                        <img src="{{ asset('site/assets/images/testimonial/1.jpg') }}" alt="">
                                    </div>
                                    <h5>mark jecno</h5>
                                    <h6>designer</h6>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered alteration dummy text .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end -->
@endsection

@push('script')
@endpush
