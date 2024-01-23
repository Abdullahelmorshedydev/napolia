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
        return [
            'name' => ['required', 'string', 'unique:products,name,' . $this->id, 'min:3', 'max:50'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
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
            'status' => ['nullable', Rule::in($status)],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/product/create.valid_required'),
            'name.string' => __('admin/product/create.valid_string'),
            'name.unique' => __('admin/product/create.valid_uinque'),
            'name.min' => __('admin/product/create.valid_min'),
            'name.max' => __('admin/product/create.valid_max'),
            'description.required' => __('admin/product/create.valid_required'),
            'description.string' => __('admin/product/create.valid_string'),
            'price.required' => __('admin/product/create.valid_required'),
            'price.numeric' => __('admin/product/create.valid_numeric'),
            'discount.numeric' => __('admin/product/create.valid_numeric'),
            'condition.rule' => __('admin/product/create.valid_rule'),
            'status.rule' => __('admin/product/create.valid_rule'),
            'quantity.required' => __('admin/product/create.valid_required'),
            'quantity.numeric' => __('admin/product/create.valid_numeric'),
            'category_id.required' => __('admin/product/create.valid_required'),
            'category_id.exists' => __('admin/product/create.valid_exists'),
            'sub_category_id.required' => __('admin/product/create.valid_required'),
            'sub_category_id.exists' => __('admin/product/create.valid_exists'),
            'discount.numeric' => __('admin/product/create.valid_numeric'),
            'discount_type.rule' => __('admin/product/create.valid_rule'),
            'shipping_time.required' => __('admin/product/create.valid_required'),
            'shipping_time.numeric' => __('admin/product/create.valid_numeric'),
        ];
    }
}
