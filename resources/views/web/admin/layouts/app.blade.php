<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

@include('web.admin.layouts.head')

<body class="main-body app sidebar-mini">

    <!-- Page -->
    <div class="page">

        @include('web.admin.layouts.sidebar')

        @include('web.admin.layouts.content')

        @include('web.admin.layouts.footer')

    </div>
    <!-- End Page -->

    @include('web.admin.layouts.script')

</body>

</html>
