<?php

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;

test('home page renders all dynamic sections from database', function () {
    $feature = WhyChooseUs::factory()->create(['title' => 'ميزة سلطان الأولى', 'status' => true]);
    $service = Service::factory()->create(['title' => 'خدمة تنظيف خاصة', 'status' => true]);
    $testimonial = Testimonial::factory()->create(['name' => 'سعد المنصور', 'review' => 'خدمة ممتازة جداً', 'status' => true]);
    $faq = Faq::factory()->create(['question' => 'هل المواد آمنة؟', 'status' => true]);
    $post = Post::factory()->create(['title' => 'طرق العناية بالسجاد والموكيت', 'status' => true]);

    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('ميزة سلطان الأولى');
    $response->assertSee('خدمة تنظيف خاصة');
    $response->assertSee('سعد المنصور');
    $response->assertSee('هل المواد آمنة؟');
    $response->assertSee('طرق العناية بالسجاد والموكيت');
});

test('blog listing page renders active posts and filters by category', function () {
    $post1 = Post::factory()->create([
        'title' => 'نصائح تنظيف السجاد بالبخار',
        'category' => 'نصائح منزلية',
        'status' => true,
    ]);

    $post2 = Post::factory()->create([
        'title' => 'مقال ملغي غير مفعل',
        'status' => false,
    ]);

    $response = $this->get(route('blog.index'));

    $response->assertOk();
    $response->assertSee('نصائح تنظيف السجاد بالبخار');
    $response->assertDontSee('مقال ملغي غير مفعل');
});

test('blog show page renders single post details with content', function () {
    $post = Post::factory()->create([
        'title' => 'كيفية إزالة البقع الصعبة من المفروشات',
        'slug' => 'stain-removal-guide',
        'content' => '<p>هذا النص يشرح بالتفصيل طريقة إزالة البقع من الكنب.</p>',
        'status' => true,
    ]);

    $response = $this->get(route('blog.show', $post->slug));

    $response->assertOk();
    $response->assertSee('كيفية إزالة البقع الصعبة من المفروشات');
    $response->assertSee('هذا النص يشرح بالتفصيل طريقة إزالة البقع من الكنب.');
});

test('about page renders dynamic features and testimonials', function () {
    $feature = WhyChooseUs::factory()->create(['title' => 'خبرة أكثر من 10 سنوات', 'status' => true]);
    $testimonial = Testimonial::factory()->create(['name' => 'عبدالعزيز الشمري', 'status' => true]);

    $response = $this->get(route('about'));

    $response->assertOk();
    $response->assertSee('خبرة أكثر من 10 سنوات');
    $response->assertSee('عبدالعزيز الشمري');
});

test('contact page renders dynamic services and faqs', function () {
    $service = Service::factory()->create(['title' => 'جلي رخام احترافي', 'status' => true]);
    $faq = Faq::factory()->create(['question' => 'كيف يمكنني حجز موعد للمعاينة؟', 'status' => true]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('جلي رخام احترافي');
    $response->assertSee('كيف يمكنني حجز موعد للمعاينة؟');
});

test('gallery page renders dynamic items and lightbox modal structure', function () {
    $gallery = Gallery::factory()->create([
        'title' => 'تنظيف واجهات زجاجية بالرياض',
        'status' => true,
    ]);

    $response = $this->get(route('gallery'));

    $response->assertOk();
    $response->assertSee('تنظيف واجهات زجاجية بالرياض');
    $response->assertSee('galleryLightboxModal');
});
