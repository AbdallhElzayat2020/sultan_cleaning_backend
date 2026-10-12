<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $postId = $this->route('post') ? $this->route('post')->id : null;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug,'.$postId],
            'category' => ['required', 'string', 'max:100'],
            'category_icon' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'reading_time' => ['nullable', 'string', 'max:50'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
            'published_at' => ['nullable', 'date'],
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
            'title' => 'عنوان المقال',
            'slug' => 'رابط المقال (Slug)',
            'category' => 'تصنيف المقال',
            'category_icon' => 'أيقونة التصنيف',
            'image' => 'صورة المقال الرئيسية',
            'short_description' => 'الوصف المختصر',
            'content' => 'محتوى المقال (التفاصيل)',
            'reading_time' => 'وقت القراءة المقدر',
            'meta_title' => 'عنوان السيو (Meta Title)',
            'meta_description' => 'وصف السيو (Meta Description)',
            'meta_keywords' => 'الكلمات المفتاحية (Meta Keywords)',
            'status' => 'الحالة',
            'order' => 'الترتيب',
            'published_at' => 'تاريخ النشر',
        ];
    }
}
