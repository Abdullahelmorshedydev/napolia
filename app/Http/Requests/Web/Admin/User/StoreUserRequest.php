<?php

namespace App\Http\Requests\Web\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is userorized to make this request.
     */
    public function userorize(): bool
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
            'email' => ['required', 'email', 'unique:admins,email'],
            'password' => ['required', 'min:6', 'max:20', 'confirmed'],
            'password_confirmation' => ['required'],
            'roles' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/user/create.valid_required'),
            'name.string' => __('admin/user/create.valid_string'),
            'name.min' => __('admin/user/create.valid_min'),
            'name.max' => __('admin/user/create.valid_max'),
            'email.required' => __('admin/user/create.valid_required'),
            'email.email' => __('admin/user/create.valid_email'),
            'email.unique' => __('admin/user/create.valid_unique'),
            'password.required' => __('admin/user/create.valid_required'),
            'password.min' => __('admin/user/create.valid_min'),
            'password.max' => __('admin/user/create.valid_max'),
            'password.confirmed' => __('admin/user/create.valid_confirmed'),
            'password_confirmation.required' => __('admin/user/create.valid_required'),
            'roles.required' => __('admin/user/create.valid_required'),
        ];
    }
}
