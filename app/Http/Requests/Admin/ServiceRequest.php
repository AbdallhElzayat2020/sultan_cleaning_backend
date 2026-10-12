<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $serviceId = $this->route('service')?->id ?? $this->route('service');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:services,slug,'.$serviceId],
            'icon' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
            'discount' => ['nullable', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', 'boolean'],
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
            'title' => 'اسم الخدمة',
            'slug' => 'الرابط الدائم (Slug)',
            'icon' => 'الأيقونة',
            'image' => 'صورة الخدمة',
            'discount' => 'شارة / نسبة الخصم',
            'short_description' => 'الوصف المختصر',
            'description' => 'التفاصيل الكاملة',
            'meta_title' => 'عنوان السيو (Meta Title)',
            'meta_description' => 'وصف السيو (Meta Description)',
            'meta_keywords' => 'الكلمات المفتاحية (Meta Keywords)',
            'status' => 'الحالة',
            'order' => 'الترتيب',
        ];
    }
}
