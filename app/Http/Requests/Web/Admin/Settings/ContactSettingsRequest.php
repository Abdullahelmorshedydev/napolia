<?php

namespace App\Http\Requests\Web\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class ContactSettingsRequest extends FormRequest
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
            'contact_phone_1' => 'required|string|min:3',
            'contact_phone_2' => 'required|string|min:3',
            'contact_address_1_en' => 'required|string|min:3',
            'contact_address_2_en' => 'required|string|min:3',
            'contact_address_1_ar' => 'required|string|min:3',
            'contact_address_2_ar' => 'required|string|min:3',
            'contact_email_1' => 'required|string|min:3',
            'contact_email_2' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'contact_phone_1.required' => __('admin/settings/contact/index.required_valid'),
            'contact_phone_2.required' => __('admin/settings/contact/index.required_valid'),
            'contact_phone_1.string' => __('admin/settings/contact/index.string_valid'),
            'contact_phone_2.string' => __('admin/settings/contact/index.string_valid'),
            'contact_phone_1.min' => __('admin/settings/contact/index.min_valid'),
            'contact_phone_2.min' => __('admin/settings/contact/index.min_valid'),
            'contact_address_1_en.required' => __('admin/settings/contact/index.required_valid'),
            'contact_address_2_en.required' => __('admin/settings/contact/index.required_valid'),
            'contact_address_1_ar.required' => __('admin/settings/contact/index.required_valid'),
            'contact_address_2_ar.required' => __('admin/settings/contact/index.required_valid'),
            'contact_address_1_en.string' => __('admin/settings/contact/index.string_valid'),
            'contact_address_2_en.string' => __('admin/settings/contact/index.string_valid'),
            'contact_address_1_ar.string' => __('admin/settings/contact/index.string_valid'),
            'contact_address_2_ar.string' => __('admin/settings/contact/index.string_valid'),
            'contact_address_1_en.min' => __('admin/settings/contact/index.min_valid'),
            'contact_address_2_en.min' => __('admin/settings/contact/index.min_valid'),
            'contact_address_1_ar.min' => __('admin/settings/contact/index.min_valid'),
            'contact_address_2_ar.min' => __('admin/settings/contact/index.min_valid'),
            'contact_email_1.required' => __('admin/settings/contact/index.required_valid'),
            'contact_email_2.required' => __('admin/settings/contact/index.required_valid'),
            'contact_email_1.string' => __('admin/settings/contact/index.string_valid'),
            'contact_email_2.string' => __('admin/settings/contact/index.string_valid'),
            'contact_email_1.min' => __('admin/settings/contact/index.min_valid'),
            'contact_email_2.min' => __('admin/settings/contact/index.min_valid'),
        ];
    }
}
