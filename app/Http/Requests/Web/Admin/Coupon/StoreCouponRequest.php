<?php

namespace App\Http\Requests\Web\Admin\Coupon;

use App\Enums\CouponTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends FormRequest
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
        $type = CouponTypeEnum::cases();
        return [
            'code' => ['required', 'string', 'unique:coupons,code'],
            'value' => ['required', 'numeric','min:0',function($attribte,$value,$fail){
                if(request()->input('type') == 'percent'){
                    if($value <= 0 || $value > 100){
                        $fail(__('admin/coupon/create.valid_max'));
                    }
                }
            }],
            'type' => ['required', Rule::in($type)],
            'max_usage' => ['required', 'numeric', 'min:1'],
            'min_order_value' => ['required', 'numeric', 'min:1'],
            'expire_date' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            'code.required' => __('admin/coupon/create.valid_required'),
            'code.string' => __('admin/coupon/create.valid_string'),
            'code.unique' => __('admin/coupon/create.valid_unique'),
            'value.required' => __('admin/coupon/create.valid_required'),
            'value.min' => __('admin/coupon/create.valid_min'),
            'value.numeric' => __('admin/coupon/create.valid_numeric'),
            'type.required' => __('admin/coupon/create.valid_required'),
            'type.rule' => __('admin/coupon/create.valid_rule'),
            'max_usage.required' => __('admin/coupon/create.valid_required'),
            'max_usage.min' => __('admin/coupon/create.valid_min'),
            'max_usage.numeric' => __('admin/coupon/create.valid_numeric'),
            'min_order_value.required' => __('admin/coupon/create.valid_required'),
            'min_order_value.min' => __('admin/coupon/create.valid_min'),
            'min_order_value.numeric' => __('admin/coupon/create.valid_numeric'),
        ];
    }
}
