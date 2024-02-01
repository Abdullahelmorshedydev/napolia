@extends('web.site.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- breadcrumb start -->
    <section class="breadcrumb-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title">
                        <h2>{{ __('site/auth/login.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/auth/login.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/auth/login.title') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="title">{{ __('site/auth/login.title') }}</h3>
                    <div class="theme-card">
                        <form action="{{ route('auth.login.store') }}" method="POST" class="theme-form">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('site/auth/login.email') }}</label>
                                <input type="email" class="form-control" name="email" placeholder="{{ __('site/auth/login.email_place') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('site/auth/login.password') }}</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="{{ __('site/auth/login.password_place') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-solid">{{ __('site/auth/login.button') }}</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3 class="title">{{ __('site/auth/login.new_customer') }}</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">{{ __('site/auth/login.create_acc') }}</h6>
                        <p>{{ __('site/auth/login.sign_up') }}</p>
                        <a href="{{ route('auth.register.show') }}" class="btn btn-solid">{{ __('site/auth/login.create_acc') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@push('script')
@endpush
