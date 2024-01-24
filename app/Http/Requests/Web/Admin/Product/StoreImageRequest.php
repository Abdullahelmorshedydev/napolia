<?php

namespace App\Http\Requests\Web\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'image.required' => __('admin/product/edit.valid_required'),
            'image.image' => __('admin/product/edit.valid_image'),
            'image.mimetype' => __('admin/product/edit.valid_mimetype'),
            'image.mimes' => __('admin/product/edit.valid_mimes'),
        ];
    }
}
