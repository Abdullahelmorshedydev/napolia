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
                        <h2>{{ __('site/auth/profile.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/auth/profile.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/auth/profile.header') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->

    <form action="{{ route('profile.update') }}" method="POST" class="theme-form">
        @csrf
        @method('PUT')
        <!-- personal deatail section start -->
        <section class="contact-page register-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="title pt-0">{{ __('site/auth/profile.personal') }}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">{{ __('site/auth/profile.name') }}</label>
                                <input type="text" value="{{ old('name', auth('web')->user()->name) }}"
                                    class="form-control" name="name"
                                    placeholder="{{ __('site/auth/profile.name_place') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{ __('site/auth/profile.email') }}</label>
                                <input type="email" value="{{ old('email', auth('web')->user()->email) }}"
                                    class="form-control" name="email"
                                    placeholder="{{ __('site/auth/profile.email_place') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone">{{ __('site/auth/profile.phone') }}</label>
                                <input type="text"
                                    value="{{ old('phone', auth('web')->user()->profile ? auth('web')->user()->profile->phone : '') }}"
                                    class="form-control" name="phone"
                                    placeholder="{{ __('site/auth/profile.phone_place') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section ends -->

        <!-- address section start -->
        <section class="contact-page register-page section-b-space">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="title pt-0">{{ __('site/auth/profile.shipping_details') }}</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">{{ __('site/auth/profile.address') }}</label>
                                <input type="text"
                                    value="{{ old('address', auth('web')->user()->profile ? auth('web')->user()->profile->address : '') }}"
                                    class="form-control" name="address"
                                    placeholder="{{ __('site/auth/profile.address_place') }}">
                            </div>
                            <div class="col-md-6 select_input">
                                <label for="country_id">{{ __('site/auth/profile.country') }}</label>
                                <select name="country_id" class="form-control" size="1">
                                    <option>{{ __('site/auth/profile.choose_country') }}</option>
                                    @foreach ($countries as $country)
                                        <option
                                            {{ old('country_id', auth('web')->user()->profile->country_id) == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="city_id">{{ __('site/auth/profile.city') }}</label>
                                <select name="city_id" class="form-control" size="1">
                                    <option disabled>{{ __('site/auth/profile.choose_city') }}</option>
                                    @foreach ($cities as $city)
                                        <option
                                            {{ old('city_id', auth('web')->user()->profile->city_id) == $city->id ? 'selected' : '' }}
                                            value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="state_id">{{ __('site/auth/profile.state') }}</label>
                                <select name="state_id" class="form-control" size="1">
                                    <option disabled>{{ __('site/auth/profile.choose_state') }}</option>
                                    @foreach ($states as $state)
                                        <option
                                            {{ old('state_id', auth('web')->user()->profile->state_id) == $state->id ? 'selected' : '' }}
                                            value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-sm btn-solid"
                                    type="submit">{{ __('site/auth/profile.button') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section ends -->
    </form>

    <!-- address section start -->
    <section class="contact-page register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="title pt-0">{{ __('site/auth/profile.update_password') }}</h3>
                    <form action="{{ route('profile.password_update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="old_password">{{ __('site/auth/profile.old_password') }}</label>
                                <input type="password" class="form-control" name="old_password"
                                    placeholder="{{ __('site/auth/profile.old_password_place') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="new_password">{{ __('site/auth/profile.new_password') }}</label>
                                <input type="password" class="form-control" name="new_password"
                                    placeholder="{{ __('site/auth/profile.new_password_place') }}">
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="new_password_confirmation">{{ __('site/auth/profile.new_password_confirmation') }}</label>
                                <input type="password" class="form-control" name="new_password_confirmation"
                                    placeholder="{{ __('site/auth/profile.new_password_confirmation_place') }}">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-sm btn-solid"
                                    type="submit">{{ __('site/auth/profile.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var country_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (country_id) {
                    $.ajax({
                        url: "{{ route('profile.profile_cities') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = '<option value=""></option>';
                            $.each(response.data, function(index, value) {
                                html +=
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name[lang] +
                                    '</option>';
                            });
                            $('select[name="city_id"]').empty('').append(html);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a City');
                }
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="city_id"]').on('change', function() {
                var city_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (city_id) {
                    $.ajax({
                        url: "{{ route('profile.profile_states') }}/" + city_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = '<option value=""></option>';
                            $.each(response.data, function(index, value) {
                                html +=
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name[lang] +
                                    '</option>';
                            });
                            $('select[name="state_id"]').empty('').append(html);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a State');
                }
            });
        });
    </script>
@endpush
