@extends('frontend.layouts.master')

@section('title', setting('seo_services_title', 'خدماتنا المتميزة في النظافة والتعقيم الشامل | ' . setting('site_name',
    'سين ياء')))
@section('meta_description', setting('seo_services_description', 'استكشف باقة خدمات شركة ' . setting('site_name', 'سين
    ياء') . ' المتكاملة: تنظيف الفلل، الشقق، المفروشات، غسيل السجاد والكنب بالبخار، جلي الرخام وتلميع البلاط بأعلى جودة.'))
@section('meta_keywords', setting('seo_services_keywords', 'خدمات تنظيف بالرياض, تنظيف فلل, غسيل كنب, جلي رخام, تنظيف
    خزانات, تعقيم منازل, شركة ' . setting('site_name', 'سين ياء')))
@section('og_title', setting('seo_services_title', 'خدمات النظافة والتعقيم الشامل | شركة ' . setting('site_name', 'سين
    ياء')))
@section('og_description', setting('seo_services_description', 'تعرف على أفضل باقات خدمات النظافة والتعقيم المعتمدة
    بأحدث التقنيات وأفضل الأسعار.'))

@section('content')
    <!-- ==========================================================================
           PAGE HEADER BANNER
           ========================================================================== -->
    <section class="page-header-banner py-5 text-center" data-aos="fade-down">
        <div class="container py-3">
            <span
                class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm">
                <i class="fa-solid fa-sparkles me-1 text-brand-secondary"></i> جودة فندقية وضمان ذهبي
            </span>
            <h1 class="display-5 fw-heading text-brand-primary mb-2">خدمات النظافة والتعقيم الشامل</h1>
            <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-3">
                حلول متكاملة للمنازل، الفلل، والمؤسسات بأحدث المعدات الألمانية والإيطالية وأعلى معايير الإتقان.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-brand-primary text-decoration-none">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">خدماتنا</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
           SERVICES SECTION (DYNAMIC CLEAN CARDS)
           ========================================================================== -->
    <section class="py-5 bg-white" id="services-grid">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span
                    class="badge bg-brand-light text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-2">
                    <i class="fa-solid fa-layer-group text-brand-secondary me-1"></i> باقات خدماتنا
                </span>
                <h2 class="fw-heading display-6 text-brand-primary mb-2">خدماتنا المتخصصة</h2>
                <p class="text-secondary max-w-700 mx-auto">اختر الخدمة المطلوبة واطلع على تفاصيلها الكاملة مع إمكانية الحجز
                    الفوري المباشر</p>
                <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px;"></div>
            </div>

            <!-- Services Grid -->
            <div class="row g-4">
                @forelse($services as $service)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) + 1) * 120 }}">
                        <div class="service-clean-card h-100 d-flex flex-column justify-content-between position-relative">
                            @if ($service->discount)
                                <span
                                    class="badge bg-brand-accent position-absolute top-0 end-0 m-3 px-2 py-1 small rounded-pill shadow-sm">
                                    <i class="fa-solid fa-percent me-1"></i> {{ $service->discount }}
                                </span>
                            @endif
                            <div>
                                <div class="service-clean-icon">
                                    <i class="{{ $service->icon ?: 'fa-solid fa-wand-magic-sparkles' }}"></i>
                                </div>
                                <h4 class="service-clean-title">{{ $service->title }}</h4>
                                <p class="service-clean-desc">
                                    {{ $service->short_description }}
                                </p>
                            </div>
                            <a href="{{ route('services.show', $service->slug) }}" class="service-clean-link mt-3">
                                <span>عرض تفاصيل الخدمة</span>
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-spinner fa-2x mb-3 text-secondary"></i>
                        <p>لا توجد خدمات متاحة حالياً، يرجى مراجعة الموقع لاحقاً أو الاتصال بنا مباشرة.</p>
                    </div>
                @endforelse
            </div>

            <!-- Direct Fast Action Bar -->
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-5">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود الاستفسار وحجز خدمة تنظيف') }}"
                    target="_blank" class="btn btn-brand-whatsapp btn-lg rounded-pill px-5 py-3 shadow-sm">
                    <i class="fa-brands fa-whatsapp fs-5 me-2"></i> تواصل عبر واتساب
                </a>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}"
                    class="btn btn-outline-brand btn-lg rounded-pill px-5 py-3">
                    <i class="fa-solid fa-phone-volume me-2"></i> اتصال مباشر: {{ setting('top_bar_phone', '0531109831') }}
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
           WHY CHOOSE US / لماذا تختارنا
           ========================================================================== -->
    <section class="py-5 bg-brand-light" id="why-us">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-brand-primary text-white rounded-pill px-3 py-2 fw-bold mb-2">
                    <i class="fa-solid fa-award me-1"></i> لماذا شركة سين ياء؟
                </span>
                <h2 class="fw-heading display-6 text-brand-primary">
                    معايير ملكية في النظافة والتعقيم
                </h2>
                <p class="text-secondary">
                    نضع خبراتنا الطويلة بين يديك لنمنحك بيئة صحية، نظيفة، ولامعة تعكس جمال ورقي مساحتك.
                </p>
            </div>

            <div class="row g-4">
                @forelse($whyChooseUsList as $feature)
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-card p-4 h-100">
                            <div class="card-icon-bubble bg-brand-light text-brand-primary mb-3">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <h4 class="fw-bold mb-2 text-brand-primary">{{ $feature->title }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ $feature->description }}
                            </p>
                        </div>
                    </div>
                @empty
                    <!-- Fallback features if database is empty -->
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-card p-4 h-100">
                            <div class="card-icon-bubble bg-brand-light text-brand-primary mb-3">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <h4 class="fw-bold mb-2 text-brand-primary">عمالة فنية مدربة</h4>
                            <p class="text-secondary small mb-0">
                                طاقم عمل محترف وخبير خضع لأعلى تدريبات الأمان والجودة وحسن التعامل مع الممتلكات.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-card p-4 h-100">
                            <div class="card-icon-bubble bg-brand-light text-brand-primary mb-3">
                                <i class="fa-solid fa-spray-can-sparkles"></i>
                            </div>
                            <h4 class="fw-bold mb-2 text-brand-primary">أحدث أجهزة البخار</h4>
                            <p class="text-secondary small mb-0">
                                معدات ألمانية وإيطالية متطورة بقوة ضغط عالية لإزالة أصعب البقع والجراثيم بنسبة 99.9%.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="custom-card p-4 h-100">
                            <div class="card-icon-bubble bg-brand-light text-brand-primary mb-3">
                                <i class="fa-solid fa-shield-heart"></i>
                            </div>
                            <h4 class="fw-bold mb-2 text-brand-primary">الضمان الذهبي للجودة</h4>
                            <p class="text-secondary small mb-0">
                                إذا لم تكن راضياً 100% عن مستوى النظافة، سنقوم بإعادة تنظيف المكان مجاناً وبدون أي تكلفة.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- ==========================================================================
           FAQ SECTION / الأسئلة الشائعة
           ========================================================================== -->
    @if (!empty($faqs) && count($faqs) > 0)
        <section class="py-5 bg-brand-light" id="faq">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <span class="badge bg-brand-primary text-white rounded-pill px-3 py-2 fw-bold mb-2">
                        <i class="fa-solid fa-circle-question me-1"></i> إجابات وافية
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary">الأسئلة الشائعة حول خدماتنا</h2>
                    <p class="text-secondary">كل ما تود معرفته عن طريقة تقديم خدمات النظافة والضمان والجودة</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="faqAccordion">
                            @foreach ($faqs as $index => $faq)
                                <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button
                                            class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold text-brand-primary"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faq->id }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        data-bs-parent="#faqAccordion" aria-labelledby="heading{{ $faq->id }}">
                                        <div class="accordion-body text-secondary small lh-lg">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ==========================================================================
           GIANT CTA BANNER
           ========================================================================== -->
    <section class="py-5 quote-section text-center">
        <div class="container py-3">
            <span
                class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm">✨
                خدمة عملاء سريعة ومباشرة</span>
            <h2 class="display-6 fw-heading text-brand-primary mb-3">احجز خدمتك الآن لمنزلك أو مكتبك بأعلى جودة</h2>
            <p class="lead text-secondary max-w-700 mx-auto mb-4 fs-6">
                فريقنا المجهز بأحدث المعدات جاهز للوصول إليك في أسرع وقت. تواصل معنا الآن هاتفياً أو عبر الواتساب!
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}"
                    class="btn btn-outline-brand rounded-pill px-5 fw-bold shadow-sm">
                    <i class="fa-solid fa-phone-volume me-2"></i> اتصل الآن: {{ setting('top_bar_phone', '0531109831') }}
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود الاستفسار وحجز خدمة تنظيف') }}"
                    target="_blank" class="btn btn-primary rounded-pill px-5 fw-bold shadow">
                    <i class="fa-brands fa-whatsapp fs-5 me-2"></i> حجز سريع عبر واتساب
                </a>
            </div>
        </div>
    </section>
@endsection
