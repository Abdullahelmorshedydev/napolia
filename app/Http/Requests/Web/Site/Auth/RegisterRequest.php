<?php

namespace App\Http\Requests\Web\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:20', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('site/auth/register.valid_required'),
            'name.string' => __('site/auth/register.valid_string'),
            'name.min' => __('site/auth/register.valid_min'),
            'name.max' => __('site/auth/register.valid_max'),
            'email.required' => __('site/auth/register.valid_required'),
            'email.email' => __('site/auth/register.valid_email'),
            'email.unique' => __('site/auth/register.valid_unique'),
            'password.required' => __('site/auth/register.valid_required'),
            'password.min' => __('site/auth/register.valid_min'),
            'password.max' => __('site/auth/register.valid_max'),
            'password.confirmed' => __('site/auth/register.valid_confirmed'),
            'password_confirmation.required' => __('site/auth/register.valid_required'),
        ];
    }
}
