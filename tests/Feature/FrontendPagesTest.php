<?php

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
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
    $faq = Faq::factory()->create(['question' => 'كيف يمكنني حجز موعد لخدمات التنظيف؟', 'status' => true]);

    $response = $this->get(route('contact'));

    $response->assertOk();
    $response->assertSee('جلي رخام احترافي');
    $response->assertSee('كيف يمكنني حجز موعد لخدمات التنظيف؟');
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

test('service details page renders dynamic seo tags and schema', function () {
    $service = Service::factory()->create([
        'title' => 'خدمة غسيل السجاد والموكيت',
        'slug' => 'carpet-cleaning-vip',
        'meta_title' => 'أفضل شركة غسيل سجاد بالرياض بالبخار | سين ياء',
        'meta_description' => 'غسيل سجاد وموكيت احترافي بأحدث أجهزة البخار الحار وتجفيف فوري.',
        'meta_keywords' => 'غسيل سجاد, تنظيف موكيت بالبخار, سين ياء',
        'status' => true,
    ]);

    $response = $this->get(route('services.show', $service->slug));

    $response->assertOk();
    $response->assertSee('<title>أفضل شركة غسيل سجاد بالرياض بالبخار | سين ياء</title>', false);
    $response->assertSee('name="description" content="غسيل سجاد وموكيت احترافي بأحدث أجهزة البخار الحار وتجفيف فوري."', false);
    $response->assertSee('name="keywords" content="غسيل سجاد, تنظيف موكيت بالبخار, سين ياء"', false);
    $response->assertSee('property="og:title" content="أفضل شركة غسيل سجاد بالرياض بالبخار | سين ياء"', false);
    $response->assertSee('"@type": "Service"', false);
    $response->assertSee('"name": "خدمة غسيل السجاد والموكيت"', false);
});

test('blog details page renders dynamic seo tags and schema', function () {
    $post = Post::factory()->create([
        'title' => 'أفضل طرق إزالة بقع القهوة من الكنب',
        'slug' => 'coffee-stain-removal',
        'meta_title' => 'كيف تزيل بقع القهوة من الكنب في 5 دقائق | سين ياء',
        'meta_description' => 'شرح علمي ومجرب لإزالة بقع القهوة والشاي القديمة من أقمشة الكنب والمجالس.',
        'meta_keywords' => 'ازالة بقع القهوة, تنظيف كنب, سين ياء',
        'status' => true,
    ]);

    $response = $this->get(route('blog.show', $post->slug));

    $response->assertOk();
    $response->assertSee('<title>كيف تزيل بقع القهوة من الكنب في 5 دقائق | سين ياء</title>', false);
    $response->assertSee('name="description" content="شرح علمي ومجرب لإزالة بقع القهوة والشاي القديمة من أقمشة الكنب والمجالس."', false);
    $response->assertSee('property="og:title" content="كيف تزيل بقع القهوة من الكنب في 5 دقائق | سين ياء"', false);
    $response->assertSee('"@type": "BlogPosting"', false);
    $response->assertSee('"headline": "أفضل طرق إزالة بقع القهوة من الكنب"', false);
});

test('static pages render seo tags, canonical url, and local business schema', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('<meta name="description"', false);
    $response->assertSee('<meta name="keywords"', false);
    $response->assertSee('property="og:type"', false);
    $response->assertSee('content="website"', false);
    $response->assertSee('name="twitter:card"', false);
    $response->assertSee('"@type": "HomeAndConstructionBusiness"', false);

    $landResponse = $this->get(route('landpage'));
    $landResponse->assertOk();
    $landResponse->assertSee('<meta name="description"', false);
    $landResponse->assertSee('property="og:title"', false);
    $landResponse->assertSee('"@type": "HomeAndConstructionBusiness"', false);
});

test('footer contains official logo image across frontend pages', function () {
    Page::firstOrCreate(
        ['slug' => 'privacy-policy'],
        [
            'title' => 'سياسة الخصوصية',
            'content' => '<p>سياسة الخصوصية وسرية المعلومات.</p>',
            'status' => true,
            'show_in_footer' => true,
            'order' => 1,
        ]
    );

    $routes = ['home', 'about', 'services.index', 'gallery', 'blog.index', 'contact', 'privacy-policy'];

    foreach ($routes as $routeName) {
        $response = $this->get(route($routeName));
        $response->assertOk();
        $response->assertSee('assets/frontend/images/logo.png');
    }
});

test('core frontend pages render custom seo meta tags configured in settings', function () {
    Setting::set('seo_about_title', 'مخصص من نحن عنوان سيو ممتاز');
    Setting::set('seo_about_description', 'مخصص من نحن وصف سيو رائع ومبهر');

    Setting::set('seo_services_title', 'مخصص خدماتنا عنوان سيو ممتاز');
    Setting::set('seo_services_description', 'مخصص خدماتنا وصف سيو رائع ومبهر');

    Setting::set('seo_gallery_title', 'مخصص معرض الأعمال عنوان سيو ممتاز');
    Setting::set('seo_gallery_description', 'مخصص معرض الأعمال وصف سيو رائع ومبهر');

    Setting::set('seo_blog_title', 'مخصص المدونة عنوان سيو ممتاز');
    Setting::set('seo_blog_description', 'مخصص المدونة وصف سيو رائع ومبهر');

    Setting::set('seo_contact_title', 'مخصص اتصل بنا عنوان سيو ممتاز');
    Setting::set('seo_contact_description', 'مخصص اتصل بنا وصف سيو رائع ومبهر');

    // About
    $aboutResponse = $this->get(route('about'));
    $aboutResponse->assertOk();
    $aboutResponse->assertSee('<title>مخصص من نحن عنوان سيو ممتاز</title>', false);
    $aboutResponse->assertSee('content="مخصص من نحن وصف سيو رائع ومبهر"', false);

    // Services
    $servicesResponse = $this->get(route('services.index'));
    $servicesResponse->assertOk();
    $servicesResponse->assertSee('<title>مخصص خدماتنا عنوان سيو ممتاز</title>', false);
    $servicesResponse->assertSee('content="مخصص خدماتنا وصف سيو رائع ومبهر"', false);

    // Gallery
    $galleryResponse = $this->get(route('gallery'));
    $galleryResponse->assertOk();
    $galleryResponse->assertSee('<title>مخصص معرض الأعمال عنوان سيو ممتاز</title>', false);
    $galleryResponse->assertSee('content="مخصص معرض الأعمال وصف سيو رائع ومبهر"', false);

    // Blog
    $blogResponse = $this->get(route('blog.index'));
    $blogResponse->assertOk();
    $blogResponse->assertSee('<title>مخصص المدونة عنوان سيو ممتاز</title>', false);
    $blogResponse->assertSee('content="مخصص المدونة وصف سيو رائع ومبهر"', false);

    // Contact
    $contactResponse = $this->get(route('contact'));
    $contactResponse->assertOk();
    $contactResponse->assertSee('<title>مخصص اتصل بنا عنوان سيو ممتاز</title>', false);
    $contactResponse->assertSee('content="مخصص اتصل بنا وصف سيو رائع ومبهر"', false);
});
