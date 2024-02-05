<?php

namespace App\Http\Requests\Web\Site\Cart;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use App\Models\ProductColors;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'id' => ['required', Rule::in(Product::where('status', ProductStatusEnum::ACTIVE->value)->pluck('id')), 'numeric'],
            'color_id' => ['required', Rule::in(ProductColors::pluck('id')), 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
}
