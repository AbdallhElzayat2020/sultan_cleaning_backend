@extends('admin.layouts.master')
@section('title', 'تعديل خدمة - ' . $service->title)

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.services.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>تعديل الخدمة</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">خدماتنا</a></div>
                <div class="breadcrumb-item">تعديل الخدمة</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل بيانات: {{ $service->title }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">اسم الخدمة <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required placeholder="مثال: تنظيف الفلل والقصور">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">الرابط المخصص (Slug)</label>
                                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $service->slug) }}" placeholder="villas-cleaning">
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
                                                    <button class="btn btn-outline-primary" role="iconpicker" id="service-icon-picker" data-iconset="fontawesome5" data-icon="{{ old('icon', $service->icon) }}"></button>
                                                </div>
                                                <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $service->icon) }}" required placeholder="fa-solid fa-broom">
                                            </div>
                                            @error('icon')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">صورة الخدمة</label>
                                            <div class="d-flex align-items-center gap-3 mb-2">
                                                @if($service->image)
                                                    <img src="{{ asset('uploads/services/' . $service->image) }}" alt="{{ $service->title }}" class="rounded border" style="width: 70px; height: 50px; object-fit: cover;">
                                                @endif
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                            </div>
                                            <small class="form-text text-muted">اتركه فارغاً للاحتفاظ بالصورة الحالية (JPG, PNG, WEBP)</small>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Discount Badge / Text -->
                                <div class="form-group">
                                    <label for="discount">شارة أو نسبة الخصم (اختياري)</label>
                                    <input type="text" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $service->discount) }}" placeholder="مثال: خصم 35% كود: SULTAN35 أو خصم خاص 25%">
                                    <small class="form-text text-muted">اتركه فارغاً (null) إذا كانت هذه الخدمة بدون خصم أو عرض خاص.</small>
                                    @error('discount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Short Description -->
                                <div class="form-group">
                                    <label for="short_description">الوصف المختصر (يظهر في كروت الواجهة) <span class="text-danger">*</span></label>
                                    <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" required placeholder="نبذة موجزة وجذابة عن الخدمة...">{{ old('short_description', $service->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Full Description (Summernote) -->
                                <div class="form-group">
                                    <label for="description">التفاصيل الكاملة للخدمة (يظهر في صفحة تفاصيل الخدمة)</label>
                                    <textarea name="description" id="description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!-- Order -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order">الترتيب</label>
                                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $service->order) }}" min="0" placeholder="0">
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
                                                <option value="1" {{ old('status', $service->status ? '1' : '0') == '1' ? 'selected' : '' }}>مفعل (يظهر في الموقع)</option>
                                                <option value="0" {{ old('status', $service->status ? '1' : '0') == '0' ? 'selected' : '' }}>غير مفعل (مخفي)</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
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
    });
</script>
@endpush
