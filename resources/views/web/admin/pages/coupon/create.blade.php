@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/coupon/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/coupon/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/coupon/create.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card-header">
                        <h4 class="card-title mb-1">{{ __('admin/coupon/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.coupons.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="code1">{{ __('admin/coupon/create.code_label') }}</label>
                                            <input type="text" value="{{ old('code') }}" name="code"
                                                class="form-control" id="code"
                                                placeholder="{{ __('admin/coupon/create.code_place') }}">
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="min_order_value1">{{ __('admin/coupon/create.min_order_value_label') }}</label>
                                            <input type="text" value="{{ old('min_order_value') }}" name="min_order_value"
                                                class="form-control" id="min_order_value1"
                                                placeholder="{{ __('admin/coupon/create.min_order_value_place') }}">
                                            @error('min_order_value')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="value">{{ __('admin/coupon/create.value_label') }}</label>
                                            <input type="text" value="{{ old('value') }}" name="value"
                                                class="form-control" id="value"
                                                placeholder="{{ __('admin/coupon/create.value_place') }}">
                                            @error('value')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="type">{{ __('admin/coupon/create.type_label') }}</label>
                                            <select name="type" id="type" class="form-control">
                                                <option disabled selected>{{ __('admin/coupon/create.type_place') }}
                                                </option>
                                                @foreach ($types as $type)
                                                    <option {{ old('type') == $type->value ? 'selected' : '' }}
                                                        value="{{ $type->value }}">
                                                        {{ $type->lang() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type')
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
                                                for="max_usage">{{ __('admin/coupon/create.max_usage_label') }}</label>
                                            <input type="number" value="{{ old('max_usage') }}" name="max_usage"
                                                class="form-control" id="max_usage"
                                                placeholder="{{ __('admin/coupon/create.max_usage_place') }}">
                                            @error('max_usage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="expire_date">{{ __('admin/coupon/create.expire_date_label') }}</label>
                                            <input type="date" value="{{ old('expire_date') }}" name="expire_date"
                                                class="form-control" id="expire_date"
                                                placeholder="{{ __('admin/coupon/create.expire_date_place') }}">
                                            @error('expire_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/coupon/create.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
