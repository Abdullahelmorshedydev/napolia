<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> {{ __('admin/auth/register.title') }} </title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset(settings()->get('favicon')) }}" type="image/x-icon" />

    <!--- Icons css --->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    @if (app()->getLocale() == 'ar')
        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css-rtl/sidemenu.css') }}">

        <!--- Custom Scroll bar --->
        <link href="{{ asset('admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

        <!--- Style css --->
        <link href="{{ asset('admin/assets/css-rtl/style.css') }}" rel="stylesheet">

        <!--- Skinmodes css --->
        <link href="{{ asset('admin/assets/css-rtl/skin-modes.css') }}" rel="stylesheet">

        <!--- Darktheme css --->
        <link href="{{ asset('admin/assets/css-rtl/style-dark.css') }}" rel="stylesheet">

        <!-- Sidemenu-respoansive-tabs css -->
        <link href="{{ asset('admin/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
            rel="stylesheet">

        <!--- Animations css --->
        <link href="{{ asset('admin/assets/css/animate.css') }}" rel="stylesheet">
    @else
        <!--- Right-sidemenu css --->
        <link href="{{ asset('admin/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

        <!--- Custom Scroll bar --->
        <link href="{{ asset('admin/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

        <!--- Style css --->
        <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

        <!--- Skinmodes css --->
        <link href="{{ asset('admin/assets/css/skin-modes.css') }}" rel="stylesheet">

        <!--- Darktheme css --->
        <link href="{{ asset('admin/assets/css/style-dark.css') }}" rel="stylesheet">

        <!--- Animations css --->
        <link href="{{ asset('admin/assets/css/animate.css') }}" rel="stylesheet">
    @endif

</head>

<body class="main-body">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('admin/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('admin/assets/img/media/login.png') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex"> <a href="index.html">
                                                <img src="{{ asset(settings()->get('favicon')) }}"
                                                    class="sign-favicon ht-40" alt="logo"></a>
                                            <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">{{ settings()->get('site_name_' . app()->currentLocale()) }}</h1>
                                        </div>
                                        <div class="main-signup-header">
                                            <h2 class="text-primary">{{ __('admin/auth/register.get_started') }}</h2>
                                            <h5 class="font-weight-normal mb-4">
                                                {{ __('admin/auth/register.waiting') }}
                                            </h5>
                                            <form action="{{ route('admin.auth.register.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ __('admin/auth/register.name') }}</label>
                                                    <input class="form-control" name="name"
                                                        placeholder="{{ __('admin/auth/register.name_place') }}"
                                                        type="text">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('admin/auth/register.email') }}</label>
                                                    <input class="form-control" name="email"
                                                        placeholder="{{ __('admin/auth/register.email_place') }}"
                                                        type="text">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('admin/auth/register.password') }}</label>
                                                    <input class="form-control" name="password"
                                                        placeholder="{{ __('admin/auth/register.password_place') }}"
                                                        type="password">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('admin/auth/register.password_confirm') }}</label>
                                                    <input class="form-control" name="password_confirmation"
                                                        placeholder="{{ __('admin/auth/register.password_confirmation_place') }}"
                                                        type="password">
                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                </div>
                                                <button class="btn btn-main-primary btn-block">
                                                    {{ __('admin/auth/register.create_acc') }}
                                                </button>
                                                <div class="row row-xs">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-block">
                                                            <i class="fab fa-facebook-f"></i>
                                                            Signup with Facebook
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <button class="btn btn-info btn-block">
                                                            <i class="fab fa-twitter"></i>
                                                            Signup with Twitter
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signup-footer mt-5">
                                                <p>
                                                    {{ __('admin/auth/register.have_acc') }}
                                                    <a href="{{ route('admin.auth.login.show') }}">
                                                        {{ __('admin/auth/register.sign_in') }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    </div>
    <!-- End Page -->

    <!--- JQuery min js --->
    <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('admin/assets/plugins/ionicons/ionicons.js') }}"></script>

    <!--- JQuery sparkline js --->
    <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>


    <!--- Moment js --->
    <script src="{{ asset('admin/assets/plugins/moment/moment.js') }}"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('admin/assets/js/eva-icons.min.js') }}"></script>

    <!--- Rating js --->
    <script src="{{ asset('admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!--- Custom js --->
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

</body>

</html>
