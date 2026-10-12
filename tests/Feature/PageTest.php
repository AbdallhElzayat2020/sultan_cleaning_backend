<?php

use App\Models\Page;
use App\Models\User;

test('frontend can render active page with seo metadata and increments views', function () {
    $page = Page::factory()->create([
        'title' => 'سياسة الاستبدال والضمان',
        'slug' => 'refund-guarantee',
        'content' => '<h2>بنود الضمان الذهبي</h2><p>نضمن جودة التنظيف لمدة 24 ساعة كاملة بعد الاستلام.</p>',
        'meta_title' => 'سياسة الاستبدال والضمان الذهبي | سين ياء',
        'meta_description' => 'تعرف على تفاصيل وشروط الضمان الذهبي لخدمات التنظيف مع سين ياء.',
        'meta_keywords' => 'ضمان ذهبي, سين ياء, استبدال وتنظيف',
        'status' => true,
        'views' => 5,
    ]);

    $response = $this->get(route('pages.show', $page->slug));

    $response->assertOk();
    $response->assertSee('سياسة الاستبدال والضمان');
    $response->assertSee('بنود الضمان الذهبي');
    $response->assertSee('نضمن جودة التنظيف لمدة 24 ساعة');
    $response->assertSee('<title>سياسة الاستبدال والضمان الذهبي | سين ياء</title>', false);
    $response->assertSee('name="description" content="تعرف على تفاصيل وشروط الضمان الذهبي لخدمات التنظيف مع سين ياء."', false);
    $response->assertSee('"@type": "WebPage"', false);

    // Assert view count incremented
    expect($page->fresh()->views)->toBe(6);
});

test('frontend returns 404 for inactive page', function () {
    $page = Page::factory()->create([
        'title' => 'صفحة مسودة غير منشورة',
        'slug' => 'draft-unpublished-page',
        'status' => false,
    ]);

    $response = $this->get(route('pages.show', $page->slug));

    $response->assertNotFound();
});

test('frontend privacy-policy shortcut route renders seeded privacy page', function () {
    Page::factory()->create([
        'title' => 'سياسة الخصوصية',
        'slug' => 'privacy-policy',
        'status' => true,
    ]);

    $response = $this->get(route('privacy-policy'));

    $response->assertOk();
    $response->assertSee('سياسة الخصوصية');
});

test('guest cannot access admin pages index', function () {
    $response = $this->get(route('admin.pages.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view pages index', function () {
    $user = User::factory()->create();
    $page = Page::factory()->create(['title' => 'صفحة تجريبية للإدارة']);

    $response = $this->actingAs($user)->get(route('admin.pages.index'));

    $response->assertOk();
    $response->assertSee('إدارة الصفحات الثابتة والإضافية');
    $response->assertSee('صفحة تجريبية للإدارة');
});

test('admin can view create page form', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.pages.create'));

    $response->assertOk();
    $response->assertSee('إضافة صفحة جديدة (CMS Page)');
});

test('admin can store a new page with seo metadata and auto-slug', function () {
    $user = User::factory()->create();

    $data = [
        'title' => 'إرشادات الأمن والسلامة المهنية',
        'slug' => 'safety-guidelines',
        'excerpt' => 'إرشادات السلامة المتبعة أثناء تنفيذ أعمال التنظيف.',
        'content' => '<p>يلتزم فريقنا بارتداء معدات الوقاية الشخصية واستخدام مواد صديقة للبيئة.</p>',
        'meta_title' => 'إرشادات السلامة في التنظيف | سين ياء',
        'meta_description' => 'معايير الأمن والسلامة المتبعة في شركة سين ياء للخدمات المنزلية.',
        'meta_keywords' => 'سلامة, تنظيف آمن, سين ياء',
        'status' => '1',
        'show_in_footer' => '1',
        'order' => 5,
    ];

    $response = $this->actingAs($user)->post(route('admin.pages.store'), $data);

    $response->assertRedirect(route('admin.pages.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('pages', [
        'title' => 'إرشادات الأمن والسلامة المهنية',
        'slug' => 'safety-guidelines',
        'meta_title' => 'إرشادات السلامة في التنظيف | سين ياء',
        'status' => 1,
        'show_in_footer' => 1,
        'order' => 5,
    ]);
});

test('admin can view edit page form', function () {
    $user = User::factory()->create();
    $page = Page::factory()->create(['title' => 'صفحة قيد التعديل']);

    $response = $this->actingAs($user)->get(route('admin.pages.edit', $page->id));

    $response->assertOk();
    $response->assertSee('تعديل الصفحة: صفحة قيد التعديل');
});

test('admin can update page details and seo', function () {
    $user = User::factory()->create();
    $page = Page::factory()->create(['title' => 'العنوان القديم']);

    $response = $this->actingAs($user)->put(route('admin.pages.update', $page->id), [
        'title' => 'العنوان المحدث بعد التعديل',
        'slug' => 'updated-page-slug',
        'content' => '<p>محتوى جديد ومعدل بالكامل.</p>',
        'excerpt' => 'ملخص محدث.',
        'meta_title' => 'عنوان سيو محدث | سين ياء',
        'meta_description' => 'وصف سيو محدث وجديد.',
        'meta_keywords' => 'تحديث, سيو, سين ياء',
        'status' => '1',
        'show_in_footer' => '1',
        'order' => 10,
    ]);

    $response->assertRedirect(route('admin.pages.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('pages', [
        'id' => $page->id,
        'title' => 'العنوان المحدث بعد التعديل',
        'slug' => 'updated-page-slug',
        'show_in_footer' => 1,
        'order' => 10,
    ]);
});

test('admin can delete a page', function () {
    $user = User::factory()->create();
    $page = Page::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.pages.destroy', $page->id));

    $response->assertRedirect(route('admin.pages.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('pages', [
        'id' => $page->id,
    ]);
});
