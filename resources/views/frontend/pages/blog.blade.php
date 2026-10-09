@extends('frontend.layouts.master')

@section('title', 'المدونة والنصائح | سلطان كلين لخدمات النظافة والتعقيم الشامل')

@section('content')
    <!-- ==========================================================================
       PAGE HEADER BANNER
       ========================================================================== -->
    <section class="bg-brand-primary text-white py-5 text-center">
        <div class="container py-3">
            <span class="badge bg-brand-accent text-white px-3 py-2 rounded-pill fw-bold mb-3">
                <i class="fa-solid fa-newspaper me-1"></i> دليلك الشامل للنظافة والتعقيم
            </span>
            <h1 class="display-5 fw-heading text-white mb-2">مدونة سلطان كلين</h1>
            <p class="lead text-white text-opacity-75 fs-6 max-w-700 mx-auto mb-3">
                أحدث النصائح والحيل والحلول الاحترافية للحفاظ على نظافة وبريق منزلك ومكتبك وصحة عائلتك.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-brand-secondary text-decoration-none">الرئيسية</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">المدونة</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ==========================================================================
       BLOG LISTING SECTION
       ========================================================================== -->
    <section class="py-5 bg-white">
        <div class="container py-3">

            <!-- Categories Filter & Search Bar -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-5 p-3 bg-brand-light rounded-4">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <a href="{{ route('blog.index') }}" class="btn btn-sm rounded-pill px-3 py-2 fw-bold {{ !$category ? 'btn-brand-primary' : 'btn-outline-brand' }}">
                        الكل ({{ \App\Models\Post::where('status', true)->count() }})
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat]) }}" class="btn btn-sm rounded-pill px-3 py-2 fw-bold {{ $category === $cat ? 'btn-brand-primary' : 'btn-outline-brand' }}">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>

                <!-- Search Input -->
                <form action="{{ route('blog.index') }}" method="GET" class="d-flex gap-2">
                    @if($category)
                        <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start-pill bg-white" placeholder="ابحث في المقالات..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-brand-primary rounded-end-pill px-3">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Featured Post (First Page & No Filter) -->
            @if(!$category && !$search && $featuredPost && $posts->currentPage() === 1)
                <div class="blog-featured-card mb-5">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-6">
                            <div class="position-relative h-100" style="min-height: 320px;">
                                <img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}" class="blog-featured-img">
                                <span class="badge bg-brand-accent position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow">
                                    <i class="fa-solid fa-star me-1"></i> مقال مميز
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6 p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                                <span><i class="fa-regular fa-calendar text-brand-secondary me-1"></i> {{ $featuredPost->published_at ? $featuredPost->published_at->format('d M Y') : $featuredPost->created_at->format('d M Y') }}</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-clock text-brand-secondary me-1"></i> {{ $featuredPost->reading_time ?? '5 دقائق قراءة' }}</span>
                                <span>•</span>
                                <span class="badge bg-brand-light text-brand-primary">{{ $featuredPost->category }}</span>
                            </div>
                            <h2 class="fw-heading text-brand-primary mb-3 h3">
                                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="text-decoration-none text-brand-primary hover-primary">
                                    {{ $featuredPost->title }}
                                </a>
                            </h2>
                            <p class="text-secondary lh-lg mb-4">
                                {{ Str::limit($featuredPost->short_description ?: strip_tags($featuredPost->content), 180) }}
                            </p>
                            <a href="{{ route('blog.show', $featuredPost->slug) }}" class="btn btn-brand-primary px-4 py-2 rounded-pill">
                                <span>اقرأ المقال بالكامل</span>
                                <i class="fa-solid fa-chevron-left me-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Articles Grid -->
            <div class="row g-4">
                @forelse($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-card h-100 d-flex flex-column">
                            <div class="blog-img-wrapper position-relative overflow-hidden" style="height: 220px;">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-100 h-100 object-fit-cover">
                                <span class="blog-badge bg-brand-primary text-white">
                                    <i class="{{ $post->category_icon ?? 'fa-solid fa-lightbulb' }} me-1"></i> {{ $post->category }}
                                </span>
                            </div>
                            <div class="p-4 d-flex flex-column flex-grow-1 justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                                        <span><i class="fa-regular fa-calendar me-1"></i> {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                                        <span>•</span>
                                        <span><i class="fa-regular fa-clock me-1"></i> {{ $post->reading_time ?? '5 دقائق' }}</span>
                                    </div>
                                    <h3 class="blog-title mb-3" style="font-size: 1.15rem; line-height: 1.5;">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-brand-primary fw-bold">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p class="text-secondary small mb-4" style="line-height: 1.6;">
                                        {{ Str::limit($post->short_description ?: strip_tags($post->content), 110) }}
                                    </p>
                                </div>
                                <div class="pt-3 border-top border-brand d-flex justify-content-between align-items-center mt-auto">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="fw-bold text-brand-primary text-decoration-none small d-inline-flex align-items-center gap-1">
                                        <span>اقرأ المزيد</span>
                                        <i class="fa-solid fa-arrow-left small"></i>
                                    </a>
                                    <span class="badge bg-brand-light text-brand-primary small">{{ $post->category }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-regular fa-newspaper fa-3x mb-3 text-secondary"></i>
                        <h4>لا توجد مقالات مطابقة</h4>
                        <p class="small">لم يتم العثور على أي مقال مطابق لبحثك. جرب البحث بكلمات أخرى أو اختر تصنيفاً آخر.</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-brand rounded-pill px-4 mt-2">عرض كافة المقالات</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links() }}
            </div>

        </div>
    </section>

    <!-- ==========================================================================
       GIANT CTA BANNER
       ========================================================================== -->
    <section class="py-5 bg-brand-primary text-white text-center">
        <div class="container py-3">
            <span class="badge bg-brand-accent px-3 py-2 rounded-pill fw-bold mb-3">🔥 احجز الآن ووفر 35%</span>
            <h2 class="display-6 fw-heading text-white mb-3">هل تحتاج خدمة تنظيف احترافية فورية؟</h2>
            <p class="lead text-white text-opacity-75 max-w-700 mx-auto mb-4 fs-6">
                فريقنا المجهز بأحدث أجهزة البخار جاهز للوصول إلى باب منزلك مع معاينة مجانية بضمان الجودة الملكي.
            </p>
            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="tel:+966582102525" class="btn btn-light text-brand-primary btn-lg rounded-pill px-5 fw-bold shadow">
                    <i class="fa-solid fa-phone-volume me-2 text-brand-secondary"></i> اتصل الآن: 0582102525
                </a>
                <a href="https://wa.me/966582102525?text={{ urlencode('مرحباً سلطان كلين، قرأت مقالات المدونة وأرغب في طلب خدمة مع خصم 35%') }}"
                    target="_blank" class="btn btn-brand-whatsapp btn-lg rounded-pill px-5 fw-bold shadow">
                    <i class="fa-brands fa-whatsapp fs-5 me-2"></i> حجز سريع عبر واتساب
                </a>
            </div>
        </div>
    </section>
@endsection
