@extends('frontend.layouts.master')

@section('title', $service->seo_title)
@section('meta_description', $service->seo_description)
@section('meta_keywords', $service->seo_keywords)
@section('og_title', $service->seo_title)
@section('og_description', $service->seo_description)
@section('og_image', $service->image_url)
@section('og_type', 'service')

@section('schema_org')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'serviceType' => $service->title,
        'name' => $service->title,
        'description' => $service->seo_description,
        'image' => $service->image_url,
        'provider' => [
            '@type' => 'HomeAndConstructionBusiness',
            'name' => setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'),
            'telephone' => setting('top_bar_phone', '0531109831'),
            'url' => url('/'),
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => 'جده',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
    <!-- ==========================================================================
               PAGE HEADER BANNER
               ========================================================================== -->
    <section class="page-header-banner py-5 text-center">
        <div class="container py-3">
            @if($service->discount)
                <span class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm">
                    <i class="fa-solid fa-sparkles me-1 text-brand-secondary"></i> {{ $service->discount }}
                </span>
            @endif
            <h1 class="display-5 fw-heading text-brand-primary mb-2">{{ $service->title }}</h1>
            <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-3">
                {{ $service->short_description }}
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-brand-primary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}"
                            class="text-brand-primary text-decoration-none">خدماتنا</a></li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">{{ $service->title }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
               SERVICE DETAILS CONTENT & SIDEBAR
               ========================================================================== -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row g-4">

                <!-- MAIN DETAILS CONTENT (RIGHT COLUMN IN RTL) -->
                <div class="col-lg-8">
                    <!-- Main Feature Image -->
                    <div class="position-relative mb-4">
                        <img src="{{ $service->image_url }}" class="w-100 rounded-4 shadow-sm"
                            style="max-height: 440px; object-fit: cover;" alt="{{ $service->title }}">
                        @if($service->discount)
                            <span
                                class="position-absolute top-0 start-0 m-3 badge bg-brand-accent fs-6 px-3 py-2 rounded-pill shadow">
                                <i class="fa-solid fa-percent me-1"></i> {{ $service->discount }}
                            </span>
                        @endif
                    </div>

                    <!-- Overview Section -->
                    <div class="mb-5">
                        <h3 class="fw-heading text-brand-primary mb-3">نظرة عامة على الخدمة</h3>
                        <div class="text-secondary lh-lg mb-3 service-rich-content">
                            {!! $service->description !!}
                        </div>
                    </div>

                    <!-- Direct CTAs on Page -->
                    <div class="card border-0 bg-brand-light rounded-4 p-4 text-center shadow-sm">
                        <h4 class="fw-heading text-brand-primary mb-2">هل ترغب بحجز خدمة {{ $service->title }}؟</h4>
                        <p class="text-secondary small mb-3">تواصل معنا فوراً للحصول على أفضل جودة وضمان ملكي شامل</p>
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('مرحباً سين ياء، أود حجز خدمة: ' . $service->title) }}"
                                target="_blank" class="btn btn-brand-whatsapp px-4">
                                <i class="fa-brands fa-whatsapp me-1"></i> حجز عبر واتساب
                            </a>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-brand-primary px-4">
                                <i class="fa-solid fa-phone me-1"></i> اتصال مباشر الآن ({{ setting('top_bar_phone', '0531109831') }})
                            </a>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR (LEFT COLUMN IN RTL) -->
                <div class="col-lg-4">
                    <!-- Services Menu -->
                    <div class="card border-0 custom-card p-4 mb-4">
                        <h5 class="fw-heading text-brand-primary mb-3 pb-2 border-bottom border-brand">جميع خدماتنا</h5>
                        <div class="d-flex flex-column gap-2">
                            @foreach ($services as $item)
                                @php
                                    $isActive = $item->id === $service->id;
                                @endphp
                                <a href="{{ route('services.show', $item->slug) }}"
                                    class="d-flex align-items-center justify-content-between p-2 rounded-3 text-decoration-none fw-semibold {{ $isActive ? 'bg-brand-primary text-white shadow-sm' : 'text-secondary hover-bg' }}">
                                    <span>
                                        <i
                                            class="{{ $item->icon ?: 'fa-solid fa-wand-magic-sparkles' }} me-2 {{ $isActive ? 'text-white' : 'text-brand-secondary' }}"></i>
                                        {{ $item->title }}
                                    </span>
                                    <i class="fa-solid fa-chevron-left small {{ $isActive ? 'text-white' : '' }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quick Booking Sidebar Form -->
                    <div class="card border-0 custom-card p-4 mb-4 bg-brand-light">
                        <h5 class="fw-heading text-brand-primary mb-1">طلب حجز خدمة فورية</h5>
                        <p class="text-secondary small mb-3">املأ النموذج وسنتواصل معك فوراً</p>

                        <form id="sidebarBookingForm" method="POST" action="{{ route('booking.store') }}">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="service_name" value="{{ $service->title }}">

                            <div class="mb-3">
                                <label class="form-label small fw-bold">الخدمة المطلوبة</label>
                                <input type="text" class="form-control rounded-3 bg-white"
                                    value="{{ $service->title }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">الاسم الكريم <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control rounded-3 bg-white"
                                    placeholder="اسمك الكريم" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">رقم الجوال (واتساب) <span
                                        class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control rounded-3 bg-white"
                                    placeholder="05XXXXXXXX" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">المدينة / الحي <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control rounded-3 bg-white"
                                    placeholder="جده - حي النرجس" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">ملاحظات إضافية (اختياري)</label>
                                <textarea name="notes" class="form-control rounded-3 bg-white" rows="2"
                                    placeholder="مساحة المكان أو تفاصيل إضافية"></textarea>
                            </div>
                            <button type="submit" id="sidebarBookingSubmitBtn"
                                class="btn btn-primary w-100 py-2 fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> إرسال الطلب وتأكيد الحجز
                            </button>
                        </form>
                    </div>

                    <!-- Direct Help Box -->
                    <div class="card border-0 promo-box p-4 text-center">
                        <div class="rounded-circle bg-white bg-opacity-20 d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 50px; height: 50px; font-size: 1.4rem;">
                            <i class="fa-solid fa-headset text-warning"></i>
                        </div>
                        <h5 class="fw-bold text-white mb-2">هل تحتاج استشارة سريعة؟</h5>
                        <p class="text-white-50 small mb-3">فريق خدمة العملاء جاهز للإجابة على جميع استفساراتك 24/7</p>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-brand-secondary w-100 mb-2">
                            <i class="fa-solid fa-phone me-1"></i> {{ setting('top_bar_phone', '0531109831') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarForm = document.getElementById('sidebarBookingForm');
            if (sidebarForm) {
                sidebarForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitBtn = document.getElementById('sidebarBookingSubmitBtn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML =
                        '<i class="fa-solid fa-spinner fa-spin me-1"></i> جاري الإرسال...';
                    submitBtn.disabled = true;

                    const formData = new FormData(sidebarForm);

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
                                sidebarForm.reset();
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
