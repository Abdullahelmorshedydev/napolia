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
                    <form id="form" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ auth('web')->user()->id }}" name="user_id">
                        <input type="hidden" value="{{ $cart->id }}" name="cart_id">
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
                                        @error('phone')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.email') }}</div>
                                        <input type="text" name="email"
                                            value="{{ old('email', auth('web')->user()->email) }}"
                                            placeholder="{{ __('site/auth/profile.email_place') }}">
                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.country') }}</div>
                                        <select name="country_id">
                                            <option value="">{{ __('site/auth/profile.choose_country') }}</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/order.city') }}</div>
                                        <select name="city_id">
                                            <option value="">{{ __('site/auth/profile.choose_city') }}</option>
                                        </select>
                                        @error('city_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">{{ __('site/order.state') }}</div>
                                        <select name="state_id">
                                            <option value="">{{ __('site/auth/profile.choose_state') }}</option>
                                        </select>
                                        @error('state_id')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">{{ __('site/auth/profile.address') }}</div>
                                        <input type="text" name="address"
                                            value="{{ old('address', auth('web')->user()->profile ? auth('web')->user()->profile->address : '') }}"
                                            placeholder="{{ __('site/order.address') }}">
                                        @error('address')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
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
                                            @foreach ($cart->cartItems as $cartItem)
                                                <li>{{ $cartItem->product->name . ' x ' . $cart->cartItems[$loop->index]->quantity }}
                                                    <span>
                                                        {{ $cartItem->quantity * $cartItem->product->discount
                                                            ? $cartItem->product->price_type->calc(
                                                                $cartItem->product->discount_type->calc($cartItem->product->price, $cartItem->product->discount),
                                                                settings()->get('dollar_price'),
                                                            )
                                                            : $cartItem->product->price_type->calc($cartItem->product->price, settings()->get('dollar_price')) }}
                                                    </span>
                                                </li>
                                                <li>{{ $cartItem->productColor->name . '(' . $cartItem->productColor->code . ')' }}
                                                </li>
                                            @endforeach
                                        </ul>
                                        <ul class="sub-total">
                                            <li>{{ __('site/order.sub_total') }}
                                                <span class="count">{{ $cart->total }}</span>
                                            </li>
                                            <li>{{ __('site/order.tax') }}
                                                <span
                                                    class="count">{{ $cart->total * (settings()->get('tax') / 100) }}</span>
                                            </li>
                                            <li>
                                                {{ __('site/order.shipping') }}
                                                <div class="shipping">
                                                    <div class="shopping-option">
                                                        <label id="shipping_price"></label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="coupon_list">
                                                <div class="coupon">
                                                    <div class="shopping-option">
                                                        <div style="position: relative;">
                                                            <input type="text" id="myInput" name="coupon"
                                                                style="padding-right: 30px;"
                                                                placeholder="{{ __('site/order.coupon_place') }}">
                                                            <button type="button" id="myButton" class="btn btn-solid"
                                                                style="position: absolute; right: 0; top: 0; bottom: 0;">
                                                                {{ __('site/order.coupon_submit') }}
                                                            </button>
                                                        </div>
                                                        <span class="coupon_error text-danger"></span>
                                                        @error('coupon')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>{{ __('site/order.total') }}
                                                <span class="count" id="total">
                                                    {{ $cart->total + $cart->total * (settings()->get('tax') / 100) . ' ' . __('admin/product/show.pound') }}
                                                </span>
                                                <input type="hidden" name="InvoiceAmount" value="">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    @foreach ($payments as $payment)
                                                        <li>
                                                            <div class="radio-option">
                                                                <input type="radio" name="payment_method"
                                                                    value="{{ $payment->value }}"
                                                                    id="payment-{{ $loop->iteration }}">
                                                                <label
                                                                    for="payment-{{ $loop->iteration }}">{{ $payment->lang() }}</label>
                                                            </div>
                                                        </li>
                                                        @if ($payment->value == 4)
                                                            <li class="vodafone_image"></li>
                                                            @error('vodafone_image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit"
                                                class="btn-solid btn">{{ __('site/order.place_order') }}</button>
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
                        url: "{{ route('cities') }}/" + country_id,
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
                        url: "{{ route('states') }}/" + city_id,
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="state_id"]').on('change', function() {
                var state_id = $(this).val();

                if (state_id) {
                    $.ajax({
                        url: "{{ route('state_shipping') }}/" + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('label[id="shipping_price"]').empty('').append(response
                                .shipping_price);
                            var shippingInput = $('<input>', {
                                type: 'hidden',
                                name: 'shipping_price',
                                value: response.shipping_price
                            });
                            $('label[id="shipping_price"]').append(shippingInput);

                            $('span[id="total"]').empty('').append(response
                                .total_price);
                            var totalInput = $('<input>', {
                                type: 'hidden',
                                name: 'total',
                                value: response.total_price
                            });
                            $('span[id="total"]').append(totalInput);
                            $('input[name="InvoiceAmount"]').val(response.total_price);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a State');
                };
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myButton').on('click', function() {
                var couponCode = $('input[name="coupon"]').val();
                var invoiceAmount = $('input[name="InvoiceAmount"]').val();
                $.ajax({
                    url: "{{ route('order.getCoupon') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'code': couponCode,
                        'invoiceAmount': invoiceAmount
                    },
                    success: function(response) {
                        if (response.total > 0) {
                            $('span[id="total"]').empty('').append(response
                                .total);
                            var totalInput = $('<input>', {
                                type: 'hidden',
                                name: 'total',
                                value: response.total
                            });
                            $('span[id="total"]').append(totalInput);
                            $('input[name="InvoiceAmount"]').val(response.total);
                            $('.coupon').hide();

                            var listCoupon = '<label">' + couponCode + '</label>';
                            $('.coupon_list').append(listCoupon);
                        } else {
                            $('.coupon_error').empty('').append(
                                "{{ __('site/order.coupon_valid') }}");
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.coupon_error').empty('').append(
                            "{{ __('site/order.coupon_valid') }}");
                    }
                });
            });
        });
    </script>
    <script>
        $("input[id=payment-1]").on("click", function() {});
        $("input[id=payment-2]").on("click", function() {});
        $("input[id=payment-3]").on("click", function() {});
        $("input[id=payment-4]").on("click", function() {
            var imageFile = $('<input>', {
                type: 'file',
                name: 'vodafone_image',
                class: 'form-control'
            });
            $('.vodafone_image').empty('').append(imageFile);
        });
    </script>
@endpush
