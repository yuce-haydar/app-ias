@extends('admin.layouts.app')

@section('title', 'Bilgi Toplumu Hizmetleri')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Bilgi Toplumu Hizmetleri</h3>
                    <a href="{{ route('admin.information-services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Yeni Bilgi Ekle
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped" id="servicesTable">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Başlık</th>
                                    <th>Değer</th>
                                    <th>Belge</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td>{{ $service->order }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ Str::limit($service->value, 50) }}</td>
                                        <td>
                                            @if($service->document)
                                                <a href="{{ $service->document_url }}" target="_blank" class="btn btn-sm btn-info">
                                                    <i class="fas fa-download"></i> Belge
                                                </a>
                                            @else
                                                <span class="text-muted">Belge yok</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($service->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary">Pasif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.information-services.show', $service) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.information-services.edit', $service) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.information-services.destroy', $service) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu bilgiyi silmek istediğinizden emin misiniz?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Henüz hiç bilgi eklenmemiş.</td>
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
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#servicesTable').DataTable({
        "paging": false,
        "info": false,
        "order": [[0, "asc"]]
    });
});
</script>
@endpush 