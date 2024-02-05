<?php

namespace App\Http\Requests\Web\Admin\Shipping;

use App\Enums\PriceTypeEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreShippingRequest extends FormRequest
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
        $priceTypes = PriceTypeEnum::cases();
        return [
            'price' => ['required', 'numeric', 'min:0'],
            'price_type' => ['required', Rule::in($priceTypes)],
            'state_id' => ['required', 'exists:states,id', 'unique:shippings,state_id'],
        ];
    }

    public function messages()
    {
        return [
            'price.required' => __('admin/shipping/create.valid_required'),
            'price.string' => __('admin/shipping/create.valid_string'),
            'price.min' => __('admin/shipping/create.valid_min'),
            'state_id.required' => __('admin/shipping/create.valid_required'),
            'state_id.exists' => __('admin/shipping/create.valid_exists'),
            'state_id.unique' => __('admin/shipping/create.valid_unique'),
            'price_type.required' => __('admin/product/edit.valid_required'),
            'price_type.rule' => __('admin/product/edit.valid_rule'),
        ];
    }
}
