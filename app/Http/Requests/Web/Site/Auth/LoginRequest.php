<?php

namespace App\Http\Requests\Web\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('site/auth/login.email_valid_required'),
            'email.email' => __('site/auth/login.email_valid_email'),
            'email.exists' => __('site/auth/login.email_valid_exists'),
            'password.required' => __('site/auth/login.password_valid_required'),
        ];
    }
}
