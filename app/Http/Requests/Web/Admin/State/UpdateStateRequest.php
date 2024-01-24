<?php

namespace App\Http\Requests\Web\Admin\State;

use COM;
use App\Enums\StateStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
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
        $status = StateStatusEnum::cases();
        return [
            'name_en' => ['required', Rule::unique('states', 'name->en')->ignore($this->state)],
            'name_ar' => ['required', Rule::unique('states', 'name->ar')->ignore($this->state)],
            'status' => [Rule::in($status)],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/state/edit.valid_required'),
            'name_en.string' => __('admin/state/edit.valid_string'),
            'name_en.unique' => __('admin/state/edit.valid_uinque'),
            'name_ar.required' => __('admin/state/edit.valid_required'),
            'name_ar.string' => __('admin/state/edit.valid_string'),
            'name_ar.unique' => __('admin/state/edit.valid_uinque'),
            'status.rule' => __('admin/state/edit.valid_rule'),
            'country_id.required' => __('admin/state/edit.valid_required'),
            'country_id.exists' => __('admin/state/edit.valid_exists'),
            'city_id.required' => __('admin/state/edit.valid_required'),
            'city_id.exists' => __('admin/state/edit.valid_exists'),
        ];
    }
}
