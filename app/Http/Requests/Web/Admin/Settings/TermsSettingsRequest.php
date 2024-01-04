<?php

namespace App\Http\Requests\Web\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class TermsSettingsRequest extends FormRequest
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
            'terms_conditions_en' => 'required|string|min:3',
            'terms_conditions_ar' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'terms_conditions_en.required' => __('admin/settings/terms/index.required_valid'),
            'terms_conditions_ar.required' => __('admin/settings/terms/index.required_valid'),
            'terms_conditions_en.string' => __('admin/settings/terms/index.string_valid'),
            'terms_conditions_ar.string' => __('admin/settings/terms/index.string_valid'),
            'terms_conditions_en.min' => __('admin/settings/terms/index.min_valid'),
            'terms_conditions_ar.min' => __('admin/settings/terms/index.min_valid'),
        ];
    }
}
