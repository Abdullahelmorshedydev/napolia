<?php

namespace App\Http\Requests\Web\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PersonalProfileRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . auth('web')->user()->id,
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('site/auth/profile/index.required_valid'),
            'name.string' => __('site/auth/profile/index.string_valid'),
            'name.min' => __('site/auth/profile/index.min_valid'),
            'email.required' => __('site/auth/profile/index.required_valid'),
            'email.email' => __('site/auth/profile/index.email_valid'),
            'email.unique' => __('site/auth/profile/index.min_valid'),
            'phone.required' => __('site/auth/profile/index.required_valid'),
            'phone.numeric' => __('site/auth/profile/index.numeric_valid'),
            'address.required' => __('site/auth/profile/index.required_valid'),
            'country_id.required' => __('site/auth/profile/index.required_valid'),
            'country_id.required' => __('site/auth/profile/index.exists_valid'),
            'city_id.required' => __('site/auth/profile/index.required_valid'),
            'city_id.exists' => __('site/auth/profile/index.exists_valid'),
            'state_id.required' => __('site/auth/profile/index.required_valid'),
            'state_id.exists' => __('site/auth/profile/index.exists_valid'),
        ];
    }
}
