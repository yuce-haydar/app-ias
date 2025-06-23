@extends('admin.layouts.app')

@section('title', 'Projeler')
@section('page-title', 'Projeler')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Proje Listesi</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Proje Ekle
        </a>
    </div>
    <div class="card-body">
        @if($projects->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                <p class="text-muted">Henüz proje eklenmemiş.</p>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> İlk Projeyi Ekle
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover" id="projectsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Resim</th>
                            <th>Proje Adı</th>
                            <th>Tür</th>
                            <th>Durum</th>
                            <th>İlerleme</th>
                            <th>Bütçe</th>
                            <th>Öne Çıkan</th>
                            <th>Görüntülenme</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>
                                    @if($project->image)
                                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 5px; 
                                                    display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $project->title }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($project->short_description, 50) }}</small>
                                </td>
                                <td>{{ $project->project_type }}</td>
                                <td>
                                    @if($project->status == 'completed')
                                        <span class="badge bg-success">Tamamlandı</span>
                                    @elseif($project->status == 'ongoing')
                                        <span class="badge bg-warning">Devam Ediyor</span>
                                    @else
                                        <span class="badge bg-secondary">Planlandı</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="progress" style="height: 20px;">
                                        <div class="progress-bar" role="progressbar" 
                                             style="width: {{ $project->progress_percentage ?? 0 }}%"
                                             aria-valuenow="{{ $project->progress_percentage ?? 0 }}" 
                                             aria-valuemin="0" aria-valuemax="100">
                                            {{ $project->progress_percentage ?? 0 }}%
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($project->budget)
                                        ₺{{ number_format($project->budget, 2, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($project->is_featured)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $project->view_count }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.projects.show', $project->id) }}" 
                                           class="btn btn-sm btn-info" title="Görüntüle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                           class="btn btn-sm btn-warning" title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" 
                                              method="POST" class="d-inline" 
                                              onsubmit="return confirm('Bu projeyi silmek istediğinize emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Sil">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#projectsTable').DataTable({
        "paging": false,
        "info": false,
        "order": [[0, "desc"]]
    });
});
</script>
@endpush 