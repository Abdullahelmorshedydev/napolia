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
        {{--  onclick="openWishlist()" --}}
        <li class="onhover-div wishlist-icon">
            <a href="{{ route('favourites.index') }}">
                <img src="{{ asset('site/assets/images/icon/wishlist.png') }}" alt="" class="wishlist-img">
                <i class="ti-heart mobile-icon"></i>
            </a>
        </li>
        {{--  onclick="openCart()" --}}
        <li class="onhover-div cart-icon">
            <a href="{{ route('cart.view') }}">
                <img src="{{ asset('site/assets/images/icon/cart.png') }}" alt="" class="cart-image">
                <i class="ti-shopping-cart mobile-icon"></i>
            </a>
        </li>
    </ul>
</div>
