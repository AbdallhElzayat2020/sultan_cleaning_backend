@extends('admin.layouts.master')
@section('title', 'إدارة الصفحات (Pages)')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إدارة الصفحات الثابتة والإضافية (CMS Pages)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></div>
                <div class="breadcrumb-item">الصفحات</div>
            </div>
        </div>

        <div class="section-body">
            <div class="alert alert-info alert-has-icon d-flex flex-wrap align-items-center justify-content-between mb-4 shadow-sm">
                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <div class="alert-icon"><i class="fas fa-search-location"></i></div>
                    <div class="alert-body ml-3">
                        <div class="alert-title font-weight-bold">سيو الصفحات الأساسية (من نحن، خدماتنا، أعمالنا، المدونة، اتصل بنا)</div>
                        يمكنك تخصيص وإدارة عناوين ووصف وكلمات السيو الخاصة بكافة الصفحات الأساسية للموقع مباشرة من شاشة إعدادات الموقع.
                    </div>
                </div>
                <a href="{{ route('admin.settings.index') }}#core-pages-seo" class="btn btn-outline-white btn-sm font-weight-bold">
                    <i class="fas fa-cog mr-1"></i> ضبط سيو الصفحات الأساسية
                </a>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>قائمة الصفحات ({{ $pages->count() }})</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> إضافة صفحة جديدة
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="pages-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">#</th>
                                            <th>عنوان الصفحة</th>
                                            <th>الرابط (Slug)</th>
                                            <th style="width: 130px;">الظهور في الفوتر</th>
                                            <th style="width: 90px;">المشاهدات</th>
                                            <th style="width: 70px;">الترتيب</th>
                                            <th style="width: 90px;">الحالة</th>
                                            <th style="width: 150px;" class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pages as $page)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="font-weight-bold">
                                                    <div>{{ $page->title }}</div>
                                                    @if($page->excerpt)
                                                        <small class="text-muted text-truncate d-inline-block" style="max-width: 280px;">{{ $page->excerpt }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <code>/pages/{{ $page->slug }}</code>
                                                </td>
                                                <td>
                                                    @if($page->show_in_footer)
                                                        <span class="badge badge-success" title="تظهر في روابط الفوتر">
                                                            <i class="fas fa-shoe-prints mr-1"></i> مفعل بالفوتر
                                                        </span>
                                                    @else
                                                        <span class="badge badge-light border text-muted">رابط مباشر فقط</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border">
                                                        <i class="far fa-eye mr-1 text-primary"></i> {{ number_format($page->views) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light border">{{ $page->order }}</span>
                                                </td>
                                                <td>
                                                    @if($page->status)
                                                        <span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i> مفعلة</span>
                                                    @else
                                                        <span class="badge badge-danger"><i class="fas fa-times-circle mr-1"></i> معطلة</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-inline-flex gap-1">
                                                        <a href="{{ route('pages.show', $page->slug) }}" target="_blank" class="btn btn-sm btn-info mr-1" title="معاينة في الموقع">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </a>
                                                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-warning mr-1" title="تعديل">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-danger delete-item" data-id="{{ $page->id }}" data-title="{{ $page->title }}" title="حذف">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $page->id }}" action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4 text-muted">
                                                    <i class="fas fa-file-alt fa-3x mb-3 text-secondary d-block"></i>
                                                    لا توجد صفحات حالياً. اضغط على <strong>إضافة صفحة جديدة</strong> لإنشاء أول صفحة.
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

@push('scripts')
<script>
    $(document).ready(function() {
        if ($('#pages-table tbody tr').length > 1 && !$('#pages-table td[colspan]').length) {
            $('#pages-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
                },
                "order": [[5, "asc"]]
            });
        }

        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const title = $(this).data('title');

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: `سيتم حذف الصفحة "${title}" نهائياً ولن يمكن استرجاعها!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#fc544b',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'نعم، احذف الآن',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete-form-' + id).submit();
                }
            });
        });
    });
</script>
@endpush
