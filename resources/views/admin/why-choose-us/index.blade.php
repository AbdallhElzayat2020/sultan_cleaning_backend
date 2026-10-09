@extends('admin.layouts.master')
@section('title', 'لماذا سلطان كلين؟')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>لماذا سلطان كلين؟ (Why Choose Us)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">لماذا سلطان كلين؟</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة المميزات (لماذا تختارنا)</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة ميزة جديدة
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="why-choose-us-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th style="width: 80px;">الأيقونة</th>
                                            <th>العنوان</th>
                                            <th>الوصف</th>
                                            <th style="width: 80px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 150px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center bg-light text-primary rounded-circle" style="width: 45px; height: 45px; font-size: 1.2rem;">
                                                        <i class="{{ $item->icon }}"></i>
                                                    </div>
                                                </td>
                                                <td class="font-weight-bold">{{ $item->title }}</td>
                                                <td>
                                                    <p class="text-muted mb-0" style="max-width: 350px; line-height: 1.5;">
                                                        {{ Str::limit($item->description, 90) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border font-weight-bold">{{ $item->order }}</span>
                                                </td>
                                                <td>
                                                    @if($item->status)
                                                        <span class="badge badge-success">مفعل</span>
                                                    @else
                                                        <span class="badge badge-danger">غير مفعل</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.why-choose-us.edit', $item->id) }}" class="btn btn-primary btn-sm mx-1" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.why-choose-us.destroy', $item->id) }}" method="POST" class="d-inline-block delete-form">
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
                                                <td colspan="7" class="text-center py-4 text-muted">
                                                    لا توجد بيانات حالياً. اضغط على "إضافة ميزة جديدة" للبدء.
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
        // Initialize DataTable if rows exist
        if ($('#why-choose-us-table tbody tr').length > 0 && !$('#why-choose-us-table tbody tr td[colspan]').length) {
            $('#why-choose-us-table').DataTable({
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
                title: "هل أنت متأكد من الحذف؟",
                text: "لن تتمكن من استرجاع هذا العنصر بعد الحذف!",
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
