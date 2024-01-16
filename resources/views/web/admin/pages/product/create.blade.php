@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/product/create.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/product/create.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/product/create.active') }}</span>
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
                        <h4 class="card-title mb-1">{{ __('admin/product/create.title') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameEn1">{{ __('admin/product/create.name_en_label') }}</label>
                                            <input type="text" value="{{ old('name_en') }}" name="name_en"
                                                class="form-control" id="exampleInputNameEn1"
                                                placeholder="{{ __('admin/product/create.name_en_place') }}">
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputNameAr1">{{ __('admin/product/create.name_ar_label') }}</label>
                                            <input type="text" value="{{ old('name_ar') }}" name="name_ar"
                                                class="form-control" id="exampleInputNameAr1"
                                                placeholder="{{ __('admin/product/create.name_ar_place') }}">
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">{{ __('admin/product/create.quantity_label') }}</label>
                                    <input type="number" value="{{ old('quantity') }}" name="quantity"
                                        class="form-control" id="quantity"
                                        placeholder="{{ __('admin/product/create.quantity_place') }}">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputPrice1">{{ __('admin/product/create.price_label') }}</label>
                                            <input type="text" value="{{ old('price') }}" name="price"
                                                class="form-control" id="exampleInputPrice1"
                                                placeholder="{{ __('admin/product/create.price_place') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount1">{{ __('admin/product/create.discount_label') }}</label>
                                            <input type="text" value="{{ old('discount') }}" name="discount"
                                                class="form-control" id="discount1"
                                                placeholder="{{ __('admin/product/create.discount_place') }}">
                                            @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription_en1">
                                        {{ __('admin/product/create.description_en_label') }}
                                    </label>
                                    <textarea class="form-control" name="description_en" id="exampleInputDescription_en1"
                                        placeholder="{{ __('admin/product/create.description_en_place') }}">
                                        {{ old('description_en') }}
                                    </textarea>
                                    @error('description_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription_ar1">
                                        {{ __('admin/product/create.description_ar_label') }}
                                    </label>
                                    <textarea class="form-control" name="description_ar" id="exampleInputDescription_ar1"
                                        placeholder="{{ __('admin/product/create.description_ar_place') }}">
                                        {{ old('description_ar') }}
                                    </textarea>
                                    @error('description_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputCategoryId1">{{ __('admin/product/create.category_id_label') }}</label>
                                            <select name="category_id" id="exampleInputCategoryId1" class="form-control">
                                                <option disabled selected>
                                                    {{ __('admin/product/create.category_id_place') }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="sub_category_id">{{ __('admin/product/create.sub_category_id_label') }}</label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                <option disabled selected>
                                                    {{ __('admin/product/create.sub_category_id_place') }}
                                                </option>
                                            </select>
                                            @error('sub_category_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/create.image_1_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_1" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/create.choose_file') }}
                                                </label>
                                            </div>
                                            @error('image_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/create.image_2_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_2" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/create.choose_file') }}
                                                </label>
                                            </div>
                                            @error('image_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/create.image_3_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_3" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/create.choose_file') }}
                                                </label>
                                            </div>
                                            @error('image_3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/create.image_4_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_4" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/create.choose_file') }}
                                                </label>
                                            </div>
                                            @error('image_4')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-0">
                                {{ __('admin/product/create.submit') }}
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
