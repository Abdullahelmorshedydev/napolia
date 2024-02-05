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
                        <h2>{{ __('site/home/nav.terms') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/home/nav.terms') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->


    <!-- about section start -->
    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h4>{{ __('site/home/nav.terms') }}.</h4>
                    <p>{!! settings()->get('terms_conditions_' . app()->currentLocale()) !!}.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->
@endsection

@push('script')
@endpush
