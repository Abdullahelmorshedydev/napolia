<?php

namespace App\Http\Requests\Web\Admin\Product;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $condition = Product::$condition;
        $status = Product::$status;
        return [
            'name' => ['required', 'string', 'unique:products,name,' . $this->id, 'min:3', 'max:50'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'condition' => ['nullable', Rule::in($condition)],
            'status' => ['nullable', Rule::in($status)],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'sub_category_id' => ['required', 'exists:categories,id'],
            'image_id_1' => ['required'],
            'image_id_2' => ['required'],
            'image_id_3' => ['required'],
            'image_id_4' => ['required'],
            'image_1' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_2' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_3' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'image_4' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('admin/product/create.valid_required'),
            'name.string' => __('admin/product/create.valid_string'),
            'name.unique' => __('admin/product/create.valid_uinque'),
            'name.min' => __('admin/product/create.valid_min'),
            'name.max' => __('admin/product/create.valid_max'),
            'description.required' => __('admin/product/create.valid_required'),
            'description.string' => __('admin/product/create.valid_string'),
            'price.required' => __('admin/product/create.valid_required'),
            'price.numeric' => __('admin/product/create.valid_numeric'),
            'discount.numeric' => __('admin/product/create.valid_numeric'),
            'condition.rule' => __('admin/product/create.valid_rule'),
            'status.rule' => __('admin/product/create.valid_rule'),
            'quantity.required' => __('admin/product/create.valid_required'),
            'quantity.numeric' => __('admin/product/create.valid_numeric'),
            'category_id.required' => __('admin/product/create.valid_required'),
            'category_id.exists' => __('admin/product/create.valid_exists'),
            'sub_category_id.required' => __('admin/product/create.valid_required'),
            'sub_category_id.exists' => __('admin/product/create.valid_exists'),
            'image_1.image' => __('admin/product/create.valid_image'),
            'image_1.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_1.mimes' => __('admin/product/create.valid_mimes'),
            'image_2.image' => __('admin/product/create.valid_image'),
            'image_2.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_2.mimes' => __('admin/product/create.valid_mimes'),
            'image_3.image' => __('admin/product/create.valid_image'),
            'image_3.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_3.mimes' => __('admin/product/create.valid_mimes'),
            'image_4.image' => __('admin/product/create.valid_image'),
            'image_4.mimetype' => __('admin/product/create.valid_mimetype'),
            'image_4.mimes' => __('admin/product/create.valid_mimes'),
        ];
    }
}
