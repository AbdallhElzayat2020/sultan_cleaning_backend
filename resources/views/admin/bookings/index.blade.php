@extends('admin.layouts.master')
@section('title', 'طلبات الحجز والمعاينة')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>طلبات الحجز والمعاينة (Bookings & Quotes)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">طلبات المعاينة</div>
            </div>
        </div>

        <div class="section-body">
            <!-- Summary Stats -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-list-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>إجمالي الطلبات</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>طلبات جديدة</h4>
                            </div>
                            <div class="card-body">
                                {{ $pendingCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>تم التواصل</h4>
                            </div>
                            <div class="card-body">
                                {{ $contactedCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>مكتملة</h4>
                            </div>
                            <div class="card-body">
                                {{ $completedCount }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <h4>قائمة طلبات المعاينة والحجز</h4>
                            <!-- Filter buttons -->
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.bookings.index') }}"
                                    class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-primary' }}">الكل
                                    ({{ $totalCount }})</a>
                                <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}"
                                    class="btn btn-sm {{ request('status') == 'pending' ? 'btn-warning text-white' : 'btn-outline-warning' }}">جديد
                                    ({{ $pendingCount }})</a>
                                <a href="{{ route('admin.bookings.index', ['status' => 'contacted']) }}"
                                    class="btn btn-sm {{ request('status') == 'contacted' ? 'btn-info' : 'btn-outline-info' }}">تم
                                    التواصل ({{ $contactedCount }})</a>
                                <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}"
                                    class="btn btn-sm {{ request('status') == 'completed' ? 'btn-success' : 'btn-outline-success' }}">مكتمل
                                    ({{ $completedCount }})</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="bookings-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>العميل</th>
                                            <th>الخدمة المطلوبة</th>
                                            <th>المدينة / الحي</th>
                                            <th>الحالة</th>
                                            <th>تاريخ الطلب</th>
                                            <th style="width: 170px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($bookings as $booking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="font-weight-bold text-dark">{{ $booking->name }}</div>
                                                    <a href="{{ $booking->whatsapp_url }}" target="_blank"
                                                        class="badge badge-light border text-black font-weight-bold"
                                                        dir="ltr">
                                                        <i class="fab fa-whatsapp text-black-50 mr-1"></i>
                                                        {{ $booking->phone }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border text-primary">
                                                        <i class="fas fa-broom mr-1"></i>
                                                        {{ $booking->service_name_display }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-dark small"><i
                                                            class="fas fa-map-marker-alt text-danger mr-1"></i>
                                                        {{ $booking->city }}</span>
                                                </td>
                                                <td>
                                                    <!-- Status dropdown form -->
                                                    <form
                                                        action="{{ route('admin.bookings.update-status', $booking->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status"
                                                            class="form-control form-control-sm badge {{ $booking->status_badge }} text-white border-0 py-0"
                                                            style="height: auto; cursor: pointer;"
                                                            onchange="this.form.submit()">
                                                            <option value="pending"
                                                                {{ $booking->status == 'pending' ? 'selected' : '' }}>طلب
                                                                جديد</option>
                                                            <option value="contacted"
                                                                {{ $booking->status == 'contacted' ? 'selected' : '' }}>تم
                                                                التواصل</option>
                                                            <option value="completed"
                                                                {{ $booking->status == 'completed' ? 'selected' : '' }}>
                                                                مكتمل</option>
                                                            <option value="cancelled"
                                                                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                                                ملغي</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <small class="text-muted"
                                                        title="{{ $booking->created_at->format('Y-m-d H:i') }}">
                                                        {{ $booking->created_at->diffForHumans() }}
                                                    </small>
                                                </td>
                                                <td class="text-center">
                                                    <!-- WhatsApp Direct Link -->
                                                    <a href="{{ $booking->whatsapp_url }}" target="_blank"
                                                        class="btn btn-success btn-sm mx-1" title="محادثة واتساب">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </a>

                                                    <!-- View Details -->
                                                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                        class="btn btn-info btn-sm mx-1" title="عرض التفاصيل">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                                        method="POST" class="d-inline-block delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                            title="حذف">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-4 text-muted">
                                                    لا توجد طلبات معاينة مسجلة حتى الآن.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
        $(document).ready(function() {
            if ($('#bookings-table tbody tr').length > 0 && !$('#bookings-table tbody tr td[colspan]').length) {
                $('#bookings-table').DataTable({
                    "language": {
                        "search": "بحث:",
                        "lengthMenu": "عرض _MENU_ طلبات",
                        "info": "عرض _START_ إلى _END_ من أصل _TOTAL_ طلب",
                        "infoEmpty": "لا توجد طلبات",
                        "infoFiltered": "(تمت التصفية من أصل _MAX_ طلب)",
                        "emptyTable": "لا توجد بيانات",
                        "zeroRecords": "لم يتم العثور على نتائج مطابقة",
                        "paginate": {
                            "first": "الأول",
                            "previous": "السابق",
                            "next": "التالي",
                            "last": "الأخير"
                        }
                    },
                    "pageLength": 10,
                    "ordering": true
                });
            }

            // SweetAlert Delete Confirmation
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                swal({
                    title: "هل أنت متأكد من حذف هذا الطلب؟",
                    text: "لن تتمكن من استرجاع هذا الطلب بعد الحذف!",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "إلغاء",
                            value: null,
                            visible: true,
                            className: "btn btn-secondary",
                            closeModal: true,
                        },
                        confirm: {
                            text: "نعم، احذف!",
                            value: true,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
