@extends('admin.layouts.master')
@section('title', 'إدارة آراء وتجارب العملاء')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إدارة آراء وتجارب العملاء (Testimonials)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">آراء العملاء</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة آراء وتجارب العملاء</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة تقييم جديد
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="testimonials-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th style="width: 70px;">الصورة</th>
                                            <th>اسم العميل</th>
                                            <th>المدينة / الحي</th>
                                            <th style="width: 120px;">التقييم</th>
                                            <th>نص التقييم</th>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 130px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($testimonial->avatar)
                                                        <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="rounded-circle shadow-sm" style="width: 44px; height: 44px; object-fit: cover;">
                                                    @else
                                                        <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle font-weight-bold" style="width: 44px; height: 44px; font-size: 1.1rem;">
                                                            {{ mb_substr($testimonial->name, 0, 1) }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="font-weight-bold">{{ $testimonial->name }}</td>
                                                <td>
                                                    <span class="badge badge-light border text-dark">{{ $testimonial->city ?? 'غير محدد' }}</span>
                                                </td>
                                                <td>
                                                    <div class="text-warning small" style="white-space: nowrap;">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $testimonial->rating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                        <span class="text-dark font-weight-bold ml-1">({{ $testimonial->rating }}/5)</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-0" style="max-width: 300px; line-height: 1.4;">
                                                        {{ Str::limit($testimonial->review, 90) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border font-weight-bold">{{ $testimonial->order }}</span>
                                                </td>
                                                <td>
                                                    @if($testimonial->status)
                                                        <span class="badge badge-success">مفعل</span>
                                                    @else
                                                        <span class="badge badge-danger">غير مفعل</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-primary btn-sm mx-1" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline-block delete-form">
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
                                                <td colspan="9" class="text-center py-4 text-muted">
                                                    لا توجد آراء للعملاء مضافة حالياً. اضغط على "إضافة تقييم جديد" للبدء.
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
        if ($('#testimonials-table tbody tr').length > 0 && !$('#testimonials-table tbody tr td[colspan]').length) {
            $('#testimonials-table').DataTable({
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
                title: "هل أنت متأكد من حذف هذا التقييم؟",
                text: "لن تتمكن من استرجاع هذا التقييم بعد الحذف!",
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
