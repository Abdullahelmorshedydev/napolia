<?php

namespace App\Http\Requests\Web\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name_en' => ['required', 'string', 'unique:categories,name', 'min:3', 'max:50'],
            'name_ar' => ['required', 'string', 'unique:categories,name', 'min:3', 'max:50'],
            'category_id' => ['nullable','exists:categories,id'],
            'image' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/category/create.valid_required'),
            'name_en.string' => __('admin/category/create.valid_string'),
            'name_en.unique' => __('admin/category/create.valid_uinque'),
            'name_en.min' => __('admin/category/create.valid_min'),
            'name_en.max' => __('admin/category/create.valid_max'),
            'name_ar.required' => __('admin/category/create.valid_required'),
            'name_ar.string' => __('admin/category/create.valid_string'),
            'name_ar.unique' => __('admin/category/create.valid_uinque'),
            'name_ar.min' => __('admin/category/create.valid_min'),
            'name_ar.max' => __('admin/category/create.valid_max'),
            'category_id.exists' => __('admin/category/create.valid_exists'),
            'image.required' => __('admin/category/create.valid_required'),
            'image.image' => __('admin/category/create.valid_image'),
            'image.mimetype' => __('admin/category/create.valid_mimetype'),
            'image.mimes' => __('admin/category/create.valid_mimes'),
        ];
    }
}
