@extends('frontend.layouts.master')

@section('title', 'معرض الصور وسابقة الأعمال | سلطان كلين - خصم 35%')

@push('css')
<style>
    /* Photo Gallery Grid & Hover Overlay */
    .photo-gallery-item {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(11, 61, 145, 0.08);
        border: 1px solid var(--border-color);
        background: #ffffff;
        cursor: pointer;
        transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
    }

    .photo-gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 36px rgba(11, 61, 145, 0.16);
        border-color: var(--secondary-color);
    }

    .photo-img-wrap {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .photo-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .photo-gallery-item:hover .photo-img-wrap img {
        transform: scale(1.12);
    }

    /* Overlay on Hover */
    .photo-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(11, 61, 145, 0.85) 0%, rgba(11, 61, 145, 0.2) 60%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.35s ease;
    }

    .photo-gallery-item:hover .photo-overlay {
        opacity: 1;
    }

    .zoom-icon-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.6);
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        transition: transform 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .photo-gallery-item:hover .zoom-icon-btn {
        transform: translate(-50%, -50%) scale(1);
    }

    /* Lightbox Modal */
    #galleryLightboxModal .modal-content {
        border-radius: 24px;
        border: none;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
    }

    #lightboxImg {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        border-radius: 18px 18px 0 0;
    }
</style>
@endpush

@section('content')
    <!-- ==========================================================================
       PAGE HEADER BANNER
       ========================================================================== -->
    <section class="bg-brand-primary text-white py-5 text-center position-relative overflow-hidden">
        <div class="container py-4 position-relative z-1">
            <span class="badge bg-brand-accent text-white px-3 py-2 rounded-pill fw-bold mb-3">
                <i class="fa-solid fa-camera-retro me-1"></i> شاهد جودة العمل الحقيقية
            </span>
            <h1 class="display-5 fw-heading text-white mb-2">معرض صور سلطان كلين</h1>
            <p class="lead text-white text-opacity-75 fs-6 max-w-700 mx-auto mb-3">
                اضغط على أي صورة لعرضها بالحجم الكامل مع تفاصيل الخدمة والطلب السريع عبر واتساب.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-brand-secondary text-decoration-none">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">معرض الصور</li>
                </ol>
            </nav>
        </div>
    </section>


    <!-- ==========================================================================
       PHOTO GALLERY GRID (CLICK TO OPEN POPUP MODAL)
       ========================================================================== -->
    <section class="py-5 bg-brand-light">
        <div class="container py-4">
            
            <div class="text-center max-w-700 mx-auto mb-5">
                <span class="badge bg-brand-primary text-white rounded-pill px-3 py-2 fw-bold mb-2">
                    <i class="fa-solid fa-images me-1"></i> صور حية من الميدان
                </span>
                <h2 class="fw-heading display-6 text-brand-primary mb-2">ألبوم المشاريع والأعمال المنجزة</h2>
                <p class="text-secondary">اضغط على أي صورة لتكبيرها واستعراض التفاصيل الكاملة</p>
                <div class="mx-auto bg-brand-secondary rounded-pill" style="width: 50px; height: 3.5px;"></div>
            </div>

            <!-- Photos Grid (Clickable to Popup) -->
            <div class="row g-4">
                @forelse($galleries as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="photo-gallery-item"
                            data-gallery-img="{{ $item->image_url }}"
                            data-gallery-title="{{ $item->title }}"
                            data-gallery-cat="{{ $item->category }}"
                            data-gallery-location="{{ $item->location ?? 'مدينة الرياض' }}">
                            <div class="photo-img-wrap">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" loading="lazy">
                                <span class="badge bg-brand-primary position-absolute top-0 end-0 m-3 px-3 py-1 rounded-pill fw-bold">
                                    <i class="{{ $item->category_icon ?? 'fa-solid fa-sparkles' }} me-1"></i> {{ $item->category }}
                                </span>
                                <div class="zoom-icon-btn">
                                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                                </div>
                                <div class="photo-overlay">
                                    <h5 class="text-white fw-bold mb-1 fs-6">{{ $item->title }}</h5>
                                    <small class="text-white-50">
                                        <i class="fa-solid fa-location-dot me-1 text-brand-secondary"></i> {{ $item->location ?? 'مدينة الرياض' }}
                                    </small>
                                </div>
                            </div>
                            <div class="p-3 bg-white d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="fw-bold text-brand-primary fs-6">{{ Str::limit($item->title, 32) }}</div>
                                    <small class="text-muted">{{ $item->location ?? 'الرياض' }}</small>
                                </div>
                                <span class="badge bg-brand-light text-brand-primary small">معاينة الصورة <i class="fa-solid fa-expand ms-1"></i></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-solid fa-images fa-2x mb-3 text-secondary"></i>
                        <p>لا توجد أعمال مضافة حالياً في المعرض، تابعونا قريباً لرؤية مشاريعنا المتميزة.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       LIGHTBOX POPUP MODAL (BOOTSTRAP 5 POPUP)
       ========================================================================== -->
    <div class="modal fade" id="galleryLightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Body with Image -->
                <div class="position-relative bg-dark">
                    <img src="" id="lightboxImg" alt="معاينة الصورة" class="img-fluid">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 start-0 m-3 shadow"
                        data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <!-- Modal Footer Details & WhatsApp Trigger -->
                <div class="modal-body p-4 bg-white">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                        <span id="lightboxCategory" class="badge bg-brand-light text-brand-primary px-3 py-2 rounded-pill fw-bold"></span>
                        <span id="lightboxLocation" class="text-muted small fw-semibold"></span>
                    </div>
                    <h4 id="lightboxTitle" class="fw-heading text-brand-primary fs-5 mb-3"></h4>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 pt-3 border-top border-brand">
                        <a href="#" id="lightboxWaBtn" target="_blank" class="btn btn-brand-whatsapp rounded-pill px-4 fw-bold">
                            <i class="fa-brands fa-whatsapp me-2"></i> اطلب نفس الخدمة مع خصم 35%
                        </a>
                        <a href="tel:+966582102525" class="btn btn-outline-brand rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-phone me-2"></i> اتصل: 0582102525
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========================================================================
       GIANT CTA BANNER
       ========================================================================== -->
    <section class="py-5 bg-brand-primary text-white text-center">
        <div class="container py-3">
            <span class="badge bg-brand-accent px-3 py-2 rounded-pill fw-bold mb-3">🔥 احصل على نفس مستوى النظافة لمنزلك</span>
            <h2 class="display-6 fw-heading text-white mb-3">احجز موعد المعاينة المجانية اليوم واستفد من خصم 35%</h2>
            <p class="lead text-white text-opacity-75 max-w-700 mx-auto mb-4 fs-6">
                فريقنا جاهز على مدار الساعة في جميع أحياء الرياض ومناطق المملكة لتوفير أرقى تجربة نظافة ترضي تطلعاتك.
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="tel:+966582102525" class="btn btn-light text-brand-primary btn-lg rounded-pill px-5 fw-bold shadow">
                    <i class="fa-solid fa-phone-volume me-2 text-brand-secondary"></i> اتصل الآن: 0582102525
                </a>
                <a href="https://wa.me/966582102525?text={{ urlencode('مرحباً سلطان كلين، شاهدت معرض الصور وأرغب في طلب معاينة مع خصم 35%') }}"
                    target="_blank" class="btn btn-brand-whatsapp btn-lg rounded-pill px-5 fw-bold shadow">
                    <i class="fa-brands fa-whatsapp fs-5 me-2"></i> حجز عبر واتساب
                </a>
            </div>
        </div>
    </section>
@endsection
