@extends('frontend.layouts.master')

@section('title', setting('seo_contact_title', 'اتصل بنا واحجز خدمتك الآن | ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة'))
@section('meta_description', setting('seo_contact_description', 'تواصل مع فريق شركة ' . setting('site_name', 'سين ياء') . ' لخدمات النظافة والتعقيم الشامل بجده. احجز موعدك فورياً عبر الهاتف أو الواتساب على مدار 24 ساعة.'))
@section('meta_keywords', setting('seo_contact_keywords', 'اتصل بنا, حجز موعد تنظيف, رقم شركة تنظيف بجده, واتساب شركة نظافة, ' . setting('site_name', 'سين ياء')))
@section('og_title', setting('seo_contact_title', 'اتصل بنا واحجز خدمتك الآن | شركة ' . setting('site_name', 'سين ياء')))
@section('og_description', setting('seo_contact_description', 'تواصل معنا مباشرة عبر الهاتف أو الواتساب لحجز أفضل خدمات النظافة والتعقيم بجده.'))

@section('content')
    <!-- ==========================================================================
       PAGE HEADER BANNER
       ========================================================================== -->
    <section class="page-header-banner py-5 text-center" data-aos="fade-down">
        <div class="container py-3">
            <span class="badge bg-white text-brand-primary border border-brand px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm">
                <i class="fa-solid fa-headset me-1 text-brand-secondary"></i> خدمة عملاء 24/7
            </span>
            <h1 class="display-5 fw-heading text-brand-primary mb-2">اتصل بنا وحجز خدمة تنظيف</h1>
            <p class="lead text-secondary fs-6 max-w-700 mx-auto mb-3">
                فريقنا الميداني جاهز للوصول إليك في أسرع وقت. تواصل معنا هاتفياً أو عبر الواتساب أو املأ النموذج وسنعاود الاتصال بك فوراً.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-brand-primary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">اتصل بنا</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
       CONTACT INFO CARDS
       ========================================================================== -->
    <section class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-4 mb-5">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="custom-card p-4 text-center h-100">
                        <div class="card-icon-bubble bg-brand-light text-brand-primary mx-auto mb-3">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <h5 class="fw-bold text-brand-primary mb-2">اتصال هاتفي</h5>
                        <p class="text-secondary small mb-3">متاحون على مدار الساعة</p>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="btn btn-outline-brand rounded-pill w-100 py-2 fw-bold">
                            {{ setting('top_bar_phone', '0531109831') }}
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="custom-card p-4 text-center h-100">
                        <div class="card-icon-bubble bg-brand-light text-brand-accent mx-auto mb-3">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h5 class="fw-bold text-brand-primary mb-2">محادثة واتساب</h5>
                        <p class="text-secondary small mb-3">رد فوري وسريع للحجوزات</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}" target="_blank" class="btn btn-primary rounded-pill w-100 py-2 fw-bold">
                            تواصل واتساب ({{ setting('top_bar_phone', '0531109831') }})
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="custom-card p-4 text-center h-100">
                        <div class="card-icon-bubble bg-brand-light text-brand-primary mx-auto mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5 class="fw-bold text-brand-primary mb-2">نطاق التغطية</h5>
                        <p class="text-secondary small mb-3">كافة أحياء جده ومناطق المملكة</p>
                        <span class="badge bg-brand-light text-brand-primary py-2 px-3 rounded-pill">تغطية شاملة 24/7</span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="custom-card p-4 text-center h-100">
                        <div class="card-icon-bubble bg-brand-light text-brand-primary mx-auto mb-3">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <h5 class="fw-bold text-brand-primary mb-2">ساعات العمل</h5>
                        <p class="text-secondary small mb-3">طوال أيام الأسبوع 24 ساعة</p>
                        <span class="badge bg-brand-secondary text-white py-2 px-3 rounded-pill">خدمة طوارئ مستمرة</span>
                    </div>
                </div>
            </div>

            <!-- Main Contact / Booking Form -->
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="badge bg-brand-accent text-white px-3 py-2 rounded-pill fw-bold mb-2">✨ تواصل معنا واطلب خدمتك</span>
                    <h2 class="fw-heading display-6 text-brand-primary mb-3">خدمات نظافة احترافية تبدأ بخطوة بسيطة</h2>
                    <p class="text-secondary lh-lg mb-4">
                        شاركنا تفاصيل الخدمة التي تحتاجها، وسيتواصل معك فريق سين ياء كلين لمناقشة متطلباتك وتقديم عرض السعر وتنسيق الموعد المناسب، مع الحرص على تقديم خدمات نظافة عالية الجودة تلبي تطلعاتك.
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-bold text-brand-primary">طلب خدمة سهل وتنسيق سريع للمواعيد.</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-bold text-brand-primary">معدات تنظيف حديثة ومنتجات عالية الجودة.</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-circle-check text-brand-secondary fs-5"></i>
                            <span class="fw-bold text-brand-primary">فريق عمل مدرّب واهتمام دقيق بجودة التنفيذ.</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 custom-card p-4 p-md-5 bg-brand-light">
                        <h3 class="fw-heading text-brand-primary mb-2 text-center">طلب حجز خدمة</h3>
                        <p class="text-secondary small text-center mb-4">سيتم استلام طلبك ومتابعة الحجز معك فوراً</p>

                        <form id="contactBookingForm" method="POST" action="{{ route('booking.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">الاسم الكريم <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control rounded-3 bg-white" placeholder="اسمك الكريم" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">رقم الجوال (واتساب) <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control rounded-3 bg-white" placeholder="05XXXXXXXX" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">الخدمة المطلوبة <span class="text-danger">*</span></label>
                                    <select name="service_id" class="form-select rounded-3 bg-white" required>
                                        <option value="" disabled selected>اختر الخدمة...</option>
                                        @foreach($services as $srv)
                                            <option value="{{ $srv->id }}">{{ $srv->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">المدينة / الحي <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control rounded-3 bg-white" placeholder="جدة / مكة - الحي" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">تفاصيل أو ملاحظات إضافية (اختياري)</label>
                                    <textarea name="notes" class="form-control rounded-3 bg-white" rows="3" placeholder="مساحة المكان، نوع الأثاث، أو الموعد المفضل..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="contactBookingSubmitBtn" class="btn btn-primary w-100 py-3 fw-bold fs-6 shadow">
                                        <i class="fa-solid fa-paper-plane me-1"></i> اطلب عرض سعر الآن
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
       FAQ SECTION (DYNAMIC)
       ========================================================================== -->
    @if(!empty($faqs) && count($faqs) > 0)
        <section class="py-5 bg-brand-light" id="faq">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <span class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm">
                        <i class="fa-solid fa-circle-question me-1"></i> إجابات وافية
                    </span>
                    <h2 class="fw-heading display-6 text-brand-primary">الأسئلة الأكثر شيوعاً</h2>
                    <p class="text-secondary">كل ما تود معرفته عن حجز الخدمات وتفاصيل تنفيذ العمل</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="faqAccordion">
                            @foreach($faqs as $index => $faq)
                                <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-bold text-brand-primary" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion" aria-labelledby="heading{{ $faq->id }}">
                                        <div class="accordion-body text-secondary small lh-lg">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactBookingForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitBtn = document.getElementById('contactBookingSubmitBtn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> جاري الإرسال...';
                    submitBtn.disabled = true;

                    const formData = new FormData(contactForm);

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
                    .then(({ status, body }) => {
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
                            contactForm.reset();
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
