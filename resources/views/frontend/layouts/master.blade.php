<!doctype html>
<html lang="ar" dir="rtl">

@include('frontend.layouts.head')

<body>
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
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود الاستفسار وطلب حجز خدمة') }}"
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
            <span>اتصال هاتفي</span>
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود الاستفسار وطلب حجز خدمة') }}"
            target="_blank" class="btn btn-brand-whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>واتساب فوري</span>
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

    <!-- Custom Theme JS -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
    @stack('js')
</body>

</html>
