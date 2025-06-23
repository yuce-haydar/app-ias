@extends('admin.layouts.app')

@section('title', 'İş İlanları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İş İlanları</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.job-postings.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Yeni İş İlanı
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="jobPostingsTable">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Pozisyon</th>
                                    <th width="150">Departman</th>
                                    <th width="120">Çalışma Şekli</th>
                                    <th width="120">İlan Tarihi</th>
                                    <th width="120">Son Başvuru</th>
                                    <th width="80">Kadro</th>
                                    <th width="100">Başvuru</th>
                                    <th width="100">Durum</th>
                                    <th width="150">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobPostings as $jobPosting)
                                <tr>
                                    <td>{{ $jobPosting->id }}</td>
                                    <td>{{ $jobPosting->title }}</td>
                                    <td>{{ $jobPosting->department }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $jobPosting->position_type_text }}
                                        </span>
                                    </td>
                                    <td>{{ $jobPosting->posting_date->format('d.m.Y') }}</td>
                                    <td>
                                        {{ $jobPosting->deadline->format('d.m.Y') }}
                                        @if($jobPosting->deadline < now())
                                            <span class="badge bg-danger ms-1">Süresi Doldu</span>
                                        @elseif($jobPosting->deadline->diffInDays(now()) <= 3)
                                            <span class="badge bg-warning ms-1">{{ $jobPosting->deadline->diffInDays(now()) }} gün</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $jobPosting->number_of_positions }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.job-postings.applications', $jobPosting) }}" class="text-decoration-none">
                                            <span class="badge bg-primary">{{ $jobPosting->application_count }}</span>
                                        </a>
                                    </td>
                                    <td>
                                        @if($jobPosting->status == 'active' && $jobPosting->deadline >= now())
                                            <span class="badge bg-success">Aktif</span>
                                        @elseif($jobPosting->status == 'draft')
                                            <span class="badge bg-secondary">Taslak</span>
                                        @else
                                            <span class="badge bg-danger">Kapalı</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.job-postings.applications', $jobPosting) }}" class="btn btn-sm btn-primary" title="Başvurular">
                                            <i class="fas fa-users"></i>
                                        </a>
                                        <a href="{{ route('admin.job-postings.edit', $jobPosting) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.job-postings.destroy', $jobPosting) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu iş ilanını silmek istediğinize emin misiniz?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $jobPostings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#jobPostingsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json"
        },
        "order": [[0, "desc"]],
        "pageLength": 25,
        "responsive": true
    });
});
</script>
@endpush 