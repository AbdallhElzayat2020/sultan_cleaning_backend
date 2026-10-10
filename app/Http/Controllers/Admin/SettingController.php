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
            'top_bar_badge' => ['nullable', 'string', 'max:100'],
            'top_bar_discount' => ['nullable', 'string', 'max:50'],
            'top_bar_text' => ['nullable', 'string', 'max:255'],
            'top_bar_phone' => ['nullable', 'string', 'max:50'],
            'top_bar_whatsapp' => ['nullable', 'string', 'max:50'],
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
