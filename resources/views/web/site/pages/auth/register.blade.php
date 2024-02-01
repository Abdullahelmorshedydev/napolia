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
                        <h2>{{ __('site/auth/register.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/auth/register.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/auth/register.title') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title pt-0">{{ __('site/auth/register.my_acc') }}</h3>
                    <div class="theme-card">
                        <form action="{{ route('auth.register.store') }}" method="POST" class="theme-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{ __('site/auth/register.name') }}</label>
                                    <input type="text" class="form-control mt-1" name="name" placeholder="{{ __('site/auth/register.name_place') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email">{{ __('site/auth/register.email') }}</label>
                                    <input type="email" class="form-control mt-1" name="email" placeholder="{{ __('site/auth/register.email_place') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">{{ __('site/auth/register.password') }}</label>
                                    <input type="password" class="form-control mt-1" name="password" placeholder="{{ __('site/auth/register.password_place') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation">{{ __('site/auth/register.confirmation_password') }}</label>
                                    <input type="password" class="form-control mt-1" name="password_confirmation" placeholder="{{ __('site/auth/register.confirmation_password_place') }}">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-solid w-auto">{{ __('site/auth/register.button') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@push('script')
@endpush
