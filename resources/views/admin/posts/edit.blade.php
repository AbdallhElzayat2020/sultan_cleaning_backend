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
    });
</script>
@endpush
