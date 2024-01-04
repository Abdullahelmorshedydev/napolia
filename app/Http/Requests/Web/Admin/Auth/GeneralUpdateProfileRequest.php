<?php

namespace App\Http\Requests\Web\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GeneralUpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:admins,email,' . auth('admin')->user()->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg|mimetypes:image/png,image/jpg,image/jpeg',
            'bio' => 'required|string|min:3',
            'job_title' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/auth/profile/index.required_valid'),
            'name.string' => __('admin/auth/profile/index.string_valid'),
            'name.min' => __('admin/auth/profile/index.min_valid'),
            'email.required' => __('admin/auth/profile/index.required_valid'),
            'email.email' => __('admin/auth/profile/index.string_valid'),
            'email.unique' => __('admin/auth/profile/index.min_valid'),
            'image.image' => __('admin/auth/profile/index.image_valid'),
            'image.mimes' => __('admin/auth/profile/index.mimes_valid'),
            'image.mimetype' => __('admin/auth/profile/index.mimetype_valid'),
            'bio.required' => __('admin/auth/profile/index.required_valid'),
            'bio.string' => __('admin/auth/profile/index.string_valid'),
            'bio.min' => __('admin/auth/profile/index.min_valid'),
            'job_title.required' => __('admin/auth/profile/index.required_valid'),
            'job_title.string' => __('admin/auth/profile/index.string_valid'),
            'job_title.min' => __('admin/auth/profile/index.min_valid'),
        ];
    }
}
