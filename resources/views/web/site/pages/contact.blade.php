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
                        <h2>{{ __('site/home/nav.contact') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/home/nav.contact') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="contact-page section-b-space pb-0">
        <div class="container">
            <div class="row section-b-space">
                <div class="col-lg-7 map">
                    <form action="{{ route('contactus.store') }}" method="POST" class="theme-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">{{ __('site/auth/profile.name') }}</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('site/auth/profile.name_place') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="review">{{ __('site/auth/profile.phone') }}</label>
                                <input type="text" name="phone" class="form-control" placeholder="{{ __('site/auth/profile.phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email">{{ __('site/auth/login.email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="{{ __('site/auth/login.email_place') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subject">{{ __('site/home/nav.subject') }}</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="{{ __('site/home/nav.subject_place') }}">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="review">{{ __('site/home/nav.message') }}</label>
                                <textarea class="form-control" name="message" placeholder="{{ __('site/home/nav.message_place') }}" id="exampleFormControlTextarea1" rows="6"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-solid" type="submit">{{ __('site/home/nav.msg_button') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="contact-right">
                        <ul>
                            <li>
                                <div class="contact-icon"><i class="fa fa-phone" aria-hidden="true"></i>
                                    <h6>{{ __('site/home/nav.contactus') }}</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ settings()->get('contact_phone_1') }}</p>
                                    <p>{{ settings()->get('contact_phone_2') }}</p>
                                </div>
                            </li><br>
                            @if(settings()->get('contact_address_1_en'))
                                <li>
                                    <div class="contact-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h6>{{ __('site/order.address') }}</h6>
                                    </div>
                                    <div class="media-body">
                                        <p>{{ settings()->get('contact_address_1_' . app()->currentLocale()) }}</p>
                                        @if(settings()->get('contact_address_2_en'))
                                            <p>{{ settings()->get('contact_address_2_' . app()->currentLocale()) }}</p>
                                        @endif
                                    </div>
                                </li><br>
                            @endif
                            <li>
                                <div class="contact-icon"><i class="fa fa-fax" aria-hidden="true"></i>
                                    <h6>{{ __('site/auth/login.email') }}</h6>
                                </div>
                                <div class="media-body">
                                    <p>{{ settings()->get('contact_email_1') }}</p>
                                    @if(settings()->get('contact_email_2'))
                                        <p>{{ settings()->get('contact_email_2') }}</p>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@push('script')
@endpush
