@extends('admin.layouts.master')
@section('title', 'تعديل رأي العميل')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>تعديل رأي العميل: {{ $testimonial->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">آراء العملاء</a></div>
                <div class="breadcrumb-item">تعديل تقييم</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>تعديل بيانات تقييم العميل</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">اسم العميل <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $testimonial->name) }}" required placeholder="مثال: أبو عبد الرحمن الشمري">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- City / Location -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">المدينة / الحي</label>
                                            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $testimonial->city) }}" placeholder="مثال: جده - حي النرجس">
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rating">التقييم بالنجوم <span class="text-danger">*</span></label>
                                            <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                                <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 نجوم - ممتاز جداً)</option>
                                                <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ (4 نجوم - جيد جداً)</option>
                                                <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>⭐⭐⭐ (3 نجوم - جيد)</option>
                                                <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>⭐⭐ (نجمتان - مقبول)</option>
                                                <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>⭐ (نجمة واحدة - ضعيف)</option>
                                            </select>
                                            @error('rating')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Avatar Image -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">صورة العميل (اختياري)</label>
                                            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
                                            <small class="form-text text-muted">اترك الحقل فارغاً للإبقاء على الصورة الحالية</small>
                                            @if($testimonial->avatar)
                                                <div class="mt-2 d-flex align-items-center">
                                                    <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="rounded-circle shadow-sm border mr-2" style="width: 48px; height: 48px; object-fit: cover;">
                                                    <span class="text-muted small">الصورة الحالية</span>
                                                </div>
                                            @endif
                                            @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Content -->
                                <div class="form-group">
                                    <label for="review">نص التقييم / رأي العميل <span class="text-danger">*</span></label>
                                    <textarea name="review" id="review" rows="4" class="form-control @error('review') is-invalid @enderror" required placeholder="اكتب تفاصيل تجربة العميل ورأيه بالخدمة المقدمة...">{{ old('review', $testimonial->review) }}</textarea>
                                    @error('review')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!-- Order -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order">الترتيب</label>
                                            <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror" value="{{ old('order', $testimonial->order) }}" min="0" placeholder="0">
                                            <small class="form-text text-muted">الرقم الأقل يظهر أولاً في السلايدر</small>
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
                                                <option value="1" {{ old('status', $testimonial->status ? '1' : '0') == '1' ? 'selected' : '' }}>مفعل (يظهر في السلايدر بالصفحة الرئيسية)</option>
                                                <option value="0" {{ old('status', $testimonial->status ? '1' : '0') == '0' ? 'selected' : '' }}>غير مفعل (مخفي)</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
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
