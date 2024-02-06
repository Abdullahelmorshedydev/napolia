<!-- header section start -->
<header class="header-4 header-basic">
    <div class="mobile-fix-header">
    </div>
    <div class="notification-bar">
        <div class="marquee">{{ settings()->get('header_slogan_' . app()->currentLocale()) }}</div>
    </div>
    @include('web.site.layouts.header.navbar')
</header>
<!-- header section end -->
