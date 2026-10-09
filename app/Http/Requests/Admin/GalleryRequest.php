<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isCreate = $this->isMethod('post');

        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'category_icon' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => [$isCreate ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'عنوان العمل / المشروع',
            'category' => 'التصنيف',
            'category_icon' => 'أيقونة التصنيف',
            'location' => 'الموقع / الحي',
            'image' => 'صورة المشروع الرئيسية',
            'description' => 'وصف وتفاصيل العمل',
            'status' => 'الحالة',
            'order' => 'الترتيب',
        ];
    }
}
