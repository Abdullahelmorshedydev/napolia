<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('web.site.layouts.head')

<body {{ app()->currentLocale() == 'ar' ? 'class="rtl"' : 'class="ltr"' }}>

    @yield('preload')

    @include('web.site.layouts.header')

    @yield('breadcumb')
    @yield('content')

    @include('web.site.layouts.footer.main_footer')

</body>

</html>
