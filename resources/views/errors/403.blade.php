@extends('frontend.layouts.master')

@section('title', '403 - غير مصرح بالدخول | ' . setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'))
@section('meta_description', 'عفواً، ليس لديك الصلاحيات الكافية للوصول إلى هذه الصفحة.')

@section('content')
    <!-- ==========================================================================
           403 FORBIDDEN / ACCESS DENIED SECTION
           ========================================================================== -->
    <section class="error-page-section py-5">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    
                    <!-- Animated Visual Badge & Number -->
                    <div class="error-visual-container" data-aos="zoom-in" data-aos-duration="700">
                        <div class="error-big-number error-403">403</div>
                        <div class="error-floating-icon icon-403">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                    </div>

                    <!-- Status Pill -->
                    <div class="mb-3" data-aos="fade-up" data-aos-delay="100">
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-bold shadow-sm">
                            <i class="fa-solid fa-lock text-danger me-1"></i> رمز الخطأ: 403 • وصول محظور / غير مصرح به
                        </span>
                    </div>

                    <!-- Main Heading & Friendly Explanation -->
                    <h1 class="fw-heading display-6 text-brand-primary mb-3" data-aos="fade-up" data-aos-delay="150">
                        عفواً! ليس لديك صلاحية الوصول إلى هذه الصفحة
                    </h1>
                    <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-4" data-aos="fade-up" data-aos-delay="200">
                        هذه المنطقة محمية وتتطلب صلاحيات إدارية خاصة. إذا كنت مسؤولاً في الموقع، يرجى تسجيل الدخول بحسابك المصرح له أو التواصل مع الدعم الفني لمساعدتك.
                    </p>

                    <!-- Main Action Buttons -->
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5" data-aos="fade-up" data-aos-delay="250">
                        <a href="{{ route('home') }}" class="btn btn-brand-primary btn-lg rounded-pill px-4 py-3 shadow-sm">
                            <i class="fa-solid fa-house me-2"></i> العودة للرئيسية
                        </a>

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-brand-whatsapp btn-lg rounded-pill px-4 py-3 shadow-sm">
                                <i class="fa-solid fa-right-to-bracket me-2"></i> تسجيل الدخول للمسؤول
                            </a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark btn-lg rounded-pill px-4 py-3 shadow-sm">
                                <i class="fa-solid fa-gauge me-2"></i> لوحة التحكم
                            </a>
                        @endguest

                        <button type="button" onclick="window.history.back()" class="btn btn-light border rounded-pill px-4 py-3 text-secondary">
                            <i class="fa-solid fa-arrow-right me-2"></i> الرجوع للخلف
                        </button>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، واجهت رسالة خطأ 403 وأحتاج مساعدة بصلاحيات الحساب') }}" target="_blank" class="btn btn-outline-brand rounded-pill px-4 py-3">
                            <i class="fa-brands fa-whatsapp me-2"></i> الدعم الفني
                        </a>
                    </div>

                    <!-- Helpful Suggestions Quick Cards -->
                    <div class="border-top pt-4" data-aos="fade-up" data-aos-delay="300">
                        <h6 class="text-muted fw-bold mb-3 small">أسباب محتملة للخطأ 403:</h6>
                        <div class="row g-3 justify-content-center text-start">
                            <div class="col-md-4">
                                <div class="error-quick-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-user-lock"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0 text-brand-primary">حساب غير مصرح</h6>
                                            <small class="text-muted">الصفحة مخصصة للإدارة فقط</small>
                                        </div>
                                    </div>
                                    <span class="small text-muted">تأكد من تسجيل الدخول بالحساب الصحيح</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="error-quick-card">
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-hourglass-end"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0 text-brand-primary">انتهاء الجلسة</h6>
                                            <small class="text-muted">انقضت مدة تسجيل الدخول</small>
                                        </div>
                                    </div>
                                    <span class="small text-muted">أعد تسجيل الدخول لتجديد أمان الجلسة</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}" target="_blank" class="text-decoration-none text-dark d-block">
                                    <div class="error-quick-card">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                                <i class="fa-solid fa-headset fs-5"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-0 text-brand-primary">فريق المساعدة</h6>
                                                <small class="text-muted">متاحون للرد على استفسارك</small>
                                            </div>
                                        </div>
                                        <span class="small text-success fw-semibold">طلب الدعم والمساعدة <i class="fa-solid fa-arrow-left ms-1"></i></span>
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
