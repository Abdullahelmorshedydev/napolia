@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/settings/files/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/settings/files/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/settings/files/index.active') }}</span>
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
                    {{ __('admin/settings/files/index.label') }}
                </div>
                <br>
                <form action="{{ route('admin.settings.files.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="customFile">{{ __('admin/settings/files/index.site_logo_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="site_logo" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/settings/files/index.choose_file') }}
                                        </label>
                                    </div>
                                    @if(settings()->get('site_logo'))
                                        <div class="mt-2" style="width: 200px">
                                            <img src="{{ asset('storage/' . settings()->get('site_logo')) }}" alt="">
                                        </div>
                                    @endif
                                    @error('site_logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="customFile">{{ __('admin/settings/files/index.home_banner_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="home_banner" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/settings/files/index.choose_file') }}
                                        </label>
                                    </div>
                                    @if(settings()->get('home_banner'))
                                        <div class="mt-2" style="width: 200px">
                                            <img src="{{ asset('storage/' . settings()->get('home_banner')) }}" alt="">
                                        </div>
                                    @endif
                                    @error('home_banner')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="customFile">{{ __('admin/settings/files/index.favicon_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="favicon" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/settings/files/index.choose_file') }}
                                        </label>
                                    </div>
                                    @if(settings()->get('favicon'))
                                        <div class="mt-2" style="width: 50px">
                                            <img src="{{ asset('storage/' . settings()->get('favicon')) }}" alt="">
                                        </div>
                                    @endif
                                    @error('favicon')
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
