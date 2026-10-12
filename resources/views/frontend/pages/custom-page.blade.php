@extends('frontend.layouts.master')

@section('title', $page->seo_title)
@section('meta_description', $page->seo_description)
@section('meta_keywords', $page->seo_keywords)
@section('og_title', $page->seo_title)
@section('og_description', $page->seo_description)
@section('og_type', 'article')

@section('schema_org')
    @php
        $pageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $page->title,
            'description' => $page->seo_description,
            'url' => url()->current(),
            'datePublished' => optional($page->created_at)->toIso8601String(),
            'dateModified' => optional($page->updated_at)->toIso8601String(),
            'publisher' => [
                '@type' => 'Organization',
                'name' => setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
        ];
    @endphp
    <script type="application/ld+json">
{!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@push('styles')
    <style>
        .page-content-wrapper {
            background: #ffffff;
            border: 1px solid rgba(40, 125, 168, 0.12);
            border-radius: 24px;
            padding: 40px 32px;
            box-shadow: 0 10px 30px rgba(36, 55, 70, 0.04);
            line-height: 1.9;
            color: #243746;
        }

        @media (max-width: 768px) {
            .page-content-wrapper {
                padding: 24px 18px;
                border-radius: 18px;
            }
        }

        .page-content-wrapper h2 {
            color: var(--primary, #287DA8);
            font-weight: 800;
            font-size: 1.45rem;
            margin-top: 32px;
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 2px solid rgba(41, 198, 209, 0.18);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-content-wrapper h2::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 22px;
            background: var(--secondary, #29C6D1);
            border-radius: 4px;
        }

        .page-content-wrapper h3 {
            color: var(--text-main, #243746);
            font-weight: 700;
            font-size: 1.25rem;
            margin-top: 24px;
            margin-bottom: 12px;
        }

        .page-content-wrapper p {
            margin-bottom: 18px;
            font-size: 1.05rem;
            color: #3b5062;
        }

        .page-content-wrapper ul,
        .page-content-wrapper ol {
            margin-bottom: 22px;
            padding-right: 24px;
        }

        .page-content-wrapper li {
            margin-bottom: 10px;
            font-size: 1.02rem;
            color: #3b5062;
        }

        .page-content-wrapper blockquote {
            background: rgba(41, 198, 209, 0.08);
            border-right: 4px solid var(--secondary, #29C6D1);
            padding: 16px 20px;
            border-radius: 12px;
            font-style: italic;
            margin: 24px 0;
            color: #243746;
        }

        .page-meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ffffff;
            color: #243746;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid rgba(40, 125, 168, 0.15);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
    </style>
@endpush

@section('content')
    <!-- ==========================================================================
           PAGE HEADER BANNER
           ========================================================================== -->
    <section class="page-header-banner py-5 text-center">
        <div class="container py-3">
            <span class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-3 shadow-sm">
                <i class="fa-solid fa-file-shield text-brand-secondary me-1"></i> وثائق ومعلومات رسمية
            </span>
            <h1 class="display-5 fw-heading text-brand-primary mb-2">{{ $page->title }}</h1>
            @if ($page->excerpt)
                <p class="lead text-secondary max-w-700 mx-auto mb-3 fs-6">
                    {{ $page->excerpt }}
                </p>
            @endif

            <!-- Meta Chips -->
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
                <div class="page-meta-chip">
                    <i class="fa-regular fa-clock text-warning"></i>
                    <span>آخر تحديث: {{ $page->updated_at->format('Y-m-d') }}</span>
                </div>
                <div class="page-meta-chip">
                    <i class="fa-solid fa-book-open text-brand-secondary"></i>
                    <span>{{ $page->reading_time }}</span>
                </div>
                @if ($page->views > 0)
                    <div class="page-meta-chip">
                        <i class="fa-regular fa-eye text-success"></i>
                        <span>{{ number_format($page->views) }} مشاهدة</span>
                    </div>
                @endif
            </div>

            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-brand-primary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
           MAIN CONTENT SECTION
           ========================================================================== -->
    <section class="py-5 bg-brand-light">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <!-- Action Bar (Print & Share) -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted small">
                            <i class="fa-solid fa-building me-1 text-brand-primary"></i>
                            <strong>{{ setting('site_name', 'سين ياء') }}</strong> - الوثائق المعتمدة
                        </span>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                onclick="window.print()" title="طباعة هذه الوثيقة">
                                <i class="fa-solid fa-print me-1"></i> طباعة
                            </button>
                            <a href="https://wa.me/?text={{ urlencode($page->title . ' - ' . url()->current()) }}"
                                target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3"
                                title="مشاركة عبر واتساب">
                                <i class="fa-brands fa-whatsapp me-1"></i> مشاركة
                            </a>
                        </div>
                    </div>

                    <!-- Rendered Rich Content -->
                    <div class="page-content-wrapper">
                        {!! $page->content !!}
                    </div>

                    <!-- Contact & Inquiries Card -->
                    <div class="mt-4 p-4 rounded-4 text-center bg-white border border-brand shadow-sm">
                        <h4 class="fw-heading text-brand-primary mb-2">هل لديك أي استفسار حول هذه الصفحة؟</h4>
                        <p class="text-secondary small mb-3">فريق خدمة عملاء شركة سين ياء متاح على مدار الساعة للإجابة على
                            جميع تساؤلاتكم بكل سرور.</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً، لدي استفسار بخصوص ' . $page->title) }}"
                                target="_blank" class="btn btn-brand-whatsapp px-4 py-2">
                                <i class="fa-brands fa-whatsapp me-1"></i> تواصل عبر واتساب
                            </a>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}"
                                class="btn btn-brand-primary px-4 py-2">
                                <i class="fa-solid fa-phone me-1"></i> اتصال هاتفي مباشر ({{ setting('top_bar_phone', '0531109831') }})
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
