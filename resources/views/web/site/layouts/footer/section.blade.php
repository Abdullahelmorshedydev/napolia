<div class="footer-section">
    <div class="container">
        <div class="row border-cls section-b-space section-t-space">
            <div class="col-xl-4 col-lg-12 about-section">
                <div class="footer-title footer-mobile-title">
                    <h4>{{ __('site/home/section.about') }}</h4>
                </div>
                <div class="footer-content">
                    <div class="footer-logo">
                        <img class="siteLogo" src="{{ asset('storage/' . settings()->get('site_logo')) }}" alt="">
                    </div>
                    <p>{{ settings()->get('footer_slogan_' . app()->currentLocale()) }}.
                    </p>
                    <div class="footer-social">
                        <ul>
                            <li>
                                <a href="{{ settings()->get('facebook_link') }}"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ settings()->get('google_plux_link') }}"><i class="fa fa-google-plus"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ settings()->get('x_link') }}"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ settings()->get('instgram_link') }}"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="row height-cls">
                    <div class="col-lg-3 footer-link">
                        <div>
                            <div class="footer-title">
                                <h4>{{ __('site/home/section.my_acc') }}</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="{{ route('aboutus') }}">
                                            {{ __('site/home/section.about_us') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactus.index') }}">
                                            {{ __('site/home/section.contact_us') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('terms') }}">
                                            {{ __('site/home/section.terms_conditions') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('return_exchange') }}">
                                            {{ __('site/home/section.return_exchange') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-link">
                        <div>
                            <div class="footer-title">
                                <h4>{{ __('site/home/section.links') }}</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    {{-- <li><a href="#">store location</a></li> --}}
                                    <li>
                                        <a href="{{ route('profile.index') }}">
                                            {{ __('site/home/section.my_acc') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('order.all_orders') }}">
                                            {{ __('site/home/section.order_track') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cart.view') }}">
                                            {{ __('site/home/cart.my_cart') }}
                                        </a>
                                    </li>
                                    {{-- <li><a href="#">{{ __('site/home/section.faq') }}</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-link">
                        <div>
                            <div class="footer-title">
                                <h4>{{ __('site/home/section.category') }}</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    @foreach ($parentCategories as $category)
                                        <li>
                                            <a href="{{ route('category.index', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 footer-link">
                        <div>
                            <div class="footer-title">
                                <h4>{{ __('site/home/section.contact_us') }}</h4>
                            </div>
                            <div class="footer-content">
                                <ul class="contact-list">
                                    <li><i class="fa fa-phone"></i>{{ __('site/home/section.call_us') }}:
                                        {{ settings()->get('phone_1') }}</li>
                                    <li><i class="fa fa-envelope-o"></i>{{ __('site/home/section.email_us') }}:
                                        {{ settings()->get('email_1') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
