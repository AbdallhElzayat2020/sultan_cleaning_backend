<?php

use App\Models\Service;
use App\Models\WhyChooseUs;

test('frontend services index page can be rendered with active services', function () {
    $activeService = Service::factory()->create([
        'title' => 'خدمة تنظيف الفلل بالبخار',
        'slug' => 'villas-steam-cleaning',
        'status' => true,
    ]);

    $inactiveService = Service::factory()->create([
        'title' => 'خدمة صيانة قديمة ملغاة',
        'slug' => 'old-service',
        'status' => false,
    ]);

    $feature = WhyChooseUs::factory()->create([
        'title' => 'أحدث أجهزة البخار الحار',
        'status' => true,
    ]);

    $response = $this->get(route('services.index'));

    $response->assertOk();
    $response->assertSee('خدمة تنظيف الفلل بالبخار');
    $response->assertSee('أحدث أجهزة البخار الحار');
    $response->assertDontSee('خدمة صيانة قديمة ملغاة');
});

test('frontend service details page can be rendered for active service by slug', function () {
    $service = Service::factory()->create([
        'title' => 'تنظيف الكنب والمجالس بالبخار',
        'slug' => 'sofa-steam-cleaning',
        'short_description' => 'إزالة تامة للبقع مع تعطير فندقي يدوم طويلاً.',
        'description' => '<p>شرح كامل ومفصل لخدمة غسيل الكنب والمجالس بأحدث الطرق الآمنة.</p>',
        'status' => true,
    ]);

    $response = $this->get(route('services.show', $service->slug));

    $response->assertOk();
    $response->assertSee('تنظيف الكنب والمجالس بالبخار');
    $response->assertSee('إزالة تامة للبقع مع تعطير فندقي يدوم طويلاً.');
    $response->assertSee('شرح كامل ومفصل لخدمة غسيل الكنب والمجالس');
});

test('frontend service details page returns 404 for inactive service', function () {
    $service = Service::factory()->create([
        'title' => 'خدمة مؤرشفة',
        'slug' => 'archived-service',
        'status' => false,
    ]);

    $response = $this->get(route('services.show', $service->slug));

    $response->assertNotFound();
});

test('frontend service details page displays custom discount when present', function () {
    $serviceWithDiscount = Service::factory()->create([
        'title' => 'خدمة مع خصم خاص',
        'slug' => 'discounted-service',
        'discount' => 'خصم 40% لفترة محدودة',
        'status' => true,
    ]);

    $serviceWithoutDiscount = Service::factory()->create([
        'title' => 'خدمة بدون أي خصم',
        'slug' => 'no-discount-service',
        'discount' => null,
        'status' => true,
    ]);

    $response1 = $this->get(route('services.show', $serviceWithDiscount->slug));
    $response1->assertOk();
    $response1->assertSee('خصم 40% لفترة محدودة');

    $response2 = $this->get(route('services.show', $serviceWithoutDiscount->slug));
    $response2->assertOk();
    $response2->assertDontSee('خصم 40% لفترة محدودة');
});
