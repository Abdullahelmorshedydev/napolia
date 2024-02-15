<?php

namespace App\Http\Requests\Web\Site;

use App\Models\Cart;
use App\Models\City;
use App\Models\State;
use App\Models\Coupon;
use App\Models\Country;
use Illuminate\Validation\Rule;
use App\Enums\PaymentMethodEnum;
use Illuminate\Foundation\Http\FormRequest;

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
            'phone' => ['required', 'numeric'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'state_id' => ['required', 'exists:states,id'],
            'address' => ['required', 'string', 'min:5'],
            'shipping_price' => ['required', 'numeric'],
            'coupon' => ['nullable', function ($attribte, $value, $fail) {
                $coupon = Coupon::where('code', $value)->first();
                if (!isset($coupon)) {
                    $fail(__('site/order.coupon_valid'));
                } else {
                    if ($coupon->max_usage <= $coupon->number_of_usage && $coupon->expire_date <= now() && $coupon->min_order_value > request()->input('total')) {
                        $fail(__('site/order.coupon_valid'));
                    }
                }
            }],
            'total' => ['required', 'numeric'],
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
