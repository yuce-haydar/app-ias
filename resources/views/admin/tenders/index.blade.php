@extends('admin.layouts.app')

@section('title', 'İhaleler')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İhaleler</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tenders.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Yeni İhale
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
                        <table class="table table-bordered table-striped" id="tendersTable">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>İhale Adı</th>
                                    <th width="150">İhale No</th>
                                    <th width="120">Tip</th>
                                    <th width="150">Usul</th>
                                    <th width="120">İlan Tarihi</th>
                                    <th width="120">Son Teklif</th>
                                    <th width="100">Başvuru</th>
                                    <th width="100">Durum</th>
                                    <th width="150">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenders as $tender)
                                <tr>
                                    <td>{{ $tender->id }}</td>
                                    <td>
                                        {{ $tender->title }}
                                        @if($tender->documents && count($tender->documents) > 0)
                                            <i class="fas fa-paperclip text-muted ms-2" title="{{ count($tender->documents) }} dosya"></i>
                                        @endif
                                    </td>
                                    <td>{{ $tender->tender_number }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $tender->tender_type_text }}
                                        </span>
                                    </td>
                                    <td>{{ $tender->procurement_method_text }}</td>
                                    <td>{{ $tender->announcement_date->format('d.m.Y') }}</td>
                                    <td>
                                        {{ $tender->deadline->format('d.m.Y') }}
                                        @if($tender->deadline < now())
                                            <span class="badge bg-danger ms-1">Süresi Doldu</span>
                                        @elseif($tender->deadline->diffInDays(now()) <= 3)
                                            <span class="badge bg-warning ms-1">{{ $tender->deadline->diffInDays(now()) }} gün</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.tenders.applications', $tender) }}" class="text-decoration-none">
                                            <span class="badge bg-primary">{{ $tender->applications_count ?? 0 }}</span>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $tender->status_color }}">
                                            {{ $tender->status_text }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tenders.applications', $tender) }}" class="btn btn-sm btn-primary" title="Başvurular">
                                            <i class="fas fa-users"></i>
                                        </a>
                                        <a href="{{ route('admin.tenders.edit', $tender) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.tenders.destroy', $tender) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu ihaleyi silmek istediğinize emin misiniz?')">
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
                        {{ $tenders->links() }}
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
    try {
        console.log('Tenders DataTable initialization starting...');
        
        if ($('#tendersTable').length === 0) {
            console.error('tendersTable element not found!');
            return;
        }
        
        $('#tendersTable').DataTable({
            "order": [[0, "desc"]],
            "pageLength": 25,
            "responsive": true
        });
        
        console.log('Tenders DataTable initialized successfully');
    } catch (error) {
        console.error('Tenders DataTable initialization error:', error);
        alert('Tenders DataTable hatası: ' + error.message);
    }
});
</script>
@endpush 