<?php

use App\Models\Setting;
use App\Models\User;

test('guest cannot access settings page', function () {
    $response = $this->get(route('admin.settings.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view settings page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.settings.index'));

    $response->assertOk();
    $response->assertSee('شريط العرض والإعلان العلوي');
    $response->assertSee('تفعيل وإظهار شريط العرض في أعلى الموقع');
});

test('admin can update top bar announcement settings', function () {
    $user = User::factory()->create();

    $payload = [
        'top_bar_active' => '1',
        'top_bar_badge' => '🔥 عرض الجمعة البيضاء',
        'top_bar_discount' => '50%',
        'top_bar_text' => 'خصم نصف السعر على جميع عقود التنظيف السنوية!',
        'top_bar_phone' => '0599999999',
        'top_bar_whatsapp' => '966599999999',
    ];

    $response = $this->actingAs($user)->put(route('admin.settings.update'), $payload);

    $response->assertRedirect(route('admin.settings.index'));
    $response->assertSessionHas('success');

    expect(setting('top_bar_badge'))->toBe('🔥 عرض الجمعة البيضاء');
    expect(setting('top_bar_discount'))->toBe('50%');
    expect(setting('top_bar_phone'))->toBe('0599999999');
});

test('frontend header displays active offer settings', function () {
    Setting::set('top_bar_active', '1');
    Setting::set('top_bar_badge', '⭐ خصم العيد');
    Setting::set('top_bar_discount', '40%');
    Setting::set('top_bar_text', 'لكل العملاء الجدد');

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('⭐ خصم العيد');
    $response->assertSee('40%');
    $response->assertSee('لكل العملاء الجدد');
});

test('frontend header hides top announcement bar when disabled', function () {
    Setting::set('top_bar_active', '0');
    Setting::set('top_bar_badge', 'عرض مخفي لا يظهر');

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertDontSee('عرض مخفي لا يظهر');
});
