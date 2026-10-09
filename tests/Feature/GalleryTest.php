<?php

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\UploadedFile;

test('frontend gallery page displays active gallery items', function () {
    $activeGallery = Gallery::factory()->create([
        'title' => 'مشروع جلي وتلميع رخام حي الملقا',
        'category' => 'جلي الرخام',
        'status' => true,
    ]);

    $inactiveGallery = Gallery::factory()->create([
        'title' => 'مشروع غير معروض ومخفي',
        'status' => false,
    ]);

    $response = $this->get(route('gallery'));

    $response->assertOk();
    $response->assertSee('مشروع جلي وتلميع رخام حي الملقا');
    $response->assertDontSee('مشروع غير معروض ومخفي');
});

test('guest cannot access admin galleries section', function () {
    $response = $this->get(route('admin.galleries.index'));

    $response->assertRedirect(route('login'));
});

test('admin can view galleries index page', function () {
    $user = User::factory()->create();
    $gallery = Gallery::factory()->create([
        'title' => 'تنظيف وتعقيم فيلا فاخرة',
    ]);

    $response = $this->actingAs($user)->get(route('admin.galleries.index'));

    $response->assertOk();
    $response->assertSee('تنظيف وتعقيم فيلا فاخرة');
    $response->assertSee('معرض الأعمال والمشاريع');
});

test('admin can view gallery create page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.galleries.create'));

    $response->assertOk();
    $response->assertSee('إضافة مشروع جديد لمعرض الأعمال');
});

test('admin can store a new gallery project', function () {
    $user = User::factory()->create();

    $data = [
        'title' => 'غسيل سجاد بالبخار الحار في حي النرجس',
        'category' => 'غسيل السجاد',
        'category_icon' => 'fa-solid fa-rug',
        'location' => 'حي النرجس - الرياض',
        'image' => UploadedFile::fake()->image('gallery.jpg'),
        'description' => 'تنظيف بالبخار وإزالة البقع العنيدة.',
        'status' => '1',
        'order' => 1,
    ];

    $response = $this->actingAs($user)->post(route('admin.galleries.store'), $data);

    $response->assertRedirect(route('admin.galleries.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('galleries', [
        'title' => 'غسيل سجاد بالبخار الحار في حي النرجس',
        'category' => 'غسيل السجاد',
        'status' => 1,
    ]);
});

test('admin can view gallery edit page', function () {
    $user = User::factory()->create();
    $gallery = Gallery::factory()->create();

    $response = $this->actingAs($user)->get(route('admin.galleries.edit', $gallery));

    $response->assertOk();
    $response->assertSee($gallery->title);
});

test('admin can update a gallery project', function () {
    $user = User::factory()->create();
    $gallery = Gallery::factory()->create([
        'title' => 'المشروع القديم',
    ]);

    $response = $this->actingAs($user)->put(route('admin.galleries.update', $gallery), [
        'title' => 'المشروع المحدث والمعدل',
        'category' => 'تنظيف الفلل والقصور',
        'category_icon' => 'fa-solid fa-building',
        'location' => 'حي الياسمين - الرياض',
        'description' => 'وصف معدل للمشروع.',
        'status' => '1',
        'order' => 2,
    ]);

    $response->assertRedirect(route('admin.galleries.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('galleries', [
        'id' => $gallery->id,
        'title' => 'المشروع المحدث والمعدل',
        'category' => 'تنظيف الفلل والقصور',
    ]);
});

test('admin can delete a gallery project', function () {
    $user = User::factory()->create();
    $gallery = Gallery::factory()->create();

    $response = $this->actingAs($user)->delete(route('admin.galleries.destroy', $gallery));

    $response->assertRedirect(route('admin.galleries.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('galleries', [
        'id' => $gallery->id,
    ]);
});
