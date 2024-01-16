<?php

namespace App\Http\Requests\Web\Admin\City;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
            'name_en' => ['required', Rule::unique('cities', 'name->en')],
            'name_ar' => ['required', Rule::unique('cities', 'name->ar')],
            'country_id' => ['required','exists:countries,id'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/city/create.valid_required'),
            'name_en.string' => __('admin/city/create.valid_string'),
            'name_en.unique' => __('admin/city/create.valid_uinque'),
            'name_ar.required' => __('admin/city/create.valid_required'),
            'name_ar.string' => __('admin/city/create.valid_string'),
            'name_ar.unique' => __('admin/city/create.valid_uinque'),
            'country_id.required' => __('admin/city/create.valid_required'),
            'country_id.exists' => __('admin/city/create.valid_exists'),
        ];
    }
}
