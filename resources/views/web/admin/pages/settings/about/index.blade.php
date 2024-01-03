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
                    {{ __('admin/settings/about_us/index.label') }}
                </div>
                <br>
                <form action="{{ route('admin.settings.about_us.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label
                                        for="customFile">{{ __('admin/settings/about_us/index.about_image_label') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="about_image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/settings/files/index.choose_file') }}
                                        </label>
                                    </div>
                                    @error('about_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img width="100px" src="{{ asset(settings()->get('about_image')) }}" alt="About_image">
                                </div>
                                <div class="form-group">
                                    <label for="about_title_en">
                                        {{ __('admin/settings/about_us/index.about_title_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="about_title_en" id="editor1">
                                        {!! old('about_title_en', settings()->get('about_title_en')) !!}
                                    </textarea>
                                    @error('about_title_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="about_title_ar">
                                        {{ __('admin/settings/about_us/index.about_title_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="about_title_ar" id="editor2">
                                        {!! old('about_title_ar', settings()->get('about_title_ar')) !!}
                                    </textarea>
                                    @error('about_title_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="about_content_en">
                                        {{ __('admin/settings/about_us/index.about_content_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="about_content_en" id="editor3">
                                        {!! old('about_content_en', settings()->get('about_content_en')) !!}
                                    </textarea>
                                    @error('about_content_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="about_content_ar">
                                        {{ __('admin/settings/about_us/index.about_content_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="about_content_ar" id="editor4">
                                        {!! old('about_content_ar', settings()->get('about_content_ar')) !!}
                                    </textarea>
                                    @error('about_content_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor4'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
