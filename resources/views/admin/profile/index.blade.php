@extends('admin.layouts.master')
@section('dashboard_title', 'الملف الشخصي | لوحة التحكم')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>الملف الشخصي</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">الرئيسية</a></div>
            <div class="breadcrumb-item">الملف الشخصي</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">مرحباً، {{ $user->name }}!</h2>
        <p class="section-lead">
            يمكنك من هنا إدارة بيانات حسابك وتحديث صورتك الشخصية وتغيير كلمة المرور الخاصة بك.
        </p>

        <div class="row mt-sm-4">
            <!-- Left Column: User Profile Card -->
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card profile-widget shadow-sm">
                    <div class="profile-widget-header text-center pt-4">
                        <div class="position-relative d-inline-block">
                            <img alt="{{ $user->name }}" 
                                 src="{{ $user->avatar_url }}" 
                                 class="rounded-circle profile-widget-picture border shadow-sm"
                                 id="current-avatar-preview"
                                 style="width: 130px; height: 130px; object-fit: cover;">
                            @if($user->avatar)
                                <form action="{{ route('admin.profile.destroy-avatar') }}" method="POST" class="position-absolute" style="bottom: 5px; right: 5px;" onsubmit="return confirm('هل أنت متأكد من رغبتك في إزالة صورتك الشخصية واستعادة الصورة الافتراضية؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center shadow" style="width: 32px; height: 32px;" title="حذف الصورة">
                                        <i class="fas fa-trash-alt" style="font-size: 13px;"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="profile-widget-description text-center pb-2">
                        <div class="profile-widget-name mb-1">
                            <h5 class="font-weight-bold text-dark mb-0">{{ $user->name }}</h5>
                            <small class="text-muted">{{ $user->email }}</small>
                        </div>
                        <div class="mt-2">
                            <span class="badge badge-primary px-3 py-1 font-weight-normal">
                                <i class="fas fa-shield-alt mr-1"></i> مدير النظام (Admin)
                            </span>
                        </div>
                    </div>
                    <div class="card-footer bg-whitesmoke text-center pt-3 pb-3">
                        <div class="row text-center text-muted small">
                            <div class="col-6 border-right">
                                <span class="d-block font-weight-bold text-dark">
                                    {{ $user->created_at ? $user->created_at->format('Y/m/d') : 'غير متوفر' }}
                                </span>
                                <span>تاريخ الانضمام</span>
                            </div>
                            <div class="col-6">
                                <span class="d-block font-weight-bold text-dark">
                                    {{ $user->updated_at ? $user->updated_at->diffForHumans() : 'الآن' }}
                                </span>
                                <span>آخر نشاط</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Helpful Quick Card -->
                <div class="card card-primary shadow-sm">
                    <div class="card-header py-3">
                        <h4><i class="fas fa-info-circle text-primary mr-1"></i> أمان الحساب</h4>
                    </div>
                    <div class="card-body py-2">
                        <ul class="list-unstyled mb-0 small text-muted">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success mr-1"></i> يُنصح باختيار كلمة مرور قوية تحتوي على أحرف وأرقام ورموز.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success mr-1"></i> الصيغ المدعومة للصورة: JPG, PNG, WEBP وبحجم أقصى 2MB.
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success mr-1"></i> عند تغيير البريد الإلكتروني، يُرجى التأكد من كتابته بدقة.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column: Settings Tabs -->
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header border-bottom-0 pb-0">
                        <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">
                                    <i class="fas fa-user-edit mr-1"></i> البيانات الشخصية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                    <i class="fas fa-lock mr-1"></i> تغيير كلمة المرور
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pt-4">
                        <div class="tab-content" id="profileTabsContent">
                            <!-- Tab 1: Profile Information -->
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row align-items-center">
                                        <label class="col-md-3 col-form-label font-weight-bold">الصورة الشخصية</label>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img id="avatar-preview-box" 
                                                         src="{{ $user->avatar_url }}" 
                                                         alt="Avatar Preview" 
                                                         class="rounded-circle border"
                                                         style="width: 70px; height: 70px; object-fit: cover;">
                                                </div>
                                                <div class="custom-file flex-grow-1">
                                                    <input type="file" 
                                                           name="avatar" 
                                                           class="custom-file-input @error('avatar') is-invalid @enderror" 
                                                           id="avatar-input-file" 
                                                           accept="image/*">
                                                    <label class="custom-file-label text-truncate" for="avatar-input-file" id="avatar-file-label">اختر صورة جديدة...</label>
                                                    @error('avatar')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <small class="form-text text-muted mt-2">
                                                أقصى حجم للملف: 2 ميجابايت (PNG, JPG, WEBP).
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label font-weight-bold">
                                            الاسم الكامل <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                </div>
                                                <input type="text" 
                                                       name="name" 
                                                       id="name" 
                                                       class="form-control @error('name') is-invalid @enderror" 
                                                       value="{{ old('name', $user->name) }}" 
                                                       required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label font-weight-bold">
                                            البريد الإلكتروني <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                                </div>
                                                <input type="email" 
                                                       name="email" 
                                                       id="email" 
                                                       class="form-control @error('email') is-invalid @enderror" 
                                                       value="{{ old('email', $user->email) }}" 
                                                       required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                                <i class="fas fa-save mr-1"></i> حفظ التعديلات
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Tab 2: Change Password -->
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <form action="{{ route('admin.profile.update-password') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label for="current_password" class="col-md-4 col-form-label font-weight-bold">
                                            كلمة المرور الحالية <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                                                </div>
                                                <input type="password" 
                                                       name="current_password" 
                                                       id="current_password" 
                                                       class="form-control @error('current_password') is-invalid @enderror" 
                                                       required>
                                                @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_input" class="col-md-4 col-form-label font-weight-bold">
                                            كلمة المرور الجديدة <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                                </div>
                                                <input type="password" 
                                                       name="password" 
                                                       id="password_input" 
                                                       class="form-control @error('password') is-invalid @enderror" 
                                                       required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <small class="form-text text-muted">يجب أن لا تقل عن 8 خانات وتحتوي على أمان كافٍ.</small>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-md-4 col-form-label font-weight-bold">
                                            تأكيد كلمة المرور الجديدة <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-check-double"></i></div>
                                                </div>
                                                <input type="password" 
                                                       name="password_confirmation" 
                                                       id="password_confirmation" 
                                                       class="form-control" 
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-warning px-4 shadow-sm font-weight-bold">
                                                <i class="fas fa-shield-alt mr-1"></i> تحديث كلمة المرور
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Avatar live preview
        const avatarInput = document.getElementById('avatar-input-file');
        const avatarPreview = document.getElementById('avatar-preview-box');
        const avatarLabel = document.getElementById('avatar-file-label');

        if (avatarInput) {
            avatarInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    avatarLabel.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        avatarPreview.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Keep active tab on validation error
        @if($errors->has('current_password') || $errors->has('password'))
            $('#profileTabs a[href="#password"]').tab('show');
        @endif
    });
</script>
@endpush
