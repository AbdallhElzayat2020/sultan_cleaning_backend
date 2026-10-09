@extends('admin.layouts.master')
@section('title', 'إضافة ميزة جديدة - لماذا سلطان كلين')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>إضافة ميزة جديدة</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.why-choose-us.index') }}">لماذا سلطان كلين؟</a></div>
                <div class="breadcrumb-item">إضافة ميزة</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>بيانات الميزة</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.why-choose-us.store') }}" method="POST">
                                @csrf

                                <!-- Icon Input with Iconpicker -->
                                <div class="form-group">
                                    <label for="icon">الأيقونة <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary" role="iconpicker" id="icon-picker-btn" data-iconset="fontawesome5" data-icon="fa-solid fa-star"></button>
                                        </div>
                                        <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', 'fa-solid fa-star') }}" required placeholder="مثال: fa-solid fa-users-gear">
                                    </div>
                                    <small class="form-text text-muted">
                                        يمكنك اختيار الأيقونة من الزر أو كتابة كلاس FontAwesome مباشرة (مثال: <code>fa-solid fa-users-gear</code>).
                                    </small>
                                    @error('icon')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">العنوان <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="مثال: عمالة فنية مدربة">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">الوصف <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required placeholder="اكتب وصفاً تفصيلياً ومقنعاً للميزة...">{{ old('description') }}</textarea>
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

                                <div class="form-group mb-0 text-right">
                                    <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save"></i> حفظ الميزة
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
        $('#icon-picker-btn').iconpicker({
            icon: $('#icon').val() || 'fa-solid fa-star',
            iconset: 'fontawesome5'
        }).on('change', function(e) {
            $('#icon').val(e.icon);
        });

        $('#icon').on('input', function() {
            var val = $(this).val();
            if (val) {
                $('#icon-picker-btn').iconpicker('setIcon', val);
            }
        });
    });
</script>
@endpush
