<?php

namespace App\Http\Requests\Web\Site;

use App\Enums\PaymentMethodEnum;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
            'user_id' => ['required'],
            'phone' => ['required', 'numeric'],
            'country_id' => ['required', Rule::in(Country::pluck('id'))],
            'city_id' => ['required', Rule::in(City::pluck('id'))],
            'state_id' => ['required', Rule::in(State::pluck('id'))],
            'address' => ['required', 'string', 'min:5'],
            'shipping_price' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'cart_id' => ['required', Rule::in(Cart::pluck('id'))],
            'payment_method' => ['required', Rule::in(PaymentMethodEnum::cases())],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('site/auth/profile.required_valid'),
            'name.string' => __('site/auth/profile.string_valid'),
            'name.min' => __('site/auth/profile.min_valid'),
            'email.required' => __('site/auth/profile.required_valid'),
            'email.email' => __('admin/settings/general/index.email_valid'),
            'phone.required' => __('admin/auth/profile.required_valid'),
            'phone.numeric' => __('admin/settings/general/index.numeric_valid'),
            'country_id.required' => __('site/auth/profile.required_valid'),
            'country_id.rule' => __('admin/slider/edit.valid_rule'),
            'city_id.required' => __('site/auth/profile.required_valid'),
            'city_id.rule' => __('admin/slider/edit.valid_rule'),
            'state_id.required' => __('site/auth/profile.required_valid'),
            'state_id.rule' => __('admin/slider/edit.valid_rule'),
            'address.required' => __('site/auth/profile.required_valid'),
            'address.string' => __('site/auth/profile.string_valid'),
            'address.min' => __('site/auth/profile.min_valid'),
            'payment_method.required' => __('site/auth/profile.required_valid'),
            'payment_method.rule' => __('admin/slider/edit.valid_rule'),
        ];
    }
}
