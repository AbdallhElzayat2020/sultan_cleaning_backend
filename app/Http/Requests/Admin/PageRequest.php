<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $pageId = $this->route('page') ? $this->route('page')->id : null;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug,'.$pageId],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'status' => ['nullable', 'boolean'],
            'show_in_footer' => ['nullable', 'boolean'],
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
            'title' => 'عنوان الصفحة',
            'slug' => 'رابط الصفحة (Slug)',
            'content' => 'محتوى الصفحة',
            'excerpt' => 'الوصف المختصر / المقتطف',
            'meta_title' => 'عنوان السيو (Meta Title)',
            'meta_description' => 'وصف السيو (Meta Description)',
            'meta_keywords' => 'الكلمات المفتاحية (Meta Keywords)',
            'status' => 'حالة الصفحة',
            'show_in_footer' => 'الظهور في أسفل الموقع (الفوتر)',
            'order' => 'الترتيب',
        ];
    }
}
