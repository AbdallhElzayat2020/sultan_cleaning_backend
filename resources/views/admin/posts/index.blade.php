@extends('admin.layouts.master')
@section('title', 'إدارة مقالات المدونة')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إدارة مقالات المدونة (Blog Posts)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">المدونة</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة المقالات</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة مقال جديد
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="posts-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th style="width: 80px;">الصورة</th>
                                            <th>عنوان المقال</th>
                                            <th>التصنيف</th>
                                            <th>وقت القراءة</th>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 130px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="rounded shadow-sm" style="width: 55px; height: 42px; object-fit: cover;">
                                                </td>
                                                <td class="font-weight-bold">
                                                    <div>{{ $post->title }}</div>
                                                    <small class="text-muted"><code>/blog/{{ $post->slug }}</code></small>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border text-primary font-weight-bold">
                                                        <i class="{{ $post->category_icon ?? 'fa-solid fa-tag' }} mr-1"></i> {{ $post->category }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border small text-muted">
                                                        <i class="far fa-clock mr-1"></i> {{ $post->reading_time ?? '5 دقائق' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border font-weight-bold">{{ $post->order }}</span>
                                                </td>
                                                <td>
                                                    @if($post->status)
                                                        <span class="badge badge-success">منشور</span>
                                                    @else
                                                        <span class="badge badge-danger">مسودة (مخفي)</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm mx-1" title="تعديل">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline-block delete-form">
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
                                                    لا توجد مقالات مضافة حالياً في المدونة. اضغط على "إضافة مقال جديد" للبدء.
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
        if ($('#posts-table tbody tr').length > 0 && !$('#posts-table tbody tr td[colspan]').length) {
            $('#posts-table').DataTable({
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
                title: "هل أنت متأكد من حذف هذا المقال؟",
                text: "لن تتمكن من استرجاع هذا المقال بعد الحذف!",
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
