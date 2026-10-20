@extends('admin.layouts.master')
@section('title', 'إضافة خدمة جديدة')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>إضافة خدمة جديدة</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">خدماتنا</a></div>
                <div class="breadcrumb-item">إضافة خدمة</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>بيانات الخدمة</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">اسم الخدمة <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="مثال: تنظيف الفلل والقصور">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">الرابط المخصص (Slug)</label>
                                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="يُترك فارغاً للتوليد التلقائي">
                                            <small class="form-text text-muted">مثال: <code>villas-cleaning</code></small>
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Icon Input with Iconpicker -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="icon">أيقونة الخدمة <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary" role="iconpicker" id="service-icon-picker" data-iconset="fontawesome5" data-icon="fa-solid fa-broom"></button>
                                                </div>
                                                <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', 'fa-solid fa-broom') }}" required placeholder="fa-solid fa-broom">
                                            </div>
                                            @error('icon')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">صورة الخدمة (اختياري)</label>
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                            <small class="form-text text-muted">الامتدادات المقبولة: JPG, PNG, WEBP (الحجم الأقصى 3MB)</small>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Discount Badge / Text -->
                                <div class="form-group">
                                    <label for="discount">شارة أو نسبة الخصم (اختياري)</label>
                                    <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" placeholder="مثال: خصم خاص أو عرض حصري">
                                    <small class="form-text text-muted">اتركه فارغاً (null) إذا كانت هذه الخدمة بدون خصم أو عرض خاص.</small>
                                    @error('discount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Short Description -->
                                <div class="form-group">
                                    <label for="short_description">الوصف المختصر (يظهر في كروت الواجهة) <span class="text-danger">*</span></label>
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" required placeholder="نبذة موجزة وجذابة عن الخدمة...">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Full Description (Summernote) -->
                                <div class="form-group">
                                    <label for="description">التفاصيل الكاملة للخدمة (يظهر في صفحة تفاصيل الخدمة)</label>
                                    <textarea name="description" id="description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!-- Order -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order">الترتيب</label>
                                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', 0) }}" min="0" placeholder="0">
                                            <small class="form-text text-muted">الرقم الأقل يظهر أولاً</small>
                                            @error('order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">الحالة <span class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>مفعل (يظهر في الموقع)</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>غير مفعل (مخفي)</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO Section Card -->
                                <div class="card card-info border mb-4 mt-3" style="background-color: #fbfdfe;">
                                    <div class="card-header py-2 d-flex justify-content-between align-items-center" style="background-color: #edf7fa; border-bottom: 1px solid #d4ebf2;">
                                        <h5 class="mb-0 text-primary font-weight-bold" style="font-size: 1.05rem;">
                                            <i class="fas fa-search text-info mr-2"></i> تحسين محركات البحث (SEO & Meta Tags)
                                        </h5>
                                        <span class="badge badge-light text-muted">اختياري - يتم التوليد تلقائياً إذا تُرك فارغاً</span>
                                    </div>
                                    <div class="card-body">
                                        <!-- Google Preview Snippet -->
                                        <div class="alert alert-light border p-3 mb-4 rounded" style="background-color: #ffffff; border-color: #e2e8f0;">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fab fa-google text-primary mr-2" style="font-size: 1.2rem;"></i>
                                                <span class="font-weight-bold text-dark" style="font-size: 0.9rem;">معاينة النتيجة في بحث Google:</span>
                                            </div>
                                            <div style="font-family: Arial, sans-serif; max-width: 650px;" class="text-right" dir="rtl">
                                                <div class="text-success small mb-1" style="font-size: 0.8rem; direction: ltr; text-align: right;">
                                                    {{ url('/services') }}/<span id="seo-preview-slug">{{ old('slug') ?: 'service-slug' }}</span>
                                                </div>
                                                <div class="text-primary font-weight-bold" style="font-size: 1.15rem; line-height: 1.3;" id="seo-preview-title">
                                                    {{ old('meta_title') ?: 'اسم الخدمة | سين ياء لخدمات النظافة' }}
                                                </div>
                                                <div class="text-secondary small mt-1" style="line-height: 1.4; color: #4d5156 !important;" id="seo-preview-desc">
                                                    {{ old('meta_description') ?: 'الوصف التعريفي للخدمة الذي سيظهر في نتائج محركات البحث لمساعدة العملاء على العثور عليك بسرعة.' }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_title" class="font-weight-bold">عنوان السيو (Meta Title)</label>
                                            <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}" placeholder="مثال: أفضل شركة تنظيف منازل وفلل بجده | سين ياء">
                                            <small class="form-text text-muted">إذا تُرك فارغاً، سيتم اعتماد اسم الخدمة متبوعاً باسم الموقع تلقائياً.</small>
                                            @error('meta_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description" class="font-weight-bold">وصف الميتا (Meta Description)</label>
                                            <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="اكتب وصفاً جذاباً ومختصراً يظهر في محركات البحث (حوالي 120-160 حرفاً)...">{{ old('meta_description') }}</textarea>
                                            <small class="form-text text-muted">إذا تُرك فارغاً، سيتم اعتماد الوصف المختصر للخدمة تلقائياً.</small>
                                            @error('meta_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="meta_keywords" class="font-weight-bold">الكلمات المفتاحية (Meta Keywords)</label>
                                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords') }}" placeholder="مثال: تنظيف فلل, غسيل كنب, تعقيم منازل, شركة تنظيف بجده">
                                            <small class="form-text text-muted">افصل بين كل كلمة أو جملة مفتاحية بفاصلة (,).</small>
                                            @error('meta_keywords')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save"></i> حفظ الخدمة
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Iconpicker
        $('#service-icon-picker').iconpicker({
            icon: $('#icon').val() || 'fa-solid fa-broom',
            iconset: 'fontawesome5'
        }).on('change', function(e) {
            $('#icon').val(e.icon);
        });

        $('#icon').on('input', function() {
            var val = $(this).val();
            if (val) {
                $('#service-icon-picker').iconpicker('setIcon', val);
            }
        });

        // Summernote Editor
        if ($.fn.summernote) {
            $('.summernote').summernote({
                height: 200,
                direction: 'rtl',
                placeholder: 'اكتب تفاصيل الخدمة، المميزات، وطرق العمل هنا...'
            });
        }

        // Live Google SEO Snippet Preview
        function updateSeoPreview() {
            var siteName = '{{ setting("site_name", "سين ياء") }}';
            var title = $('#title').val();
            var slug = $('#slug').val();
            var metaTitle = $('#meta_title').val();
            var metaDesc = $('#meta_description').val();
            var shortDesc = $('#short_description').val();

            var previewTitle = metaTitle ? metaTitle : (title ? (title + ' | ' + siteName + ' لخدمات النظافة') : 'اسم الخدمة | ' + siteName);
            var previewSlug = slug ? slug : (title ? title.toLowerCase().replace(/[^a-z0-9\u0621-\u064A]+/g, '-') : 'service-slug');
            var previewDesc = metaDesc ? metaDesc : (shortDesc ? shortDesc : 'الوصف التعريفي للخدمة الذي سيظهر في نتائج محركات البحث لمساعدة العملاء على العثور عليك بسرعة.');

            $('#seo-preview-title').text(previewTitle);
            $('#seo-preview-slug').text(previewSlug);
            $('#seo-preview-desc').text(previewDesc);
        }

        $('#title, #slug, #meta_title, #meta_description, #short_description').on('input', updateSeoPreview);
        updateSeoPreview();
    });
</script>
@endpush
