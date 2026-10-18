<footer class="text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="site-logo mb-3 d-inline-block bg-white p-2 px-3 rounded-4 shadow-sm">
                    <img src="{{ setting('site_logo') ? asset(setting('site_logo')) : asset('assets/frontend/images/logo.png') }}" alt="{{ setting('site_name', 'سين ياء') }}" style="max-height: 48px; width: auto;">
                </div>
                <p class="text-white-50 small mb-3">
                    الرائدون في تقديم أرقى خدمات التنظيف المنزلي والمكتبي، تنظيف
                    الفلل، وغسيل الكنب والسجاد بالبخار بأعلى معايير الجودة.
                </p>
            </div>

            <div class="col-6 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                <h5 class="fw-bold mb-3 text-white">روابط سريعة</h5>
                <ul class="list-unstyled small text-white-50 d-flex flex-column gap-2">
                    <li>
                        <a href="{{ route('home') }}" class="text-white-50 text-decoration-none">الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-brand-secondary text-decoration-none">خدماتنا</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery') }}" class="text-white-50 text-decoration-none">معرض الأعمال</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-white-50 text-decoration-none">من نحن</a>
                    </li>
                    <li>
                        <a href="{{ route('blog.index') }}" class="text-white-50 text-decoration-none">المدونة</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">اتصل بنا</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <h5 class="fw-bold mb-3 text-white">أبرز الخدمات</h5>
                <ul class="list-unstyled small text-white-50 d-flex flex-column gap-2">
                    <li>
                        <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">تنظيف الفلل والقصور</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">تنظيف الكنب بالبخار</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">غسيل السجاد
                            والموكيت
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">جلي وتلميع الرخام</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                <h5 class="fw-bold mb-3 text-white">تواصل مباشر</h5>
                <div class="d-flex flex-column gap-2 small text-white-50">
                    <div>
                        <i class="fa-solid fa-phone text-brand-secondary me-2"></i>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('top_bar_phone', '0531109831')) }}" class="text-white text-decoration-none fw-bold">{{ setting('top_bar_phone', '0531109831') }}</a>
                    </div>
                    <div>
                        <i class="fa-brands fa-whatsapp text-brand-accent me-2"></i>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}" target="_blank"
                            class="text-white text-decoration-none">واتساب خدمة العملاء ({{ setting('top_bar_phone', '0531109831') }})</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-location-dot text-brand-secondary me-2"></i>
                        كافة أنحاء مدينة جدة ومكة
                    </div>
                </div>
            </div>
        </div>

        @php
            $footerPages = \App\Models\Page::where('status', true)->where('show_in_footer', true)->orderBy('order')->get();
        @endphp
        @if($footerPages->isNotEmpty())
            <div class="py-3 border-top border-white border-opacity-10 d-flex flex-wrap justify-content-center align-items-center gap-3 text-center">
                <span class="text-white text-opacity-50 small fw-bold"><i class="fa-solid fa-shield-halved text-brand-secondary me-1"></i> وثائق ومعلومات:</span>
                @foreach($footerPages as $footerPage)
                    <a href="{{ route('pages.show', $footerPage->slug) }}" class="text-white text-opacity-80 text-decoration-none small fw-semibold">
                        {{ $footerPage->title }}
                    </a>
                    @if(!$loop->last)
                        <span class="text-white text-opacity-25 small">•</span>
                    @endif
                @endforeach
            </div>
        @endif

        <div
            class="pt-3 border-top border-white border-opacity-10 d-flex justify-content-between align-items-center flex-wrap gap-2 small text-white-50">
            <div>
                جميع الحقوق محفوظة © 2026 <strong>شركة سين ياء كلين</strong>
            </div>

            <div>
                تصميم بواسطة
                <a href="#" class="text-brand-secondary text-decoration-none fw-semibold">
                    اولي
                </a>
            </div>
        </div>
    </div>
</footer>