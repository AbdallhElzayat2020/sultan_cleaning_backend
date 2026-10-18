@extends('frontend.layouts.master')

@section('title', '404 - الصفحة غير موجودة | ' . setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'))
@section('meta_description', 'عفواً، الصفحة التي تبحث عنها غير موجودة في موقع سين ياء لخدمات النظافة والتعقيم الشامل.')

@section('content')
    <!-- ==========================================================================
           404 NOT FOUND SECTION
           ========================================================================== -->
    <section class="error-page-section py-5">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    
              

                    <!-- Status Pill -->
                    <div class="mb-3" data-aos="fade-up" data-aos-delay="100">
                        <span class="badge bg-brand-light text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold shadow-sm">
                            <i class="fa-solid fa-triangle-exclamation text-brand-secondary me-1"></i> رمز الخطأ: 404 • الصفحة غير موجودة
                        </span>
                    </div>

                    <!-- Main Heading & Friendly Explanation -->
                    <h1 class="fw-heading display-6 text-brand-primary mb-3" data-aos="fade-up" data-aos-delay="150">
                        عفواً! يبدو أن هذه الصفحة قد تبخرت كالفقاعات
                    </h1>
                    <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-4" data-aos="fade-up" data-aos-delay="200">
                        الصفحة التي تحاول الوصول إليها قد تكون حُذفت، أو تم تغيير رابطها، أو ربما كُتب العنوان بشكل غير صحيح. يمكنك العودة للصفحة الرئيسية أو استكشاف خدمات النظافة المتاحة.
                    </p>

                    <!-- Main Action Buttons -->
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5" data-aos="fade-up" data-aos-delay="250">
                        <a href="{{ route('home') }}" class="btn btn-brand-primary btn-lg rounded-pill px-4 py-3 shadow-sm">
                            <i class="fa-solid fa-house me-2"></i> العودة للرئيسية
                        </a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-brand btn-lg rounded-pill px-4 py-3">
                            <i class="fa-solid fa-layer-group me-2"></i> تصفح خدماتنا
                        </a>
                        <button type="button" onclick="window.history.back()" class="btn btn-light border rounded-pill px-4 py-3 text-secondary">
                            <i class="fa-solid fa-arrow-right me-2"></i> الرجوع للخلف
                        </button>
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark rounded-pill px-4 py-3">
                                <i class="fa-solid fa-gauge me-2"></i> لوحة التحكم
                            </a>
                        @endauth
                    </div>

                    <!-- Helpful Suggestions Quick Cards -->
                    <div class="border-top pt-4" data-aos="fade-up" data-aos-delay="300">
                        <h6 class="text-muted fw-bold mb-3 small">قد تهمك هذه الروابط السريعة:</h6>
                        <div class="row g-3 justify-content-center text-start">
                            <div class="col-md-4">
                                <a href="{{ route('services.index') }}" class="text-decoration-none text-dark d-block">
                                    <div class="error-quick-card">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="rounded-circle bg-brand-light text-brand-primary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                                <i class="fa-solid fa-sparkles text-brand-secondary"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-brand-primary">خدماتنا الشاملة</h6>
                                                <small class="text-muted">تنظيف منازل، فلل، وبخار</small>
                                            </div>
                                        </div>
                                        <span class="small text-brand-secondary fw-semibold">استكشف الباقات <i class="fa-solid fa-arrow-left ms-1"></i></span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="{{ route('gallery') }}" class="text-decoration-none text-dark d-block">
                                    <div class="error-quick-card">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="rounded-circle bg-brand-light text-brand-primary d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                                <i class="fa-solid fa-images text-brand-secondary"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-brand-primary">معرض أعمالنا</h6>
                                                <small class="text-muted">نتائج قبل وبعد حقيقية</small>
                                            </div>
                                        </div>
                                        <span class="small text-brand-secondary fw-semibold">مشاهدة الأعمال <i class="fa-solid fa-arrow-left ms-1"></i></span>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، واجهت صفحة مفقودة وأود الاستفسار') }}" target="_blank" class="text-decoration-none text-dark d-block">
                                    <div class="error-quick-card">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-brand-primary">دعم واتساب 24/7</h6>
                                                <small class="text-muted">مساعدة فورية ومباشرة</small>
                                            </div>
                                        </div>
                                        <span class="small text-success fw-semibold">تحدث معنا الآن <i class="fa-solid fa-arrow-left ms-1"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
