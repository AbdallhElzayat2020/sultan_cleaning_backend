    @if (setting('top_bar_active', '1') == '1')
        <!-- ==========================================================================
       TOP ANNOUNCEMENT BAR
       ========================================================================== -->
        <div class="bg-brand-primary py-2 text-white border-bottom border-white border-opacity-10 small">
            <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    @if (setting('top_bar_badge'))
                        <span
                            class="badge bg-brand-accent rounded-pill px-3 py-1 fw-bold">{{ setting('top_bar_badge') }}</span>
                    @endif
                    <span>
                        @if (setting('top_bar_discount'))
                            <strong>{{ setting('top_bar_discount') }}</strong>
                        @endif
                        {{ setting('top_bar_text', 'خصم خاص على جميع خدمات التنظيف والتعقيم الشامل!') }}
                    </span>
                </div>
                <div class="d-none d-md-flex align-items-center gap-4">
                    @php
                        $phone = setting('top_bar_phone', '0531109831');
                        $whatsapp = setting('top_bar_whatsapp', '966531109831');
                    @endphp
                    @if ($phone)
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}"
                            class="text-white text-decoration-none fw-semibold">
                            <i class="fa-solid fa-phone-volume text-brand-secondary me-1"></i>
                            {{ $phone }}
                        </a>
                    @endif
                    @if ($whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsapp) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}" target="_blank"
                            class="text-white text-decoration-none fw-semibold">
                            <i class="fa-brands fa-whatsapp text-brand-accent me-1"></i> تواصل واتساب
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- ==========================================================================
       NAVBAR (BOOTSTRAP 5)
       ========================================================================== -->
    <nav class="navbar navbar-expand-lg sticky-top main-navbar py-2 shadow-sm">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none site-logo"
                href="{{ route('home') }}">

                <img style="max-height: 48px; width: auto; object-fit: contain;" src="{{ asset('assets/frontend/images/logo_master.png') }}"
                    alt="{{ setting('site_name', 'سين ياء كلين') }}">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}"
                            href="{{ route('services.index') }}">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#features">مميزاتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                            href="{{ route('gallery') }}">أعمالنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#reviews">آراء العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"
                            href="{{ route('blog.index') }}">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">اتصل بنا</a>
                    </li>
                </ul>

                <!-- Single Action CTA in Navbar (Booking/Contact Green) -->
                <div class="d-flex align-items-center">
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}"
                        class="btn btn-primary d-inline-flex align-items-center gap-2 px-4 py-2">
                        <i class="fa-solid fa-phone-volume"></i>
                        <span>اتصل بنا الآن</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
