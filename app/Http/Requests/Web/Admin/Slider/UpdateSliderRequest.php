<?php

namespace App\Http\Requests\Web\Admin\Slider;

use App\Enums\SliderStatusEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
        $status = SliderStatusEnum::cases();
        return [
            'image' => ['nullable', 'image', 'mimetypes:image/png,image/jpg,image/jpeg', 'mimes:png,jpg,jpeg'],
            'status' => ['nullable', Rule::in($status)],
        ];
    }

    public function messages()
    {
        return [
            'image.image' => __('admin/slider/edit.valid_image'),
            'image.mimetype' => __('admin/slider/edit.valid_mimetype'),
            'image.mimes' => __('admin/slider/edit.valid_mimes'),
            'status.rule' => __('admin/slider/edit.valid_rule'),
        ];
    }
}
