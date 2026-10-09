<?php

use App\Models\User;
use App\Models\WhyChooseUs;

test('frontend home page displays active why choose us items', function () {
    $activeItem = WhyChooseUs::factory()->create([
        'title' => 'خدمة تنظيف متميزة',
        'status' => true,
    ]);

    $inactiveItem = WhyChooseUs::factory()->create([
        'title' => 'ميزة غير مفعلة مخفية',
        'status' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('خدمة تنظيف متميزة');
    $response->assertDontSee('ميزة غير مفعلة مخفية');
});

test('guest cannot access admin why choose us section', function () {
    $response = $this->get(route('admin.why-choose-us.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view why choose us index list', function () {
    $user = User::factory()->create();
    $item = WhyChooseUs::factory()->create([
        'title' => 'جودة عالمية معتمدة',
    ]);

    $response = $this->actingAs($user)->get(route('admin.why-choose-us.index'));

    $response->assertOk();
    $response->assertSee('جودة عالمية معتمدة');
    $response->assertSee('لماذا سلطان كلين؟');
});

test('admin can view why choose us create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.why-choose-us.create'));

    $response->assertOk();
    $response->assertSee('إضافة ميزة جديدة');
});

test('admin can store a new why choose us feature', function () {
    $user = User::factory()->create();

    $data = [
        'icon' => 'fa-solid fa-sparkles',
        'title' => 'تعقيم شامل بأحدث التقنيات',
        'description' => 'نستخدم تقنيات حديثة لتعقيم كافة المساحات بدقة عالية وأمان.',
        'status' => '1',
        'order' => 1,
    ];

    $response = $this->actingAs($user)->post(route('admin.why-choose-us.store'), $data);

    $response->assertRedirect(route('admin.why-choose-us.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('why_choose_us', [
        'title' => 'تعقيم شامل بأحدث التقنيات',
        'icon' => 'fa-solid fa-sparkles',
        'status' => 1,
    ]);
});

test('admin can view why choose us edit page', function () {
    $user = User::factory()->create();
    $item = WhyChooseUs::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.why-choose-us.edit', $item));

    $response->assertOk();
    $response->assertSee($item->title);
});

test('admin can update a why choose us feature', function () {
    $user = User::factory()->create();
    $item = WhyChooseUs::factory()->create([
        'title' => 'العنوان القديم',
    ]);

    $response = $this->actingAs($user)->put(route('admin.why-choose-us.update', $item), [
        'icon' => 'fa-solid fa-check',
        'title' => 'العنوان المحدث الجديد',
        'description' => 'وصف محدث عالي الدقة.',
        'status' => '1',
        'order' => 5,
    ]);

    $response->assertRedirect(route('admin.why-choose-us.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('why_choose_us', [
        'id' => $item->id,
        'title' => 'العنوان المحدث الجديد',
        'icon' => 'fa-solid fa-check',
    ]);
});

test('admin can delete a why choose us feature', function () {
    $user = User::factory()->create();
    $item = WhyChooseUs::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.why-choose-us.destroy', $item));

    $response->assertRedirect(route('admin.why-choose-us.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('why_choose_us', [
        'id' => $item->id,
    ]);
});
