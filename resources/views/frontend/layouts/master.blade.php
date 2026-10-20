<!doctype html>
<html lang="ar" dir="rtl">

@include('frontend.layouts.head')

<body>
    <!-- ==========================================================================
       PRELOADER (SOAP BUBBLES & SQUEEGEE ANIMATION)
       ========================================================================== -->
    {{-- <div id="preloader" class="preloader">
        <!-- Floating Soap Bubbles in Preloader Background -->
        <div class="preloader-bubbles" aria-hidden="true">
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
            <span class="p-bubble"></span>
        </div>

        <div class="preloader-inner">
            <div class="preloader-card">
                <div class="preloader-bubbles-center">
                    <div class="preloader-logo-ring"></div>

                    <div class="bubble-main preloader-logo-bubble">
                        <span class="bubble-shine"></span>
                        <img src="{{ asset('assets/frontend/images/favicon_master.png') }}"
                            alt="{{ setting('site_name', 'سين ياء كلين') }}"
                            class="preloader-logo-img" />
                    </div>

                    <div class="bubble-sat bubble-sat-1">
                        <span class="bubble-shine"></span>
                    </div>
                    <div class="bubble-sat bubble-sat-2">
                        <span class="bubble-shine"></span>
                    </div>
                    <div class="bubble-sat bubble-sat-3">
                        <span class="bubble-shine"></span>
                    </div>
                    <i class="fa-solid fa-sparkles preloader-sparkle preloader-sparkle-1"></i>
                    <i class="fa-solid fa-star preloader-sparkle preloader-sparkle-2"></i>
                </div>
                <h4 class="preloader-title">{{ setting('site_name', 'سين ياء كلين') }}</h4>
                <p class="preloader-subtitle">بريق يدوم .. ونظافة تفوق التوقعات</p>
                <div class="preloader-bar">
                    <div class="preloader-progress"></div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('frontend.layouts.header')

    @yield('content')
    <!-- ==========================================================================
       FOOTER
       ========================================================================== -->
    @include('frontend.layouts.footer')

    <!-- ==========================================================================
       FLOATING ACTIONS (WHATSAPP & DIRECT CALL)
       ========================================================================== -->
    <div class="floating-bar">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}"
            target="_blank" class="floating-circle-btn floating-whatsapp" title="تواصل عبر الواتساب">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="floating-circle-btn floating-call" title="اتصال مباشر الآن">
            <i class="fa-solid fa-phone"></i>
        </a>
    </div>


    <!-- Sticky Mobile Bottom Bar -->
    <div class="mobile-bottom-bar d-flex d-md-none gap-2">
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-brand-primary">
            <i class="fa-solid fa-phone"></i>
            <span>اتصال بنا </span>
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}"
            target="_blank" class="btn btn-brand-whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>تواصل واتساب </span>
        </a>
    </div>

    <!-- Scroll To Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="العودة للأعلى" title="العودة لأعلى الصفحة">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS (Animate On Scroll) JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Custom Theme JS -->
    <script src="{{ asset('assets/frontend/js/main.js') }}?v={{ file_exists(public_path('assets/frontend/js/main.js')) ? filemtime(public_path('assets/frontend/js/main.js')) : '1.0' }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
    @stack('js')
</body>

</html>
