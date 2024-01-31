<?php

namespace App\Http\Requests\Web\Admin\State;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
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
            'name_en' => ['required', Rule::unique('states', 'name->en')],
            'name_ar' => ['required', Rule::unique('states', 'name->ar')],
            'city_id' => ['required','exists:cities,id'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/state/create.valid_required'),
            'name_en.string' => __('admin/state/create.valid_string'),
            'name_en.unique' => __('admin/state/create.valid_uinque'),
            'name_ar.required' => __('admin/state/create.valid_required'),
            'name_ar.string' => __('admin/state/create.valid_string'),
            'name_ar.unique' => __('admin/state/create.valid_uinque'),
            'city_id.required' => __('admin/state/create.valid_required'),
            'city_id.exists' => __('admin/state/create.valid_exists'),
        ];
    }
}
