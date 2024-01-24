@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/country/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/country/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/country/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/country/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.countries.update', $country->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameEn1">{{ __('admin/country/create.name_en_label') }}</label>
                                            <input type="text" value="{{ old('name_en', $country->getTranslation('name', 'en')) }}" name="name_en"
                                                class="form-control" id="exampleInputNameEn1"
                                                placeholder="{{ __('admin/country/create.name_en_place') }}">
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameAr1">{{ __('admin/country/create.name_ar_label') }}</label>
                                            <input type="text" value="{{ old('name_ar', $country->getTranslation('name', 'ar')) }}" name="name_ar"
                                                class="form-control" id="exampleInputNameAr1"
                                                placeholder="{{ __('admin/country/create.name_ar_place') }}">
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputStatus1">{{ __('admin/country/edit.status_label') }}</label>
                                    <select name="status" id="exampleInputStatus1" class="form-control">
                                        <option disabled selected>{{ __('admin/country/edit.status_place') }}</option>
                                        @foreach ($status as $stat)
                                            <option
                                                {{ old('status', $country->status->value) == $stat->value ? 'selected' : '' }}
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
                                {{ __('admin/country/edit.submit') }}
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
