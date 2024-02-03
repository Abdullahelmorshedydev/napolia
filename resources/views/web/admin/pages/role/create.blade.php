@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/role/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/role/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/role/create.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/role/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.roles.store') }}" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="name1">{{ __('admin/role/create.name_label') }}</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        id="name1" placeholder="{{ __('admin/role/create.name_place') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('admin/role/create.permission_label') }}:</label>
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3">
                                                <input name="permissions[]" type="checkbox" value="{{ $permission->name }}" id="{{ $permission->name }}">
                                                <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permissions')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/role/create.submit') }}
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
