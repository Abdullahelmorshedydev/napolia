<!-- Add to cart bar -->
<div id="cart_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('site/home/cart.my_cart') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            @if (!empty($cart))
                <ul class="cart_product">
                    @foreach ($cart->cartItems as $cartItem)
                        <li>
                            <div class="media">
                                <a href="{{ route('product.index', $cartItem->product->slug) }}">
                                    <img alt="" class="me-3"
                                        src="{{ asset('storage/' . $cartItem->product->images->first()->image) }}">
                                </a>
                                <div class="media-body">
                                    <a href="{{ route('product.index', $cartItem->product->slug) }}">
                                        <h4>{{ $cartItem->product->name }}</h4>
                                    </a>
                                    <h4>
                                        <span>
                                            {{ $cartItem->quantity . ' x ' }}
                                            @if (isset($cartItem->product->discount))
                                                {{ $cartItem->product->price_type->calc($cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount), settings()->get('dollar_price')) }}
                                            @else
                                                {{ $cartItem->product->price_type->calc($cartItem->product->price, settings()->get('dollar_price')) }}
                                            @endif
                                            {{ ' ' . __('admin/product/show.pound') }}
                                        </span>
                                    </h4>
                                </div>
                            </div>
                            <div class="close-circle">
                                <a id="deleteItem" class="deleteItem" data-id="{{ $cartItem->product_id }}">
                                    <i class="ti-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <ul class="cart_total">
                    <li>
                        <div class="total">
                            <h5>{{ __('site/cart.sub_total') }} :
                                <span>{{ $cart->total . ' ' . __('admin/product/show.pound') }}</span>
                            </h5>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="{{ route('cart.view') }}" class="btn btn-solid btn-block btn-solid-sm view-cart">
                                {{ __('site/home/cart.view') }}
                            </a>
                            <a href="{{ route('order.checkout') }}"
                                class="btn btn-solid btn-solid-sm btn-block checkout">
                                {{ __('site/home/cart.checkout') }}
                            </a>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="cart_total">
                    <li>
                        <div class="total">
                            <h5>
                                <span>{{ __('site/order.empty_cart') }}</span>
                            </h5>
                        </div>
                    </li>
                    @guest
                        <li>
                            <div class="buttons">
                                <a href="{{ route('auth.login.show') }}"
                                    class="btn btn-solid btn-block btn-solid-sm view-cart">
                                    {{ __('site/auth/login.button') }}
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- Add to cart bar end-->
