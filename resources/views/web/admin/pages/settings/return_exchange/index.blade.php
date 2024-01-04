@extends('web.admin.layouts.app')

@push('style')
    <script src="{{ asset('admin/assets/ckeditor/build/ckeditor.js') }}"></script>
@endpush

@section('title', __('admin/settings/return_exchange/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/settings/return_exchange/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/
                    {{ __('admin/settings/return_exchange/index.active') }}</span>
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
                    {{ __('admin/settings/return_exchange/index.label') }}
                </div>
                <br>
                <form action="{{ route('admin.settings.return_exchange.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="card-body pt-0">
                                <div class="form-group">
                                    <label for="return_policy_en">
                                        {{ __('admin/settings/return_exchange/index.return_policy_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="return_policy_en" id="editor1">
                                        {!! old('return_policy_en', settings()->get('return_policy_en')) !!}
                                    </textarea>
                                    @error('return_policy_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="return_policy_ar">
                                        {{ __('admin/settings/return_exchange/index.return_policy_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="return_policy_ar" id="editor2">
                                        {!! old('return_policy_ar', settings()->get('return_policy_ar')) !!}
                                    </textarea>
                                    @error('return_policy_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exchange_policy_en">
                                        {{ __('admin/settings/return_exchange/index.exchange_policy_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="exchange_policy_en" id="editor3">
                                        {!! old('exchange_policy_en', settings()->get('exchange_policy_en')) !!}
                                    </textarea>
                                    @error('exchange_policy_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exchange_policy_ar">
                                        {{ __('admin/settings/return_exchange/index.exchange_policy_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="exchange_policy_ar" id="editor4">
                                        {!! old('exchange_policy_ar', settings()->get('exchange_policy_ar')) !!}
                                    </textarea>
                                    @error('exchange_policy_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-0">
                        {{ __('admin/settings/return_exchange/index.submit') }}
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
