@extends('admin.layouts.master')
@section('title', 'إعدادات الموقع وSEO - ' . setting('site_name', 'سين ياء'))

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إعدادات الموقع</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">الإعدادات العامة</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">إدارة الإعدادات العامة</h2>
            <p class="section-lead">
                يمكنك من هنا تخصيص شريط العرض العلوي والتحكم في ظهور ونصوص العروض ونسبة الخصم في الواجهة الأمامية للموقع.
            </p>

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Top Announcement Bar Card --}}
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4><i class="fas fa-bullhorn text-primary mr-2"></i> شريط العرض والإعلان العلوي (Top
                                    Announcement Bar)</h4>
                            </div>

                            <div class="card-body">
                                {{-- Activation Toggle --}}
                                <div class="form-group mb-4 pb-3 border-bottom">
                                    <div class="control-label font-weight-bold mb-2">حالة شريط العرض</div>
                                    <label class="custom-switch mt-1 pl-0">
                                        <input type="checkbox" name="top_bar_active" value="1"
                                            class="custom-switch-input" id="toggle-top-bar"
                                            {{ old('top_bar_active', $settings['top_bar_active'] ?? '1') == '1' ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description font-weight-bold mr-2">
                                            تفعيل وإظهار شريط العرض في أعلى الموقع
                                        </span>
                                    </label>
                                    <small class="form-text text-muted">
                                        عند تعطيل هذا الخيار، سيتم إخفاء شريط الإعلان بالكامل من أعلى صفحات الموقع تلقائياً.
                                    </small>
                                </div>

                                <div class="row">
                                    {{-- Badge Text --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="top_bar_badge">نص الشارة / العنوان الصغير <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-tag"></i></div>
                                                </div>
                                                <input type="text" name="top_bar_badge" id="top_bar_badge"
                                                    class="form-control @error('top_bar_badge') is-invalid @enderror"
                                                    value="{{ old('top_bar_badge', $settings['top_bar_badge'] ?? '🎉 عرض حصري') }}"
                                                    placeholder="مثال: 🎉 عرض حصري أو 🔥 لفترة محدودة">
                                            </div>
                                            <small class="form-text text-muted">النص البارز داخل الشارة الملونة.</small>
                                            @error('top_bar_badge')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Discount Value --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="top_bar_discount">نسبة / رقم الخصم <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-percent"></i></div>
                                                </div>
                                                <input type="text" name="top_bar_discount" id="top_bar_discount"
                                                    class="form-control @error('top_bar_discount') is-invalid @enderror"
                                                    value="{{ old('top_bar_discount', $settings['top_bar_discount'] ?? '35%') }}"
                                                    placeholder="مثال: 35% أو 50 ريال">
                                            </div>
                                            <small class="form-text text-muted">الرقم أو النسبة التي تظهر بخط عريض.</small>
                                            @error('top_bar_discount')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Offer Text --}}
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="top_bar_text">نص تفاصيل العرض <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-comment-alt"></i></div>
                                                </div>
                                                <input type="text" name="top_bar_text" id="top_bar_text"
                                                    class="form-control @error('top_bar_text') is-invalid @enderror"
                                                    value="{{ old('top_bar_text', $settings['top_bar_text'] ?? 'خصم خاص على جميع خدمات التنظيف والتعقيم الشامل!') }}"
                                                    placeholder="مثال: خصم خاص على جميع خدمات التنظيف والتعقيم الشامل!">
                                            </div>
                                            <small class="form-text text-muted">النص المصاحب لنسبة الخصم.</small>
                                            @error('top_bar_text')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-2">
                                    {{-- Phone Number --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="top_bar_phone">رقم الهاتف للاتصال المباشر</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                                                </div>
                                                <input type="text" name="top_bar_phone" id="top_bar_phone"
                                                    class="form-control @error('top_bar_phone') is-invalid @enderror"
                                                    value="{{ old('top_bar_phone', $settings['top_bar_phone'] ?? '0531109831') }}"
                                                    placeholder="مثال: 0531109831">
                                            </div>
                                            <small class="form-text text-muted">يظهر في الجانب الأيسر من الشريط
                                                العلوي.</small>
                                            @error('top_bar_phone')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- WhatsApp Number --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="top_bar_whatsapp">رقم الواتساب (خدمة 24/7)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fab fa-whatsapp"></i></div>
                                                </div>
                                                <input type="text" name="top_bar_whatsapp" id="top_bar_whatsapp"
                                                    class="form-control @error('top_bar_whatsapp') is-invalid @enderror"
                                                    value="{{ old('top_bar_whatsapp', $settings['top_bar_whatsapp'] ?? '966531109831') }}"
                                                    placeholder="مثال: 966531109831">
                                            </div>
                                            <small class="form-text text-muted">الرقم الدولي بدون علامة + المستخدم لرابط
                                                الواتساب المباشر.</small>
                                            @error('top_bar_whatsapp')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Live Preview Box --}}
                                <div class="mt-4 pt-3 border-top">
                                    <label class="font-weight-bold text-dark mb-2"><i
                                            class="fas fa-eye text-info mr-1"></i> معاينة شكل الشريط في الموقع (Live
                                        Preview):</label>
                                    <div id="preview-wrapper" class="p-3 rounded text-white shadow-sm"
                                        style="background-color: #0b3954; font-size: 0.88rem; transition: opacity 0.3s ease;">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="badge rounded-pill px-3 py-1 font-weight-bold text-white mr-2"
                                                    style="background-color: #f75c03;" id="preview-badge">
                                                    {{ $settings['top_bar_badge'] ?? '🎉 عرض حصري' }}
                                                </span>
                                                <span id="preview-full-text">
                                                    خصم خاص <strong class="mx-1"
                                                        id="preview-discount">{{ $settings['top_bar_discount'] ?? '35%' }}</strong>
                                                    <span
                                                        id="preview-text">{{ $settings['top_bar_text'] ?? 'على جميع خدمات التنظيف والتعقيم الشامل!' }}</span>
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center mt-2 mt-md-0">
                                                <span class="mr-3 font-weight-bold">
                                                    <i class="fas fa-phone-alt mr-1" style="color: #087e8b;"></i>
                                                    <span
                                                        id="preview-phone">{{ $settings['top_bar_phone'] ?? '0531109831' }}</span>
                                                </span>
                                                <span class="font-weight-bold">
                                                    <i class="fab fa-whatsapp mr-1" style="color: #25d366;"></i> خدمة 24/7
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="preview-hidden-note" class="alert alert-secondary mt-2 mb-0 d-none">
                                        <i class="fas fa-eye-slash mr-1"></i> الشريط معطل حالياً ولن يظهر للزوار في واجهة
                                        الموقع.
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- General Site & SEO Settings Card --}}
                        <div class="card card-info mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4><i class="fas fa-search text-info mr-2"></i> إعدادات تحسين محركات البحث العامة (SEO &
                                    Meta Tags)</h4>
                                <span class="badge badge-light text-muted">تُطبق على الصفحات الرئيسية وكافة نتائج محركات
                                    البحث</span>
                            </div>

                            <div class="card-body">
                                <!-- Google Preview Snippet -->
                                <div class="alert alert-light border p-3 mb-4 rounded"
                                    style="background-color: #ffffff; border-color: #e2e8f0;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fab fa-google text-primary mr-2" style="font-size: 1.2rem;"></i>
                                        <span class="font-weight-bold text-dark" style="font-size: 0.9rem;">معاينة الصفحة
                                            الرئيسية في بحث Google:</span>
                                    </div>
                                    <div style="font-family: Arial, sans-serif; max-width: 650px;" class="text-right"
                                        dir="rtl">
                                        <div class="text-success small mb-1"
                                            style="font-size: 0.8rem; direction: ltr; text-align: right;">
                                            <span id="seo-site-url">{{ $settings['canonical_url'] ?? url('/') }}</span>
                                        </div>
                                        <div class="text-primary font-weight-bold"
                                            style="font-size: 1.15rem; line-height: 1.3;" id="seo-site-title">
                                            {{ $settings['meta_title'] ?? ($settings['site_name'] ?? 'سين ياء') . ' | خدمات النظافة والتعقيم الشامل بالمملكة' }}
                                        </div>
                                        <div class="text-secondary small mt-1"
                                            style="line-height: 1.4; color: #4d5156 !important;" id="seo-site-desc">
                                            {{ $settings['meta_description'] ?? 'شركة سين ياء لخدمات النظافة والتعقيم الشامل بجده. تنظيف منازل، فلل، شقق، كنب ومفروشات بالبخار، جلي رخام وخزانات بأحدث التقنيات وأفضل الأسعار.' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- Site Name --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_name">اسم الموقع / البراند <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-building"></i></div>
                                                </div>
                                                <input type="text" name="site_name" id="site_name"
                                                    class="form-control @error('site_name') is-invalid @enderror"
                                                    value="{{ old('site_name', $settings['site_name'] ?? 'سين ياء') }}"
                                                    placeholder="مثال: سين ياء">
                                            </div>
                                            @error('site_name')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Canonical URL --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="canonical_url">رابط النطاق الأساسي (Canonical URL)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-link"></i></div>
                                                </div>
                                                <input type="text" name="canonical_url" id="canonical_url"
                                                    class="form-control @error('canonical_url') is-invalid @enderror"
                                                    value="{{ old('canonical_url', $settings['canonical_url'] ?? url('/')) }}"
                                                    placeholder="https://example.com">
                                            </div>
                                            @error('canonical_url')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Meta Title --}}
                                <div class="form-group">
                                    <label for="meta_title">عنوان السيو الافتراضي (Default Meta Title)</label>
                                    <input type="text" name="meta_title" id="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror"
                                        value="{{ old('meta_title', $settings['meta_title'] ?? '') }}"
                                        placeholder="مثال: سين ياء | شركة خدمات النظافة والتعقيم الشامل بالمملكة">
                                    <small class="form-text text-muted">العنوان الذي يظهر في لسان المتصفح ونتائج جوجل (يفضل
                                        بين 50-60 حرفاً).</small>
                                    @error('meta_title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Meta Description --}}
                                <div class="form-group">
                                    <label for="meta_description">وصف الميتا الافتراضي (Default Meta Description)</label>
                                    <textarea name="meta_description" id="meta_description" rows="3"
                                        class="form-control @error('meta_description') is-invalid @enderror"
                                        placeholder="اكتب وصفاً جذاباً وشاملاً لموقع وخدمات سين ياء يظهر في نتائج البحث...">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                                    <small class="form-text text-muted">الوصف التسويقي الذي يظهر أسفل الرابط في جوجل (يفضل
                                        بين 130-160 حرفاً).</small>
                                    @error('meta_description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    {{-- Meta Keywords --}}
                                    <div class="col-md-8">
                                        <div class="form-group mb-0">
                                            <label for="meta_keywords">الكلمات المفتاحية الافتراضية (Meta Keywords)</label>
                                            <input type="text" name="meta_keywords" id="meta_keywords"
                                                class="form-control @error('meta_keywords') is-invalid @enderror"
                                                value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}"
                                                placeholder="شركة تنظيف بجده, تنظيف فلل, غسيل كنب, جلي رخام, تعقيم منازل">
                                            <small class="form-text text-muted">افصل بين الكلمات بفاصلة (,).</small>
                                            @error('meta_keywords')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Meta Author --}}
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="meta_author">اسم الناشر / المؤسسة (Author)</label>
                                            <input type="text" name="meta_author" id="meta_author"
                                                class="form-control @error('meta_author') is-invalid @enderror"
                                                value="{{ old('meta_author', $settings['meta_author'] ?? 'سين ياء لخدمات النظافة') }}"
                                                placeholder="سين ياء لخدمات النظافة">
                                            @error('meta_author')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-whitesmoke text-right">
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-save mr-1"></i> حفظ كافة الإعدادات
                                </button>
                            </div>
                        </div>

                        {{-- Core Static & Main Pages SEO Settings Card --}}
                        <div class="card card-warning mt-4" id="core-pages-seo">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>
                                    <i class="fas fa-tags text-warning mr-2"></i> سيو وميتا تاج الصفحات الأساسية (من نحن، خدماتنا، أعمالنا، المدونة، اتصل بنا)
                                </h4>
                                <span class="badge badge-warning text-dark font-weight-bold">تحسين محركات البحث SEO</span>
                            </div>

                            <div class="card-body">
                                <p class="text-muted small mb-4">
                                    تحكم كامل ومباشر في عنوان الصفحة (Meta Title) والوصف التعريفي (Meta Description) والكلمات المفتاحية (Meta Keywords) لكل صفحة من الصفحات الأساسية للموقع للظهور بأفضل شكل ممكن في محركات البحث مثل Google وشبكات التواصل.
                                </p>

                                <div class="row">
                                    <div class="col-12 col-md-3 mb-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active font-weight-bold d-flex justify-content-between align-items-center mb-2 shadow-sm" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="true">
                                                <span><i class="fas fa-info-circle mr-2 text-primary"></i> من نحن</span>
                                                <i class="fas fa-chevron-left text-muted small"></i>
                                            </a>
                                            <a class="nav-link font-weight-bold d-flex justify-content-between align-items-center mb-2 shadow-sm" id="v-pills-services-tab" data-toggle="pill" href="#v-pills-services" role="tab" aria-controls="v-pills-services" aria-selected="false">
                                                <span><i class="fas fa-concierge-bell mr-2 text-info"></i> خدماتنا</span>
                                                <i class="fas fa-chevron-left text-muted small"></i>
                                            </a>
                                            <a class="nav-link font-weight-bold d-flex justify-content-between align-items-center mb-2 shadow-sm" id="v-pills-gallery-tab" data-toggle="pill" href="#v-pills-gallery" role="tab" aria-controls="v-pills-gallery" aria-selected="false">
                                                <span><i class="fas fa-images mr-2 text-success"></i> أعمالنا / المعرض</span>
                                                <i class="fas fa-chevron-left text-muted small"></i>
                                            </a>
                                            <a class="nav-link font-weight-bold d-flex justify-content-between align-items-center mb-2 shadow-sm" id="v-pills-blog-tab" data-toggle="pill" href="#v-pills-blog" role="tab" aria-controls="v-pills-blog" aria-selected="false">
                                                <span><i class="fas fa-newspaper mr-2 text-warning"></i> المدونة</span>
                                                <i class="fas fa-chevron-left text-muted small"></i>
                                            </a>
                                            <a class="nav-link font-weight-bold d-flex justify-content-between align-items-center mb-2 shadow-sm" id="v-pills-contact-tab" data-toggle="pill" href="#v-pills-contact" role="tab" aria-controls="v-pills-contact" aria-selected="false">
                                                <span><i class="fas fa-headset mr-2 text-danger"></i> اتصل بنا</span>
                                                <i class="fas fa-chevron-left text-muted small"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-9">
                                        <div class="tab-content border rounded p-4 bg-white shadow-sm" id="v-pills-tabContent">
                                            {{-- Tab 1: About Us --}}
                                            <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                                    <h5 class="mb-0 text-dark font-weight-bold">
                                                        <i class="fas fa-info-circle text-primary mr-1"></i> إعدادات سيو صفحة (من نحن)
                                                    </h5>
                                                    <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-external-link-alt mr-1"></i> معاينة الصفحة
                                                    </a>
                                                </div>

                                                <!-- Google Snippet Preview -->
                                                <div class="alert alert-light border p-3 mb-3 rounded" style="background-color: #fafbfc;">
                                                    <div class="small font-weight-bold text-muted mb-1"><i class="fab fa-google text-primary mr-1"></i> شكل ظهور الصفحة في نتائج بحث Google:</div>
                                                    <div class="text-success small" style="direction: ltr; text-align: right;">{{ route('about') }}</div>
                                                    <div class="text-primary font-weight-bold" style="font-size: 1.05rem;" id="preview-seo-about-title">{{ $settings['seo_about_title'] ?? 'من نحن | سين ياء لخدمات النظافة والتعقيم الشامل' }}</div>
                                                    <div class="text-muted small" style="line-height: 1.4;" id="preview-seo-about-desc">{{ $settings['seo_about_description'] ?? 'تعرف على شركة سين ياء لخدمات النظافة والتعقيم الشامل بجده. خبرة عريقة في تنظيف المنازل والفلل والمفروشات بأحدث المعدات.' }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_about_title">عنوان السيو (Meta Title)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-heading"></i></div></div>
                                                        <input type="text" name="seo_about_title" id="seo_about_title" class="form-control @error('seo_about_title') is-invalid @enderror" value="{{ old('seo_about_title', $settings['seo_about_title'] ?? '') }}" placeholder="مثال: من نحن | سين ياء لخدمات النظافة والتعقيم الشامل">
                                                    </div>
                                                    <small class="form-text text-muted">العنوان الظاهر في تبويب المتصفح ومحركات البحث (مستحسن 50 - 65 حرف).</small>
                                                    @error('seo_about_title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_about_description">وصف الميتا (Meta Description)</label>
                                                    <textarea name="seo_about_description" id="seo_about_description" rows="3" class="form-control @error('seo_about_description') is-invalid @enderror" placeholder="وصف موجز وجذاب لصفحة من نحن...">{{ old('seo_about_description', $settings['seo_about_description'] ?? '') }}</textarea>
                                                    <small class="form-text text-muted">يظهر أسفل عنوان الرابط في نتائج البحث (مستحسن 130 - 160 حرف).</small>
                                                    @error('seo_about_description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="seo_about_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
                                                        <input type="text" name="seo_about_keywords" id="seo_about_keywords" class="form-control @error('seo_about_keywords') is-invalid @enderror" value="{{ old('seo_about_keywords', $settings['seo_about_keywords'] ?? '') }}" placeholder="عن شركة سين ياء, من نحن, شركة تنظيف بجده, أفضل شركة نظافة بجده">
                                                    </div>
                                                    <small class="form-text text-muted">افصل بين الكلمات بفواصل (,).</small>
                                                    @error('seo_about_keywords')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            {{-- Tab 2: Services --}}
                                            <div class="tab-pane fade" id="v-pills-services" role="tabpanel" aria-labelledby="v-pills-services-tab">
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                                    <h5 class="mb-0 text-dark font-weight-bold">
                                                        <i class="fas fa-concierge-bell text-info mr-1"></i> إعدادات سيو صفحة (خدماتنا)
                                                    </h5>
                                                    <a href="{{ route('services.index') }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                        <i class="fas fa-external-link-alt mr-1"></i> معاينة الصفحة
                                                    </a>
                                                </div>

                                                <!-- Google Snippet Preview -->
                                                <div class="alert alert-light border p-3 mb-3 rounded" style="background-color: #fafbfc;">
                                                    <div class="small font-weight-bold text-muted mb-1"><i class="fab fa-google text-primary mr-1"></i> شكل ظهور الصفحة في نتائج بحث Google:</div>
                                                    <div class="text-success small" style="direction: ltr; text-align: right;">{{ route('services.index') }}</div>
                                                    <div class="text-primary font-weight-bold" style="font-size: 1.05rem;" id="preview-seo-services-title">{{ $settings['seo_services_title'] ?? 'خدماتنا | سين ياء لخدمات التنظيف الشامل' }}</div>
                                                    <div class="text-muted small" style="line-height: 1.4;" id="preview-seo-services-desc">{{ $settings['seo_services_description'] ?? 'استكشف باقة خدمات شركة سين ياء المتكاملة: تنظيف الفلل، الشقق، المفروشات، غسيل السجاد والكنب بالبخار، جلي الرخام وتلميع البلاط بأعلى جودة.' }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_services_title">عنوان السيو (Meta Title)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-heading"></i></div></div>
                                                        <input type="text" name="seo_services_title" id="seo_services_title" class="form-control @error('seo_services_title') is-invalid @enderror" value="{{ old('seo_services_title', $settings['seo_services_title'] ?? '') }}" placeholder="مثال: خدماتنا المتميزة في النظافة والتعقيم الشامل | سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">العنوان الظاهر في تبويب المتصفح ومحركات البحث.</small>
                                                    @error('seo_services_title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_services_description">وصف الميتا (Meta Description)</label>
                                                    <textarea name="seo_services_description" id="seo_services_description" rows="3" class="form-control @error('seo_services_description') is-invalid @enderror" placeholder="وصف موجز وجذاب لصفحة خدماتنا...">{{ old('seo_services_description', $settings['seo_services_description'] ?? '') }}</textarea>
                                                    <small class="form-text text-muted">يظهر أسفل عنوان الرابط في نتائج البحث.</small>
                                                    @error('seo_services_description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="seo_services_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
                                                        <input type="text" name="seo_services_keywords" id="seo_services_keywords" class="form-control @error('seo_services_keywords') is-invalid @enderror" value="{{ old('seo_services_keywords', $settings['seo_services_keywords'] ?? '') }}" placeholder="خدمات تنظيف بجده, تنظيف فلل, غسيل كنب, جلي رخام, تعقيم منازل">
                                                    </div>
                                                    <small class="form-text text-muted">افصل بين الكلمات بفواصل (,).</small>
                                                    @error('seo_services_keywords')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            {{-- Tab 3: Gallery --}}
                                            <div class="tab-pane fade" id="v-pills-gallery" role="tabpanel" aria-labelledby="v-pills-gallery-tab">
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                                    <h5 class="mb-0 text-dark font-weight-bold">
                                                        <i class="fas fa-images text-success mr-1"></i> إعدادات سيو صفحة (معرض الأعمال / أعمالنا)
                                                    </h5>
                                                    <a href="{{ route('gallery') }}" target="_blank" class="btn btn-outline-success btn-sm">
                                                        <i class="fas fa-external-link-alt mr-1"></i> معاينة الصفحة
                                                    </a>
                                                </div>

                                                <!-- Google Snippet Preview -->
                                                <div class="alert alert-light border p-3 mb-3 rounded" style="background-color: #fafbfc;">
                                                    <div class="small font-weight-bold text-muted mb-1"><i class="fab fa-google text-primary mr-1"></i> شكل ظهور الصفحة في نتائج بحث Google:</div>
                                                    <div class="text-success small" style="direction: ltr; text-align: right;">{{ route('gallery') }}</div>
                                                    <div class="text-primary font-weight-bold" style="font-size: 1.05rem;" id="preview-seo-gallery-title">{{ $settings['seo_gallery_title'] ?? 'معرض الأعمال | سين ياء صور قبل وبعد' }}</div>
                                                    <div class="text-muted small" style="line-height: 1.4;" id="preview-seo-gallery-desc">{{ $settings['seo_gallery_description'] ?? 'شاهد صور وفيديوهات سابقة أعمال شركة سين ياء في تنظيف الفلل، الشقق، جلي الرخام وغسيل الكنب والسجاد بالبخار بجودة استثنائية.' }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_gallery_title">عنوان السيو (Meta Title)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-heading"></i></div></div>
                                                        <input type="text" name="seo_gallery_title" id="seo_gallery_title" class="form-control @error('seo_gallery_title') is-invalid @enderror" value="{{ old('seo_gallery_title', $settings['seo_gallery_title'] ?? '') }}" placeholder="مثال: معرض الصور وسابقة الأعمال | سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">العنوان الظاهر في تبويب المتصفح ومحركات البحث.</small>
                                                    @error('seo_gallery_title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_gallery_description">وصف الميتا (Meta Description)</label>
                                                    <textarea name="seo_gallery_description" id="seo_gallery_description" rows="3" class="form-control @error('seo_gallery_description') is-invalid @enderror" placeholder="وصف موجز وجذاب لصفحة معرض الأعمال...">{{ old('seo_gallery_description', $settings['seo_gallery_description'] ?? '') }}</textarea>
                                                    <small class="form-text text-muted">يظهر أسفل عنوان الرابط في نتائج البحث.</small>
                                                    @error('seo_gallery_description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="seo_gallery_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
                                                        <input type="text" name="seo_gallery_keywords" id="seo_gallery_keywords" class="form-control @error('seo_gallery_keywords') is-invalid @enderror" value="{{ old('seo_gallery_keywords', $settings['seo_gallery_keywords'] ?? '') }}" placeholder="معرض أعمال, صور تنظيف منازل, قبل وبعد التنظيف, سابقة أعمال تنظيف, سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">افصل بين الكلمات بفواصل (,).</small>
                                                    @error('seo_gallery_keywords')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            {{-- Tab 4: Blog --}}
                                            <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                                    <h5 class="mb-0 text-dark font-weight-bold">
                                                        <i class="fas fa-newspaper text-warning mr-1"></i> إعدادات سيو صفحة (المدونة)
                                                    </h5>
                                                    <a href="{{ route('blog.index') }}" target="_blank" class="btn btn-outline-warning btn-sm">
                                                        <i class="fas fa-external-link-alt mr-1"></i> معاينة الصفحة
                                                    </a>
                                                </div>

                                                <!-- Google Snippet Preview -->
                                                <div class="alert alert-light border p-3 mb-3 rounded" style="background-color: #fafbfc;">
                                                    <div class="small font-weight-bold text-muted mb-1"><i class="fab fa-google text-primary mr-1"></i> شكل ظهور الصفحة في نتائج بحث Google:</div>
                                                    <div class="text-success small" style="direction: ltr; text-align: right;">{{ route('blog.index') }}</div>
                                                    <div class="text-primary font-weight-bold" style="font-size: 1.05rem;" id="preview-seo-blog-title">{{ $settings['seo_blog_title'] ?? 'المدونة والنصائح | سين ياء لدليل نظافة المنازل' }}</div>
                                                    <div class="text-muted small" style="line-height: 1.4;" id="preview-seo-blog-desc">{{ $settings['seo_blog_description'] ?? 'مقالات ونصائح تهمك حول أفضل طرق تنظيف المنازل، إزالة البقع الصعبة من الكنب والسجاد، وأساليب التعقيم الحديثة مقدمة من خبراء شركة سين ياء.' }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_blog_title">عنوان السيو (Meta Title)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-heading"></i></div></div>
                                                        <input type="text" name="seo_blog_title" id="seo_blog_title" class="form-control @error('seo_blog_title') is-invalid @enderror" value="{{ old('seo_blog_title', $settings['seo_blog_title'] ?? '') }}" placeholder="مثال: المدونة ونصائح التنظيف والتعقيم المنزلي | سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">العنوان الظاهر في تبويب المتصفح ومحركات البحث.</small>
                                                    @error('seo_blog_title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_blog_description">وصف الميتا (Meta Description)</label>
                                                    <textarea name="seo_blog_description" id="seo_blog_description" rows="3" class="form-control @error('seo_blog_description') is-invalid @enderror" placeholder="وصف موجز وجذاب لصفحة المدونة...">{{ old('seo_blog_description', $settings['seo_blog_description'] ?? '') }}</textarea>
                                                    <small class="form-text text-muted">يظهر أسفل عنوان الرابط في نتائج البحث.</small>
                                                    @error('seo_blog_description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="seo_blog_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
                                                        <input type="text" name="seo_blog_keywords" id="seo_blog_keywords" class="form-control @error('seo_blog_keywords') is-invalid @enderror" value="{{ old('seo_blog_keywords', $settings['seo_blog_keywords'] ?? '') }}" placeholder="مدونة النظافة, نصائح تنظيف المنازل, إزالة بقع الكنب, تنظيف السجاد بالبخار, سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">افصل بين الكلمات بفواصل (,).</small>
                                                    @error('seo_blog_keywords')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>

                                            {{-- Tab 5: Contact Us --}}
                                            <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                                    <h5 class="mb-0 text-dark font-weight-bold">
                                                        <i class="fas fa-headset text-danger mr-1"></i> إعدادات سيو صفحة (اتصل بنا)
                                                    </h5>
                                                    <a href="{{ route('contact') }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-external-link-alt mr-1"></i> معاينة الصفحة
                                                    </a>
                                                </div>

                                                <!-- Google Snippet Preview -->
                                                <div class="alert alert-light border p-3 mb-3 rounded" style="background-color: #fafbfc;">
                                                    <div class="small font-weight-bold text-muted mb-1"><i class="fab fa-google text-primary mr-1"></i> شكل ظهور الصفحة في نتائج بحث Google:</div>
                                                    <div class="text-success small" style="direction: ltr; text-align: right;">{{ route('contact') }}</div>
                                                    <div class="text-primary font-weight-bold" style="font-size: 1.05rem;" id="preview-seo-contact-title">{{ $settings['seo_contact_title'] ?? 'اتصل بنا | سين ياء حجز واستفسار فوري' }}</div>
                                                    <div class="text-muted small" style="line-height: 1.4;" id="preview-seo-contact-desc">{{ $settings['seo_contact_description'] ?? 'تواصل مع فريق شركة سين ياء لخدمات النظافة والتعقيم الشامل بجده. احجز موعدك فورياً عبر الهاتف أو الواتساب على مدار 24 ساعة.' }}</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_contact_title">عنوان السيو (Meta Title)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-heading"></i></div></div>
                                                        <input type="text" name="seo_contact_title" id="seo_contact_title" class="form-control @error('seo_contact_title') is-invalid @enderror" value="{{ old('seo_contact_title', $settings['seo_contact_title'] ?? '') }}" placeholder="مثال: اتصل بنا واحجز خدمتك الآن | سين ياء لخدمات النظافة">
                                                    </div>
                                                    <small class="form-text text-muted">العنوان الظاهر في تبويب المتصفح ومحركات البحث.</small>
                                                    @error('seo_contact_title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="seo_contact_description">وصف الميتا (Meta Description)</label>
                                                    <textarea name="seo_contact_description" id="seo_contact_description" rows="3" class="form-control @error('seo_contact_description') is-invalid @enderror" placeholder="وصف موجز وجذاب لصفحة اتصل بنا...">{{ old('seo_contact_description', $settings['seo_contact_description'] ?? '') }}</textarea>
                                                    <small class="form-text text-muted">يظهر أسفل عنوان الرابط في نتائج البحث.</small>
                                                    @error('seo_contact_description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="seo_contact_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><div class="input-group-text"><i class="fas fa-key"></i></div></div>
                                                        <input type="text" name="seo_contact_keywords" id="seo_contact_keywords" class="form-control @error('seo_contact_keywords') is-invalid @enderror" value="{{ old('seo_contact_keywords', $settings['seo_contact_keywords'] ?? '') }}" placeholder="اتصل بنا, حجز موعد تنظيف, رقم شركة تنظيف بجده, واتساب شركة نظافة, سين ياء">
                                                    </div>
                                                    <small class="form-text text-muted">افصل بين الكلمات بفواصل (,).</small>
                                                    @error('seo_contact_keywords')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-whitesmoke text-right">
                                <button type="submit" class="btn btn-warning btn-lg px-4 font-weight-bold">
                                    <i class="fas fa-save mr-1"></i> حفظ كافة الإعدادات وسيو الصفحات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Live Preview Updates
            function updatePreview() {
                var isActive = $('#toggle-top-bar').is(':checked');
                var badge = $('#top_bar_badge').val() || '🎉 عرض حصري';
                var discount = $('#top_bar_discount').val() || '35%';
                var text = $('#top_bar_text').val() || 'على جميع خدمات التنظيف والتعقيم الشامل!';
                var phone = $('#top_bar_phone').val() || '0531109831';

                $('#preview-badge').text(badge);
                $('#preview-discount').text(discount);
                $('#preview-text').text(text);
                $('#preview-phone').text(phone);

                if (isActive) {
                    $('#preview-wrapper').removeClass('d-none').css('opacity', '1');
                    $('#preview-hidden-note').addClass('d-none');
                } else {
                    $('#preview-wrapper').addClass('d-none');
                    $('#preview-hidden-note').removeClass('d-none');
                }
            }

            $('#toggle-top-bar').on('change', updatePreview);
            $('#top_bar_badge, #top_bar_discount, #top_bar_text, #top_bar_phone').on('input', updatePreview);

            // Initial trigger
            updatePreview();

            // General Site SEO Live Preview
            function updateSiteSeoPreview() {
                var siteName = $('#site_name').val() || 'سين ياء';
                var metaTitle = $('#meta_title').val();
                var metaDesc = $('#meta_description').val();
                var canonical = $('#canonical_url').val() || '{{ url('/') }}';

                var previewTitle = metaTitle ? metaTitle : (siteName + ' | خدمات النظافة والتعقيم الشامل بالمملكة');
                var previewDesc = metaDesc ? metaDesc : 'شركة ' + siteName +
                    ' لخدمات النظافة والتعقيم الشامل بجده. تنظيف منازل، فلل، شقق، كنب ومفروشات بالبخار، جلي رخام وخزانات بأحدث التقنيات وأفضل الأسعار.';

                $('#seo-site-title').text(previewTitle);
                $('#seo-site-desc').text(previewDesc);
                $('#seo-site-url').text(canonical);
            }

            $('#site_name, #meta_title, #meta_description, #canonical_url').on('input', updateSiteSeoPreview);
            updateSiteSeoPreview();

            // Core Static Pages SEO Live Previews
            ['about', 'services', 'gallery', 'blog', 'contact'].forEach(function(page) {
                function updatePagePreview() {
                    var title = $('#seo_' + page + '_title').val();
                    var desc = $('#seo_' + page + '_description').val();
                    if (title) {
                        $('#preview-seo-' + page + '-title').text(title);
                    }
                    if (desc) {
                        $('#preview-seo-' + page + '-desc').text(desc);
                    }
                }
                $('#seo_' + page + '_title, #seo_' + page + '_description').on('input', updatePagePreview);
            });
        });
    </script>
@endpush
