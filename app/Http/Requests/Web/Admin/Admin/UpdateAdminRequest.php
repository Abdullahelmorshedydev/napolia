<?php

namespace App\Http\Requests\Web\Admin\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the admin is authorized to make this request.
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
            'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($this->admin)],
            'roles' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/admin/edit.valid_required'),
            'name.string' => __('admin/admin/edit.valid_string'),
            'name.min' => __('admin/admin/edit.valid_min'),
            'name.max' => __('admin/admin/edit.valid_max'),
            'email.required' => __('admin/admin/edit.valid_required'),
            'email.email' => __('admin/admin/edit.valid_email'),
            'email.unique' => __('admin/admin/edit.valid_unique'),
            'roles.required' => __('admin/admin/edit.valid_required'),
        ];
    }
}
