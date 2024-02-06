@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/product/edit.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/product/edit.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/product/edit.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/product/edit.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.products.update.image', $image->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputImage1">
                                        {{ __('admin/product/edit.image_label') }}
                                    </label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" name="image" id="customFile" type="file">
                                        <label class="custom-file-label" for="customFile">
                                            {{ __('admin/category/edit.choose_file') }}
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <img width="300px" src="{{ asset('storage/' . $image->image) }}" alt="image">
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/product/edit.submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                var lang = "{{ LaravelLocalization::getCurrentLocale() }}";

                if (category_id) {
                    $.ajax({
                        url: "{{ route('admin.sub_categories') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            html = "";
                            $.each(response.data, function(index, value) {
                                html +=
                                    '<option value="' +
                                    value.id +
                                    '">' +
                                    value.name[lang] +
                                    '</option>';
                            });
                            $('select[name="sub_category_id"]').empty('').append(html);
                        },
                        error: function(xhr, status, error) {
                            console.log("feh error ya morshed");
                        }
                    });
                } else {
                    console.log('Please select a subCategory');
                }
            });
        });
    </script>
@endpush
