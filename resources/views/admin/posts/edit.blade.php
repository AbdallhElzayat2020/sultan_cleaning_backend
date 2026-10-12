@extends('admin.layouts.master')
@section('title', 'تعديل المقال')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>تعديل المقال: {{ $post->title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">المدونة</a></div>
                <div class="breadcrumb-item">تعديل مقال</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-11 offset-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل بيانات ومحتوى المقال</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">عنوان المقال <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required placeholder="مثال: دليلك الشامل للتخلص من بقع الكنب والسجاد العنيدة">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="slug">الرابط المخصص (Slug)</label>
                                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $post->slug) }}" placeholder="يُترك فارغاً للتوليد التلقائي">
                                            <small class="form-text text-muted">مثال: <code>carpet-cleaning-guide</code></small>
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Category -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category">التصنيف / الوسم <span class="text-danger">*</span></label>
                                            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $post->category) }}" required placeholder="مثال: نصائح الخبراء أو دليل المنازل">
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Category Icon -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_icon">أيقونة التصنيف (FontAwesome)</label>
                                            <input type="text" name="category_icon" id="category_icon" class="form-control @error('category_icon') is-invalid @enderror" value="{{ old('category_icon', $post->category_icon) }}" placeholder="fa-solid fa-lightbulb">
                                            <small class="form-text text-muted">مثال: <code>fa-solid fa-lightbulb</code> أو <code>fa-solid fa-hammer</code></small>
                                            @error('category_icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Reading Time -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="reading_time">وقت القراءة المقدر</label>
                                            <input type="text" name="reading_time" id="reading_time" class="form-control @error('reading_time') is-invalid @enderror" value="{{ old('reading_time', $post->reading_time) }}" placeholder="مثال: 5 دقائق قراءة">
                                            @error('reading_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">صورة المقال الرئيسية</label>
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                            <small class="form-text text-muted">اترك الحقل فارغاً للإبقاء على الصورة الحالية</small>
                                            @if($post->image)
                                                <div class="mt-2 d-flex align-items-center">
                                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="rounded shadow-sm border mr-2" style="width: 70px; height: 50px; object-fit: cover;">
                                                    <span class="text-muted small">الصورة الحالية</span>
                                                </div>
                                            @endif
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Published Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published_at">تاريخ النشر</label>
                                            <input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : date('Y-m-d')) }}">
                                            @error('published_at')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Short Description -->
                                <div class="form-group">
                                    <label for="short_description">الوصف المختصر (يظهر في كرت المقال بالرئيسية)</label>
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" placeholder="نبذة موجزة وجذابة عن موضوع المقال...">{{ old('short_description', $post->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Full Content with Summernote WYSIWYG Editor -->
                                <div class="form-group">
                                    <label for="content">محتوى المقال الكامل (محرر نصوص منسق وتفاعلي) <span class="text-danger">*</span></label>
                                    <textarea name="content" id="post-content-editor" class="form-control summernote @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!-- Order -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order">الترتيب</label>
                                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $post->order) }}" min="0" placeholder="0">
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
                                                <option value="1" {{ old('status', $post->status ? '1' : '0') == '1' ? 'selected' : '' }}>منشور (يظهر في الموقع)</option>
                                                <option value="0" {{ old('status', $post->status ? '1' : '0') == '0' ? 'selected' : '' }}>مسودة (مخفي)</option>
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
                                            <i class="fas fa-search text-info mr-2"></i> تحسين محركات البحث لمقال المدونة (SEO)
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
                                                    {{ url('/blog') }}/<span id="seo-preview-slug">{{ old('slug', $post->slug) ?: 'post-slug' }}</span>
                                                </div>
                                                <div class="text-primary font-weight-bold" style="font-size: 1.15rem; line-height: 1.3;" id="seo-preview-title">
                                                    {{ old('meta_title', $post->meta_title) ?: ($post->title . ' | مدونة ' . setting('site_name', 'سين ياء')) }}
                                                </div>
                                                <div class="text-secondary small mt-1" style="line-height: 1.4; color: #4d5156 !important;" id="seo-preview-desc">
                                                    {{ old('meta_description', $post->meta_description) ?: ($post->short_description ?: 'مقتطف تعريفي للمقال يظهر في نتائج بحث محركات البحث.') }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_title" class="font-weight-bold">عنوان السيو (Meta Title)</label>
                                            <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $post->meta_title) }}" placeholder="عنوان المقال المخصص لمحركات البحث">
                                            <small class="form-text text-muted">إذا تُرك فارغاً، سيتم استخدام عنوان المقال متبوعاً باسم الموقع تلقائياً.</small>
                                            @error('meta_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description" class="font-weight-bold">وصف الميتا (Meta Description)</label>
                                            <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror" placeholder="وصف مخصص ومختصر للمقال لجوجل (حوالي 120-160 حرفاً)...">{{ old('meta_description', $post->meta_description) }}</textarea>
                                            <small class="form-text text-muted">إذا تُرك فارغاً، سيتم اعتماد الوصف المختصر للمقال تلقائياً.</small>
                                            @error('meta_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-0">
                                            <label for="meta_keywords" class="font-weight-bold">الكلمات المفتاحية (Meta Keywords)</label>
                                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ old('meta_keywords', $post->meta_keywords) }}" placeholder="مثال: تنظيف كنب, إزالة البقع, نظافة بالبخار, نصائح منزلية">
                                            <small class="form-text text-muted">افصل بين الكلمات المفتاحية بفاصلة (,).</small>
                                            @error('meta_keywords')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save"></i> حفظ التعديلات
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
        if ($.fn.summernote) {
            $('.summernote').summernote({
                height: 350,
                direction: 'rtl',
                placeholder: 'اكتب تفاصيل ومحتوى المقال كاملاً مع التنسيقات والصور والعناوين...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'italic', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
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

            var previewTitle = metaTitle ? metaTitle : (title ? (title + ' | مدونة ' + siteName) : 'عنوان المقال | ' + siteName);
            var previewSlug = slug ? slug : (title ? title.toLowerCase().replace(/[^a-z0-9\u0621-\u064A]+/g, '-') : 'post-slug');
            var previewDesc = metaDesc ? metaDesc : (shortDesc ? shortDesc : 'مقتطف تعريفي للمقال يظهر في نتائج بحث محركات البحث.');

            $('#seo-preview-title').text(previewTitle);
            $('#seo-preview-slug').text(previewSlug);
            $('#seo-preview-desc').text(previewDesc);
        }

        $('#title, #slug, #meta_title, #meta_description, #short_description').on('input', updateSeoPreview);
        updateSeoPreview();
    });
</script>
@endpush
