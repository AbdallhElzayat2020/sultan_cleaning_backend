@extends('admin.layouts.master')
@section('title', 'إدارة الخدمات')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إدارة خدماتنا (Services)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">خدماتنا</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة الخدمات</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة خدمة جديدة
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="services-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th style="width: 70px;">الأيقونة</th>
                                            <th style="width: 90px;">الصورة</th>
                                            <th>اسم الخدمة</th>
                                            <th>الوصف المختصر</th>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 130px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center bg-light text-primary rounded-circle" style="width: 42px; height: 42px; font-size: 1.15rem;">
                                                        <i class="{{ $service->icon }}"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($service->image)
                                                        <img src="{{ asset('uploads/services/' . $service->image) }}" alt="{{ $service->title }}" class="rounded shadow-sm" style="width: 50px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <span class="badge badge-light border text-muted small">افتراضية</span>
                                                    @endif
                                                </td>
                                                <td class="font-weight-bold">
                                                    <div>{{ $service->title }}</div>
                                                    <small class="text-muted"><code>/services/{{ $service->slug }}</code></small>
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-0" style="max-width: 320px; line-height: 1.4;">
                                                        {{ Str::limit($service->short_description, 80) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border font-weight-bold">{{ $service->order }}</span>
                                                </td>
                                                <td>
                                                    @if($service->status)
                                                        <span class="badge badge-success">مفعل</span>
                                                    @else
                                                        <span class="badge badge-danger">غير مفعل</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary btn-sm mx-1" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline-block delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" title="حذف">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4 text-muted">
                                                    لا توجد خدمات مضافة حالياً. اضغط على "إضافة خدمة جديدة" للبدء.
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
        if ($('#services-table tbody tr').length > 0 && !$('#services-table tbody tr td[colspan]').length) {
            $('#services-table').DataTable({
                "language": {
                    "search": "بحث:",
                    "lengthMenu": "عرض _MENU_ عناصر",
                    "info": "عرض _START_ إلى _END_ من أصل _TOTAL_ عنصر",
                    "infoEmpty": "لا توجد عناصر متاحة",
                    "infoFiltered": "(تمت التصفية من أصل _MAX_ عنصر)",
                    "emptyTable": "لا توجد بيانات متوفرة في الجدول",
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
                title: "هل أنت متأكد من حذف هذه الخدمة؟",
                text: "لن تتمكن من استرجاع بيانات هذه الخدمة بعد الحذف!",
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
