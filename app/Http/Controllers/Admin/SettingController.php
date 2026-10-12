<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index(): View
    {
        $settings = Setting::getAllSettings();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => ['nullable', 'string', 'max:100'],
            'top_bar_badge' => ['nullable', 'string', 'max:100'],
            'top_bar_discount' => ['nullable', 'string', 'max:50'],
            'top_bar_text' => ['nullable', 'string', 'max:255'],
            'top_bar_phone' => ['nullable', 'string', 'max:50'],
            'top_bar_whatsapp' => ['nullable', 'string', 'max:50'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'meta_keywords' => ['nullable', 'string', 'max:1000'],
            'meta_author' => ['nullable', 'string', 'max:100'],
            'canonical_url' => ['nullable', 'string', 'max:255'],

            // Core Static Pages SEO Settings
            'seo_about_title' => ['nullable', 'string', 'max:255'],
            'seo_about_description' => ['nullable', 'string', 'max:1000'],
            'seo_about_keywords' => ['nullable', 'string', 'max:1000'],

            'seo_services_title' => ['nullable', 'string', 'max:255'],
            'seo_services_description' => ['nullable', 'string', 'max:1000'],
            'seo_services_keywords' => ['nullable', 'string', 'max:1000'],

            'seo_gallery_title' => ['nullable', 'string', 'max:255'],
            'seo_gallery_description' => ['nullable', 'string', 'max:1000'],
            'seo_gallery_keywords' => ['nullable', 'string', 'max:1000'],

            'seo_blog_title' => ['nullable', 'string', 'max:255'],
            'seo_blog_description' => ['nullable', 'string', 'max:1000'],
            'seo_blog_keywords' => ['nullable', 'string', 'max:1000'],

            'seo_contact_title' => ['nullable', 'string', 'max:255'],
            'seo_contact_description' => ['nullable', 'string', 'max:1000'],
            'seo_contact_keywords' => ['nullable', 'string', 'max:1000'],
        ]);

        // Toggle handling (unchecked checkbox is not submitted)
        $topBarActive = $request->boolean('top_bar_active') ? '1' : '0';
        Setting::set('top_bar_active', $topBarActive);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'تم تحديث إعدادات الموقع بنجاح');
    }
}
