<!-- Add to wishlist bar -->
<div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('site/home/wishlist.my_wishlist') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            @if (!empty($favProducts))
                <ul class="cart_product">
                    @foreach ($favProducts as $product)
                        <li>
                            <div class="media">
                                <a href="{{ route('product.index', $product->slug) }}">
                                    <img alt="" class="me-3"
                                        src="{{ asset('storage/' . $product->images->first()->image) }}">
                                </a>
                                <div class="media-body">
                                    <a href="{{ route('product.index', $product->slug) }}">
                                        <h4>{{ $product->name }}</h4>
                                    </a>
                                    <h4>
                                        <span>
                                            {{ $product->price_type->calc(
                                                $product->discount_type->calc($product->price, $product->discount),
                                                settings()->get('dollar_price'),
                                            ) .
                                                ' ' .
                                                __('admin/product/show.pound') }}
                                        </span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a href="{{ route('favourites.delete', $product->id) }}">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <ul class="cart_total">
                    <li>
                        <div class="buttons">
                            <a href="{{ route('favourites.index') }}"
                                class="btn btn-solid btn-block btn-solid-sm view-cart">{{ __('site/home/wishlist.view_wishlist') }}</a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="cart_total">
                    <li>
                        <div class="total">
                            <h5>
                                <span>{{ __('site/order.empty_fav') }}</span>
                            </h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="{{ route('auth.login.show') }}"
                                class="btn btn-solid btn-block btn-solid-sm view-cart">
                                {{ __('site/auth/login.button') }}
                            </a>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- Add to wishlist bar end-->
