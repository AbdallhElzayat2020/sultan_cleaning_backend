@extends('admin.layouts.master')
@section('dashboard_title', 'الرئيسية | لوحة التحكم')

@section('content')
<section class="section">
    <!-- Welcome Header Banner -->
    <div class="section-header d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h1 class="mb-1">لوحة التحكم</h1>
            <div class="text-muted small">
                أهلاً بك مجدداً، <strong>{{ Auth::user()->name }}</strong> 👋 | {{ now()->locale('ar')->isoFormat('dddd، D MMMM YYYY') }}
            </div>
        </div>
        <div class="mt-2 mt-md-0 d-flex gap-2">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm shadow-sm mr-2">
                <i class="fas fa-external-link-alt mr-1"></i> زيارة الموقع
            </a>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary btn-sm shadow-sm mr-2">
                <i class="fas fa-calendar-check mr-1"></i> طلبات المعاينة ({{ $pendingBookings }} جديدة)
            </a>
            <a href="{{ route('admin.services.create') }}" class="btn btn-success btn-sm shadow-sm">
                <i class="fas fa-plus mr-1"></i> إضافة خدمة
            </a>
        </div>
    </div>

    <!-- Alert for Pending Inquiries if any -->
    @if($pendingBookings > 0)
        <div class="alert alert-warning alert-dismissible show fade shadow-sm mb-4">
            <div class="alert-body d-flex align-items-center justify-content-between flex-wrap">
                <div>
                    <i class="fas fa-bell mr-2 fa-lg"></i>
                    <strong>تنبيه طلبات جديدة:</strong> يوجد لديك حالياً <strong>{{ $pendingBookings }}</strong> طلب معاينة جديد بانتظار المراجعة والتواصل مع العملاء.
                </div>
                <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="btn btn-dark btn-sm mt-2 mt-sm-0">
                    مراجعة الطلبات الجديدة الآن
                </a>
            </div>
        </div>
    @endif

    <!-- Tier 1: Primary Booking Metric Cards -->
    <div class="row">
        <!-- Total Bookings -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-primary shadow-primary">
                    <i class="fas fa-calendar-alt text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>إجمالي الطلبات</h4>
                    </div>
                    <div class="card-body">
                        {{ number_format($totalBookings) }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        @if($todayBookings > 0)
                            <span class="text-success font-weight-bold"><i class="fas fa-arrow-up mr-1"></i> {{ $todayBookings }} اليوم</span>
                        @else
                            <span>{{ $todayBookings }} طلبات مسجلة اليوم</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Bookings -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-warning shadow-warning">
                    <i class="fas fa-clock text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>طلبات جديدة</h4>
                    </div>
                    <div class="card-body text-warning font-weight-bold">
                        {{ number_format($pendingBookings) }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="text-warning">
                            بانتظار التواصل <i class="fas fa-arrow-left ml-1" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contacted Bookings -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-info shadow-info">
                    <i class="fas fa-phone-volume text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>تم التواصل</h4>
                    </div>
                    <div class="card-body text-info">
                        {{ number_format($contactedBookings) }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <span>جاري المتابعة والتنفيذ</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Bookings -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-success shadow-success">
                    <i class="fas fa-check-double text-white"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>طلبات مكتملة</h4>
                    </div>
                    <div class="card-body text-success font-weight-bold">
                        {{ number_format($completedBookings) }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <span class="text-success font-weight-bold">نسبة الإنجاز: {{ $completionRate }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tier 2: Content & Portfolio Statistics Cards -->
    <div class="row">
        <!-- Services -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-wand-magic-sparkles text-primary"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>خدماتنا المتخصصة</h4>
                    </div>
                    <div class="card-body text-dark">
                        {{ $servicesCount }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <a href="{{ route('admin.services.index') }}" class="text-primary">
                            {{ $activeServicesCount }} مفعلة في الموقع <i class="fas fa-arrow-left ml-1" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Works -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-images text-info"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>معرض أعمالنا</h4>
                    </div>
                    <div class="card-body text-dark">
                        {{ $galleriesCount }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <a href="{{ route('admin.galleries.index') }}" class="text-info">
                            إدارة صور الأعمال <i class="fas fa-arrow-left ml-1" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-newspaper text-danger"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>المقالات والمدونة</h4>
                    </div>
                    <div class="card-body text-dark">
                        {{ $postsCount }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <a href="{{ route('admin.posts.index') }}" class="text-danger">
                            تحسين محركات البحث <i class="fas fa-arrow-left ml-1" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1 shadow-sm border-0">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-star text-warning"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>آراء وتقييمات العملاء</h4>
                    </div>
                    <div class="card-body text-dark">
                        {{ $testimonialsCount }}
                    </div>
                    <div class="card-footer px-3 py-1 bg-transparent border-0 text-muted small">
                        <a href="{{ route('admin.testimonials.index') }}" class="text-warning">
                            تجارب العملاء المعتمدة <i class="fas fa-arrow-left ml-1" style="font-size: 10px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tier 3: Recent Bookings & System Health Row -->
    <div class="row">
        <!-- Left Column: Recent Bookings Table -->
        <div class="col-lg-8 col-md-12 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="font-weight-bold mb-0 text-dark">
                        <i class="fas fa-calendar-check text-primary mr-2"></i> أحدث طلبات المعاينة
                    </h4>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-primary btn-sm">
                        عرض كافة الطلبات ({{ $totalBookings }}) <i class="fas fa-chevron-left mr-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($recentBookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>العميل</th>
                                        <th>الخدمة المطلوبة</th>
                                        <th>المدينة</th>
                                        <th>الحالة</th>
                                        <th>الوقت</th>
                                        <th class="text-center">إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBookings as $booking)
                                        <tr>
                                            <td>
                                                <div class="font-weight-bold text-dark">{{ $booking->name }}</div>
                                                <div class="small">
                                                    <a href="tel:{{ $booking->phone }}" class="text-muted mr-2">
                                                        <i class="fas fa-phone mr-1"></i> {{ $booking->phone }}
                                                    </a>
                                                    <a href="{{ $booking->whatsapp_url }}" target="_blank" class="text-success font-weight-bold" title="محادثة واتساب مباشرة">
                                                        <i class="fab fa-whatsapp mr-1"></i> واتساب
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-light border text-primary">
                                                    {{ $booking->service_name_display }}
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    <i class="fas fa-map-marker-alt text-danger mr-1"></i> {{ $booking->city ?: 'الرياض' }}
                                                </small>
                                            </td>
                                            <td>
                                                <span class="badge {{ $booking->status_badge }} px-2 py-1">
                                                    {{ $booking->status_label }}
                                                </span>
                                            </td>
                                            <td>
                                                <small class="text-muted" title="{{ $booking->created_at }}">
                                                    {{ $booking->created_at ? $booking->created_at->diffForHumans() : 'الآن' }}
                                                </small>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-primary btn-sm" title="عرض تفاصيل الطلب">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-calendar-times fa-3x mb-3 text-secondary"></i>
                            <p class="mb-0">لا توجد طلبات معاينة مسجلة حتى الآن.</p>
                        </div>
                    @endif
                </div>
                <div class="card-footer bg-whitesmoke text-center py-2">
                    <small class="text-muted">يتم تحديث الطلبات لحظياً عند إرسال أي استمارة حجز من الموقع الخارجي.</small>
                </div>
            </div>

            <!-- Recent Content Overview (Services & Posts) -->
            <div class="row">
                <!-- Latest Services -->
                <div class="col-md-6 col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="font-weight-bold mb-0 text-dark">
                                <i class="fas fa-concierge-bell text-info mr-1"></i> أحدث الخدمات
                            </h4>
                            <a href="{{ route('admin.services.index') }}" class="small">إدارة الخدمات</a>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse($recentServices as $srv)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3 text-primary font-weight-bold" style="font-size: 1.2rem;">
                                                <i class="{{ $srv->icon ?: 'fas fa-sparkles' }}"></i>
                                            </div>
                                            <div>
                                                <div class="font-weight-bold text-dark">{{ $srv->title }}</div>
                                                <small class="text-muted">{{ Str::limit($srv->short_description, 40) }}</small>
                                            </div>
                                        </div>
                                        <div>
                                            @if($srv->status)
                                                <span class="badge badge-success px-2 py-1">نشط</span>
                                            @else
                                                <span class="badge badge-secondary px-2 py-1">معطل</span>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted py-3">لا توجد خدمات مضافة</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Latest Posts -->
                <div class="col-md-6 col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="font-weight-bold mb-0 text-dark">
                                <i class="fas fa-feather-alt text-danger mr-1"></i> أحدث المقالات
                            </h4>
                            <a href="{{ route('admin.posts.index') }}" class="small">إدارة المقالات</a>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                @forelse($recentPosts as $post)
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <div>
                                            <div class="font-weight-bold text-dark">{{ Str::limit($post->title, 45) }}</div>
                                            <small class="text-muted">
                                                <i class="far fa-clock mr-1"></i> {{ $post->created_at ? $post->created_at->format('Y/m/d') : '' }}
                                            </small>
                                        </div>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-outline-danger btn-sm p-1 px-2" title="تعديل">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted py-3">لا توجد مقالات مضافة</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: System Progress & Shortcuts -->
        <div class="col-lg-4 col-md-12 col-12">
            <!-- Order Completion Progress Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header">
                    <h4 class="font-weight-bold text-dark">
                        <i class="fas fa-chart-pie text-success mr-2"></i> نسبة إنجاز الطلبات
                    </h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted font-weight-bold">معدل الإنجاز الإجمالي</span>
                        <span class="font-weight-bold text-success fs-5">{{ $completionRate }}%</span>
                    </div>
                    <div class="progress mb-4" style="height: 12px; border-radius: 6px;">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $completionRate }}%;" aria-valuenow="{{ $completionRate }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <!-- Breakdown Table -->
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span><i class="fas fa-circle text-warning mr-2" style="font-size: 10px;"></i> قيد الانتظار (جديدة)</span>
                            <span class="font-weight-bold text-dark">{{ $pendingBookings }}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span><i class="fas fa-circle text-info mr-2" style="font-size: 10px;"></i> تم التواصل</span>
                            <span class="font-weight-bold text-dark">{{ $contactedBookings }}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <span><i class="fas fa-circle text-success mr-2" style="font-size: 10px;"></i> مكتملة بنجاح</span>
                            <span class="font-weight-bold text-dark">{{ $completedBookings }}</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center py-2">
                            <span><i class="fas fa-circle text-danger mr-2" style="font-size: 10px;"></i> ملغية</span>
                            <span class="font-weight-bold text-dark">{{ $cancelledBookings }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Quick Action Shortcuts -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header">
                    <h4 class="font-weight-bold text-dark">
                        <i class="fas fa-bolt text-warning mr-2"></i> اختصارات سريعة
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6 mb-2">
                            <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary btn-block text-truncate py-2">
                                <i class="fas fa-plus-circle d-block mb-1 fa-lg"></i> خدمة جديدة
                            </a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-danger btn-block text-truncate py-2">
                                <i class="fas fa-pen-nib d-block mb-1 fa-lg"></i> مقال جديد
                            </a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="{{ route('admin.galleries.create') }}" class="btn btn-outline-info btn-block text-truncate py-2">
                                <i class="fas fa-camera d-block mb-1 fa-lg"></i> إضافة عمل
                            </a>
                        </div>
                        <div class="col-6 mb-2">
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary btn-block text-truncate py-2">
                                <i class="fas fa-cog d-block mb-1 fa-lg"></i> إعدادات الموقع
                            </a>
                        </div>
                        <div class="col-12 mt-1">
                            <a href="{{ route('admin.profile.index') }}" class="btn btn-light btn-block text-dark font-weight-bold border py-2">
                                <i class="fas fa-user-cog mr-1 text-primary"></i> إدارة ملفي الشخصي
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Components Counter -->
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h4 class="font-weight-bold text-dark">
                        <i class="fas fa-cubes text-secondary mr-2"></i> مكونات الموقع الثابتة
                    </h4>
                </div>
                <div class="card-body py-2">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2 border-bottom">
                            <span><i class="fas fa-file-alt text-primary mr-2"></i> الصفحات الثابتة (CMS)</span>
                            <span class="badge badge-light border font-weight-bold">{{ $pagesCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2 border-bottom">
                            <span><i class="fas fa-question-circle text-info mr-2"></i> الأسئلة الشائعة (FAQ)</span>
                            <span class="badge badge-light border font-weight-bold">{{ $faqsCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                            <span><i class="fas fa-award text-success mr-2"></i> مميزات سين ياء</span>
                            <span class="badge badge-light border font-weight-bold">{{ $whyChooseUsCount }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
