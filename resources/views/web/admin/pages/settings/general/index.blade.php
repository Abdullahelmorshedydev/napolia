@extends('web.admin.layouts.app')

@push('style')
    <script src="{{ asset('admin/assets/ckeditor/build/ckeditor.js') }}"></script>
@endpush

@section('title', __('admin/settings/general/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/settings/general/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/settings/general/index.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    {{ __('admin/settings/general/index.label') }}
                </div>
                <br>
                <form action="{{ route('admin.settings.general.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="site_name_en">
                                        {{ __('admin/settings/general/index.site_name_en_label') }}
                                    </label>
                                    <input type="text" value="{{ old('site_name_en', settings()->get('site_name_en')) }}"
                                        name="site_name_en" class="form-control" id="site_name_en">
                                        @error('site_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="site_name_ar">
                                        {{ __('admin/settings/general/index.site_name_ar_label') }}
                                    </label>
                                    <input type="text" value="{{ old('site_name_ar', settings()->get('site_name_ar')) }}"
                                        name="site_name_ar" class="form-control" id="site_name_ar">
                                        @error('site_name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_slogan_en">
                                        {{ __('admin/settings/general/index.footer_slogan_en_label') }}
                                    </label>
                                    <input type="text"
                                        value="{{ old('footer_slogan_en', settings()->get('footer_slogan_en')) }}"
                                        name="footer_slogan_en" class="form-control" id="footer_slogan_en">
                                        @error('footer_slogan_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="footer_slogan_ar">
                                        {{ __('admin/settings/general/index.footer_slogan_ar_label') }}
                                    </label>
                                    <input type="text"
                                        value="{{ old('footer_slogan_ar', settings()->get('footer_slogan_ar')) }}"
                                        name="footer_slogan_ar" class="form-control" id="footer_slogan_ar">
                                        @error('footer_slogan_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="need_help">
                                        {{ __('admin/settings/general/index.need_help_label') }}
                                    </label>
                                    <input type="email" value="{{ old('need_help', settings()->get('need_help')) }}"
                                        name="need_help" class="form-control" id="need_help">
                                        @error('need_help')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">
                                        {{ __('admin/settings/general/index.phone_label') }}
                                    </label>
                                    <input type="text" value="{{ old('phone', settings()->get('phone')) }}"
                                        name="phone" class="form-control" id="phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">
                                        {{ __('admin/settings/general/index.address_label') }}
                                    </label>
                                    <input type="text" value="{{ old('address', settings()->get('address')) }}"
                                        name="address" class="form-control" id="address">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tax">
                                        {{ __('admin/settings/general/index.tax_label') }}
                                    </label>
                                    <input type="text" value="{{ old('tax', settings()->get('tax')) }}"
                                        name="tax" class="form-control" id="tax">
                                        @error('tax')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-0">
                        {{ __('admin/settings/general/index.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
