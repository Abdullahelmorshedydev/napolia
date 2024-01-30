<?php

namespace App\Http\Requests\Web\Admin\Product;

use App\Enums\DiscountTypeEnum;
use Illuminate\Validation\Rule;
use App\Enums\ProductStatusEnum;
use App\Enums\ProductConditionEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $status = ProductStatusEnum::cases();
        $types = DiscountTypeEnum::cases();
        // dd($this->product->colors);
        return [
            'name_en' => ['required', 'string', Rule::unique('products', 'name->en')->ignore($this->product), 'min:3', 'max:50'],
            'name_ar' => ['required', 'string', Rule::unique('products', 'name->ar')->ignore($this->product), 'min:3', 'max:50'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'code' => ['required'],
            'price' => ['required', 'numeric'],
            'shipping_time' => ['required', 'numeric'],
            'discount' => ['numeric', 'min:0', function ($attribte, $value, $fail) {
                if (request()->input('discount_type') == 'percent') {
                    if ($value <= 0 || $value > 100) {
                        $fail(__('admin/prodcut/edit.valid_max'));
                    }
                } elseif (request()->input('discount_type') == 'fixed') {
                    if ($value > request()->input('price')) {
                        $fail(__('admin/prodcut/edit.valid_max'));
                    }
                }
            }],
            'discount_type' => [Rule::in($types), function ($attribte, $value, $fail) {
                if (request()->input('discount') != null) {
                    if ($value == null) {
                        $fail(__('admin/prodcut/edit.valid_required'));
                    }
                }
            }],
            'condition' => ['nullable', Rule::in($condition)],
            'status' => ['nullable', Rule::in($status)],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:categories,id'],
            'colors' => ['required', 'array', 'unique:product_colors,code'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/product/edit.valid_required'),
            'name_en.string' => __('admin/product/edit.valid_string'),
            'name_en.unique' => __('admin/product/edit.valid_unique'),
            'name_en.min' => __('admin/product/edit.valid_min'),
            'name_en.max' => __('admin/product/edit.valid_max'),
            'name_ar.required' => __('admin/product/edit.valid_required'),
            'name_ar.string' => __('admin/product/edit.valid_string'),
            'name_ar.unique' => __('admin/product/edit.valid_unique'),
            'name_ar.min' => __('admin/product/edit.valid_min'),
            'name_ar.max' => __('admin/product/edit.valid_max'),
            'description_en.required' => __('admin/product/edit.valid_required'),
            'description_en.string' => __('admin/product/edit.valid_string'),
            'description_ar.required' => __('admin/product/edit.valid_required'),
            'description_ar.string' => __('admin/product/edit.valid_string'),
            'price.required' => __('admin/product/edit.valid_required'),
            'price.numeric' => __('admin/product/edit.valid_numeric'),
            'code.required' => __('admin/product/edit.valid_required'),
            'discount.numeric' => __('admin/product/edit.valid_numeric'),
            'condition.rule' => __('admin/product/edit.valid_rule'),
            'status.rule' => __('admin/product/edit.valid_rule'),
            'quantity.required' => __('admin/product/edit.valid_required'),
            'quantity.numeric' => __('admin/product/edit.valid_numeric'),
            'category_id.required' => __('admin/product/edit.valid_required'),
            'category_id.exists' => __('admin/product/edit.valid_exists'),
            'sub_category_id.required' => __('admin/product/edit.valid_required'),
            'sub_category_id.exists' => __('admin/product/edit.valid_exists'),
            'discount.numeric' => __('admin/product/edit.valid_numeric'),
            'discount_type.rule' => __('admin/product/edit.valid_rule'),
            'shipping_time.required' => __('admin/product/edit.valid_required'),
            'shipping_time.numeric' => __('admin/product/edit.valid_numeric'),
            'colors.required' => __('admin/product/edit.valid_required'),
            'colors.array' => __('admin/product/edit.valid_array'),
        ];
    }
}
