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
                        <h2>{{ __('site/order.header') }}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('site/order.header') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>{{ __('site/order.billing_details') }}</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.name') }}</div>
                                        <input type="text" name="name"
                                            value="{{ old('name', auth('web')->user()->name) }}"
                                            placeholder="{{ __('site/auth/profile.name_place') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.phone') }}</div>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', auth('web')->user()->profile ? auth('web')->user()->profile->phone : '') }}"
                                            placeholder="{{ __('site/auth/profile.phone_place') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.email') }}</div>
                                        <input type="text" name="email"
                                            value="{{ old('email', auth('web')->user()->email) }}"
                                            placeholder="{{ __('site/auth/profile.email_place') }}">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.country') }}</div>
                                        <select name="country_id">
                                            <option value="">{{ __('site/auth/profile.choose_country') }}</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/order.city') }}</div>
                                        <select name="city_id">
                                            <option value="">{{ __('site/auth/profile.choose_city') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">{{ __('site/order.state') }}</div>
                                        <select name="state_id">
                                            <option value="">{{ __('site/auth/profile.choose_state') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.address') }}</div>
                                        <input type="text" name="address"
                                            value="{{ old('address', auth('web')->user()->profile ? auth('web')->user()->profile->address : '') }}"
                                            placeholder="{{ __('site/order.address') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>{{ __('site/order.product') }} <span>{{ __('site/order.total') }}</span>
                                            </div>
                                        </div>
                                        <ul class="qty">
                                            @foreach ($cartItems as $cartItem)
                                                <li>{{ $cartItem->product->name . ' x ' . $cartItems[$loop->index]->quantity }} 
                                                    <span>{{ $cartItems[$loop->index]->quantity * $cartItem->product->price_type->calc($cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount), settings()->get('dollar_price')) }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="sub-total">
                                            <li>{{ __('site/order.sub_total') }} 
                                                <span class="count">{{ $totalPrice }}</span>
                                            </li>
                                            <li>
                                                {{ __('site/order.shipping') }}
                                                <div class="shipping">
                                                    <div class="shopping-option">
                                                        <label id="shipping_price"></label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>{{ __('site/order.total') }} 
                                                <span class="count">{{ $cart->total . ' ' . __('admin/product/show.pound') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_method" value="CASH" id="payment-2"
                                                                checked>
                                                            <label for="payment-2">{{ __('site/order.cash_on_delivery') }}</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="btn-solid btn">Place Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
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
                        url: "{{ route('order.order_cities') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = "";
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
                        url: "{{ route('order.order_states') }}/" + city_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = "";
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="state_id"]').on('change', function() {
                var state_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (state_id) {
                    $.ajax({
                        url: "{{ route('order.state_shipping') }}/" + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('label[id="shipping_price"]').empty('').append($data['shipping_price']);
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
