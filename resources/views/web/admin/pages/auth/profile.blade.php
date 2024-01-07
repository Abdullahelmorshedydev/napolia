@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', auth('admin')->user()->name . ' ' . __('admin/auth/profile.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/auth/profile.title') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt=""
                                    src="{{ isset(auth('admin')->user()->image->image) ? asset(auth('admin')->user()->image->image) : asset('admin/assets/img/faces/6.jpg') }}">
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{ auth('admin')->user()->name }}</h5>
                                    <p class="main-profile-name-text">
                                        {{ isset(auth('admin')->user()->profile->job_title) ? auth('admin')->user()->profile->job_title : '' }}
                                    </p>
                                </div>
                            </div>
                            <h6>{{ __('admin/auth/profile.bio') }}</h6>
                            <div class="main-profile-bio">
                                {{ isset(auth('admin')->user()->profile->bio) ? auth('admin')->user()->profile->bio : '' }}
                            </div>
                            <!-- main-profile-bio -->
                        </div>
                        <!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="active">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                            class="las la-cog tx-16 mr-1"></i></span> <span
                                        class="hidden-xs">{{ __('admin/auth/profile.settings') }}</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="settings">
                            @if (isset(auth('admin')->user()->profile))
                                <form action="{{ route('admin.profile.general_update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="FullName">{{ __('admin/auth/profile.name') }}</label>
                                        <input type="text" name="name"
                                            value="{{ old('name', auth('admin')->user()->name) }}" id="FullName"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">{{ __('admin/auth/profile.email') }}</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth('admin')->user()->email) }}" id="Email"
                                            class="form-control">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">{{ __('admin/auth/profile.image') }}</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input" name="image" id="customFile" type="file">
                                            <label class="custom-file-label" for="customFile">
                                                {{ __('admin/auth/profile.choose_file') }}
                                            </label>
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="job_title">{{ __('admin/auth/profile.job_title') }}</label>
                                        <input type="job_title" name="job_title"
                                            value="{{ old('job_title', auth('admin')->user()->profile->job_title) }}"
                                            id="job_title" class="form-control">
                                        @error('job_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">{{ __('admin/auth/profile.bio') }}</label>
                                        <textarea name="bio" id="bio" class="form-control">{{ old('bio', auth('admin')->user()->profile->bio) }}</textarea>
                                        @error('bio')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">{{ __('admin/auth/profile.submit') }}</button>
                                </form>
                            @else
                                <form action="{{ route('admin.profile.general_store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="FullName">{{ __('admin/auth/profile.name') }}</label>
                                        <input type="text" name="name"
                                            value="{{ old('name', auth('admin')->user()->name) }}" id="FullName"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">{{ __('admin/auth/profile.email') }}</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth('admin')->user()->email) }}" id="Email"
                                            class="form-control">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">{{ __('admin/auth/profile.image') }}</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input" name="image" id="customFile"
                                                type="file">
                                            <label class="custom-file-label" for="customFile">
                                                {{ __('admin/auth/profile.choose_file') }}
                                            </label>
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="job_title_en">{{ __('admin/auth/profile.job_title_en') }}</label>
                                                <input type="job_title_en" name="job_title_en"
                                                    value="{{ old('job_title_en') }}"
                                                    id="job_title_en" class="form-control">
                                                @error('job_title_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label
                                                    for="job_title_ar">{{ __('admin/auth/profile.job_title_ar') }}</label>
                                                <input type="job_title_ar" name="job_title_ar"
                                                    value="{{ old('job_title_ar') }}"
                                                    id="job_title_ar" class="form-control">
                                                @error('job_title_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bio_en">{{ __('admin/auth/profile.bio_en') }}</label>
                                        <textarea name="bio_en" id="bio_en" class="form-control">{{ old('bio_en') }}</textarea>
                                        @error('bio_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bio_ar">{{ __('admin/auth/profile.bio_ar') }}</label>
                                        <textarea name="bio_ar" id="bio_ar" class="form-control">{{ old('bio_ar') }}</textarea>
                                        @error('bio_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                        type="submit">{{ __('admin/auth/profile.submit') }}</button>
                                </form>
                            @endif
                            <hr>
                            <form action="{{ route('admin.profile.password_update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="old_password">{{ __('admin/auth/profile.old_password') }}</label>
                                    <input type="password" name="old_password" id="old_password" class="form-control">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password">{{ __('admin/auth/profile.new_password') }}</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label
                                        for="new_password_confirmation">{{ __('admin/auth/profile.new_password_confirmation') }}</label>
                                    <input type="password" name="new_password_confirmation"
                                        id="new_password_confirmation" class="form-control">
                                    @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary waves-effect waves-light w-md"
                                    type="submit">{{ __('admin/auth/profile.submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@push('script')
@endpush
