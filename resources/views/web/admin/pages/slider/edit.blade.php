@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/slider/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/slider/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/slider/edit.active') }}</span>
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
                    {{ __('admin/slider/edit.add_new') }}
                </div>
                <br>
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="customFile">{{ __('admin/slider/edit.image_label') }}</label>
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">
                                        {{ __('admin/slider/edit.choose_file') }}
                                    </label>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputStatus1">{{ __('admin/slider/edit.status_label') }}</label>
                                <select name="status" id="exampleInputStatus1" class="form-control">
                                    <option disabled selected>{{ __('admin/slider/edit.status_place') }}</option>
                                    @foreach ($status as $stat)
                                            <option {{ old('status', $slider->status->value) == $stat->value ? 'selected' : '' }}
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
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/slider/edit.submit') }}
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
