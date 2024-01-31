<?php

namespace App\Http\Requests\Web\Admin\Shipping;

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
        return [
            'price' => ['required', 'numeric', 'min:0'],
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
        ];
    }
}
