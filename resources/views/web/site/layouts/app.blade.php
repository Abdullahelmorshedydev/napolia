<!DOCTYPE html>
<html lang="en">

@include('web.site.layouts.head')

<body>

    @yield('preload')

    @include('web.site.layouts.header')

    @yield('breadcumb')
    @yield('content')

    @include('web.site.layouts.footer.main_footer')

</body>

</html>
