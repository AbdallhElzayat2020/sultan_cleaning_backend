<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Primary SEO Meta Tags -->
    <title>@hasSection('title')@yield('title')@else{{ setting('meta_title', setting('site_name', 'سين ياء') . ' | خدمات النظافة والتعقيم الشامل بالمملكة') }}@endif</title>
    <meta name="title" content="@hasSection('title')@yield('title')@else{{ setting('meta_title', setting('site_name', 'سين ياء') . ' | خدمات النظافة والتعقيم الشامل بالمملكة') }}@endif" />
    <meta name="description" content="@yield('meta_description', setting('meta_description', 'شركة سين ياء لخدمات النظافة والتعقيم الشامل بالرياض والمملكة. تنظيف منازل، فلل، شقق، كنب ومفروشات بالبخار، جلي رخام وخزانات بأحدث التقنيات وأفضل الأسعار.'))" />
    <meta name="keywords" content="@yield('meta_keywords', setting('meta_keywords', 'شركة تنظيف بالرياض, شركة تنظيف منازل, شركة نظافة بالبخار, غسيل كنب بالرياض, جلي رخام, تنظيف فلل, تعقيم منازل, سين ياء لخدمات النظافة'))" />
    <meta name="author" content="{{ setting('meta_author', setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم') }}" />
    <meta name="robots" content="@yield('meta_robots', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')" />
    <link rel="canonical" href="@yield('canonical_url', url()->current())" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:locale" content="ar_SA" />
    <meta property="og:site_name" content="{{ setting('site_name', 'سين ياء') }}" />
    <meta property="og:url" content="@yield('og_url', url()->current())" />
    <meta property="og:title" content="@hasSection('og_title')@yield('og_title')@elseif(View::hasSection('title'))@yield('title')@else{{ setting('meta_title', setting('site_name', 'سين ياء') . ' | خدمات النظافة والتعقيم الشامل') }}@endif" />
    <meta property="og:description" content="@hasSection('og_description')@yield('og_description')@elseif(View::hasSection('meta_description'))@yield('meta_description')@else{{ setting('meta_description', 'شركة سين ياء لخدمات النظافة والتعقيم الشامل بالرياض. تنظيف منازل، فلل، شقق، كنب ومفروشات بالبخار بأحدث التقنيات.') }}@endif" />
    <meta property="og:image" content="@hasSection('og_image')@yield('og_image')@else{{ asset('images/logo.png') }}@endif" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="@yield('twitter_url', url()->current())" />
    <meta name="twitter:title" content="@hasSection('twitter_title')@yield('twitter_title')@elseif(View::hasSection('title'))@yield('title')@else{{ setting('meta_title', setting('site_name', 'سين ياء')) }}@endif" />
    <meta name="twitter:description" content="@hasSection('twitter_description')@yield('twitter_description')@elseif(View::hasSection('meta_description'))@yield('meta_description')@else{{ setting('meta_description', 'شركة سين ياء لخدمات النظافة والتعقيم الشامل بالرياض.') }}@endif" />
    <meta name="twitter:image" content="@hasSection('twitter_image')@yield('twitter_image')@elseif(View::hasSection('og_image'))@yield('og_image')@else{{ asset('images/logo.png') }}@endif" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}" />

    <!-- JSON-LD Structured Data -->
    @hasSection('schema_org')
        @yield('schema_org')
    @else
        @php
            $headSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'HomeAndConstructionBusiness',
                'name' => setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'),
                'alternateName' => 'سين ياء',
                'url' => url('/'),
                'logo' => asset('images/logo.png'),
                'image' => asset('images/hero.jpg'),
                'description' => setting('meta_description', 'شركة سين ياء لخدمات النظافة والتعقيم الشامل بالرياض والمملكة. تنظيف منازل وفلل وشقق ومفروشات بالبخار وجلي رخام.'),
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
        {!! json_encode($headSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700;800;900&family=Tajawal:wght@400;500;700;800&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootstrap 5 RTL CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- AOS (Animate On Scroll) CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    <!-- Custom Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />

    @stack('styles')
    @stack('css')
</head>
