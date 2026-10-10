@extends('admin.layouts.master')
@section('title', 'إعدادات الموقع - سلطان كلين')

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
                                <h4><i class="fas fa-bullhorn text-primary mr-2"></i> شريط العرض والإعلان العلوي (Top Announcement Bar)</h4>
                            </div>

                            <div class="card-body">
                                {{-- Activation Toggle --}}
                                <div class="form-group mb-4 pb-3 border-bottom">
                                    <div class="control-label font-weight-bold mb-2">حالة شريط العرض</div>
                                    <label class="custom-switch mt-1 pl-0">
                                        <input type="checkbox" name="top_bar_active" value="1" class="custom-switch-input" id="toggle-top-bar" {{ old('top_bar_active', $settings['top_bar_active'] ?? '1') == '1' ? 'checked' : '' }}>
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
                                            <label for="top_bar_badge">نص الشارة / العنوان الصغير <span class="text-danger">*</span></label>
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
                                            <label for="top_bar_discount">نسبة / رقم الخصم <span class="text-danger">*</span></label>
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
                                            <label for="top_bar_text">نص تفاصيل العرض <span class="text-danger">*</span></label>
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
                                                       value="{{ old('top_bar_phone', $settings['top_bar_phone'] ?? '0582102525') }}"
                                                       placeholder="مثال: 0582102525">
                                            </div>
                                            <small class="form-text text-muted">يظهر في الجانب الأيسر من الشريط العلوي.</small>
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
                                                       value="{{ old('top_bar_whatsapp', $settings['top_bar_whatsapp'] ?? '966582102525') }}"
                                                       placeholder="مثال: 966582102525">
                                            </div>
                                            <small class="form-text text-muted">الرقم الدولي بدون علامة + المستخدم لرابط الواتساب المباشر.</small>
                                            @error('top_bar_whatsapp')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Live Preview Box --}}
                                <div class="mt-4 pt-3 border-top">
                                    <label class="font-weight-bold text-dark mb-2"><i class="fas fa-eye text-info mr-1"></i> معاينة شكل الشريط في الموقع (Live Preview):</label>
                                    <div id="preview-wrapper" class="p-3 rounded text-white shadow-sm" style="background-color: #0b3954; font-size: 0.88rem; transition: opacity 0.3s ease;">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                            <div class="d-flex align-items-center flex-wrap gap-2">
                                                <span class="badge rounded-pill px-3 py-1 font-weight-bold text-white mr-2" style="background-color: #f75c03;" id="preview-badge">
                                                    {{ $settings['top_bar_badge'] ?? '🎉 عرض حصري' }}
                                                </span>
                                                <span id="preview-full-text">
                                                    خصم خاص <strong class="mx-1" id="preview-discount">{{ $settings['top_bar_discount'] ?? '35%' }}</strong> <span id="preview-text">{{ $settings['top_bar_text'] ?? 'على جميع خدمات التنظيف والتعقيم الشامل!' }}</span>
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center mt-2 mt-md-0">
                                                <span class="mr-3 font-weight-bold">
                                                    <i class="fas fa-phone-alt mr-1" style="color: #087e8b;"></i>
                                                    <span id="preview-phone">{{ $settings['top_bar_phone'] ?? '0582102525' }}</span>
                                                </span>
                                                <span class="font-weight-bold">
                                                    <i class="fab fa-whatsapp mr-1" style="color: #25d366;"></i> خدمة 24/7
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="preview-hidden-note" class="alert alert-secondary mt-2 mb-0 d-none">
                                        <i class="fas fa-eye-slash mr-1"></i> الشريط معطل حالياً ولن يظهر للزوار في واجهة الموقع.
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer bg-whitesmoke text-right">
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-save mr-1"></i> حفظ الإعدادات
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
        $(document).ready(function () {
            // Live Preview Updates
            function updatePreview() {
                var isActive = $('#toggle-top-bar').is(':checked');
                var badge = $('#top_bar_badge').val() || '🎉 عرض حصري';
                var discount = $('#top_bar_discount').val() || '35%';
                var text = $('#top_bar_text').val() || 'على جميع خدمات التنظيف والتعقيم الشامل!';
                var phone = $('#top_bar_phone').val() || '0582102525';

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
        });
    </script>
@endpush
