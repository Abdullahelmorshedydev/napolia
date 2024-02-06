<?php

namespace App\Http\Requests\Web\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
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
            'site_name_en' => 'required|string|min:3',
            'site_name_ar' => 'required|string|min:3',
            'footer_slogan_en' => 'required|string|min:3',
            'footer_slogan_ar' => 'required|string|min:3',
            'header_slogan_en' => 'required|string|min:3',
            'header_slogan_ar' => 'required|string|min:3',
            'need_help' => 'required|email',
            'phone' => 'required|numeric',
            'tax' => 'required|numeric',
            'dollar_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'site_name_en.required' => __('admin/settings/general/index.required_valid'),
            'site_name_ar.required' => __('admin/settings/general/index.required_valid'),
            'site_name_en.string' => __('admin/settings/general/index.string_valid'),
            'site_name_ar.string' => __('admin/settings/general/index.string_valid'),
            'site_name_en.min' => __('admin/settings/general/index.min_valid'),
            'site_name_ar.min' => __('admin/settings/general/index.min_valid'),
            'footer_slogan_en.required' => __('admin/settings/general/index.required_valid'),
            'footer_slogan_ar.required' => __('admin/settings/general/index.required_valid'),
            'footer_slogan_en.string' => __('admin/settings/general/index.string_valid'),
            'footer_slogan_ar.string' => __('admin/settings/general/index.string_valid'),
            'footer_slogan_en.min' => __('admin/settings/general/index.min_valid'),
            'footer_slogan_ar.min' => __('admin/settings/general/index.min_valid'),
            'header_slogan_en.required' => __('admin/settings/general/index.required_valid'),
            'header_slogan_ar.required' => __('admin/settings/general/index.required_valid'),
            'header_slogan_en.string' => __('admin/settings/general/index.string_valid'),
            'header_slogan_ar.string' => __('admin/settings/general/index.string_valid'),
            'header_slogan_en.min' => __('admin/settings/general/index.min_valid'),
            'header_slogan_ar.min' => __('admin/settings/general/index.min_valid'),
            'need_help.required' => __('admin/settings/general/index.required_valid'),
            'need_help.email' => __('admin/settings/general/index.email_valid'),
            'phone.required' => __('admin/settings/general/index.required_valid'),
            'phone.numeric' => __('admin/settings/general/index.numeric_valid'),
            'tax.required' => __('admin/settings/general/index.required_valid'),
            'tax.numeric' => __('admin/settings/general/index.numeric_valid'),
            'dollar_price.required' => __('admin/settings/general/index.required_valid'),
            'dollar_price.numeric' => __('admin/settings/general/index.numeric_valid'),
        ];
    }
}
