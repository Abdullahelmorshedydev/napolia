@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/admin/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/admin/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/admin/create.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/admin/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.admins.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name1">{{ __('admin/admin/create.name_label') }}</label>
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                class="form-control" id="name1"
                                                placeholder="{{ __('admin/admin/create.name_place') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email1">{{ __('admin/admin/create.email_label') }}</label>
                                            <input type="email" value="{{ old('email') }}" name="email"
                                                class="form-control" id="email1"
                                                placeholder="{{ __('admin/admin/create.email_place') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="password">{{ __('site/auth/register.password') }}</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="{{ __('site/auth/register.password_place') }}">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label
                                            for="password_confirmation">{{ __('site/auth/register.confirmation_password') }}</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="{{ __('site/auth/register.confirmation_password_place') }}">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label>{{ __('admin/admin/create.role_label') }}:</label>
                                    <select class="form-control" name="roles">
                                        <option value="">{{ __('admin/admin/create.role_place') }}</option>
                                        @foreach ($roles as $role)
                                            <option {{ old('roles') == $role->id ? 'selected' : '' }}
                                                value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/admin/create.submit') }}
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
