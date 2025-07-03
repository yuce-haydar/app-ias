@extends('admin.layouts.app')

@section('title', 'Duyurular')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Duyurular</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Yeni Duyuru
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
                        <table class="table table-bordered table-striped" id="announcementsTable">
                            <thead>
                                <tr>
                                    <th width="50">ID</th>
                                    <th>Başlık</th>
                                    <th width="80">Resim</th>
                                   
                                   
                                    <th width="100">Başlangıç</th>
                                    <th width="100">Bitiş</th>
                                    <th width="120">Yayın Tarihi</th>
                                    <th width="80">Durum</th>
                                    <th width="60">Sabitli</th>
                                    <th width="120">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($announcements as $announcement)
                                <tr>
                                    <td>{{ $announcement->id }}</td>
                                    <td>
                                        {{ $announcement->title }}
                                        @if($announcement->attachments && count($announcement->attachments) > 0)
                                            <i class="fas fa-paperclip text-muted ms-2" title="{{ count($announcement->attachments) }} dosya"></i>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($announcement->image)
                                            <img src="{{ asset('storage/' . $announcement->image) }}" alt="Resim" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                  
                                  
                                   
                                    <td>{{ $announcement->start_date->format('d.m.Y') }}</td>
                                    <td>{{ $announcement->end_date ? $announcement->end_date->format('d.m.Y') : '-' }}</td>
                                    <td>{{ $announcement->published_at ? $announcement->published_at->format('d.m.Y H:i') : '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $announcement->status == 'published' ? 'success' : 'secondary' }}">
                                            {{ $announcement->status == 'published' ? 'Yayında' : 'Taslak' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if($announcement->is_pinned)
                                            <i class="fas fa-thumbtack text-danger"></i>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu duyuruyu silmek istediğinize emin misiniz?')">
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
                        {{ $announcements->links() }}
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
    $('#announcementsTable').DataTable({
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