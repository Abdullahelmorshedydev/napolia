<?php

namespace App\Http\Requests\Web\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsSettingsRequest extends FormRequest
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
            'about_image' => 'nullable|image|mimes:png,jpg,jpeg|mimetypes:image/png,image/jpg,image/jpeg',
            'about_title_en' => 'required|string|min:3',
            'about_title_ar' => 'required|string|min:3',
            'about_content_en' => 'required|string|min:3',
            'about_content_ar' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'about_title_en.required' => __('admin/settings/general/index.required_valid'),
            'about_title_ar.required' => __('admin/settings/general/index.required_valid'),
            'about_title_en.string' => __('admin/settings/general/index.string_valid'),
            'about_title_ar.string' => __('admin/settings/general/index.string_valid'),
            'about_title_en.min' => __('admin/settings/general/index.min_valid'),
            'about_title_ar.min' => __('admin/settings/general/index.min_valid'),
            'about_content_en.required' => __('admin/settings/general/index.required_valid'),
            'about_content_ar.required' => __('admin/settings/general/index.required_valid'),
            'about_content_en.string' => __('admin/settings/general/index.string_valid'),
            'about_content_ar.string' => __('admin/settings/general/index.string_valid'),
            'about_content_en.min' => __('admin/settings/general/index.min_valid'),
            'about_content_ar.min' => __('admin/settings/general/index.min_valid'),
            'about_image.image' => __('admin/settings/files/index.image_valid'),
            'about_image.mimes' => __('admin/settings/files/index.mimes_valid'),
            'about_image.mimetype' => __('admin/settings/files/index.mimetype_valid'),
        ];
    }
}
