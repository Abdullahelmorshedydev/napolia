<?php

namespace App\Http\Requests\Web\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCommentRequest extends FormRequest
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
            'blog_id' => ['required', 'numeric', 'exists:blogs,id'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'comment' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'blog_id.required' => __('site/auth/profile.required_valid'),
            'blog_id.exists' => __('site/auth/profile.exists_valid'),
            'name.required' => __('site/auth/profile.required_valid'),
            'name.string' => __('site/auth/profile.string_valid'),
            'email.required' => __('site/auth/profile.required_valid'),
            'email.email' => __('admin/settings/general/index.email_valid'),
            'comment.required' => __('site/auth/profile.required_valid'),
            'comment.string' => __('site/auth/profile.string_valid'), 
        ];
    }
}
