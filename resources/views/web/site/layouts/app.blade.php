<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('web.site.layouts.head')

<body {{ app()->currentLocale() == 'ar' ? 'class="rtl"' : 'class="ltr"' }}>

    @include('web.site.layouts.preload')

    @include('web.site.layouts.header')

    @yield('breadcumb')
    @yield('content')

    @include('web.site.layouts.footer.main_footer')

</body>

</html>
