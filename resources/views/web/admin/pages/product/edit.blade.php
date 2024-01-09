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
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputName1">{{ __('admin/product/edit.name_label') }}</label>
                                    <input type="text" value="{{ old('name', $product->name) }}" name="name"
                                        class="form-control" id="exampleInputName1"
                                        placeholder="{{ __('admin/product/edit.name_place') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantity">{{ __('admin/product/edit.quantity_label') }}</label>
                                    <input type="number" value="{{ old('quantity', $product->quantity) }}" name="quantity"
                                        class="form-control" id="quantity"
                                        placeholder="{{ __('admin/product/edit.quantity_place') }}">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputPrice1">{{ __('admin/product/edit.price_label') }}</label>
                                            <input type="text" value="{{ old('price', $product->price) }}"
                                                name="price" class="form-control" id="exampleInputPrice1"
                                                placeholder="{{ __('admin/product/edit.price_place') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount1">{{ __('admin/product/edit.discount_label') }}</label>
                                            <input type="text" value="{{ old('discount', $product->discount) }}"
                                                name="discount" class="form-control" id="discount1"
                                                placeholder="{{ __('admin/product/edit.discount_place') }}">
                                            @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription1">
                                        {{ __('admin/product/edit.description_label') }}
                                    </label>
                                    <textarea class="form-control" name="description" id="exampleInputDescription1"
                                        placeholder="{{ __('admin/product/edit.description_place') }}">
                                        {{ old('description', $product->description) }}
                                    </textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputCategoryId1">{{ __('admin/product/edit.category_id_label') }}</label>
                                            <select name="category_id" id="exampleInputCategoryId1" class="form-control">
                                                <option disabled selected>
                                                    {{ __('admin/product/edit.category_id_place') }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option
                                                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="alert alert-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="sub_category_id">{{ __('admin/product/edit.sub_category_id_label') }}</label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                <option disabled selected>
                                                    {{ __('admin/product/edit.sub_category_id_place') }}
                                                </option>
                                                @foreach ($subCategories as $subCategory)
                                                    <option
                                                        {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sub_category_id')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="exampleInputcondition1">{{ __('admin/product/edit.condition_label') }}</label>
                                    <select name="condition" id="exampleInputcondition1" class="form-control">
                                        <option disabled selected>{{ __('admin/product/edit.condition_place') }}</option>
                                        @foreach ($conditions as $condition)
                                            <option
                                                {{ old('condition', $product->condition->value) == $condition->value ? 'selected' : '' }}
                                                value="{{ $condition->value }}">
                                                {{ $product->condition->lang() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('condition')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputStatus1">{{ __('admin/product/edit.status_label') }}</label>
                                    <select name="status" id="exampleInputStatus1" class="form-control">
                                        <option disabled selected>{{ __('admin/product/edit.status_place') }}</option>
                                        @foreach ($status as $stat)
                                            <option {{ old('status', $product->status->value) == $stat->value ? 'selected' : '' }}
                                                value="{{ $stat->value }}">
                                                {{ $stat->lang() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="alert alert-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/edit.image_1_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input type="hidden" name="image_id_1" value="{{ $images[0]['id'] }}">
                                                <input class="custom-file-input" name="image_1" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/edit.choose_file') }}
                                                </label>
                                            </div>
                                            <img width="100px" src="{{ asset($images[0]['image']) }}" alt="image_1">
                                            @error('image_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="image_id_2" value="{{ $images[1]['id'] }}">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/edit.image_2_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_2" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/edit.choose_file') }}
                                                </label>
                                            </div>
                                            <img width="100px" src="{{ asset($images[1]['image']) }}" alt="image_2">
                                            @error('image_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="image_id_3" value="{{ $images[2]['id'] }}">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/edit.image_3_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_3" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/edit.choose_file') }}
                                                </label>
                                            </div>
                                            <img width="100px" src="{{ asset($images[2]['image']) }}" alt="image_3">
                                            @error('image_3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="image_id_4" value="{{ $images[3]['id'] }}">
                                            <label for="exampleInputImage1">
                                                {{ __('admin/product/edit.image_4_label') }}
                                            </label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image_4" id="customFile"
                                                    type="file">
                                                <label class="custom-file-label" for="customFile">
                                                    {{ __('admin/category/edit.choose_file') }}
                                                </label>
                                            </div>
                                            <img width="100px" src="{{ asset($images[3]['image']) }}" alt="image_4">
                                            @error('image_4')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
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
