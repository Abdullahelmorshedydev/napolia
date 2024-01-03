@extends('web.admin.layouts.app')

@push('style')
    <script src="{{ asset('admin/assets/ckeditor/build/ckeditor.js') }}"></script>
@endpush

@section('title', __('admin/settings/about_us/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/settings/about_us/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/settings/about_us/index.active') }}</span>
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
                    {{ __('admin/settings/contact/index.label') }}
                </div>
                <br>
                <form action="{{ route('admin.settings.about_us.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_phone_1">
                                                        {{ __('admin/settings/contact/index.contact_phone_1_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_phone_1', settings()->get('contact_phone_1')) }}"
                                                        name="contact_phone_1" class="form-control" id="contact_phone_1">
                                                    @error('contact_phone_1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_phone_2">
                                                        {{ __('admin/settings/contact/index.contact_phone_2_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_phone_2', settings()->get('contact_phone_2')) }}"
                                                        name="contact_phone_2" class="form-control" id="contact_phone_2">
                                                    @error('contact_phone_2')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_address_1_en">
                                                        {{ __('admin/settings/contact/index.contact_address_1_en_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_address_1_en', settings()->get('contact_address_1_en')) }}"
                                                        name="contact_address_1_en" class="form-control"
                                                        id="contact_address_1_en">
                                                    @error('contact_address_1_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_address_1_ar">
                                                        {{ __('admin/settings/contact/index.contact_address_1_ar_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_address_1_ar', settings()->get('contact_address_1_ar')) }}"
                                                        name="contact_address_1_ar" class="form-control"
                                                        id="contact_address_1_ar">
                                                    @error('contact_address_1_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_email_1">
                                                        {{ __('admin/settings/contact/index.contact_email_1_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_email_1', settings()->get('contact_email_1')) }}"
                                                        name="contact_email_1" class="form-control" id="contact_email_1">
                                                    @error('contact_email_1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_email_2">
                                                        {{ __('admin/settings/contact/index.contact_email_2_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_email_2', settings()->get('contact_email_2')) }}"
                                                        name="contact_email_2" class="form-control" id="contact_email_2">
                                                    @error('contact_email_2')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_address_2_en">
                                                        {{ __('admin/settings/contact/index.contact_address_2_en_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_address_2_en', settings()->get('contact_address_2_en')) }}"
                                                        name="contact_address_2_en" class="form-control"
                                                        id="contact_address_2_en">
                                                    @error('contact_address_2_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact_address_2_ar">
                                                        {{ __('admin/settings/contact/index.contact_address_2_ar_label') }}
                                                    </label>
                                                    <input type="text"
                                                        value="{{ old('contact_address_2_ar', settings()->get('contact_address_2_ar')) }}"
                                                        name="contact_address_2_ar" class="form-control"
                                                        id="contact_address_2_ar">
                                                    @error('contact_address_2_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-0">
                        {{ __('admin/settings/about_us/index.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
