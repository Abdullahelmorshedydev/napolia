<?php

namespace App\Http\Requests\Web\Admin\Product;

use App\Enums\ProductConditionEnum;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $condition = ProductConditionEnum::cases();
        return [
            'name_en' => ['required', 'string', 'unique:products,name', 'min:3', 'max:50'],
            'name_ar' => ['required', 'string', 'unique:products,name', 'min:3', 'max:50'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'condition' => ['nullable', Rule::in($condition)],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:categories,id'],
            'image_1' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_2' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_3' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_4' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/product/create.valid_required'),
            'name_en.string' => __('admin/product/create.valid_string'),
            'name_en.unique' => __('admin/product/create.valid_uinque'),
            'name_en.min' => __('admin/product/create.valid_min'),
            'name_en.max' => __('admin/product/create.valid_max'),
            'name_ar.required' => __('admin/product/create.valid_required'),
            'name_ar.string' => __('admin/product/create.valid_string'),
            'name_ar.unique' => __('admin/product/create.valid_uinque'),
            'name_ar.min' => __('admin/product/create.valid_min'),
            'name_ar.max' => __('admin/product/create.valid_max'),
            'description_en.required' => __('admin/product/create.valid_required'),
            'description_en.string' => __('admin/product/create.valid_string'),
            'description_ar.required' => __('admin/product/create.valid_required'),
            'description_ar.string' => __('admin/product/create.valid_string'),
            'price.required' => __('admin/product/create.valid_required'),
            'price.numeric' => __('admin/product/create.valid_numeric'),
            'discount.numeric' => __('admin/product/create.valid_numeric'),
            'condition.rule' => __('admin/product/create.valid_rule'),
            'quantity.required' => __('admin/product/create.valid_required'),
            'quantity.numeric' => __('admin/product/create.valid_numeric'),
            'category_id.required' => __('admin/product/create.valid_required'),
            'category_id.exists' => __('admin/product/create.valid_exists'),
            'sub_category_id.required' => __('admin/product/create.valid_required'),
            'sub_category_id.exists' => __('admin/product/create.valid_exists'),
            'image_1.required' => __('admin/product/create.valid_required'),
            'image_1.image' => __('admin/product/create.valid_image'),
            'image_1.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_1.mimes' => __('admin/product/create.valid_mimes'),
            'image_2.required' => __('admin/product/create.valid_required'),
            'image_2.image' => __('admin/product/create.valid_image'),
            'image_2.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_2.mimes' => __('admin/product/create.valid_mimes'),
            'image_3.required' => __('admin/product/create.valid_required'),
            'image_3.image' => __('admin/product/create.valid_image'),
            'image_3.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_3.mimes' => __('admin/product/create.valid_mimes'),
            'image_4.required' => __('admin/product/create.valid_required'),
            'image_4.image' => __('admin/product/create.valid_image'),
            'image_4.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_4.mimes' => __('admin/product/create.valid_mimes'),
        ];
    }
}
