<?php

namespace App\Http\Requests\Web\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class ReturnExchangeSettingsRequest extends FormRequest
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
            'return_policy_en' => 'required|string|min:3',
            'return_policy_ar' => 'required|string|min:3',
            'exchange_policy_en' => 'required|string|min:3',
            'exchange_policy_ar' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'return_policy_en.required' => __('admin/settings/terms/index.required_valid'),
            'return_policy_ar.required' => __('admin/settings/terms/index.required_valid'),
            'return_policy_en.string' => __('admin/settings/terms/index.string_valid'),
            'return_policy_ar.string' => __('admin/settings/terms/index.string_valid'),
            'return_policy_en.min' => __('admin/settings/terms/index.min_valid'),
            'return_policy_ar.min' => __('admin/settings/terms/index.min_valid'),
            'exchange_policy_en.required' => __('admin/settings/terms/index.required_valid'),
            'exchange_policy_ar.required' => __('admin/settings/terms/index.required_valid'),
            'exchange_policy_en.string' => __('admin/settings/terms/index.string_valid'),
            'exchange_policy_ar.string' => __('admin/settings/terms/index.string_valid'),
            'exchange_policy_en.min' => __('admin/settings/terms/index.min_valid'),
            'exchange_policy_ar.min' => __('admin/settings/terms/index.min_valid'),
        ];
    }
}
