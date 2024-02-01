<!-- My account bar -->
<div id="myAccount" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>{{ __('site/auth/login.my_acc') }}</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        @guest
            <form action="{{ route('auth.login.store') }}" method="POST" class="theme-form">
                @csrf
                <div class="form-group">
                    <label for="email">{{ __('site/auth/login.email') }}</label>
                    <input type="email" class="form-control" name="email" placeholder="{{ __('site/auth/login.email_place') }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('site/auth/login.password') }}</label>
                    <input type="password" class="form-control" name="password" placeholder="{{ __('site/auth/login.password_place') }}">
                </div>
                <button type="submit" class="btn btn-solid btn-solid-sm btn-block">{{ __('site/auth/login.button') }}</button>
                <h5 class="forget-class">
                    <a href="{{ route('auth.register.show') }}" class="d-block">{{ __('site/auth/login.have_not_acc') }}</a>
                </h5>
            </form>
        @endguest
        @auth
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-solid btn-solid-sm btn-block">{{ __('site/auth/login.logout') }}</button>
            </form>
            <a href="{{ route('profile.index') }}" class="btn btn-solid btn-solid-sm btn-block mt-2">{{ __('site/auth/login.Profile') }}</a>
        @endauth
    </div>
</div>
<!-- My account bar end-->
