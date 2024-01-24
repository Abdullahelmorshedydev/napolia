@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/state/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/state/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/state/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/state/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.states.update', $state->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameEn1">{{ __('admin/state/edit.name_en_label') }}</label>
                                            <input type="text" value="{{ old('name_en', $state->getTranslation('name', 'en')) }}" name="name_en"
                                                class="form-control" id="exampleInputNameEn1"
                                                placeholder="{{ __('admin/state/edit.name_en_place') }}">
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameAr1">{{ __('admin/state/edit.name_ar_label') }}</label>
                                            <input type="text" value="{{ old('name_ar', $state->getTranslation('name', 'ar')) }}" name="name_ar"
                                                class="form-control" id="exampleInputNameAr1"
                                                placeholder="{{ __('admin/state/edit.name_ar_place') }}">
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputcountryId1">{{ __('admin/state/edit.country_id_label') }}</label>
                                            <select name="country_id" id="exampleInputcountryId1" class="form-control">
                                                <option disabled selected>{{ __('admin/state/edit.country_id_place') }}
                                                </option>
                                                @foreach ($countries as $country)
                                                    <option {{ old('country_id', $state->country_id) == $country->id ? 'selected' : '' }}
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
                                            <label
                                                for="exampleInputcityId1">{{ __('admin/state/edit.city_id_label') }}</label>
                                            <select name="city_id" id="exampleInputcityId1" class="form-control">
                                                <option disabled selected>{{ __('admin/state/edit.city_id_place') }}
                                                </option>
                                                @foreach ($cities as $city)
                                                    <option {{ old('city_id', $state->city_id) == $city->id ? 'selected' : '' }}
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
                                <div class="form-group">
                                    <label for="exampleInputStatus1">{{ __('admin/state/edit.status_label') }}</label>
                                    <select name="status" id="exampleInputStatus1" class="form-control">
                                        <option disabled selected>{{ __('admin/state/edit.status_place') }}</option>
                                        @foreach ($status as $stat)
                                            <option
                                                {{ old('status', $state->status->value) == $stat->value ? 'selected' : '' }}
                                                value="{{ $stat->value }}">
                                                {{ $stat->lang() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/state/edit.submit') }}
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
                        url: "{{ route('admin.country_cities') }}/" + country_id,
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
@endpush
