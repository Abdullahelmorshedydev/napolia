<div class="nav-icon">
    <ul>
        <li class="onhover-div user-icon" onclick="openAccount()">
            <img src="{{ asset('site/assets/images/icon/user.png') }}" alt="" class="user-img">
            <i class="ti-user mobile-icon"></i>
        </li>
        <li class="onhover-div setting-icon">
            <div><img src="{{ asset('site/assets/images/icon/settings.png') }}" class=" img-fluid setting-img"
                    alt="">
                <i class="ti-settings mobile-icon"></i>
            </div>
            <div class="show-div setting">
                <h6>{{ __('site/home/nav.language') }}</h6>
                <ul>
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            @if ($localeCode == 'ar')
                                <a hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @else
                                <a hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
        <li class="onhover-div wishlist-icon" onclick="openWishlist()">
            <img src="{{ asset('site/assets/images/icon/wishlist.png') }}" alt="" class="wishlist-img">
            <i class="ti-heart mobile-icon"></i>
        </li>
        <li class="onhover-div cart-icon" onclick="openCart()">
            <img src="{{ asset('site/assets/images/icon/cart.png') }}" alt="" class="cart-image">
            <i class="ti-shopping-cart mobile-icon"></i>
            <div class="cart">
                <span>2 item</span>
                <h6>my cart</h6>
            </div>
        </li>
    </ul>
</div>
