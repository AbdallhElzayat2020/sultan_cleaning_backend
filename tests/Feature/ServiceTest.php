<?php

use App\Models\Service;
use App\Models\User;

test('frontend home page displays active services', function () {
    $activeService = Service::factory()->create([
        'title' => 'خدمة تنظيف الخزانات المتميزة',
        'status' => true,
    ]);

    $inactiveService = Service::factory()->create([
        'title' => 'خدمة غير مفعلة مخفية',
        'status' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('خدمة تنظيف الخزانات المتميزة');
    $response->assertDontSee('خدمة غير مفعلة مخفية');
});

test('guest cannot access admin services section', function () {
    $response = $this->get(route('admin.services.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view services index page', function () {
    $user = User::factory()->create();
    $service = Service::factory()->create([
        'title' => 'تنظيف المسابح والحدائق',
    ]);

    $response = $this->actingAs($user)->get(route('admin.services.index'));

    $response->assertOk();
    $response->assertSee('تنظيف المسابح والحدائق');
    $response->assertSee('إدارة خدماتنا');
});

test('admin can view service create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.services.create'));

    $response->assertOk();
    $response->assertSee('إضافة خدمة جديدة');
});

test('admin can store a new service', function () {
    $user = User::factory()->create();

    $data = [
        'title' => 'خدمة جلي وتلميع الرخام',
        'slug' => 'marble-polishing',
        'icon' => 'fa-solid fa-gem',
        'discount' => 'عرض خاص لفترة محدودة',
        'short_description' => 'جلي وتلميع الرخام والجرانيت بأقراص الألماس الإيطالية.',
        'description' => '<p>تفاصيل خدمة جلي الرخام وإعادة لمعانه كأنه جديد تماماً.</p>',
        'status' => '1',
        'order' => 1,
    ];

    $response = $this->actingAs($user)->post(route('admin.services.store'), $data);

    $response->assertRedirect(route('admin.services.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('services', [
        'title' => 'خدمة جلي وتلميع الرخام',
        'slug' => 'marble-polishing',
        'icon' => 'fa-solid fa-gem',
        'discount' => 'عرض خاص لفترة محدودة',
        'status' => 1,
    ]);
});

test('admin can view service edit page', function () {
    $user = User::factory()->create();
    $service = Service::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.services.edit', $service));

    $response->assertOk();
    $response->assertSee($service->title);
});

test('admin can update a service', function () {
    $user = User::factory()->create();
    $service = Service::factory()->create([
        'title' => 'العنوان القديم للخدمة',
    ]);

    $response = $this->actingAs($user)->put(route('admin.services.update', $service), [
        'title' => 'العنوان الجديد المعدل',
        'slug' => 'new-service-slug',
        'icon' => 'fa-solid fa-star',
        'short_description' => 'وصف مختصر معدل للخدمة.',
        'description' => '<p>وصف كامل معدل للخدمة.</p>',
        'status' => '1',
        'order' => 3,
    ]);

    $response->assertRedirect(route('admin.services.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'title' => 'العنوان الجديد المعدل',
        'slug' => 'new-service-slug',
    ]);
});

test('admin can delete a service', function () {
    $user = User::factory()->create();
    $service = Service::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.services.destroy', $service));

    $response->assertRedirect(route('admin.services.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('services', [
        'id' => $service->id,
    ]);
});

test('admin can store and update service with seo metadata', function () {
    $user = User::factory()->create();

    $storeData = [
        'title' => 'خدمة مكافحة النمل الأبيض',
        'slug' => 'termite-control',
        'icon' => 'fa-solid fa-bug',
        'short_description' => 'أفضل حلول مكافحة النمل الأبيض بضمان معتمد.',
        'description' => '<p>محتوى تفصيلي لمكافحة الآفات والحشرات بضمان 10 سنوات.</p>',
        'meta_title' => 'أفضل شركة مكافحة نمل أبيض بجده | سين ياء',
        'meta_description' => 'تخلص نهائياً من النمل الأبيض مع شركة سين ياء بأحدث مبيدات وتقنيات الحقن.',
        'meta_keywords' => 'مكافحة نمل ابيض, رش مبيدات, سين ياء',
        'status' => '1',
    ];

    $response = $this->actingAs($user)->post(route('admin.services.store'), $storeData);
    $response->assertRedirect(route('admin.services.index'));

    $service = Service::where('slug', 'termite-control')->firstOrFail();
    expect($service->meta_title)->toBe('أفضل شركة مكافحة نمل أبيض بجده | سين ياء')
        ->and($service->seo_title)->toBe('أفضل شركة مكافحة نمل أبيض بجده | سين ياء')
        ->and($service->seo_description)->toBe('تخلص نهائياً من النمل الأبيض مع شركة سين ياء بأحدث مبيدات وتقنيات الحقن.')
        ->and($service->seo_keywords)->toBe('مكافحة نمل ابيض, رش مبيدات, سين ياء');

    // Test fallback when meta fields are null
    $serviceWithFallback = Service::factory()->create([
        'title' => 'تنظيف واجهات المباني',
        'short_description' => 'تنظيف الواجهات الزجاجية والحجرية للمباني العالية.',
        'meta_title' => null,
        'meta_description' => null,
        'meta_keywords' => null,
    ]);

    expect($serviceWithFallback->seo_title)->toContain('تنظيف واجهات المباني')
        ->and($serviceWithFallback->seo_description)->toBe('تنظيف الواجهات الزجاجية والحجرية للمباني العالية.')
        ->and($serviceWithFallback->seo_keywords)->toContain('تنظيف واجهات المباني');
});
