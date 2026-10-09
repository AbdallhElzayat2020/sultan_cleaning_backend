<footer class="bg-brand-primary text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="rounded-3 bg-white text-brand-primary d-flex align-items-center justify-content-center"
                        style="width: 40px; height: 40px; font-size: 1.2rem">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                    </div>
                    <span class="fw-heading fs-4 text-white">سلطان <span class="text-brand-secondary">كلين</span></span>
                </div>
                <p class="text-white-50 small mb-3">
                    الرائدون في تقديم أرقى خدمات التنظيف المنزلي والمكتبي، تنظيف
                    الفلل، وغسيل الكنب والسجاد بالبخار بأعلى معايير الجودة.
                </p>
            </div>

            <div class="col-6 col-lg-2">
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

            <div class="col-6 col-lg-3">
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
                            والموكيت</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-white-50 text-decoration-none">جلي وتلميع الرخام</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h5 class="fw-bold mb-3 text-white">تواصل مباشر</h5>
                <div class="d-flex flex-column gap-2 small text-white-50">
                    <div>
                        <i class="fa-solid fa-phone text-brand-secondary me-2"></i>
                        <a href="tel:+966582102525" class="text-white text-decoration-none fw-bold">0582102525</a>
                    </div>
                    <div>
                        <i class="fa-brands fa-whatsapp text-brand-accent me-2"></i>
                        <a href="https://wa.me/966582102525" target="_blank"
                            class="text-white text-decoration-none">واتساب خدمة العملاء</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-location-dot text-brand-secondary me-2"></i>
                        نغطي كافة أحياء الرياض ومناطق المملكة
                    </div>
                </div>
            </div>
        </div>

        <div
            class="pt-3 border-top border-white border-opacity-10 d-flex justify-content-between align-items-center flex-wrap gap-2 small text-white-50">
            <div>جميع الحقوق محفوظة © 2026 <strong>سلطان كلين</strong></div>
            <div>
                تم التصميم والبرمجة بواسطة
                <a href="#" class="text-brand-secondary">
                    عبدالله الزيات
                </a>
            </div>
        </div>
    </div>
</footer>