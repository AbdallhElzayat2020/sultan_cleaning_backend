@extends('frontend.layouts.master')

@section('title', $post->seo_title)
@section('meta_description', $post->seo_description)
@section('meta_keywords', $post->seo_keywords)
@section('og_title', $post->seo_title)
@section('og_description', $post->seo_description)
@section('og_image', $post->image_url)
@section('og_type', 'article')

@section('schema_org')
    @php
        $postSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'description' => $post->seo_description,
            'image' => $post->image_url,
            'datePublished' => optional($post->published_at ?? $post->created_at)->toIso8601String(),
            'dateModified' => optional($post->updated_at)->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => setting('site_name', 'سين ياء لخدمات النظافة والتعقيم'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/frontend/images/logo_master.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url()->current(),
            ],
        ];
    @endphp
    <script type="application/ld+json">
{!! json_encode($postSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
    <!-- ==========================================================================
           PAGE HEADER BANNER
           ========================================================================== -->
    <section class="page-header-banner py-5 text-center">
        <div class="container py-3">
            <span
                class="badge bg-white text-brand-primary border border-brand rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm">
                <i class="{{ $post->category_icon ?? 'fa-solid fa-newspaper' }} me-1 text-brand-secondary"></i>
                {{ $post->category }}
            </span>
            <h1 class="display-5 fw-heading text-brand-primary mb-2">{{ $post->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                            class="text-brand-primary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"
                            class="text-brand-primary text-decoration-none">المدونة</a></li>
                    <li class="breadcrumb-item active text-brand-secondary" aria-current="page">
                        {{ Str::limit($post->title, 40) }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
           ARTICLE CONTENT & SIDEBAR
           ========================================================================== -->
    <section class="py-5">
        <div class="container py-3">
            <div class="row g-4">

                <!-- MAIN ARTICLE CONTENT (RIGHT COLUMN IN RTL) -->
                <div class="col-lg-8">
                    <!-- Featured Article Image -->
                    <div class="position-relative mb-4">
                        <img src="{{ $post->image_url }}" class="w-100 rounded-4 shadow-sm"
                            style="max-height: 460px; object-fit: cover;" alt="{{ $post->title }}">
                    </div>

                    <!-- Meta Bar -->
                    <div
                        class="d-flex flex-wrap align-items-center justify-content-between p-3 bg-brand-light rounded-3 mb-4 gap-2 small text-secondary">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <span><i class="fa-regular fa-calendar text-brand-primary me-1"></i>
                                {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock text-brand-primary me-1"></i>
                                {{ $post->reading_time ?? '5 دقائق قراءة' }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-eye text-brand-primary me-1"></i> {{ $post->views }}
                                مشاهدة</span>
                        </div>
                        <div>
                            <span class="badge bg-brand-primary text-white">{{ $post->category }}</span>
                        </div>
                    </div>

                    <!-- Article Body (Summernote WYSIWYG HTML) -->
                    <div class="article-content text-secondary lh-lg mb-5" style="font-size: 1.05rem;">
                        {!! $post->content !!}
                    </div>


                    <!-- Author / Sultan Clean Guarantee Box -->
                    <div class="custom-card p-4 rounded-4 mb-5 border d-flex gap-3 align-items-center">
                        <div class="rounded-circle bg-brand-primary text-white d-flex align-items-center justify-content-center flex-shrink-0"
                            style="width: 58px; height: 58px; font-size: 1.4rem;">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-brand-primary mb-1">فريق خبراء شركة سين ياء</h5>
                            <p class="text-secondary small mb-0 lh-base">
                                نحرص دائماً على تقديم أفضل النصائح والحلول العملية المعتمدة لضمان بيئة صحية ونظيفة لمنزلك
                                ومؤسستك بأحدث التقنيات العالمية.
                            </p>
                        </div>
                    </div>

                    <!-- Related Articles -->
                    @if ($relatedPosts->isNotEmpty())
                        <div class="mb-4">
                            <h3 class="fw-heading text-brand-primary mb-4">مقالات ذات صلة قد تهمك</h3>
                            <div class="row g-3">
                                @foreach ($relatedPosts as $rel)
                                    <div class="col-md-4">
                                        <div class="blog-card h-100 d-flex flex-column">
                                            <div class="blog-img-wrapper position-relative overflow-hidden"
                                                style="height: 140px;">
                                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                                                    class="w-100 h-100 object-fit-cover">
                                            </div>
                                            <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between">
                                                <div>
                                                    <small
                                                        class="text-muted d-block mb-1">{{ $rel->published_at ? $rel->published_at->format('d M Y') : $rel->created_at->format('d M Y') }}</small>
                                                    <h6 class="blog-title mb-2"
                                                        style="font-size: 0.95rem; line-height: 1.4;">
                                                        <a href="{{ route('blog.show', $rel->slug) }}"
                                                            class="text-decoration-none text-brand-primary fw-bold">
                                                            {{ Str::limit($rel->title, 55) }}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <a href="{{ route('blog.show', $rel->slug) }}"
                                                    class="fw-bold text-brand-primary text-decoration-none small mt-2">
                                                    اقرأ المقال <i class="fa-solid fa-chevron-left small"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- SIDEBAR (LEFT COLUMN IN RTL) -->
                <div class="col-lg-4">
                    <!-- Quick Booking Sidebar Form -->
                    <div class="card border-0 custom-card p-4 mb-4 bg-brand-light">
                        <h5 class="fw-heading text-brand-primary mb-1">طلب حجز خدمة فورية</h5>
                        <p class="text-secondary small mb-3">املأ النموذج وسنتواصل معك فوراً</p>

                        <form id="blogBookingForm" method="POST" action="{{ route('booking.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small fw-bold">الخدمة المطلوبة <span
                                        class="text-danger">*</span></label>
                                <select name="service_id" class="form-select rounded-3 bg-white" required>
                                    <option value="" disabled selected>اختر الخدمة...</option>
                                    @foreach ($services as $srv)
                                        <option value="{{ $srv->id }}">{{ $srv->title }}</option>
                                    @endforeach
                                </select>
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
                            <button type="submit" id="blogBookingSubmitBtn"
                                class="btn btn-brand-whatsapp w-100 py-2 fw-bold">
                                <i class="fa-brands fa-whatsapp me-1"></i> إرسال الطلب وتأكيد الحجز
                            </button>
                        </form>
                    </div>

                    <!-- Categories Box -->
                    @if ($categories->isNotEmpty())
                        <div class="card border-0 custom-card p-4 mb-4">
                            <h5 class="fw-heading text-brand-primary mb-3 pb-2 border-bottom border-brand">تصنيفات المدونة
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                @foreach ($categories as $cat)
                                    @php
                                        $count = \App\Models\Post::where('status', true)
                                            ->where('category', $cat)
                                            ->count();
                                    @endphp
                                    <a href="{{ route('blog.index', ['category' => $cat]) }}"
                                        class="d-flex align-items-center justify-content-between p-2 rounded-3 text-decoration-none text-secondary hover-bg fw-semibold">
                                        <span><i class="fa-solid fa-folder-open text-brand-secondary me-2"></i>
                                            {{ $cat }}</span>
                                        <span
                                            class="badge bg-brand-light text-brand-primary rounded-pill">{{ $count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Recent Posts Box -->
                    @if ($recentPosts->isNotEmpty())
                        <div class="card border-0 custom-card p-4 mb-4">
                            <h5 class="fw-heading text-brand-primary mb-3 pb-2 border-bottom border-brand">أحدث المقالات
                            </h5>
                            <div class="d-flex flex-column gap-3">
                                @foreach ($recentPosts as $rec)
                                    <a href="{{ route('blog.show', $rec->slug) }}"
                                        class="d-flex gap-3 text-decoration-none group-item align-items-center">
                                        <img src="{{ $rec->image_url }}" alt="{{ $rec->title }}"
                                            class="rounded-3 flex-shrink-0 object-fit-cover border"
                                            style="width: 65px; height: 65px;">
                                        <div>
                                            <h6 class="fw-bold text-brand-primary mb-1 small" style="line-height: 1.4;">
                                                {{ Str::limit($rec->title, 50) }}</h6>
                                            <small class="text-muted"><i class="fa-regular fa-calendar me-1"></i>
                                                {{ $rec->published_at ? $rec->published_at->format('d M Y') : $rec->created_at->format('d M Y') }}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Direct Help Box -->
                    <div class="card border-0 custom-card p-4 text-center shadow-md">
                        <div class="rounded-circle bg-white bg-opacity-20 d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 50px; height: 50px; font-size: 1.4rem;">
                            <i class="fa-solid fa-headset text-warning"></i>
                        </div>
                        <h5 class="fw-bold text-black mb-2">هل تحتاج استشارة سريعة؟</h5>
                        <p class="text-muted small mb-3">فريق خدمة العملاء جاهز للإجابة على جميع استفساراتك 24/7</p>
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
            const blogForm = document.getElementById('blogBookingForm');
            if (blogForm) {
                blogForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const submitBtn = document.getElementById('blogBookingSubmitBtn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin me-1"></i> جاري الإرسال...';
                    submitBtn.disabled = true;

                    const formData = new FormData(blogForm);

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
                                blogForm.reset();
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
