@extends('admin.layouts.master')
@section('title', 'إضافة صفحة جديدة')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>إضافة صفحة جديدة (CMS Page)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">الصفحات</a></div>
                <div class="breadcrumb-item">إضافة صفحة</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Main Content Column -->
                    <div class="col-12 col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4><i class="fas fa-file-alt text-primary mr-2"></i> بيانات ومحتوى الصفحة</h4>
                            </div>
                            <div class="card-body">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">عنوان الصفحة <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="مثال: سياسة الخصوصية، الشروط والأحكام، ضمان الجودة">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label for="slug">الرابط المخصص (Slug)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ url('/pages') }}/</span>
                                        </div>
                                        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="privacy-policy">
                                    </div>
                                    <small class="form-text text-muted">اتركه فارغاً ليتم توليده تلقائياً من العنوان.</small>
                                    @error('slug')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Excerpt -->
                                <div class="form-group">
                                    <label for="excerpt">الوصف المختصر / المقتطف (Excerpt)</label>
                                    <textarea name="excerpt" id="excerpt" rows="2" class="form-control @error('excerpt') is-invalid @enderror" placeholder="مقتطف قصير يلخص موضوع الصفحة">{{ old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Content -->
                                <div class="form-group mb-0">
                                    <label for="page_content">محتوى وتفاصيل الصفحة <span class="text-danger">*</span></label>
                                    <textarea name="content" id="page_content" class="summernote @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SEO Metadata Card with Live Google Preview -->
                        <div class="card shadow-sm border-info mt-4">
                            <div class="card-header bg-light">
                                <h4 class="text-info"><i class="fas fa-search mr-2"></i> تحسين محركات البحث (SEO & Meta Tags)</h4>
                            </div>
                            <div class="card-body">
                                <!-- Google Preview Snippet -->
                                <div class="mb-4 p-3 bg-white rounded border shadow-sm">
                                    <div class="text-muted small mb-1"><i class="fab fa-google text-danger mr-1"></i> معاينة شكل النتيجة في محرك بحث جوجل (Live Google Preview):</div>
                                    <div class="google-preview-container p-2" style="max-width: 600px; font-family: Arial, sans-serif;">
                                        <div class="google-preview-url text-truncate text-success" style="font-size: 13px;" id="preview-url">{{ url('/pages') }}/<span>{{ old('slug', 'page-url') }}</span></div>
                                        <div class="google-preview-title text-primary font-weight-bold" style="font-size: 18px; line-height: 1.3; cursor: pointer;" id="preview-title">{{ old('meta_title', old('title', 'عنوان الصفحة')) }} | سين ياء</div>
                                        <div class="google-preview-desc text-muted mt-1" style="font-size: 13px; line-height: 1.4;" id="preview-desc">{{ old('meta_description', old('excerpt', 'وصف موجز ومخصص للصفحة يظهر في نتائج البحث لمساعدة العملاء على معرفة المحتوى بسهولة.')) }}</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="meta_title">عنوان السيو المخصص (Meta Title)</label>
                                    <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title') }}" placeholder="اتركه فارغاً لاستخدام عنوان الصفحة واسم الشركة تلقائياً" maxlength="70">
                                    <small class="form-text text-muted d-flex justify-content-between">
                                        <span>العنوان المثالي بين 50 إلى 60 حرفاً.</span>
                                        <span id="meta_title_count" class="font-weight-bold">0 / 70</span>
                                    </small>
                                    @error('meta_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">وصف الميتا المخصص (Meta Description)</label>
                                    <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="اتركه فارغاً لتوليده تلقائياً من ملخص الصفحة ومحتواها" maxlength="160">{{ old('meta_description') }}</textarea>
                                    <small class="form-text text-muted d-flex justify-content-between">
                                        <span>الوصف المثالي بين 120 إلى 160 حرفاً.</span>
                                        <span id="meta_description_count" class="font-weight-bold">0 / 160</span>
                                    </small>
                                    @error('meta_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <label for="meta_keywords">الكلمات المفتاحية (Meta Keywords)</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords') }}" placeholder="افصل بين الكلمات بفاصلة (مثال: سياسة الخصوصية, سين ياء, شروط الخدمة)">
                                    @error('meta_keywords')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Settings Column -->
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4><i class="fas fa-cog text-secondary mr-2"></i> إعدادات النشر والعرض</h4>
                            </div>
                            <div class="card-body">
                                <!-- Status Toggle -->
                                <div class="form-group">
                                    <div class="control-label font-weight-bold mb-2">حالة الصفحة</div>
                                    <label class="custom-switch mt-1 pl-0">
                                        <input type="checkbox" name="status" value="1" class="custom-switch-input" {{ old('status', 1) ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description font-weight-bold">تفعيل ونشر الصفحة</span>
                                    </label>
                                </div>

                                <hr>

                                <!-- Show in Footer -->
                                <div class="form-group">
                                    <div class="control-label font-weight-bold mb-2">روابط الفوتر (Footer)</div>
                                    <label class="custom-switch mt-1 pl-0">
                                        <input type="checkbox" name="show_in_footer" value="1" class="custom-switch-input" {{ old('show_in_footer', 1) ? 'checked' : '' }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">إظهار في أسفل كافة صفحات الموقع (الفوتر)</span>
                                    </label>
                                </div>

                                <hr>

                                <!-- Order -->
                                <div class="form-group">
                                    <label for="order" class="font-weight-bold">ترتيب الظهور</label>
                                    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', 1) }}" min="0">
                                    <small class="form-text text-muted">الأرقام الأصغر تظهر أولاً.</small>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm">
                                        <i class="fas fa-save mr-1"></i> حفظ وإنشاء الصفحة
                                    </button>
                                    <a href="{{ route('admin.pages.index') }}" class="btn btn-light btn-block mt-2">
                                        إلغاء
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const siteName = "{{ setting('site_name', 'سين ياء') }}";
        const baseUrl = "{{ url('/pages') }}/";

        function updatePreview() {
            const titleInput = $('#title').val().trim();
            const slugInput = $('#slug').val().trim();
            const excerptInput = $('#excerpt').val().trim();
            const metaTitle = $('#meta_title').val().trim();
            const metaDesc = $('#meta_description').val().trim();

            const finalTitle = metaTitle ? metaTitle : (titleInput ? titleInput + ' | ' + siteName : 'عنوان الصفحة | ' + siteName);
            const finalSlug = slugInput ? slugInput : 'page-url';
            const finalDesc = metaDesc ? metaDesc : (excerptInput ? excerptInput : 'وصف موجز للصفحة يظهر في نتائج البحث لمساعدة العملاء على معرفة المحتوى بسهولة.');

            $('#preview-title').text(finalTitle);
            $('#preview-url span').text(finalSlug);
            $('#preview-desc').text(finalDesc);

            $('#meta_title_count').text($('#meta_title').val().length + ' / 70');
            $('#meta_description_count').text($('#meta_description').val().length + ' / 160');
        }

        $('#title, #slug, #excerpt, #meta_title, #meta_description').on('input', updatePreview);
        updatePreview();
    });
</script>
@endpush
