<footer class="text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4" data-aos="fade-up">
                <div class="site-logo mb-3 d-inline-block bg-white p-2 px-3 rounded-4 shadow-sm">
                    <img src="{{ setting('site_logo') ? asset(setting('site_logo')) : asset('assets/frontend/images/logo_master.png') }}" alt="{{ setting('site_name', 'سين ياء كلين') }}" style="max-height: 48px; width: auto;">
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
                    @php
                        $footerServices = \App\Models\Service::where('status', true)->orderBy('order', 'asc')->take(6)->get();
                    @endphp
                    @forelse ($footerServices as $fService)
                        <li>
                            <a href="{{ route('services.show', $fService->slug) }}" class="text-white-50 text-decoration-none">
                                {{ $fService->title }}
                            </a>
                        </li>
                    @empty
                        <li>
                            <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">تنظيف المنازل والفلل</a>
                        </li>

                        <li>
                            <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">غسيل السجاد والكنب بالبخار</a>
                        </li>

                        <li>
                            <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">تنظيف الزجاج والواجهات</a>
                        </li>

                        <li>
                            <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">تنظيف المكاتب والشركات</a>
                        </li>
                    @endforelse
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
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}?text={{ urlencode('السلام عليكم، أرغب في الاستفسار عن خدمات شركة سين ياء كلين ... كيف طريقة حجز موعد معاينة؟') }}" target="_blank"
                            class="text-white text-decoration-none">واتساب خدمة العملاء ({{ setting('top_bar_phone', '0531109831') }})</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-location-dot text-brand-secondary me-2"></i>
                        كافة أنحاء مدينة جدة ومكة
                    </div>

                    {{-- Social Media --}}
                    <div class="mt-2 pt-2 border-top border-white border-opacity-10">
                        <p class="mb-2 text-white-50 small">تابعنا على السوشيال ميديا</p>
                        <div class="d-flex gap-2">
                            <a href="https://www.instagram.com/seenyaa.clean?psln=MWUycXQ3dnEwMWJxZg==" target="_blank" rel="noopener noreferrer"
                                class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                                style="width:38px;height:38px;background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);transition:opacity .2s;"
                                title="إنستجرام سين ياء" aria-label="صفحتنا على إنستجرام"
                                onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
                                <i class="fa-brands fa-instagram" style="font-size:1.1rem;"></i>
                            </a>
                            <a href="https://www.tiktok.com/@seenyaa.clean?_r=1&_t=ZS-9AiTEEwbnV9" target="_blank" rel="noopener noreferrer"
                                class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                                style="width:38px;height:38px;background:#010101;border:1px solid rgba(255,255,255,.15);transition:opacity .2s;"
                                title="تيك توك سين ياء" aria-label="حسابنا على تيك توك"
                                onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
                                <i class="fa-brands fa-tiktok" style="font-size:1rem;"></i>
                            </a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('top_bar_whatsapp', '966531109831')) }}" target="_blank" rel="noopener noreferrer"
                                class="d-flex align-items-center justify-content-center rounded-circle text-white text-decoration-none"
                                style="width:38px;height:38px;background:#25d366;transition:opacity .2s;"
                                title="واتساب سين ياء" aria-label="تواصل معنا على واتساب"
                                onmouseover="this.style.opacity='.8'" onmouseout="this.style.opacity='1'">
                                <i class="fa-brands fa-whatsapp" style="font-size:1.1rem;"></i>
                            </a>
                        </div>
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
                <a href="https://awali.com.sa" target="_blank" rel="noopener noreferrer" class="text-brand-secondary text-decoration-none fw-semibold">
                    اولي
                </a>
            </div>
        </div>
    </div>
</footer>