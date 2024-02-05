@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/shipping/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/shipping/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/shipping/edit.active') }}</span>
            </div>
        </div>
        @include('web.admin.partials._rightSidebar')
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title mb-1">{{ __('admin/shipping/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.shippings.update', $shipping->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price1">{{ __('admin/shipping/edit.price_label') }}</label>
                                            <input type="text" value="{{ old('price', $shipping->price) }}"
                                                name="price" class="form-control" id="price1"
                                                placeholder="{{ __('admin/shipping/edit.price_place') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="price_type1">{{ __('admin/shipping/create.price_type_label') }}</label>
                                            <select name="price_type" id="price_type1" class="form-control">
                                                <option disabled selected>{{ __('admin/shipping/create.price_type_place') }}
                                                </option>
                                                @foreach ($priceTypes as $type)
                                                    <option
                                                        {{ old('price_type', $shipping->price_type->value) == $type->value ? 'selected' : '' }}
                                                        value="{{ $type->value }}">
                                                        {{ $type->lang() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('price_type')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="countryId1">{{ __('admin/shipping/edit.country_id_label') }}</label>
                                            <select name="country_id" id="countryId1" class="form-control">
                                                <option disabled selected>{{ __('admin/shipping/edit.country_id_place') }}
                                                </option>
                                                @foreach ($countries as $country)
                                                    <option
                                                        {{ old('country_id', $shipping->state->city->country_id) == $country->id ? 'selected' : '' }}
                                                        value="{{ $country->id }}">
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cityId1">{{ __('admin/shipping/edit.city_id_label') }}</label>
                                            <select name="city_id" id="cityId1" class="form-control">
                                                <option disabled selected>{{ __('admin/shipping/edit.city_id_place') }}
                                                </option>
                                                @foreach ($cities as $city)
                                                    <option
                                                        {{ old('city_id', $shipping->state->city_id) == $city->id ? 'selected' : '' }}
                                                        value="{{ $city->id }}">
                                                        {{ $city->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stateId1">{{ __('admin/shipping/edit.state_id_label') }}</label>
                                            <select name="state_id" id="stateId1" class="form-control">
                                                <option disabled selected>{{ __('admin/shipping/edit.state_id_place') }}
                                                </option>
                                                <option
                                                    {{ old('state_id', $shipping->state_id) == $shipping->state->id ? 'selected' : '' }}
                                                    value="{{ $shipping->state->id }}">
                                                    {{ $shipping->state->name }}
                                                </option>
                                            </select>
                                            @error('state_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/shipping/edit.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        url: "{{ route('admin.shipping_cities') }}/" + country_id,
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
                        url: "{{ route('admin.shipping_states') }}/" + city_id,
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
@endpush
