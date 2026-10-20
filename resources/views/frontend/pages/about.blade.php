@extends('frontend.layouts.master')

@section('title', setting('seo_about_title', 'من نحن | ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم الشامل'))
@section('meta_description', setting('seo_about_description', 'تعرف على شركة ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم الشامل بجده. خبرة عريقة في تنظيف المنازل والفلل والمفروشات بأحدث المعدات.'))
@section('meta_keywords', setting('seo_about_keywords', 'عن شركة سين ياء, من نحن, شركة تنظيف بجده, أفضل شركة نظافة بجده, خدمات النظافة المتكاملة'))
@section('og_title', setting('seo_about_title', 'من نحن | شركة ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم'))
@section('og_description', setting('seo_about_description', 'قصة نجاحنا والتزامنا بتقديم أعلى معايير النظافة والتعقيم الفندقي المعتمد بالمملكة.'))

@section('content')
    <!-- ==========================================================================
       PAGE HEADER BANNER
       ========================================================================== -->
    <section class="page-header-banner py-5 text-center" data-aos="fade-down">
        <div class="container py-3">
            <span class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm">
                <i class="fa-solid fa-award me-1 text-brand-secondary"></i> احترافية في الأداء وجودة في التنفيذ
            </span>
            <h1 class="display-5 fw-heading text-brand-primary mb-2">من نحن – سين ياء كلين</h1>
            <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-3">
                سين ياء كلين شركة متخصصة في تقديم خدمات النظافة والعناية بالمرافق والمساحات السكنية والتجارية، من خلال حلول متكاملة تلبي احتياجات الأفراد والمنشآت.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-brand-primary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">من نحن</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
       ABOUT STORY / OVERVIEW
       ========================================================================== -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="850">
                    <span class="badge bg-brand-light text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3">
                        <i class="fa-solid fa-building me-1"></i> قصتنا ورؤيتنا
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary mb-3">
                        نصنع بيئة نظيفة وصحية تفوق توقعاتك
                    </h2>
                    <p class="text-secondary lh-lg mb-3">
                        سين ياء كلين شركة متخصصة في تقديم خدمات النظافة والعناية بالمرافق والمساحات السكنية والتجارية، من خلال حلول متكاملة تلبي احتياجات الأفراد والمنشآت.
                    </p>
                    <p class="text-secondary lh-lg mb-3">
                        نعتمد على فريق عمل مدرّب، ومعدات وتقنيات تنظيف حديثة، ومنتجات عالية الجودة، مع الالتزام بمعايير النظافة والسلامة والاهتمام بأدق التفاصيل لضمان مستوى متميز من الأداء.
                    </p>
                    <p class="text-secondary lh-lg mb-4">
                        نؤمن بأن الجودة تبدأ من التفاصيل، لذلك نحرص على تقديم خدمات احترافية ترتكز على المصداقية والدقة في التنفيذ والالتزام بالمواعيد، ونسعى إلى كسب ثقة عملائنا وبناء علاقات مستدامة تقوم على رضاهم وجودة الخدمات المقدمة.
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 bg-brand-light rounded-3">
                                <i class="fa-solid fa-circle-check text-brand-accent fs-4"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">ضمان ذهبي 100%</h6>
                                    <small class="text-muted">إعادة تنظيف مجاناً عند أي ملاحظة</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-3 p-3 bg-brand-light rounded-3">
                                <i class="fa-solid fa-shield-virus text-brand-primary fs-4"></i>
                                <div>
                                    <h6 class="fw-bold mb-0">تعقيم بالبخار الحار</h6>
                                    <small class="text-muted">يقضي على 99.9% من البكتيريا</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="850">
                    <div class="hero-img-box position-relative">
                        <img src="{{ asset('assets/frontend/images/hero_final.png') }}" alt="شركة سين ياء للنظافة الشاملة" class="rounded-4 shadow-lg w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       WHY CHOOSE US (DYNAMIC)
       ========================================================================== -->
    <section class="py-5 bg-brand-light" id="features">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge bg-brand-primary text-white rounded-pill px-3 py-2 fw-bold mb-2">
                    <i class="fa-solid fa-award me-1"></i> لماذا يختارنا العملاء؟
                </span>
                <h2 class="fw-heading display-6 text-brand-primary">
                    مميزات تجعلنا خيارك الأول دائماً
                </h2>
                <p class="text-secondary">
                    معايير صارمة في الجودة، دقة متناهية في المواعيد، وفريق محترف يهتم بأدق التفاصيل.
                </p>
            </div>

            <div class="row g-4">
                @forelse($whyChooseUsList as $feature)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
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
                    <div class="col-12 text-center text-muted">
                        لا توجد مميزات مضافة حالياً.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       CUSTOMER REVIEWS (DYNAMIC)
       ========================================================================== -->
    @if(!empty($testimonials) && count($testimonials) > 0)
        <section class="py-5 bg-white" id="reviews">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <span class="badge bg-brand-accent text-white rounded-pill px-3 py-2 fw-bold mb-2">
                        <i class="fa-solid fa-star me-1"></i> ثقة وتجارب حقيقية
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary mb-2">ماذا يقول عملاؤنا عنا؟</h2>
                    <p class="text-secondary max-w-700 mx-auto">نفخر بخدمة أكثر من 1500 عميل في كافة أحياء جده والمملكة</p>
                    <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px;"></div>
                </div>

                <div class="row g-4">
                    @foreach($testimonials->take(3) as $testimonial)
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-card p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            @if($testimonial->avatar_url)
                                                <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->name }}" class="rounded-circle object-fit-cover border" style="width: 48px; height: 48px;">
                                            @else
                                                <div class="rounded-circle bg-brand-light text-brand-primary fw-bold d-flex align-items-center justify-content-center border"
                                                    style="width: 48px; height: 48px; font-size: 1.1rem;">
                                                    {{ mb_substr($testimonial->name, 0, 1) }}
                                                </div>
                                            @endif
                                            <div>
                                                <h5 class="fw-bold mb-0 text-brand-primary fs-6">{{ $testimonial->name }}</h5>
                                                <small class="text-muted">{{ $testimonial->title ?? 'عميل متميز' }}</small>
                                            </div>
                                        </div>
                                        <div class="text-warning small">
                                            @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                                <i class="fa-solid fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-secondary small mb-0 lh-lg">
                                        "{{ $testimonial->review }}"
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ==========================================================================
       FAQ SECTION (DYNAMIC)
       ========================================================================== -->
    @if(!empty($faqs) && count($faqs) > 0)
        <section class="py-5 bg-brand-light" id="faq">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <span class="badge bg-brand-primary text-white rounded-pill px-3 py-2 fw-bold mb-2">
                        <i class="fa-solid fa-circle-question me-1"></i> إجابات وافية
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary">الأسئلة الأكثر شيوعاً</h2>
                    <p class="text-secondary">كل ما تود معرفته عن خدماتنا والضمانات وطريقة تنفيذ العمل</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="faqAccordion">
                            @foreach($faqs as $index => $faq)
                                <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold text-brand-primary" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion" aria-labelledby="heading{{ $faq->id }}">
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
            <span class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm">✨ جودة واحترافية متكاملة</span>
            <h2 class="display-6 fw-heading text-brand-primary mb-3">جاهزون لخدمتك في جميع أنحاء المملكة</h2>
            <p class="lead text-secondary max-w-700 mx-auto mb-4 fs-6">
                تواصل معنا الآن واحصل على حجز سريع وتقدير فوري بدون أي تعقيد!
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-outline-brand rounded-pill px-5 fw-bold shadow-sm">
                    <i class="fa-solid fa-phone-volume me-2"></i> اتصل الآن: {{ setting('top_bar_phone', '0531109831') }}
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}"
                    target="_blank" class="btn btn-primary rounded-pill px-5 fw-bold shadow">
                    <i class="fa-brands fa-whatsapp fs-5 me-2"></i> حجز سريع عبر واتساب
                </a>
            </div>
        </div>
    </section>
@endsection
