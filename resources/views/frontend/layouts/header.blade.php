    <!-- ==========================================================================
       TOP ANNOUNCEMENT BAR
       ========================================================================== -->
    <div class="bg-brand-primary py-2 text-white border-bottom border-white border-opacity-10 small">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-brand-accent rounded-pill px-3 py-1 fw-bold">🎉 عرض حصري</span>
                <span>خصم خاص <strong>35%</strong> على جميع خدمات التنظيف والتعقيم
                    الشامل!</span>
            </div>
            <div class="d-none d-md-flex align-items-center gap-4">
                <a href="tel:+966582102525" class="text-white text-decoration-none fw-semibold">
                    <i class="fa-solid fa-phone-volume text-brand-secondary me-1"></i>
                    0582102525
                </a>
                <a href="https://wa.me/966582102525" target="_blank" class="text-white text-decoration-none fw-semibold">
                    <i class="fa-brands fa-whatsapp text-brand-accent me-1"></i> خدمة
                    24/7
                </a>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
       NAVBAR (BOOTSTRAP 5)
       ========================================================================== -->
    <nav class="navbar navbar-expand-lg sticky-top main-navbar py-3 shadow-sm">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('home') }}">
                <div>
                    <div class="fw-heading fs-4 text-brand-primary lh-1">
                        سلطان <span class="text-brand-secondary">كلين</span>
                    </div>
                    <small class="text-muted fw-semibold" style="font-size: 0.72rem">لخدمات النظافة والتعقيم
                        الشامل</small>
                </div>
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
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#features">مميزاتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">أعمالنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#reviews">آراء العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}" href="{{ route('blog.index') }}">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">اتصل بنا</a>
                    </li>
                </ul>

                <!-- Single Action CTA in Navbar -->
                <div class="d-flex align-items-center">
                    <a href="tel:+966582102525"
                        class="btn btn-brand-primary d-inline-flex align-items-center gap-2 px-4 py-2">
                        <i class="fa-solid fa-phone-volume"></i>
                        <span>اتصل بنا الآن</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
