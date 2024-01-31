<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('index') }}">
            <img src="{{ asset(settings()->get('site_logo')) }}" class="main-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ isset(auth('admin')->user()->image->image) ? asset(auth('admin')->user()->image->image) : asset('admin/assets/img/faces/user.png') }}">
                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth('admin')->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth('admin')->user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ __('admin/home/sidebar.main') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.home') }}</span>
                </a>
            </li>
            <li class="side-item side-item-category">{{ __('admin/home/sidebar.general') }}</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.slider_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.sliders.index') }}">{{ __('admin/home/sidebar.slider_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.sliders.create') }}">{{ __('admin/home/sidebar.slider_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.category_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.categories.index') }}">{{ __('admin/home/sidebar.category_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.categories.create') }}">{{ __('admin/home/sidebar.category_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.product_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.products.index') }}">{{ __('admin/home/sidebar.product_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.products.create') }}">{{ __('admin/home/sidebar.product_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.coupon_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.coupons.index') }}">{{ __('admin/home/sidebar.coupon_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.coupons.create') }}">{{ __('admin/home/sidebar.coupon_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.blog_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.blogs.index') }}">{{ __('admin/home/sidebar.blog_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.blogs.create') }}">{{ __('admin/home/sidebar.blog_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.shipping_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.shippings.index') }}">{{ __('admin/home/sidebar.shipping_all') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.shippings.create') }}">{{ __('admin/home/sidebar.shipping_create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                    </svg>
                    <span class="side-menu__label">{{ __('admin/home/sidebar.settings_title') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.general.index') }}">{{ __('admin/home/sidebar.general_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.files.index') }}">{{ __('admin/home/sidebar.files_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.links.index') }}">{{ __('admin/home/sidebar.links_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.about_us.index') }}">{{ __('admin/home/sidebar.about_us_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.contact.index') }}">{{ __('admin/home/sidebar.contact_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.terms.index') }}">{{ __('admin/home/sidebar.terms_settings') }}</a>
                    </li>
                    <li><a class="slide-item"
                            href="{{ route('admin.settings.return_exchange.index') }}">{{ __('admin/home/sidebar.return_exchange_settings') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
