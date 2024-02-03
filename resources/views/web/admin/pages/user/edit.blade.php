@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/user/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/user/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/user/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/user/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name1">{{ __('admin/user/edit.name_label') }}</label>
                                            <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                                class="form-control" id="name1"
                                                placeholder="{{ __('admin/user/edit.name_place') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email1">{{ __('admin/user/edit.email_label') }}</label>
                                            <input type="email" value="{{ old('email', $user->email) }}" name="email"
                                                class="form-control" id="email1"
                                                placeholder="{{ __('admin/user/edit.email_place') }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin/user/edit.role_label') }}:</label>
                                    <select class="form-control" name="roles">
                                        <option value="">{{ __('admin/user/edit.role_place') }}</option>
                                        @foreach ($roles as $role)
                                            <option
                                                {{ old('roles', $adminRole ?? $adminRole[0]->id) == $role->id ? 'selected' : '' }}
                                                value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/user/edit.submit') }}
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
