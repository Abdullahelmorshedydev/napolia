<!DOCTYPE html>
<html lang="en">

@include('web.admin.layouts.head')

<body class="main-body app sidebar-mini">

    <!-- Page -->
    <div class="page">

        @include('web.admin.layouts.sidebar')

        @include('web.admin.layouts.content')

        @include('web.admin.layouts.rightSidebar')

        @include('web.admin.layouts.modal')

        @include('web.admin.layouts.footer')

    </div>
    <!-- End Page -->

    @include('web.admin.layouts.script')

</body>

</html>
