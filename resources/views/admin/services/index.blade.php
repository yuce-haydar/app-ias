@extends('admin.layouts.app')

@section('title', 'Hizmetler')
@section('page-title', 'Hizmetler')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Hizmet Listesi</h5>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Hizmet Ekle
        </a>
    </div>
    <div class="card-body">
        @if($services->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-concierge-bell fa-3x text-muted mb-3"></i>
                <p class="text-muted">Henüz hizmet eklenmemiş.</p>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> İlk Hizmeti Ekle
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover" id="servicesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>İkon</th>
                            <th>Hizmet Adı</th>
                            <th>Kategori</th>
                            <th>Durum</th>
                            <th>Öne Çıkan</th>
                            <th>Görüntülenme</th>
                            <th>Sıralama</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    @if($service->icon)
                                        <i class="{{ $service->icon }} fa-2x"></i>
                                    @elseif($service->image)
                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" 
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <div style="width: 40px; height: 40px; background: #f0f0f0; border-radius: 5px; 
                                                    display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-concierge-bell text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $service->title }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($service->short_description, 50) }}</small>
                                </td>
                                <td>{{ $service->service_category }}</td>
                                <td>
                                    @if($service->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($service->is_featured)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $service->view_count }}</span>
                                </td>
                                <td>{{ $service->sort_order }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.services.show', $service->id) }}" 
                                           class="btn btn-sm btn-info" title="Görüntüle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service->id) }}" 
                                           class="btn btn-sm btn-warning" title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" 
                                              method="POST" class="d-inline" 
                                              onsubmit="return confirm('Bu hizmeti silmek istediğinize emin misiniz?')">
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
                {{ $services->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#servicesTable').DataTable({
        "paging": false,
        "info": false,
        "order": [[7, "asc"], [0, "desc"]] // Önce sıralama, sonra ID'ye göre
    });
});
</script>
@endpush 