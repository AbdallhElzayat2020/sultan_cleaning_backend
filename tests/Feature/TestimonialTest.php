<?php

use App\Models\Testimonial;
use App\Models\User;

test('frontend home page displays active testimonials', function () {
    $activeTestimonial = Testimonial::factory()->create([
        'name' => 'خالد بن سلطان المتميز',
        'city' => 'جده - حي النرجس',
        'review' => 'خدمة ممتازة جداً وشغل يشهد له بالأمانة والإتقان.',
        'status' => true,
    ]);

    $inactiveTestimonial = Testimonial::factory()->create([
        'name' => 'عميل غير مفعل مخفي',
        'review' => 'تقييم غير مفعل لا يجب أن يظهر في الصفحة الرئيسية.',
        'status' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('خالد بن سلطان المتميز');
    $response->assertSee('جده - حي النرجس');
    $response->assertDontSee('عميل غير مفعل مخفي');
});

test('guest cannot access admin testimonials section', function () {
    $response = $this->get(route('admin.testimonials.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view testimonials index page', function () {
    $user = User::factory()->create();
    $testimonial = Testimonial::factory()->create([
        'name' => 'عبدالله المنصور',
    ]);

    $response = $this->actingAs($user)->get(route('admin.testimonials.index'));

    $response->assertOk();
    $response->assertSee('عبدالله المنصور');
    $response->assertSee('إدارة آراء وتجارب العملاء');
});

test('admin can view testimonial create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.testimonials.create'));

    $response->assertOk();
    $response->assertSee('إضافة تقييم / رأي عميل جديد');
});

test('admin can store a new testimonial', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'محمد بن راشد',
        'city' => 'جده - حي الياسمين',
        'rating' => 5,
        'review' => 'تجربة رائعة مع شركة سلطان كلين، جلي الرخام وتنظيف المجالس ممتاز جداً.',
        'status' => '1',
        'order' => 1,
    ];

    $response = $this->actingAs($user)->post(route('admin.testimonials.store'), $data);

    $response->assertRedirect(route('admin.testimonials.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('testimonials', [
        'name' => 'محمد بن راشد',
        'city' => 'جده - حي الياسمين',
        'rating' => 5,
        'status' => 1,
    ]);
});

test('admin can view testimonial edit page', function () {
    $user = User::factory()->create();
    $testimonial = Testimonial::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.testimonials.edit', $testimonial));

    $response->assertOk();
    $response->assertSee($testimonial->name);
});

test('admin can update a testimonial', function () {
    $user = User::factory()->create();
    $testimonial = Testimonial::factory()->create([
        'name' => 'الاسم القديم للعميل',
    ]);

    $response = $this->actingAs($user)->put(route('admin.testimonials.update', $testimonial), [
        'name' => 'الاسم الجديد المعدل للعميل',
        'city' => 'جده - حي الملقا',
        'rating' => 5,
        'review' => 'رأي معدل وتجربة محسنة مع خدمة تنظيف الخزانات.',
        'status' => '1',
        'order' => 2,
    ]);

    $response->assertRedirect(route('admin.testimonials.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('testimonials', [
        'id' => $testimonial->id,
        'name' => 'الاسم الجديد المعدل للعميل',
        'city' => 'جده - حي الملقا',
    ]);
});

test('admin can delete a testimonial', function () {
    $user = User::factory()->create();
    $testimonial = Testimonial::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.testimonials.destroy', $testimonial));

    $response->assertRedirect(route('admin.testimonials.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('testimonials', [
        'id' => $testimonial->id,
    ]);
});
