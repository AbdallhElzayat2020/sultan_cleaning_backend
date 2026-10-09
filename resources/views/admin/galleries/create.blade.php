@extends('admin.layouts.master')
@section('title', 'إضافة مشروع جديد للمعرض')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>إضافة مشروع جديد لمعرض الأعمال</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.galleries.index') }}">معرض الأعمال</a></div>
                <div class="breadcrumb-item">إضافة مشروع</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-11 offset-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h4>بيانات المشروع والصورة</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">عنوان العمل / المشروع <span class="text-danger">*</span></label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="مثال: جلي وتلميع رخام إيطالي بالكريستال وأقراص الألماس">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Location -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="location">الموقع / الحي</label>
                                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" placeholder="مثال: حي الملقا - الرياض">
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Category -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">التصنيف <span class="text-danger">*</span></label>
                                            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', 'جلي الرخام والأرضيات') }}" required placeholder="مثال: تنظيف الفلل والقصور أو جلي الرخام والأرضيات">
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Category Icon -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_icon">أيقونة التصنيف (FontAwesome)</label>
                                            <input type="text" name="category_icon" id="category_icon" class="form-control @error('category_icon') is-invalid @enderror" value="{{ old('category_icon', 'fa-solid fa-gem') }}" placeholder="fa-solid fa-gem">
                                            <small class="form-text text-muted">أمثلة: <code>fa-solid fa-gem</code>, <code>fa-solid fa-building</code>, <code>fa-solid fa-couch</code>, <code>fa-solid fa-rug</code>, <code>fa-solid fa-droplet</code></small>
                                            @error('category_icon')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Main Image Upload -->
                                <div class="form-group">
                                    <label for="image">صورة المشروع الرئيسية <span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                                    <small class="form-text text-muted">الامتدادات المقبولة: JPG, PNG, WEBP (الحجم الأقصى 4MB)</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">وصف وتفاصيل العمل المنجز</label>
                                    <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="تفاصيل الخدمة المقدمة، نوع المواد والأجهزة المستخدمة...">{{ old('description') }}</textarea>
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
                                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>نشط (يظهر في الموقع)</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>مخفي</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save"></i> حفظ العمل
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
