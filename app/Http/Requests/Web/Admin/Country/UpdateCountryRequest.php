<?php

namespace App\Http\Requests\Web\Admin\Country;

use Illuminate\Validation\Rule;
use App\Enums\CountryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
        $status = CountryStatusEnum::cases();
        return [
            'name_en' => ['required', Rule::unique('countries', 'name->en')->ignore($this->country)],
            'name_ar' => ['required', Rule::unique('countries', 'name->ar')->ignore($this->country)],
            'status' => [Rule::in($status)],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/country/edit.valid_required'),
            'name_en.string' => __('admin/country/edit.valid_string'),
            'name_en.unique' => __('admin/country/edit.valid_uinque'),
            'name_ar.required' => __('admin/country/edit.valid_required'),
            'name_ar.string' => __('admin/country/edit.valid_string'),
            'name_ar.unique' => __('admin/country/edit.valid_uinque'),
            'status.rule' => __('admin/country/edit.valid_rule'),
        ];
    }
}
