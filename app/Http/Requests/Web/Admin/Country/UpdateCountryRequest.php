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
            'name' => ['required', 'unique:countries,name,' . $this->country->id],
            'status' => [Rule::in($status)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/country/edit.valid_required'),
            'name.string' => __('admin/country/edit.valid_string'),
            'name.unique' => __('admin/country/edit.valid_uinque'),
            'status.rule' => __('admin/country/edit.valid_rule'),
        ];
    }
}
