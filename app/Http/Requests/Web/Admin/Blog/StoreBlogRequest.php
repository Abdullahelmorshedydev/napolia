<?php

namespace App\Http\Requests\Web\Admin\Blog;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title_en' => ['required', 'string', Rule::unique('blogs', 'title->en'), 'min:3', 'max:50'],
            'title_ar' => ['required', 'string', Rule::unique('blogs', 'title->ar'), 'min:3', 'max:50'],
            'article_en' => ['required', 'string', 'min:3', 'max:5000'],
            'article_ar' => ['required', 'string', 'min:3', 'max:5000'],
            'image' => ['required', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' => __('admin/blog/create.valid_required'),
            'title_en.string' => __('admin/blog/create.valid_string'),
            'title_en.unique' => __('admin/blog/create.valid_uinque'),
            'title_en.min' => __('admin/blog/create.valid_min'),
            'title_en.max' => __('admin/blog/create.valid_max'),
            'title_ar.required' => __('admin/blog/create.valid_required'),
            'title_ar.string' => __('admin/blog/create.valid_string'),
            'title_ar.unique' => __('admin/blog/create.valid_uinque'),
            'title_ar.min' => __('admin/blog/create.valid_min'),
            'title_ar.max' => __('admin/blog/create.valid_max'),
            'article_en.required' => __('admin/blog/create.valid_required'),
            'article_en.string' => __('admin/blog/create.valid_string'),
            'article_en.min' => __('admin/blog/create.valid_min'),
            'article_en.max' => __('admin/blog/create.valid_max'),
            'article_ar.required' => __('admin/blog/create.valid_required'),
            'article_ar.string' => __('admin/blog/create.valid_string'),
            'article_ar.min' => __('admin/blog/create.valid_min'),
            'article_ar.max' => __('admin/blog/create.valid_max'),
            'image.required' => __('admin/blog/create.valid_required'),
            'image.image' => __('admin/blog/create.valid_image'),
            'image.mimetype' => __('admin/blog/create.valid_mimetype'),
            'image.mimes' => __('admin/blog/create.valid_mimes'),
        ];
    }
}
