<?php

namespace App\Http\Requests\Web\Admin\Product;

use App\Enums\DiscountTypeEnum;
use App\Enums\PriceTypeEnum;
use App\Enums\ProductConditionEnum;
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
        $types = DiscountTypeEnum::cases();
        $priceTypes = PriceTypeEnum::cases();
        return [
            'name_en' => ['required', 'string', Rule::unique('products', 'name->en'), 'min:3', 'max:50'],
            'name_ar' => ['required', 'string', Rule::unique('products', 'name->ar'), 'min:3', 'max:50'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'price_type' => ['required', Rule::in($priceTypes)],
            'code' => ['required', 'unique:products,code'],
            'shipping_time' => ['required', 'numeric'],
            'discount' => ['numeric', 'min:0', function ($attribte, $value, $fail) {
                if (request()->input('discount_type') == 'percent') {
                    if ($value <= 0 || $value > 100) {
                        $fail(__('admin/prodcut/create.valid_max'));
                    }
                } elseif (request()->input('discount_type') == 'fixed') {
                    if ($value > request()->input('price')) {
                        $fail(__('admin/prodcut/create.valid_max'));
                    }
                }
            }],
            'discount_type' => [Rule::in($types), function ($attribte, $value, $fail) {
                if (request()->input('discount') != null) {
                    if ($value == null) {
                        $fail(__('admin/prodcut/create.valid_required'));
                    }
                }
            }],
            'condition' => ['nullable', Rule::in($condition)],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:categories,id'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'colors' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/product/create.valid_required'),
            'name_en.string' => __('admin/product/create.valid_string'),
            'name_en.unique' => __('admin/product/create.valid_unique'),
            'name_en.min' => __('admin/product/create.valid_min'),
            'name_en.max' => __('admin/product/create.valid_max'),
            'name_ar.required' => __('admin/product/create.valid_required'),
            'name_ar.string' => __('admin/product/create.valid_string'),
            'name_ar.unique' => __('admin/product/create.valid_unique'),
            'name_ar.min' => __('admin/product/create.valid_min'),
            'name_ar.max' => __('admin/product/create.valid_max'),
            'description_en.required' => __('admin/product/create.valid_required'),
            'description_en.string' => __('admin/product/create.valid_string'),
            'description_ar.required' => __('admin/product/create.valid_required'),
            'description_ar.string' => __('admin/product/create.valid_string'),
            'price.required' => __('admin/product/create.valid_required'),
            'price.numeric' => __('admin/product/create.valid_numeric'),
            'price_type.required' => __('admin/product/edit.valid_required'),
            'price_type.rule' => __('admin/product/create.valid_rule'),
            'code.required' => __('admin/product/create.valid_required'),
            'code.unique' => __('admin/product/create.valid_unique'),
            'discount.numeric' => __('admin/product/create.valid_numeric'),
            'discount_type.rule' => __('admin/product/create.valid_rule'),
            'condition.rule' => __('admin/product/create.valid_rule'),
            'quantity.required' => __('admin/product/create.valid_required'),
            'quantity.numeric' => __('admin/product/create.valid_numeric'),
            'category_id.required' => __('admin/product/create.valid_required'),
            'category_id.exists' => __('admin/product/create.valid_exists'),
            'sub_category_id.required' => __('admin/product/create.valid_required'),
            'sub_category_id.exists' => __('admin/product/create.valid_exists'),
            'images.required' => __('admin/product/create.valid_required'),
            'images.array' => __('admin/product/create.valid_array'),
            'images.*.image' => __('admin/product/create.valid_image'),
            'images.*.mimetype' => __('admin/product/create.valid_mimetype'),
            'images.*.mimes' => __('admin/product/create.valid_mimes'),
            'shipping_time.required' => __('admin/product/create.valid_required'),
            'shipping_time.numeric' => __('admin/product/create.valid_numeric'),
            'colors.required' => __('admin/product/create.valid_required'),
            'colors.array' => __('admin/product/create.valid_array'),
        ];
    }
}
