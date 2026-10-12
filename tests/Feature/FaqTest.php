<?php

use App\Models\Faq;
use App\Models\User;

test('frontend home page displays active faqs', function () {
    $activeFaq = Faq::factory()->create([
        'question' => 'كيف يمكنني حجز موعد لخدمات التنظيف؟',
        'answer' => 'يمكنك الحجز بسهولة عبر نموذج الموقع أو التواصل المباشر عبر الواتساب.',
        'status' => true,
    ]);

    $inactiveFaq = Faq::factory()->create([
        'question' => 'سؤال غير مفعل ومخفي',
        'answer' => 'إجابة مخفية لا تظهر.',
        'status' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('كيف يمكنني حجز موعد لخدمات التنظيف؟');
    $response->assertSee('يمكنك الحجز بسهولة عبر نموذج الموقع');
    $response->assertDontSee('سؤال غير مفعل ومخفي');
});

test('guest cannot access admin faqs section', function () {
    $response = $this->get(route('admin.faqs.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view faqs index page', function () {
    $user = User::factory()->create();
    $faq = Faq::factory()->create([
        'question' => 'ما هي أوقات العمل لديكم؟',
    ]);

    $response = $this->actingAs($user)->get(route('admin.faqs.index'));

    $response->assertOk();
    $response->assertSee('ما هي أوقات العمل لديكم؟');
    $response->assertSee('إدارة الأسئلة الشائعة');
});

test('admin can view faq create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.faqs.create'));

    $response->assertOk();
    $response->assertSee('إضافة سؤال شائع جديد');
});

test('admin can store a new faq', function () {
    $user = User::factory()->create();

    $data = [
        'question' => 'هل تقدمون عقود تنظيف دورية للمكاتب والشركات؟',
        'answer' => 'نعم، نوفر عقود نظافة أسبوعية وشهرية وسنوية مخصصة للشركات والمنشآت التجارية.',
        'status' => '1',
        'order' => 1,
    ];

    $response = $this->actingAs($user)->post(route('admin.faqs.store'), $data);

    $response->assertRedirect(route('admin.faqs.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('faqs', [
        'question' => 'هل تقدمون عقود تنظيف دورية للمكاتب والشركات؟',
        'status' => 1,
    ]);
});

test('admin can view faq edit page', function () {
    $user = User::factory()->create();
    $faq = Faq::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.faqs.edit', $faq));

    $response->assertOk();
    $response->assertSee($faq->question);
});

test('admin can update a faq', function () {
    $user = User::factory()->create();
    $faq = Faq::factory()->create([
        'question' => 'السؤال القديم',
    ]);

    $response = $this->actingAs($user)->put(route('admin.faqs.update', $faq), [
        'question' => 'السؤال الجديد المحدث',
        'answer' => 'إجابة جديدة ومحدثة بالكامل.',
        'status' => '1',
        'order' => 2,
    ]);

    $response->assertRedirect(route('admin.faqs.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('faqs', [
        'id' => $faq->id,
        'question' => 'السؤال الجديد المحدث',
    ]);
});

test('admin can delete a faq', function () {
    $user = User::factory()->create();
    $faq = Faq::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.faqs.destroy', $faq));

    $response->assertRedirect(route('admin.faqs.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('faqs', [
        'id' => $faq->id,
    ]);
});
