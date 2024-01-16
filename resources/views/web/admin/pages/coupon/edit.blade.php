@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/coupon/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/coupon/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/coupon/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/coupon/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="code1">{{ __('admin/coupon/edit.code_label') }}</label>
                                            <input type="text" value="{{ old('code', $coupon->code) }}" name="code"
                                                class="form-control" id="code"
                                                placeholder="{{ __('admin/coupon/edit.code_place') }}">
                                            @error('code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="min_order_value1">{{ __('admin/coupon/edit.min_order_value_label') }}</label>
                                            <input type="text"
                                                value="{{ old('min_order_value', $coupon->min_order_value) }}"
                                                name="min_order_value" class="form-control" id="min_order_value1"
                                                placeholder="{{ __('admin/coupon/edit.min_order_value_place') }}">
                                            @error('min_order_value')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="value">{{ __('admin/coupon/edit.value_label') }}</label>
                                            <input type="text" value="{{ old('value', $coupon->value) }}" name="value"
                                                class="form-control" id="value"
                                                placeholder="{{ __('admin/coupon/edit.value_place') }}">
                                            @error('value')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">{{ __('admin/coupon/edit.type_label') }}</label>
                                            <select name="type" id="type" class="form-control">
                                                <option disabled selected>{{ __('admin/coupon/edit.type_place') }}
                                                </option>
                                                @foreach ($types as $type)
                                                    <option
                                                        {{ old('type', $coupon->type->value) == $type->value ? 'selected' : '' }}
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
                                            <label for="max_usage">{{ __('admin/coupon/edit.max_usage_label') }}</label>
                                            <input type="number" value="{{ old('max_usage', $coupon->max_usage) }}"
                                                name="max_usage" class="form-control" id="max_usage"
                                                placeholder="{{ __('admin/coupon/edit.max_usage_place') }}">
                                            @error('max_usage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="expire_date">{{ __('admin/coupon/edit.expire_date_label') }}</label>
                                            <input type="date" value="{{ old('expire_date', $coupon->expire_date) }}"
                                                name="expire_date" class="form-control" id="expire_date"
                                                placeholder="{{ __('admin/coupon/edit.expire_date_place') }}">
                                            @error('expire_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputStatus1">{{ __('admin/coupon/edit.status_label') }}</label>
                                            <select name="status" id="exampleInputStatus1" class="form-control">
                                                <option disabled selected>{{ __('admin/coupon/edit.status_place') }}
                                                </option>
                                                @foreach ($status as $stat)
                                                    <option
                                                        {{ old('status', $coupon->status->value) == $stat->value ? 'selected' : '' }}
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
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/coupon/edit.submit') }}
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
