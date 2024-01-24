<?php

namespace App\Http\Requests\Web\Admin\Category;

use App\Enums\CategoryStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $status = CategoryStatusEnum::cases();
        return [
            'name_en' => ['required', 'string', Rule::unique('categories', 'name->en') . $this->id, 'min:3', 'max:50'],
            'name_ar' => ['required', 'string', Rule::unique('categories', 'name->ar') . $this->id, 'min:3', 'max:50'],
            'image' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'status' => [Rule::in($status)],
            'category_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => __('admin/category/edit.valid_required'),
            'name_en.string' => __('admin/category/edit.valid_string'),
            'name_en.unique' => __('admin/category/edit.valid_uinque'),
            'name_en.min' => __('admin/category/edit.valid_min'),
            'name_en.max' => __('admin/category/edit.valid_max'),
            'name_ar.required' => __('admin/category/edit.valid_required'),
            'name_ar.string' => __('admin/category/edit.valid_string'),
            'name_ar.unique' => __('admin/category/edit.valid_uinque'),
            'name_ar.min' => __('admin/category/edit.valid_min'),
            'name_ar.max' => __('admin/category/edit.valid_max'),
            'image.image' => __('admin/category/edit.valid_image'),
            'image.mimetype' => __('admin/category/edit.valid_mimetype'),
            'image.mimes' => __('admin/category/edit.valid_mimes'),
            'status.rule' => __('admin/category/edit.valid_rule'),
            'category_id.exists' => __('admin/category/edit.valid_exists'),
        ];
    }
}
