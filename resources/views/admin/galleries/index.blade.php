@extends('admin.layouts.master')
@section('title', 'معرض الأعمال والمشاريع')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>معرض الأعمال والمشاريع (Photo Gallery)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">معرض الأعمال</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة الأعمال والمشاريع المنجزة</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة مشروع جديد
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="galleries-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th style="width: 80px;">الصورة</th>
                                            <th>عنوان العمل / المشروع</th>
                                            <th>التصنيف</th>
                                            <th>الموقع / الحي</th>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 130px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($galleries as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="rounded shadow-sm" style="width: 55px; height: 42px; object-fit: cover;">
                                                </td>
                                                <td class="font-weight-bold">
                                                    <div>{{ $item->title }}</div>
                                                    @if($item->description)
                                                        <small class="text-muted">{{ Str::limit($item->description, 50) }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border text-primary font-weight-bold">
                                                        <i class="{{ $item->category_icon ?? 'fa-solid fa-image' }} mr-1"></i> {{ $item->category }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-muted small">
                                                        <i class="fas fa-map-marker-alt text-danger mr-1"></i> {{ $item->location ?? 'جده' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border font-weight-bold">{{ $item->order }}</span>
                                                </td>
                                                <td>
                                                    @if($item->status)
                                                        <span class="badge badge-success">نشط</span>
                                                    @else
                                                        <span class="badge badge-danger">مخفي</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.galleries.edit', $item->id) }}" class="btn btn-primary btn-sm mx-1" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.galleries.destroy', $item->id) }}" method="POST" class="d-inline-block delete-form">
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
                                                    لا توجد مشاريع مضافة حالياً. اضغط على "إضافة مشروع جديد" للبدء.
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
        if ($('#galleries-table tbody tr').length > 0 && !$('#galleries-table tbody tr td[colspan]').length) {
            $('#galleries-table').DataTable({
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
                title: "هل أنت متأكد من حذف هذا العمل؟",
                text: "لن تتمكن من استرجاع هذا المشروع بعد الحذف!",
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
