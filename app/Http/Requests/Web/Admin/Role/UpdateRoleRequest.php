<?php

namespace App\Http\Requests\Web\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', 'unique:roles,name,' . $this->role->id, 'string', 'min:3', 'max:20'],
            'permissions' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/user/create.valid_required'),
            'name.string' => __('admin/user/create.valid_string'),
            'name.unique' => __('admin/user/create.valid_unique'),
            'name.min' => __('admin/user/create.valid_min'),
            'name.max' => __('admin/user/create.valid_max'),
            'roles.required' => __('admin/user/create.valid_required'),
            'roles.array' => __('admin/user/create.valid_array'),
        ];
    }
}
