<?php

namespace App\Http\Requests\Web\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/auth/profile.required_valid'),
            'name.string' => __('admin/auth/profile.string_valid'),
            'name.min' => __('admin/auth/profile.min_valid'),
            'email.required' => __('admin/auth/profile.required_valid'),
            'email.email' => __('admin/auth/login.email_valid_email'),
            'phone.required' => __('admin/auth/profile.required_valid'),
            'phone.numeric' => __('admin/settings/general/index.numeric_valid'),
            'subject.required' => __('admin/auth/profile.required_valid'),
            'subject.string' => __('admin/auth/profile.string_valid'),
            'message.required' => __('admin/auth/profile.required_valid'),
            'message.string' => __('admin/auth/profile.string_valid'),
            'message.min' => __('admin/auth/profile.min_valid'),
        ];
    }
}
