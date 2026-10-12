<?php

use App\Models\Post;
use App\Models\User;

test('frontend home page displays active blog posts', function () {
    $activePost = Post::factory()->create([
        'title' => 'مقال مميز عن نظافة المنازل',
        'category' => 'نصائح الخبراء',
        'status' => true,
    ]);

    $inactivePost = Post::factory()->create([
        'title' => 'مقال غير منشور ومخفي',
        'status' => false,
    ]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('مقال مميز عن نظافة المنازل');
    $response->assertDontSee('مقال غير منشور ومخفي');
});

test('guest cannot access admin posts section', function () {
    $response = $this->get(route('admin.posts.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view posts index page', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create([
        'title' => 'طرق تعقيم الخزانات الأرضية',
    ]);

    $response = $this->actingAs($user)->get(route('admin.posts.index'));

    $response->assertOk();
    $response->assertSee('طرق تعقيم الخزانات الأرضية');
    $response->assertSee('إدارة مقالات المدونة');
});

test('admin can view post create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.posts.create'));

    $response->assertOk();
    $response->assertSee('إضافة مقال جديد للمدونة');
});

test('admin can store a new post', function () {
    $user = User::factory()->create();

    $data = [
        'title' => 'نصائح مهمة لجلي وتلميع الرخام',
        'slug' => 'marble-polishing-tips',
        'category' => 'دليل المنازل',
        'category_icon' => 'fa-solid fa-gem',
        'short_description' => 'وصف مختصر لأهم النصائح للحفاظ على الرخام.',
        'content' => '<p>محتوى المقال التفصيلي مع التنسيقات الغنية.</p>',
        'reading_time' => '4 دقائق قراءة',
        'status' => '1',
        'order' => 1,
        'published_at' => date('Y-m-d'),
    ];

    $response = $this->actingAs($user)->post(route('admin.posts.store'), $data);

    $response->assertRedirect(route('admin.posts.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('posts', [
        'title' => 'نصائح مهمة لجلي وتلميع الرخام',
        'slug' => 'marble-polishing-tips',
        'status' => 1,
    ]);
});

test('admin can view post edit page', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.posts.edit', $post));

    $response->assertOk();
    $response->assertSee($post->title);
});

test('admin can update a post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create([
        'title' => 'العنوان القديم للمقال',
    ]);

    $response = $this->actingAs($user)->put(route('admin.posts.update', $post), [
        'title' => 'العنوان الجديد المعدل للمقال',
        'slug' => 'new-updated-post-slug',
        'category' => 'صحة وسلامة',
        'category_icon' => 'fa-solid fa-shield-halved',
        'short_description' => 'وصف مختصر معدل.',
        'content' => '<p>محتوى معدل ومطور بالكامل.</p>',
        'reading_time' => '6 دقائق قراءة',
        'status' => '1',
        'order' => 2,
        'published_at' => date('Y-m-d'),
    ]);

    $response->assertRedirect(route('admin.posts.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'العنوان الجديد المعدل للمقال',
        'slug' => 'new-updated-post-slug',
    ]);
});

test('admin can delete a post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.posts.destroy', $post));

    $response->assertRedirect(route('admin.posts.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('posts', [
        'id' => $post->id,
    ]);
});

test('admin can store and update post with seo metadata', function () {
    $user = User::factory()->create();

    $storeData = [
        'title' => 'أسرار تنظيف الكنب والمجالس من البقع المستعصية',
        'slug' => 'sofa-cleaning-secrets',
        'category' => 'نصائح التنظيف',
        'category_icon' => 'fa-solid fa-couch',
        'short_description' => 'دليل شامل لإزالة البقع المستعصية والحفاظ على قماش الكنب.',
        'content' => '<p>محتوى المقال الكامل بالتفصيل.</p>',
        'meta_title' => 'أفضل نصائح لتنظيف الكنب والمجالس | شركة سين ياء',
        'meta_description' => 'تعرف على أفضل الطرق المنزلية والمهنية لتنظيف الكنب والمجالس وإزالة أصعب البقع بدون بهتان.',
        'meta_keywords' => 'تنظيف كنب, غسيل مجالس, ازالة بقع الكنب, سين ياء',
        'reading_time' => '5 دقائق',
        'status' => '1',
    ];

    $response = $this->actingAs($user)->post(route('admin.posts.store'), $storeData);
    $response->assertRedirect(route('admin.posts.index'));

    $post = Post::where('slug', 'sofa-cleaning-secrets')->firstOrFail();
    expect($post->meta_title)->toBe('أفضل نصائح لتنظيف الكنب والمجالس | شركة سين ياء')
        ->and($post->seo_title)->toBe('أفضل نصائح لتنظيف الكنب والمجالس | شركة سين ياء')
        ->and($post->seo_description)->toBe('تعرف على أفضل الطرق المنزلية والمهنية لتنظيف الكنب والمجالس وإزالة أصعب البقع بدون بهتان.')
        ->and($post->seo_keywords)->toBe('تنظيف كنب, غسيل مجالس, ازالة بقع الكنب, سين ياء');

    // Test fallback when meta fields are null
    $postWithFallback = Post::factory()->create([
        'title' => 'دليل تعقيم مياه الخزانات الدورية',
        'short_description' => 'أهمية تعقيم خزانات المياه وكيفية الوقاية من البكتيريا.',
        'meta_title' => null,
        'meta_description' => null,
        'meta_keywords' => null,
    ]);

    expect($postWithFallback->seo_title)->toContain('دليل تعقيم مياه الخزانات الدورية')
        ->and($postWithFallback->seo_description)->toBe('أهمية تعقيم خزانات المياه وكيفية الوقاية من البكتيريا.')
        ->and($postWithFallback->seo_keywords)->toContain('دليل تعقيم مياه الخزانات الدورية');
});
