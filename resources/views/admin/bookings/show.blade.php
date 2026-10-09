@extends('admin.layouts.master')
@section('title', 'تفاصيل طلب المعاينة #' . $booking->id)

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>تفاصيل طلب المعاينة #{{ $booking->id }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">طلبات الحجز والمعاينة</a></div>
                <div class="breadcrumb-item">تفاصيل الطلب</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card card-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>بيانات طلب العميل</h4>
                            <span class="badge {{ $booking->status_badge }} text-white px-3 py-2">
                                {{ $booking->status_label }}
                            </span>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <span class="text-muted"><i class="fas fa-user ml-2"></i> اسم العميل:</span>
                                    <strong class="text-dark fs-6">{{ $booking->name }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <span class="text-muted"><i class="fas fa-phone ml-2"></i> رقم الجوال:</span>
                                    <div>
                                        <strong dir="ltr" class="text-dark ml-2">{{ $booking->phone }}</strong>
                                        <a href="{{ $booking->whatsapp_url }}" target="_blank" class="btn btn-sm btn-success">
                                            <i class="fab fa-whatsapp"></i> محادثة واتساب
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <span class="text-muted"><i class="fas fa-broom ml-2"></i> الخدمة المطلوبة:</span>
                                    <strong class="text-primary">{{ $booking->service_name_display }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <span class="text-muted"><i class="fas fa-map-marker-alt ml-2"></i> المدينة / الحي:</span>
                                    <strong class="text-dark">{{ $booking->city }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                    <span class="text-muted"><i class="fas fa-calendar ml-2"></i> تاريخ وتوقيت الطلب:</span>
                                    <strong class="text-dark">{{ $booking->created_at->format('Y-m-d - h:i A') }} ({{ $booking->created_at->diffForHumans() }})</strong>
                                </li>
                                <li class="list-group-item py-3">
                                    <span class="text-muted d-block mb-2"><i class="fas fa-comment-dots ml-2"></i> ملاحظات العميل:</span>
                                    <div class="p-3 bg-light rounded border text-dark">
                                        {{ $booking->notes ?: 'لا توجد ملاحظات إضافية' }}
                                    </div>
                                </li>
                            </ul>

                            <!-- Update status box -->
                            <div class="bg-light p-3 rounded mb-4">
                                <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group mb-0">
                                        <label class="font-weight-bold">تغيير حالة الطلب:</label>
                                        <div class="input-group">
                                            <select name="status" class="form-control">
                                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>طلب جديد</option>
                                                <option value="contacted" {{ $booking->status == 'contacted' ? 'selected' : '' }}>تم التواصل مع العميل</option>
                                                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>تمت المعاينة / الإنجاز بنجاح</option>
                                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>طلب ملغي</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">حفظ الحالة</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> العودة للقائمة
                                </a>
                                <a href="{{ $booking->whatsapp_url }}" target="_blank" class="btn btn-success px-4">
                                    <i class="fab fa-whatsapp"></i> فتح المحادثة على واتساب
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
