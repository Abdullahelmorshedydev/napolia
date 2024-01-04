<?php

namespace App\Http\Requests\Web\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateProfileRequest extends FormRequest
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
            'old_password' => ['required'],
            'new_password' => ['required', 'confirmed'],
            'new_password_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' =>  __('admin/auth/profile.required_valid'),
            'new_password.required' => __('admin/auth/profile.required_valid'),
            'new_password.confirmed' => __('admin/auth/profile.confirmed_valid'),
            'new_password_confirmation.required' => __('admin/auth/profile.required_valid'),
        ];
    }
}
