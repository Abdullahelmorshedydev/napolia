<?php

namespace App\Http\Requests\Web\Admin\City;

use COM;
use App\Enums\CityStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
        $status = CityStatusEnum::cases();
        return [
            'name' => ['required', 'string', 'unique:cities,name,' . $this->city->id],
            'status' => [Rule::in($status)],
            'country_id' => ['required', 'exists:countries,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/city/edit.valid_required'),
            'name.string' => __('admin/city/edit.valid_string'),
            'name.unique' => __('admin/city/edit.valid_uinque'),
            'status.rule' => __('admin/city/edit.valid_rule'),
            'country_id.required' => __('admin/city/edit.valid_required'),
            'country_id.exists' => __('admin/city/edit.valid_exists'),
        ];
    }
}
