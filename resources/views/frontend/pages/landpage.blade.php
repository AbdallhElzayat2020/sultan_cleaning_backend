<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Primary SEO Meta Tags -->
    <title>{{ setting('site_name', 'سين ياء') }} | شركة خدمات النظافة والتعقيم الشامل </title>
    <meta name="title" content="{{ setting('site_name', 'سين ياء') }} | شركة خدمات النظافة والتعقيم الشامل ">
    <meta name="description"
        content="شركة {{ setting('site_name', 'سين ياء') }} - لخدمات التنظيف الشامل، تنظيف الفلل، الشقق، الكنب، السجاد، والمفروشات بالبخار بأحدث التقنيات وأعلى معايير الإتقان وبأفضل الأسعار التنافسية.">
    <meta name="keywords" content="شركة تنظيف , تنظيف منازل, غسيل كنب بالبخار, جلي رخام, تنظيف فلل , تعقيم منازل, سين ياء لخدمات النظافة">
    <meta name="author" content="{{ setting('site_name', 'سين ياء') }} لخدمات النظافة والتعقيم">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url('/landpage') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ar_SA">
    <meta property="og:site_name" content="{{ setting('site_name', 'سين ياء') }}">
    <meta property="og:url" content="{{ url('/landpage') }}">
    <meta property="og:title" content="{{ setting('site_name', 'سين ياء') }} | نظافة عميقة وتعقيم فندقي متكامل بأفضل الأسعار">
    <meta property="og:description" content="احجز خدمتك الآن مع شركة {{ setting('site_name', 'سين ياء') }}. تنظيف فلل وشقق ومفروشات بأحدث أجهزة البخار وأفضل مواد التعقيم الآمنة 100%.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/landpage') }}">
    <meta name="twitter:title" content="{{ setting('site_name', 'سين ياء') }} | خدمات النظافة والتعقيم الشامل">
    <meta name="twitter:description" content="خدمات تنظيف فندقية ومفروشات بالبخار وجلي رخام مع شركة {{ setting('site_name', 'سين ياء') }}.">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}">

    <!-- Schema.org JSON-LD -->
    @php
        $landpageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'HomeAndConstructionBusiness',
            'name' => 'شركة ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم',
            'alternateName' => 'سين ياء',
            'url' => url('/landpage'),
            'logo' => asset('images/logo.png'),
            'image' => asset('images/hero.jpg'),
            'description' => 'شركة ' . setting('site_name', 'سين ياء') . ' لخدمات التنظيف الشامل، تنظيف الفلل، الشقق، الكنب، السجاد، والمفروشات بالبخار بالرياض.',
            'telephone' => setting('top_bar_phone', '0531109831'),
            'priceRange' => '$$',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'الرياض',
                'addressRegion' => 'منطقة الرياض',
                'addressCountry' => 'SA',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 24.7136,
                'longitude' => 46.6753,
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    'opens' => '00:00',
                    'closes' => '23:59',
                ],
            ],
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($landpageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700;800;900&family=Tajawal:wght@400;500;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">

    <!-- AOS (Animate On Scroll) CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- Custom Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <style>
        :root {
            /* Main Colors */
            --primary: #287DA8;
            --secondary: #29C6D1;
            --accent-blue: #258DB8;
            --cta: #35B85A;

            /* Background Colors */
            --background: #FFFFFF;
            --background-light: #EAF8FC;
            --background-soft: #D4F2F7;

            /* Text Colors */
            --text: #243746;
            --text-muted: #64748B;

            /* Borders */
            --border: #D8EAF1;

            /* Main Hero Gradient */
            --hero-gradient: linear-gradient(120deg,
                    #287DA8 0%,
                    #258DB8 55%,
                    #29C6D1 100%);

            /* Light Section Gradient */
            --section-gradient: linear-gradient(120deg,
                    #FFFFFF 0%,
                    #EAF8FC 55%,
                    #D4F2F7 100%);

            /* Compatibility Aliases */
            --primary-color: var(--primary);
            --primary-hover: #1e668a;
            --secondary-color: var(--secondary);
            --secondary-hover: #1fb1bc;
            --accent-color: var(--cta);
            --bg-light: var(--background-light);
            --text-primary: var(--text);
            --text-secondary: var(--text-muted);
            --border-color: var(--border);
        }

        body {
            background: var(--background);
            color: var(--text);
            font-family: "Tajawal", sans-serif;
            overflow-x: hidden !important;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .fw-heading {
            font-family: "Cairo", "Tajawal", sans-serif;
            font-weight: 800;
            color: var(--primary);
        }

        p,
        .lead {
            color: var(--text);
        }

        .text-muted {
            color: var(--text-muted) !important;
        }

        .text-secondary {
            color: var(--text-muted) !important;
        }

        /* Preserve Original Logo */
        .site-logo img {
            width: auto;
            max-width: 210px;
            height: auto;
            max-height: 58px;
            object-fit: contain;
            filter: none !important;
            display: inline-block;
        }

        /* Dedicated Landing Page Styles for High Conversion */
        .landing-header {
            background: var(--background);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 4px 20px rgba(40, 125, 168, 0.06);
            backdrop-filter: blur(12px);
        }

        /* Hero Section (Blue-to-Turquoise Gradient on Main Interface Only) */
        .hero-ad-section {
            background: var(--hero-gradient);
            position: relative;
            overflow: hidden;
            color: #FFFFFF;
        }

        .hero-ad-section h1,
        .hero-ad-section h2,
        .hero-ad-section h3,
        .hero-ad-section .fw-heading {
            color: #FFFFFF !important;
        }

        .hero-ad-section p,
        .hero-ad-section .lead {
            color: rgba(255, 255, 255, 0.95) !important;
        }

        .hero-ad-section::before {
            content: '';
            position: absolute;
            top: -120px;
            left: -120px;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(41, 198, 209, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-btn-xl {
            padding: 16px 32px;
            font-size: 1.15rem;
            font-weight: 800;
            border-radius: 50rem;
            transition: all 0.25s ease;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .cta-btn-xl:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.22);
        }

        /* Hero Call Button (High contrast white pill on hero gradient) */
        .btn-call-hero {
            background: #FFFFFF;
            color: var(--primary) !important;
            border: 2px solid #FFFFFF;
        }

        .btn-call-hero:hover {
            background: var(--background-light);
            color: #1e668a !important;
            border-color: #FFFFFF;
        }

        /* Hero WhatsApp Button (Green #35B85A for Booking/Contact) */
        .btn-wa-hero {
            background: var(--cta) !important;
            color: #FFFFFF !important;
            border: 2px solid var(--cta);
            box-shadow: 0 8px 24px rgba(53, 184, 90, 0.35);
        }

        .btn-wa-hero:hover {
            background: #278D43 !important;
            border-color: #278D43;
            color: #FFFFFF !important;
        }

        /* General Booking & Contact Buttons */
        .btn-primary,
        .btn-brand-whatsapp,
        .btn-booking,
        .btn-contact {
            background: var(--cta) !important;
            color: #FFFFFF !important;
            border: none;
            border-radius: 10px;
            padding: 14px 28px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(53, 184, 90, 0.25);
            text-decoration: none;
        }

        .btn-primary:hover,
        .btn-brand-whatsapp:hover,
        .btn-booking:hover,
        .btn-contact:hover {
            background: #278D43 !important;
            color: #FFFFFF !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 141, 67, 0.35);
        }

        .btn-brand-primary {
            background: var(--primary);
            color: #FFFFFF !important;
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 700;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-brand-primary:hover {
            background: #1e668a !important;
            color: #FFFFFF !important;
            transform: translateY(-2px);
        }

        .btn-outline-brand {
            border: 2px solid var(--primary);
            color: var(--primary) !important;
            background: transparent;
            border-radius: 50rem;
            padding: 10px 22px;
            font-weight: 700;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-outline-brand:hover {
            background: var(--primary);
            color: #FFFFFF !important;
            transform: translateY(-2px);
        }

        /* Services Section (Light Section Gradient) */
        .services-section {
            background: var(--section-gradient);
        }

        .service-clean-card {
            background: #FFFFFF;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px 24px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(40, 125, 168, 0.07);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        .service-clean-card:hover {
            transform: translateY(-6px);
            border-color: var(--secondary);
            box-shadow: 0 14px 35px rgba(40, 125, 168, 0.12);
        }

        .service-clean-icon {
            font-size: 2.4rem;
            color: var(--secondary);
            margin-bottom: 16px;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .service-clean-card:hover .service-clean-icon {
            transform: scale(1.12);
            color: var(--accent-blue);
        }

        .service-clean-title {
            font-family: "Cairo", sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 12px;
        }

        .service-clean-desc {
            font-size: 0.92rem;
            color: var(--text-muted);
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .service-clean-link {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .service-clean-link:hover {
            color: var(--secondary);
            transform: translateX(-4px);
        }

        /* Why Us Section */
        .why-us-section {
            background: #FFFFFF;
        }

        .trust-badge-card {
            background: #FFFFFF;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px 20px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(40, 125, 168, 0.06);
            height: 100%;
            transition: all 0.3s ease;
        }

        .trust-badge-card:hover {
            transform: translateY(-5px);
            border-color: var(--secondary);
            box-shadow: 0 12px 30px rgba(40, 125, 168, 0.11);
        }

        .trust-icon {
            width: 62px;
            height: 62px;
            border-radius: 16px;
            background: var(--background-light);
            color: var(--secondary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .trust-badge-card:hover .trust-icon {
            background: var(--background-soft);
            color: var(--primary);
            transform: scale(1.08);
        }

        /* Testimonials Section */
        .testimonials-section {
            background: var(--section-gradient);
        }

        .testimonial-ad-card {
            background: #FFFFFF;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 26px;
            position: relative;
            height: 100%;
            box-shadow: 0 4px 18px rgba(40, 125, 168, 0.06);
            transition: all 0.3s ease;
        }

        .testimonial-ad-card:hover {
            border-color: var(--secondary);
            box-shadow: 0 12px 30px rgba(40, 125, 168, 0.12);
            transform: translateY(-4px);
        }

        /* Giant Final CTA Box */
        .giant-cta-box {
            background: linear-gradient(135deg, var(--primary) 0%, #174E6B 100%);
            border-radius: 28px;
            padding: 50px 30px;
            color: #FFFFFF;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(23, 78, 107, 0.28);
        }

        .giant-cta-box::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(41, 198, 209, 0.2);
            pointer-events: none;
        }

        /* Footer */
        footer {
            background: #174E6B !important;
            color: #FFFFFF !important;
        }

        footer p,
        footer .text-white-50 {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        .author-credit {
            color: #FFFFFF;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.12);
            padding: 5px 14px;
            border-radius: 50px;
            display: inline-block;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Sticky Mobile Bottom Bar */
        .mobile-bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            max-width: 100vw;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            border-top: 1px solid var(--border);
            padding: 10px 12px;
            z-index: 1040;
            box-shadow: 0 -6px 20px rgba(40, 125, 168, 0.08);
        }

        .mobile-bottom-bar .btn {
            font-size: 0.92rem;
            font-weight: 700;
            padding: 11px 10px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
            min-width: 0;
            white-space: nowrap;
        }

        /* Floating Circle Buttons */
        .floating-bar {
            position: fixed;
            bottom: 24px;
            left: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1050;
        }

        .floating-circle-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF !important;
            font-size: 1.6rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.22);
            transition: transform 0.3s ease;
            text-decoration: none;
        }

        .floating-circle-btn:hover {
            transform: scale(1.12);
        }

        .floating-whatsapp {
            background: var(--cta);
        }

        .floating-call {
            background: var(--primary);
        }

        .scroll-top-btn {
            position: fixed;
            bottom: 26px;
            right: 26px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent-blue) 100%);
            color: #FFFFFF !important;
            border: 2px solid rgba(255, 255, 255, 0.95);
            box-shadow: 0 8px 24px rgba(40, 125, 168, 0.28);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            cursor: pointer;
            z-index: 1045;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) scale(0.9);
            transition: all 0.35s ease;
            outline: none;
        }

        .scroll-top-btn.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .hero-img-box img {
            border-radius: 28px;
            border: 5px solid #FFFFFF;
            box-shadow: 0 20px 45px rgba(23, 78, 107, 0.25);
            height: 420px;
            width: 100%;
            object-fit: cover;
        }

        @media (max-width: 767.98px) {
            body {
                padding-bottom: 78px;
            }

            .floating-bar {
                display: none !important;
            }

            .scroll-top-btn {
                bottom: 84px;
                right: 16px;
                width: 44px;
                height: 44px;
            }

            .hero-img-box img {
                height: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader (Soap Bubbles & Squeegee) -->
    <div id="preloader" class="preloader">
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
                <div class="preloader-icon-wrapper">
                    <div class="preloader-glow"></div>
                    <div class="preloader-bubble-main">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <i class="fa-solid fa-sparkles preloader-sparkle preloader-sparkle-1"></i>
                    <i class="fa-solid fa-star preloader-sparkle preloader-sparkle-2"></i>
                </div>
                <h4 class="preloader-title">{{ setting('site_name', 'سين ياء') }}</h4>
                <p class="preloader-subtitle">بريق يدوم .. ونظافة تفوق التوقعات</p>
                <div class="preloader-bar">
                    <div class="preloader-progress"></div>
                </div>
            </div>
        </div>
    </div>
    @php
        $phone = setting('top_bar_phone', '0531109831');
        $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
        $whatsapp = setting('top_bar_whatsapp', '966531109831');
        $cleanWhatsapp = preg_replace('/[^0-9]/', '', $whatsapp);
        $logo = setting('site_logo') ? asset(setting('site_logo')) : asset('assets/frontend/images/logo.png');
    @endphp

    @if (setting('top_bar_active', '1') == '1')
        <!-- ==========================================================================
           TOP URGENT ANNOUNCEMENT BAR (ADMIN CONTROLLED)
           ========================================================================== -->
        <div class="py-2 text-white text-center small fw-bold" style="background-color: var(--primary);">
            <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2 mx-auto mx-md-0">
                    @if (setting('top_bar_badge'))
                        <span class="badge rounded-pill px-3 py-1" style="background-color: var(--cta); color: #fff;">🔥
                            {{ setting('top_bar_badge') }}
                        </span>
                    @endif
                    <span>
                        @if (setting('top_bar_discount'))
                            <strong>{{ setting('top_bar_discount') }}</strong>
                        @endif
                        {{ setting('top_bar_text', 'خصم خاص على جميع خدمات التنظيف والتعقيم الشامل!') }}
                    </span>
                </div>
                <div class="d-none d-md-flex align-items-center gap-3">
                    <span><i class="fa-solid fa-clock me-1" style="color: var(--secondary);"></i> متاحون 24 ساعة</span>
                    <span class="text-white-50">|</span>
                    <a href="tel:{{ $cleanPhone }}" class="text-white text-decoration-none fw-bold">
                        <i class="fa-solid fa-phone-volume me-1" style="color: var(--secondary);"></i> {{ $phone }}
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- ==========================================================================
       FOCUSED AD LANDING NAVBAR (WITH ORIGINAL LOGO)
       ========================================================================== -->
    <header class="landing-header py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Brand Logo (Original Logo Preserved) -->
            <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-decoration-none site-logo">
                <img src="{{ $logo }}" alt="{{ setting('site_name', 'سين ياء') }}" class="site-logo-img">
            </a>

            <!-- Direct Fast Contact CTA Buttons (Green #35B85A for Booking/Contact) -->
            <div class="d-flex align-items-center gap-2">
                <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أود الاستفسار وحجز خدمة تنظيف من شركة ' . setting('site_name', 'سين ياء')) }}"
                    target="_blank"
                    class="btn btn-primary fw-bold rounded-pill px-3 px-md-4 py-2 d-none d-sm-inline-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-brands fa-whatsapp fs-5"></i>
                    <span>واتساب سريع</span>
                </a>
                <a href="tel:{{ $cleanPhone }}"
                    class="btn btn-outline-brand fw-bold rounded-pill px-3 px-md-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm">
                    <i class="fa-solid fa-phone-volume"></i>
                    <span>اتصل بنا الآن</span>
                </a>
            </div>
        </div>
    </header>

    <!-- ==========================================================================
       HERO BANNER SECTION (High Trust & Quick Conversion with Hero Gradient)
       ========================================================================== -->
    <section class="hero-ad-section py-5 position-relative overflow-hidden">
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

        <div class="container py-lg-4 position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <!-- Text & Main CTA -->
                <div class="col-lg-7 text-center text-lg-start" data-aos="fade-up" data-aos-duration="800">
                    <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-2 rounded-pill shadow-sm mb-3"
                        data-aos="fade-down" data-aos-delay="100">
                        <span class="badge rounded-pill px-2 py-1"
                            style="background-color: var(--cta); color: #fff;">خدمة معتمدة 100%</span>
                        <span class="small fw-bold" style="color: var(--primary);">شركة رائدة لخدمات النظافة والتعقيم الشامل</span>
                    </div>

                    <h1 class="display-5 fw-heading text-white mb-3 lh-base" data-aos="fade-up" data-aos-delay="200">
                        نظافة عميقة وتعقيم فندقي متكامل
                        <span style="color: #EAF8FC; text-shadow: 0 2px 10px rgba(0,0,0,0.15);">بأحدث المعدات وبأفضل سعر
                            بدون وسيط</span>
                    </h1>

                    <p class="lead fs-6 mb-4 max-w-700" data-aos="fade-up" data-aos-delay="300">
                        سواء كنت بحاجة إلى تنظيف فيلا جديدة، شقة مسكونة، غسيل كنب وسجاد بالبخار الفوري، أو جلي رخام
                        وتنظيف واجهات؛ نوفر لك عمالة محترفة ومدربة تضمن لك أعلى درجات اللمعان والنظافة مع تعقيم معتمد
                        آمن للأسرة.
                    </p>

                    <!-- Trust Bullet Points -->
                    <div class="row g-2 mb-4 text-start" data-aos="fade-up" data-aos-delay="400">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-white fw-semibold small">
                                <i class="fa-solid fa-circle-check fs-6" style="color: #EAF8FC;"></i>
                                <span>تقييم فوري وحجز مباشر بدون أي تعقيد</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-white fw-semibold small">
                                <i class="fa-solid fa-circle-check fs-6" style="color: #EAF8FC;"></i>
                                <span>مواد تنظيف وتعقيم أصلية آمنة 100%</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-white fw-semibold small">
                                <i class="fa-solid fa-circle-check fs-6" style="color: #EAF8FC;"></i>
                                <span>أجهزة بخار وضغط عالي إيطالية وألمانية</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2 text-white fw-semibold small">
                                <i class="fa-solid fa-circle-check fs-6" style="color: #EAF8FC;"></i>
                                <span>ضمان إعادة العمل مجاناً في حال عدم الرضا</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dual Big Contact Buttons -->
                    <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3"
                        data-aos="fade-up" data-aos-delay="500">
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في الاستفسار وحجز خدمة تنظيف') }}"
                            target="_blank" class="cta-btn-xl btn-wa-hero">
                            <i class="fa-brands fa-whatsapp fs-4"></i>
                            <span>حجز وتواصل عبر واتساب</span>
                        </a>
                        <a href="tel:{{ $cleanPhone }}" class="cta-btn-xl btn-call-hero">
                            <i class="fa-solid fa-phone-volume"></i>
                            <span>اتصال فوري: {{ $phone }}</span>
                        </a>
                    </div>

                    <div class="mt-3 text-white text-opacity-90 small text-center text-lg-start">
                        <i class="fa-solid fa-shield-halved me-1" style="color: #EAF8FC;"></i> لا توجد أي رسوم خفية •
                        الدفع
                        بعد إتمام الخدمة ورضاك الكامل
                    </div>
                </div>

                <!-- Hero Image & Interactive Trust Card -->
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="300" data-aos-duration="900">
                    <div class="position-relative">
                        <div class="hero-img-box position-relative">
                            <img src="{{ asset('assets/frontend/images/hero.jpg') }}"
                                alt="خدمات شركة سين ياء للنظافة الشاملة" class="img-fluid">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3"
                                style="background: linear-gradient(to top, rgba(23,78,107,0.92), transparent); border-radius: 0 0 24px 24px;">
                                <div class="text-white d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="fw-bold fs-6">طاقم عمل مدرب ومجهز</div>
                                        <small class="text-white-50">التزام تام بالمواعيد ودقة في التنفيذ</small>
                                    </div>
                                    <span class="badge px-3 py-2 fs-6 rounded-pill"
                                        style="background-color: var(--cta); color: #fff;">جودة مضمونة</span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Stat Badge -->
                        <div class="hero-badge hero-badge-1 bg-white p-3 rounded-4 shadow d-none d-sm-flex align-items-center gap-3 position-absolute top-0 start-0 translate-middle-y"
                            style="border: 1px solid var(--border);" data-aos="zoom-in" data-aos-delay="500">
                            <div class="badge-icon text-white rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 45px; height: 45px; background-color: var(--secondary);">
                                <i class="fa-solid fa-star fs-5"></i>
                            </div>
                            <div>
                                <div class="fw-bold fs-6" style="color: var(--primary);">+1,500 عميل راضٍ</div>
                                <small class="text-muted">تقييم 4.9/5 نجوم</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       SERVICES SECTION (Clean Minimalist Cards - Exact Brand Match)
       ========================================================================== -->
    <section class="py-5 services-section" id="services">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm"
                    style="background-color: #FFFFFF; color: var(--primary); border: 1px solid var(--border);">
                    <i class="fa-solid fa-sparkles me-1" style="color: var(--secondary);"></i> حلولنا المتكاملة
                </span>
                <h2 class="fw-heading display-6 mb-2" style="color: var(--primary);">خدماتنا المتميزة</h2>
                <p class="max-w-700 mx-auto" style="color: var(--text);">نغطي كافة احتياجات النظافة والتعقيم للمنازل،
                    الفلل، الشركات،
                    والمفروشات بأعلى المعايير</p>
                <div class="mx-auto rounded-pill"
                    style="width: 50px; height: 3.5px; background-color: var(--secondary);"></div>
            </div>

            <!-- 6 Minimalist Clean Service Cards -->
            <div class="row g-4">
                <!-- 1. House Cleaning -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-house-chimney-window"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">تنظيف المنازل والفلل</h4>
                            <p class="service-clean-desc">
                                تنظيف شامل للشقق والفلل بفريق مدرّب ومواد آمنة على الأطفال والحيوانات الأليفة.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة تنظيف المنازل والفلل') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Office & Commercial Cleaning -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">تنظيف المكاتب والشركات</h4>
                            <p class="service-clean-desc">
                                نظافة يومية أو أسبوعية للمكاتب بمواعيد خارج وقت العمل حتى لا نعطل فريقك.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة تنظيف المكاتب والشركات') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Carpet & Sofa Steam Wash -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-couch"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">غسيل السجاد والكنب بالبخار</h4>
                            <p class="service-clean-desc">
                                غسيل عميق بالبخار يزيل البقع والروائح ويجف بسرعة، من غير ما تنقل الأثاث.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة غسيل السجاد والكنب بالبخار') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 4. Glass & Facade Cleaning -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-window-maximize"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">تنظيف الزجاج والواجهات</h4>
                            <p class="service-clean-desc">
                                تنظيف الواجهات الزجاجية والنوافذ بمعدات أمان لجميع الارتفاعات مع تلميع يدوم.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة تنظيف الزجاج والواجهات') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 5. Post Construction Cleaning -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-hammer"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">تنظيف ما بعد التشطيب</h4>
                            <p class="service-clean-desc">
                                نزيل غبار الأسمنت والدهانات وبقايا اللاصق ليكون المكان جاهزاً تماماً للسكن.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة تنظيف ما بعد التشطيب') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <!-- 6. Deep Kitchen & Bathrooms Sanitization -->
                <div class="col-md-6 col-lg-4">
                    <div class="service-clean-card">
                        <div class="service-clean-icon">
                            <i class="fa-solid fa-fire-flame-curved"></i>
                        </div>
                        <div>
                            <h4 class="service-clean-title">تعقيم المطابخ والحمامات</h4>
                            <p class="service-clean-desc">
                                إزالة الدهون المستعصية والجير والعفن من الأسطح والفواصل بمنتجات متخصصة ومعقمة.
                            </p>
                        </div>
                        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أرغب في حجز خدمة تعقيم المطابخ والحمامات') }}"
                            target="_blank" class="service-clean-link">
                            <span>طلب الخدمة الآن</span>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Middle Quick Action -->
            <div class="text-center mt-5">
                <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أريد معرفة المزيد عن خدماتكم وحجز موعد تنظيف') }}"
                    target="_blank" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow">
                    <i class="fa-solid fa-calendar-check me-2"></i> احجز خدمتك الآن وتواصل معنا مباشرة
                </a>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       WHY CHOOSE US / لماذا تختارنا (High Trust Factor)
       ========================================================================== -->
    <section class="py-5 why-us-section" id="why-us">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="badge rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm"
                    style="background-color: var(--background-light); color: var(--primary); border: 1px solid var(--border);">
                    <i class="fa-solid fa-medal me-1" style="color: var(--secondary);"></i> ثقة وضمان
                </span>
                <h2 class="fw-heading display-6 mb-2" style="color: var(--primary);">لماذا تختار شركة سين ياء؟</h2>
                <p class="max-w-700 mx-auto" style="color: var(--text);">نضمن لك تجربة نظافة راقية ومريحة ترفع عنك
                    عناء التنظيف
                    تماماً بأعلى مقاييس الجودة</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="trust-badge-card">
                        <div class="trust-icon">
                            <i class="fa-solid fa-certificate"></i>
                        </div>
                        <h4 class="fw-bold fs-5 mb-2" style="color: var(--primary);">ضمان ذهبي 100%</h4>
                        <p class="small mb-0" style="color: var(--text-muted);">إذا لم تكن راضياً بنسبة 100%، نعيد
                            تنظيف الأجزاء الملاحظ
                            عليها فوراً ومجاناً.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="trust-badge-card">
                        <div class="trust-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h4 class="fw-bold fs-5 mb-2" style="color: var(--primary);">عمالة نظامية ومدرّبة</h4>
                        <p class="small mb-0" style="color: var(--text-muted);">كوادر فنية متمرسة على دراية كاملة
                            بالتعامل مع كافة أنواع
                            الأقمشة والأسطح الحساسة.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="trust-badge-card">
                        <div class="trust-icon">
                            <i class="fa-solid fa-spray-can-sparkles"></i>
                        </div>
                        <h4 class="fw-bold fs-5 mb-2" style="color: var(--primary);">مواد آمنة ومصرّحة</h4>
                        <p class="small mb-0" style="color: var(--text-muted);">منظفات ومعقمات صديقة للبيئة خالية من
                            الروائح النفاذة وآمنة
                            تماماً على الأطفال وكبار السن.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="trust-badge-card">
                        <div class="trust-icon">
                            <i class="fa-solid fa-stopwatch"></i>
                        </div>
                        <h4 class="fw-bold fs-5 mb-2" style="color: var(--primary);">سرعة والتزام بالمواعيد</h4>
                        <p class="small mb-0" style="color: var(--text-muted);">نحترم وقتك بدقة، نصل في الموعد المحدد
                            وننجز العمل بأعلى
                            كفاءة وسرعة بدون فوضى.</p>
                    </div>
                </div>
            </div>

            <!-- Trust Stats Counters -->
            <div class="row g-4 mt-4 pt-3 text-center">
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-4 shadow-sm" style="border: 1px solid var(--border);">
                        <h3 class="fw-bold display-6 mb-1" style="color: var(--primary);">+1,500</h3>
                        <div class="small fw-bold" style="color: var(--text-muted);">عملية تنظيف ناجحة</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-4 shadow-sm" style="border: 1px solid var(--border);">
                        <h3 class="fw-bold display-6 mb-1" style="color: var(--secondary);">99.4%</h3>
                        <div class="small fw-bold" style="color: var(--text-muted);">نسبة رضا العملاء</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-4 shadow-sm" style="border: 1px solid var(--border);">
                        <h3 class="fw-bold display-6 mb-1" style="color: var(--cta);">+8</h3>
                        <div class="small fw-bold" style="color: var(--text-muted);">سنوات خبرة متواصلة</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-white rounded-4 shadow-sm" style="border: 1px solid var(--border);">
                        <h3 class="fw-bold display-6 mb-1" style="color: var(--primary);">24/7</h3>
                        <div class="small fw-bold" style="color: var(--text-muted);">خدمة ودعم على مدار الساعة</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       GIANT FINAL CALL TO ACTION (Super Prominent Buttons)
       ========================================================================== -->
    <section class="py-5" style="background-color: #FFFFFF;">
        <div class="container py-3">
            <div class="giant-cta-box text-center">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3 fs-6"
                    style="background-color: var(--cta); color: #fff;">
                    ✨ حجز سريع وبدون انتظار
                </span>
                <h2 class="display-5 fw-heading text-white mb-3">
                    جاهزون لخدمتكم بأعلى مستويات الجودة والإتقان
                </h2>
                <p class="lead text-white text-opacity-90 max-w-700 mx-auto mb-5 fs-6">
                    تواصل معنا اليوم لحجز خدمتك واستمتع بنظافة استثنائية لمنزلك أو منشأتك على أيدي فريقنا المتخصص وبأفضل الأسعار.
                </p>

                <!-- Giant Buttons -->
                <div
                    class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3 max-w-700 mx-auto">
                    <!-- Direct WhatsApp Button (Green #35B85A) -->
                    <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أود الاستفسار وحجز خدمة تنظيف من شركة ' . setting('site_name', 'سين ياء')) }}"
                        target="_blank"
                        class="btn btn-primary fw-bold py-3 px-4 px-lg-5 rounded-pill fs-5 d-inline-flex align-items-center justify-content-center gap-2 w-100 shadow-lg">
                        <i class="fa-brands fa-whatsapp fs-3"></i>
                        <span>تواصل واتساب مباشر</span>
                    </a>

                    <!-- Direct Phone Call Button -->
                    <a href="tel:{{ $cleanPhone }}"
                        class="btn btn-light fw-bold py-3 px-4 px-lg-5 rounded-pill fs-5 d-inline-flex align-items-center justify-content-center gap-2 w-100 shadow-lg"
                        style="color: var(--primary); border: 2px solid #ffffff;">
                        <i class="fa-solid fa-phone-volume fs-4" style="color: var(--secondary);"></i>
                        <span>اتصل الآن: {{ $phone }}</span>
                    </a>
                </div>

                <div class="mt-4 text-white text-opacity-90 small">
                    <i class="fa-solid fa-circle-check me-1" style="color: var(--secondary);"></i> متاحون على مدار
                    24/7 • استجابة فورية وحجز مباشر
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       FOOTER & DEVELOPER CREDITS
       ========================================================================== -->
    <footer class="text-white py-5 border-top border-white border-opacity-10">
        <div class="container text-center">
            <!-- Brand Logo in Footer -->
            <div class="site-logo mb-3 d-inline-block bg-white p-2 px-3 rounded-4 shadow-sm">
                <img src="{{ $logo }}" alt="{{ setting('site_name', 'سين ياء') }}">
            </div>

            <p class="text-white-50 small max-w-700 mx-auto mb-4">
                {{ setting('site_name', 'سين ياء') }} - الخيار الأول للنظافة الشاملة بالمملكة العربية السعودية، فلل،
                قصور، شقق، ومفروشات بأحدث تقنيات البخار والتعقيم الطبي.
            </p>

            @php
                $landpageFooterPages = \App\Models\Page::where('status', true)->where('show_in_footer', true)->orderBy('order')->get();
            @endphp
            @if($landpageFooterPages->isNotEmpty())
                <div class="py-3 border-top border-white border-opacity-10 d-flex flex-wrap justify-content-center align-items-center gap-3 text-center mb-2">
                    <span class="text-white text-opacity-50 small fw-bold"><i class="fa-solid fa-shield-halved text-brand-secondary me-1"></i> وثائق ومعلومات:</span>
                    @foreach($landpageFooterPages as $footerPage)
                        <a href="{{ route('pages.show', $footerPage->slug) }}" class="text-white text-opacity-80 text-decoration-none small fw-semibold">
                            {{ $footerPage->title }}
                        </a>
                        @if(!$loop->last)
                            <span class="text-white text-opacity-25 small">•</span>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="row align-items-center g-3 pt-3 border-top border-white border-opacity-10">
                <!-- Copyright -->
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small text-white text-opacity-75">
                        &copy; 2026 جميع الحقوق محفوظة لـ <strong>شركة
                            {{ setting('site_name', 'سين ياء') }}</strong>.
                    </p>
                </div>

                <!-- Developer Credit -->
                <div class="col-md-6 text-center text-md-end">
                    <span class="author-credit small">
                        <i class="fa-solid fa-code text-brand-secondary me-1"></i>
                        تم التصميم والتطوير بواسطة <a href="#"
                            class="text-white text-decoration-none fw-bold">عبدالله
                            الزيات</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Sticky Mobile Bottom Bar -->
    <div class="mobile-bottom-bar d-flex d-md-none gap-2">
        <a href="tel:{{ $cleanPhone }}" class="btn btn-outline-brand">
            <i class="fa-solid fa-phone"></i>
            <span>اتصال هاتفي</span>
        </a>
        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أود الاستفسار وحجز خدمة تنظيف') }}"
            target="_blank" class="btn btn-primary">
            <i class="fa-brands fa-whatsapp"></i>
            <span>واتساب فوري</span>
        </a>
    </div>

    <!-- Floating Actions (WhatsApp & Call) -->
    <div class="floating-bar">
        <a href="https://wa.me/{{ $cleanWhatsapp }}?text={{ urlencode('مرحباً، أود الاستفسار وحجز خدمة تنظيف') }}"
            target="_blank" class="floating-circle-btn floating-whatsapp" title="تواصل عبر واتساب">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="tel:{{ $cleanPhone }}" class="floating-circle-btn floating-call" title="اتصال مباشر">
            <i class="fa-solid fa-phone"></i>
        </a>
    </div>

    <!-- Scroll To Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="العودة للأعلى" title="العودة لأعلى الصفحة">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS (Animate On Scroll) JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Custom Main JS -->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    <script>
        // Scroll to top functionality
        const scrollBtn = document.getElementById('scrollTopBtn');
        if (scrollBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollBtn.classList.add('show');
                } else {
                    scrollBtn.classList.remove('show');
                }
            });
            scrollBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    </script>
</body>

</html>
