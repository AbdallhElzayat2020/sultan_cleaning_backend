@extends('frontend.layouts.master')

@section('title', 'الرئيسية | ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم الشامل بالرياض')
@section('meta_description', 'شركة ' . setting('site_name', 'سين ياء') . ' الرائدة في خدمات النظافة والتعقيم الشامل بالرياض والمملكة. تنظيف منازل، فلل، شقق، كنب ومفروشات بالبخار، جلي رخام وخزانات بأحدث المعدات وأفضل الأسعار.')
@section('meta_keywords', 'شركة تنظيف بالرياض, تنظيف منازل بالرياض, تنظيف فلل بالرياض, غسيل كنب بالبخار, جلي رخام بالرياض, شركة تنظيف شقق, ' . setting('site_name', 'سين ياء'))
@section('og_title', setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم الشامل بالرياض')
@section('og_description', 'أفضل خدمات التنظيف المتكاملة للفلل والمنازل والشركات بالبخار وأحدث أجهزة التعقيم مع شركة ' . setting('site_name', 'سين ياء') . '.')
@section('og_image', asset('images/hero.jpg'))

@section('content')
    <!-- ==========================================================================
       HERO SECTION (CLEAN & UNCLUTTERED WITH FLOATING BUBBLES)
       ========================================================================== -->
    <section class="hero hero-wrapper py-5 position-relative overflow-hidden">
        <!-- Floating Soap Bubbles in Hero Background -->
        <div class="hero-bubbles" aria-hidden="true">
            <span class="bubble bubble-1"></span>
            <span class="bubble bubble-2"></span>
            <span class="bubble bubble-3"></span>
            <span class="bubble bubble-4"></span>
            <span class="bubble bubble-5"></span>
            <span class="bubble bubble-6"></span>
            <span class="bubble bubble-7"></span>
            <span class="bubble bubble-8"></span>
            <span class="bubble bubble-9"></span>
            <span class="bubble bubble-10"></span>
            <span class="bubble bubble-11"></span>
            <span class="bubble bubble-12"></span>
        </div>

        <div class="container py-4 position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <!-- Content Side -->
                <div class="col-lg-7" data-aos="fade-up" data-aos-duration="800">
                    <div
                        class="d-inline-flex align-items-center gap-2 bg-white border border-brand rounded-pill px-3 py-1 shadow-sm mb-3"
                        data-aos="fade-down" data-aos-delay="100">
                        <i class="fa-solid fa-crown text-warning"></i>
                        <span class="fw-bold text-brand-primary small">الرائدون في خدمات النظافة والتعقيم
                            بالمملكة</span>
                    </div>

                    <h1 class="display-4 fw-heading mb-3 lh-sm" data-aos="fade-up" data-aos-delay="200">
                        نظافة تفوق التوقعات و<span class="text-brand-primary">تعقيم احترافي</span>
                        شامل <span class="text-brand-secondary">لمنزلك ومكتبك</span>
                    </h1>

                    <p class="lead mb-4 fs-6 lh-lg" style="max-width: 580px" data-aos="fade-up" data-aos-delay="300">
                        نقدم لك تجربة تنظيف متكاملة بأحدث أجهزة البخار والمواد المعتمدة
                        والآمنة 100%. بريق يدوم، تعقيم عميق، وجودة استثنائية بضمان الرضا
                        الذهبي.
                    </p>

                    <!-- Clean Hero Action Buttons -->
                    <div class="d-flex flex-wrap gap-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}"
                            class="btn btn-primary btn-lg d-inline-flex align-items-center gap-2 px-4 shadow">
                            <i class="fa-brands fa-whatsapp"></i>
                            <span> تواصل معنا </span>
                        </a>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}"
                            class="btn btn-hero-call btn-lg d-inline-flex align-items-center gap-2 px-4">
                            <i class="fa-solid fa-phone-volume"></i>
                            <span>{{ setting('top_bar_phone', '0531109831') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Visual Side -->
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="300" data-aos-duration="900">
                    <div class="hero-img-box position-relative">
                        <img src="{{ asset('assets/frontend/images/hero.jpg') }}"
                            alt="خدمات تنظيف احترافية في شركة سين ياء" />
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ==========================================================================
    FEATURES / WHY CHOOSE US
    ========================================================================== -->
    <section class="py-5 why-us bg-white" id="features">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span
                    class="badge bg-brand-light text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2">
                    <i class="fa-solid fa-award me-1"></i> لماذا نحن ؟
                </span>
                <h2 class="fw-heading display-6 text-brand-primary">
                    معايير ملكية في النظافة والتعقيم
                </h2>
                <p class="text-secondary">
                    نضع خبراتنا الطويلة بين يديك لنمنحك بيئة صحية، نظيفة، ولامعة تعكس
                    جمال ورقي مساحتك.
                </p>
            </div>

            <div class="row g-4">
                @forelse($whyChooseUsList ?? [] as $feature)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="custom-card p-4 h-100">
                            <div class="card-icon-bubble bg-brand-light text-brand-primary mb-3">
                                <i class="{{ $feature->icon }}"></i>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $feature->title }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ $feature->description }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        لا توجد مميزات معروضة حالياً.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==========================================================================
                SERVICES SECTION (MINIMALIST CLEAN CARDS IN BRAND COLORS)
                ========================================================================== -->

    @if (!empty($services) && count($services) > 0)
        <section class="services py-5" id="services">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-heading display-6 text-brand-primary mb-2">خدماتنا</h2>
                    <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px"></div>
                </div>

                <!-- Services Grid (Dynamic Cards) -->
                <div class="row g-4">
                    @forelse($services ?? [] as $service)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) + 1) * 120 }}">
                            <div
                                class="service-clean-card h-100 d-flex flex-column justify-content-between position-relative">
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
                                    <span>عرض التفاصيل</span>
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted py-4">
                            لا توجد خدمات معروضة حالياً.
                        </div>
                    @endforelse
                </div>

                <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="150">
                    <a href="{{ route('services.index') }}" class="btn btn-brand-primary btn-lg px-5">
                        <i class="fa-solid fa-list-check me-2"></i> عرض كافة الخدمات وحجز الخدمة
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- ==========================================================================
       INTERACTIVE LIVING ROOM TOUR (HOTSPOTS SHOWCASE)
       ========================================================================== -->
    <section class="py-5 interactive-tour-section position-relative overflow-hidden" id="interactive-tour">
        <div class="container py-4">
            <div class="text-center max-w-700 mx-auto mb-5" data-aos="fade-up">
                <span class="badge bg-brand-light text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm">
                    <i class="fa-solid fa-wand-magic-sparkles me-1 text-brand-secondary"></i> جولة تفاعلية حية
                </span>
                <h2 class="fw-heading display-6 text-brand-primary mb-2">
                    نظافة ملكية في كل تفصيلة من منزلك
                </h2>
                <p class="text-secondary">
                    مرّر المؤشر (أو اضغط) على أي من النقاط النابضة لاستكشاف كيف نعتني بكل ركن في مساحتك بأحدث المعدات الفندقية
                </p>
                <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px;"></div>
            </div>

            <!-- Hotspot Showcase Card -->
            <div class="interactive-stage rounded-4 position-relative shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-duration="900">
                <img src="{{ asset('assets/frontend/images/living-room-interactive.jpg') }}"
                     alt="غرفة معيشة فاخرة ونظيفة - خدمات سين ياء"
                     class="w-100 h-auto d-block interactive-bg-img"
                     loading="lazy" />

                <!-- Hotspots Overlay Layer -->
                <div class="hotspots-layer" aria-label="النقاط التفاعلية للخدمات">

                    <!-- Hotspot 1: Rug / Carpet -->
                    <div class="room-hotspot" style="top: 76%; left: 50%;" tabindex="0">
                        <button class="hotspot-trigger" aria-label="غسيل وتطهير السجاد والموكيت">
                            <span class="hotspot-ping"></span>
                            <span class="hotspot-dot"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                        </button>
                        <div class="hotspot-popover popover-top">
                            <div class="popover-header">
                                <span class="popover-icon bg-brand-light text-brand-primary"><i class="fa-solid fa-wand-magic-sparkles"></i></span>
                                <h6 class="mb-0 fw-bold text-brand-primary">غسيل وتطهير السجاد والموكيت</h6>
                            </div>
                            <p class="popover-desc mb-3">
                                غسيل عميق بأحدث أجهزة البخار الحار وشفط الأتربة والروائح لتعود أنسجة السجاد جديدة وناعمة.
                            </p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة غسيل وتعقيم السجاد والموكيت') }}" target="_blank" class="btn btn-sm btn-brand-primary w-100 rounded-pill fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> طلب خدمة السجاد
                            </a>
                        </div>
                    </div>

                    <!-- Hotspot 2: Sofa / Upholstery -->
                    <div class="room-hotspot" style="top: 64%; left: 22%;" tabindex="0">
                        <button class="hotspot-trigger" aria-label="تنظيف وتعقيم الكنب والمفروشات">
                            <span class="hotspot-ping"></span>
                            <span class="hotspot-dot"><i class="fa-solid fa-couch"></i></span>
                        </button>
                        <div class="hotspot-popover popover-right">
                            <div class="popover-header">
                                <span class="popover-icon bg-brand-light text-brand-primary"><i class="fa-solid fa-couch"></i></span>
                                <h6 class="mb-0 fw-bold text-brand-primary">غسيل وتعقيم الكنب والمجالس</h6>
                            </div>
                            <p class="popover-desc mb-3">
                                إزالة أصعب البقع العميقة والدهون مع تعقيم طبي ومواد ألمانية آمنة تحافظ على رونق الأقمشة ولونها.
                            </p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة تنظيف وتعقيم الكنب والمفروشات') }}" target="_blank" class="btn btn-sm btn-brand-primary w-100 rounded-pill fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> طلب خدمة الكنب
                            </a>
                        </div>
                    </div>

                    <!-- Hotspot 3: Panoramic Glass Windows -->
                    <div class="room-hotspot" style="top: 36%; left: 52%;" tabindex="0">
                        <button class="hotspot-trigger" aria-label="تلميع الواجهات والزجاج البانورامي">
                            <span class="hotspot-ping"></span>
                            <span class="hotspot-dot"><i class="fa-solid fa-gem"></i></span>
                        </button>
                        <div class="hotspot-popover popover-bottom">
                            <div class="popover-header">
                                <span class="popover-icon bg-brand-light text-brand-secondary"><i class="fa-solid fa-gem"></i></span>
                                <h6 class="mb-0 fw-bold text-brand-primary">تلميع النوافذ والواجهات الزجاجية</h6>
                            </div>
                            <p class="popover-desc mb-3">
                                تلميع زجاج داخلي وخارجي بمحاليل نانو طاردة للغبار تمنحك إطلالة بانورامية فائقة الشفافية واللمعان.
                            </p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة تلميع الواجهات والزجاج') }}" target="_blank" class="btn btn-sm btn-brand-primary w-100 rounded-pill fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> طلب تلميع الزجاج
                            </a>
                        </div>
                    </div>

                    <!-- Hotspot 5: Crystal Chandelier -->
                    <div class="room-hotspot" style="top: 14%; left: 50%;" tabindex="0">
                        <button class="hotspot-trigger" aria-label="تنظيف وتلميع الثريات الكريستالية">
                            <span class="hotspot-ping"></span>
                            <span class="hotspot-dot"><i class="fa-solid fa-lightbulb"></i></span>
                        </button>
                        <div class="hotspot-popover popover-bottom">
                            <div class="popover-header">
                                <span class="popover-icon bg-brand-light text-brand-secondary"><i class="fa-solid fa-lightbulb"></i></span>
                                <h6 class="mb-0 fw-bold text-brand-primary">تلميع الثريات ووحدات الإضاءة</h6>
                            </div>
                            <p class="popover-desc mb-3">
                                عناية دقيقة بكل تفصيلة كريستالية بمعدات متخصصة دون تفكيك، لتعود وحدات الإضاءة لبريقها الفاخر.
                            </p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة تنظيف وتلميع الثريات') }}" target="_blank" class="btn btn-sm btn-brand-primary w-100 rounded-pill fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> طلب خدمة الثريات
                            </a>
                        </div>
                    </div>

                    <!-- Hotspot 6: Curtains -->
                    <div class="room-hotspot" style="top: 36%; left: 27%;" tabindex="0">
                        <button class="hotspot-trigger" aria-label="تنظيف وتعقيم الستائر">
                            <span class="hotspot-ping"></span>
                            <span class="hotspot-dot"><i class="fa-solid fa-wind"></i></span>
                        </button>
                        <div class="hotspot-popover popover-right">
                            <div class="popover-header">
                                <span class="popover-icon bg-brand-light text-brand-primary"><i class="fa-solid fa-wind"></i></span>
                                <h6 class="mb-0 fw-bold text-brand-primary">تعقيم الستائر بالبخار الجاف</h6>
                            </div>
                            <p class="popover-desc mb-3">
                                تنظيف الستائر في مكانها بدون فك، مع إزالة العوالق والميكروبات وحبوب اللقاح برائحة منعشة ونظيفة.
                            </p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة تنظيف وتعقيم الستائر') }}" target="_blank" class="btn btn-sm btn-brand-primary w-100 rounded-pill fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> طلب تعقيم الستائر
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Subtle Bottom Hint Bar -->
                <div class="interactive-stage-hint d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3 position-absolute bottom-0 start-0 end-0">
                    <div class="d-flex align-items-center gap-2 text-white small">
                        <span class="hint-pulse-dot"></span>
                        <span>اضغط أو مرّر المؤشر على النقاط البيضاء النابضة لتفقد خدمات كل ركن في الغرفة</span>
                    </div>
                    <div class="d-none d-md-flex align-items-center gap-3 text-white small">
                        <span><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> عمالة محترفة</span>
                        <span><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> مواد آمنة 100%</span>
                        <span><i class="fa-solid fa-circle-check text-brand-secondary me-1"></i> ضمان ذهبي</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
                                                       QUOTE & BOOKING REQUEST (BOOTSTRAP FORM)
                                                       ========================================================================== -->
    <section class="py-5 quote-section" id="quote">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="850">
                    <span
                        class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm">
                        <i class="fa-solid fa-calendar-check me-1"></i> طلب وحجز فوري
                    </span>
                    <h2 class="fw-heading display-6 mb-3 text-brand-primary">
                        احصل على خدمة تنظيف متكاملة الآن
                    </h2>
                    <p class="text-secondary mb-4">
                        املأ بياناتك وسيقوم فريقنا بالتواصل معك لتأكيد الموعد وتنسيق تفاصيل الخدمة بأسرع وقت.
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-semibold">تقييم وتنسيق فوري بدون أي التزام مسبق</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-semibold">ضمان على جودة التنظيف</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-semibold">دعم مباشر عبر الواتساب والهاتف على مدار الساعة</span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-outline-brand">
                            <i class="fa-solid fa-phone me-1"></i> اتصل هاتفياً: {{ setting('top_bar_phone', '0531109831') }}
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}" target="_blank" class="btn btn-primary">
                            <i class="fa-brands fa-whatsapp me-1"></i> محادثة واتساب فورية
                        </a>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="850">
                    <div class="card quote-card border-0 rounded-4 p-4 text-dark shadow-lg bg-white">
                        <h4 class="fw-heading text-brand-primary mb-1 text-center">
                            حجز الخدمة والتواصل السريع
                        </h4>
                        <p class="text-secondary small text-center mb-3">
                            سيتم تجهيز طلبك وتوجيهه مباشرة لخدمة العملاء عبر واتساب
                        </p>

                        <form action="{{ route('booking.store') }}" method="POST" class="whatsapp-booking-form"
                            id="bookingForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">الاسم الكريم</label>
                                    <input type="text" name="name" class="form-control rounded-3"
                                        placeholder="أبو فهد" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">رقم الجوال (واتساب)</label>
                                    <input type="tel" name="phone" class="form-control rounded-3"
                                        placeholder="05XXXXXXXX" required />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">نوع الخدمة</label>
                                    <select name="service_id" class="form-select rounded-3" required>
                                        <option value="" disabled selected>اختر الخدمة المطلوبة...</option>
                                        @forelse($services ?? [] as $srv)
                                            <option value="{{ $srv->id }}">{{ $srv->title }}</option>
                                        @empty
                                            <option value="">تنظيف منازل وفلل شامل</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">المدينة / الحي</label>
                                    <input type="text" name="city" class="form-control rounded-3"
                                        placeholder="الرياض - حي النرجس" required />
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">ملاحظات إضافية (اختياري)</label>
                                    <textarea name="notes" class="form-control rounded-3" rows="2" placeholder="أي تفاصيل تود توضيحها..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-3 fw-bold fs-6"
                                        id="submitBookingBtn">
                                        <i class="fa-brands fa-whatsapp me-1"></i> إرسال الطلب وتأكيد الحجز
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
                                                       REVIEWS (TESTIMONIALS)
                                                       ========================================================================== -->
    <section class="py-5 bg-white reviews position-relative overflow-hidden" id="reviews">
        <div class="container py-4">
            <div
                class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 text-center text-md-start"
                data-aos="fade-up">
                <div>
                    <span
                        class="badge bg-brand-light text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2">
                        <i class="fa-solid fa-comments me-1"></i> آراء وتجارب العملاء
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary mb-1">
                        ماذا يقول عملاؤنا عن شركة سين ياء؟
                    </h2>
                    <p class="text-secondary mb-0">
                        ثقة عملائنا هي سر نجاحنا وتميزنا المستمر في كافة أحياء الرياض والمملكة.
                    </p>
                </div>
                <!-- Navigation Arrows -->
                <div class="d-none d-md-flex align-items-center gap-2 mt-3 mt-md-0">
                    <button class="swiper-btn swiper-btn-prev shadow-sm" aria-label="السابق">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <button class="swiper-btn swiper-btn-next shadow-sm" aria-label="التالي">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="swiper testimonials-slider py-2" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @forelse($testimonials as $testimonial)
                        <div class="swiper-slide h-auto">
                            <div
                                class="custom-card p-4 h-100 d-flex flex-column position-relative shadow-sm rounded-4 bg-white border">
                                <!-- Quote Watermark -->
                                <div class="position-absolute top-0 end-0 p-3 text-brand-primary pe-none"
                                    style="font-size: 2.5rem; line-height: 1; opacity: 0.12;">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>

                                <!-- Star Ratings -->
                                <div class="text-warning mb-3 d-flex align-items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimonial->rating)
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star text-muted"></i>
                                        @endif
                                    @endfor
                                    <span
                                        class="text-muted small ms-1 font-weight-bold">({{ $testimonial->rating }}.0)</span>
                                </div>

                                <!-- Review Body -->
                                <p class="text-secondary small fst-italic flex-grow-1 mb-4 position-relative"
                                    style="line-height: 1.7;">
                                    "{{ $testimonial->review }}"
                                </p>

                                <!-- Customer Info -->
                                <div class="d-flex align-items-center gap-3 pt-3 border-top border-brand mt-auto">
                                    @if ($testimonial->avatar)
                                        <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}"
                                            class="rounded-circle shadow-sm border"
                                            style="width: 44px; height: 44px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-brand-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm"
                                            style="width: 44px; height: 44px; font-size: 1.1rem; flex-shrink: 0;">
                                            {{ mb_substr($testimonial->name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-0 fw-bold text-brand-primary">{{ $testimonial->name }}</h6>
                                        <small class="text-muted"><i
                                                class="fa-solid fa-location-dot me-1 text-danger"></i>{{ $testimonial->city ?? 'الرياض' }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide w-100">
                            <div class="custom-card p-5 text-center text-muted bg-white rounded-4 border">
                                لا توجد آراء مسجلة حالياً.
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Swiper Pagination -->
                <div class="swiper-pagination position-relative mt-4"></div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
                                                       FAQ SECTION (BOOTSTRAP ACCORDION)
                                                       ========================================================================== -->
    <section class="py-5 bg-brand-light faq" id="faq">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span
                    class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm">
                    <i class="fa-solid fa-circle-question me-1"></i> الأسئلة الشائعة
                </span>
                <h2 class="fw-heading display-6 text-brand-primary">
                    إجابات على أكثر استفساراتكم
                </h2>
                <p class="text-secondary">
                    كل ما تود معرفته حول خدماتنا والخصم والضمانات.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="accordion" id="faqAccordion">
                        @forelse($faqs as $faq)
                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 80 }}">
                                <h2 class="accordion-header" id="heading-faq-{{ $faq->id }}">
                                    <button
                                        class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-bold text-brand-primary"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-collapse-{{ $faq->id }}"
                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="faq-collapse-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faq-collapse-{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="heading-faq-{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary small" style="line-height: 1.8;">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="custom-card p-5 text-center text-muted bg-white rounded-4 border">
                                لا توجد أسئلة شائعة مضافة حالياً.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
                                                       BLOG & TIPS SECTION (المدونة وأحدث المقالات)
                                                       ========================================================================== -->
    <section class="py-5 bg-white" id="blog">
        <div class="container py-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-3" data-aos="fade-up">
                <div>
                    <span
                        class="badge bg-brand-light text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-2">
                        <i class="fa-solid fa-newspaper text-brand-secondary me-1"></i> مدونة شركة سين ياء
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary mb-1">نصائح وإرشادات النظافة الشاملة</h2>
                    <p class="text-secondary mb-0">مقالات ومعلومات حصرية تساعدك في الحفاظ على بريق منزلك وصحة عائلتك
                    </p>
                </div>
                <div>
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-brand rounded-pill px-4">
                        <i class="fa-solid fa-list me-1"></i> تصفح جميع المقالات
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse($posts as $post)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) + 1) * 120 }}">
                        <div class="blog-card h-100 d-flex flex-column">
                            <div class="blog-img-wrapper position-relative overflow-hidden" style="height: 220px;">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                    class="w-100 h-100 object-fit-cover">
                                <span class="blog-badge bg-brand-primary text-white">
                                    <i class="{{ $post->category_icon ?? 'fa-solid fa-lightbulb' }} me-1"></i>
                                    {{ $post->category }}
                                </span>
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                                        <span><i class="fa-regular fa-calendar me-1"></i>
                                            {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                                        <span>•</span>
                                        <span><i class="fa-regular fa-clock me-1"></i>
                                            {{ $post->reading_time ?? '5 دقائق قراءة' }}</span>
                                    </div>
                                    <h3 class="blog-title mb-3" style="font-size: 1.15rem; line-height: 1.5;">
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                            class="text-decoration-none text-brand-primary fw-bold">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="text-secondary small mb-4" style="line-height: 1.6;">
                                        {{ Str::limit($post->short_description ?: strip_tags($post->content), 120) }}
                                    </p>
                                </div>
                                <div
                                    class="pt-3 border-top border-brand d-flex justify-content-between align-items-center mt-auto">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="fw-bold text-brand-primary text-decoration-none small d-inline-flex align-items-center gap-1">
                                        <span>اقرأ المقال كاملاً</span>
                                        <i class="fa-solid fa-arrow-left small"></i>
                                    </a>
                                    <span
                                        class="badge bg-brand-light text-brand-primary small">{{ $post->category }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="custom-card p-5 text-center text-muted bg-white rounded-4 border">
                            لا توجد مقالات منشورة حالياً في المدونة.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .swiper-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border: 1px solid rgba(12, 59, 94, 0.15);
            color: #0c3b5e;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.25s ease-in-out;
        }

        .swiper-btn:hover {
            background: #0c3b5e;
            color: #ffffff;
            border-color: #0c3b5e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(12, 59, 94, 0.2);
        }

        .testimonials-slider {
            padding-bottom: 3rem !important;
        }

        .testimonials-slider .swiper-slide {
            height: auto;
            display: flex;
        }

        .testimonials-slider .custom-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonials-slider .custom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
        }

        .testimonials-slider .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #cbd5e1;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .testimonials-slider .swiper-pagination-bullet-active {
            width: 28px;
            border-radius: 6px;
            background: #0c3b5e;
            opacity: 1;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Testimonials Swiper Slider
            if (typeof Swiper !== 'undefined' && document.querySelector('.testimonials-slider')) {
                const testimonialsSwiper = new Swiper('.testimonials-slider', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    autoplay: {
                        delay: 4500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    speed: 700,
                    pagination: {
                        el: '.testimonials-slider .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-btn-next',
                        prevEl: '.swiper-btn-prev',
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 24,
                        }
                    }
                });
            }

            // Booking Form AJAX handling
            const bookingForm = document.getElementById('bookingForm');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitBtn = document.getElementById('submitBookingBtn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML =
                        '<i class="fa-solid fa-spinner fa-spin me-1"></i> جاري إرسال الطلب...';
                    submitBtn.disabled = true;

                    const formData = new FormData(bookingForm);

                    fetch("{{ route('booking.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(response => response.json().then(data => ({
                            status: response.status,
                            body: data
                        })))
                        .then(({
                            status,
                            body
                        }) => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;

                            if (status === 200 && body.status === 'success') {
                                if (typeof Swal !== 'undefined') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'تم استلام طلبك بنجاح!',
                                        text: body.message,
                                        showCancelButton: true,
                                        confirmButtonText: '<i class="fa-brands fa-whatsapp me-1"></i> متابعة الموعد عبر واتساب',
                                        cancelButtonText: 'إغلاق',
                                        confirmButtonColor: '#25D366',
                                        cancelButtonColor: '#6c757d',
                                    }).then((result) => {
                                        if (result.isConfirmed && body.whatsapp_url) {
                                            window.open(body.whatsapp_url, '_blank');
                                        }
                                    });
                                } else {
                                    alert(body.message);
                                    if (body.whatsapp_url) {
                                        window.open(body.whatsapp_url, '_blank');
                                    }
                                }
                                bookingForm.reset();
                            } else {
                                let errorMsg = body.message || 'يرجى التأكد من صحة البيانات المدخلة.';
                                if (body.errors) {
                                    errorMsg = Object.values(body.errors).flat().join('<br>');
                                }
                                if (typeof Swal !== 'undefined') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'خطأ في الإرسال',
                                        html: errorMsg,
                                        confirmButtonText: 'حسناً',
                                        confirmButtonColor: '#0c3b5e'
                                    });
                                } else {
                                    alert(errorMsg);
                                }
                            }
                        })
                        .catch(err => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'عذراً',
                                    text: 'حدث خطأ أثناء الإرسال، يرجى المحاولة مرة أخرى أو الاتصال بنا مباشرة.',
                                    confirmButtonText: 'حسناً',
                                    confirmButtonColor: '#0c3b5e'
                                });
                            } else {
                                alert('حدث خطأ أثناء الإرسال، يرجى المحاولة مرة أخرى.');
                            }
                        });
                });
            }
        });
    </script>
@endpush
