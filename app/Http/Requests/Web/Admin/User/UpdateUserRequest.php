<?php

namespace App\Http\Requests\Web\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:admins,email,' . $this->user],
            'roles' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/user/edit.valid_required'),
            'name.string' => __('admin/user/edit.valid_string'),
            'name.min' => __('admin/user/edit.valid_min'),
            'name.max' => __('admin/user/edit.valid_max'),
            'email.required' => __('admin/user/edit.valid_required'),
            'email.email' => __('admin/user/edit.valid_email'),
            'email.unique' => __('admin/user/edit.valid_unique'),
            'roles.required' => __('admin/user/edit.valid_required'),
        ];
    }
}
