@extends('admin.layouts.app')

@section('title', 'Tesisler')
@section('page-title', 'Tesisler')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tesis Listesi</h5>
        <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Tesis Ekle
        </a>
    </div>
    <div class="card-body">
        @if($facilities->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <p class="text-muted">Henüz tesis eklenmemiş.</p>
                <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> İlk Tesisi Ekle
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover" id="facilitiesTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Resim</th>
                            <th>Tesis Adı</th>
                            <th>Tür</th>
                            <th>Kategori</th>
                            <th>Durum</th>
                            <th>Öne Çıkan</th>
                            <th>Görüntülenme</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facilities as $facility)
                            <tr>
                                <td>{{ $facility->id }}</td>
                                <td>
                                    @if($facility->image)
                                        <img src="{{ Storage::url($facility->image) }}" alt="{{ $facility->name }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 5px; 
                                                    display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $facility->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($facility->short_description, 50) }}</small>
                                </td>
                                <td>{{ $facility->facility_type }}</td>
                                <td>{{ $facility->category ?? '-' }}</td>
                                <td>
                                    @if($facility->status == 'active')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    @if($facility->is_featured)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $facility->view_count }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.facilities.show', $facility->id) }}" 
                                           class="btn btn-sm btn-info" title="Görüntüle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.facilities.edit', $facility->id) }}" 
                                           class="btn btn-sm btn-warning" title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.facilities.destroy', $facility->id) }}" 
                                              method="POST" class="d-inline" 
                                              onsubmit="return confirm('Bu tesisi silmek istediğinize emin misiniz?')">
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
            

        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#facilitiesTable').DataTable({
        "paging": true,
        "info": true,
        "searching": true,
        "ordering": true,
        "pageLength": 25,
        "order": [[0, "desc"]],
        "language": {
            "search": "Ara:",
            "emptyTable": "Tabloda veri bulunmuyor",
            "zeroRecords": "Eşleşen kayıt bulunamadı",
            "lengthMenu": "_MENU_ kayıt göster",
            "info": "_START_ - _END_ / _TOTAL_ kayıt",
            "infoEmpty": "Kayıt bulunamadı",
            "infoFiltered": "(_MAX_ kayıt içerisinden filtrelendi)",
            "paginate": {
                "first": "İlk",
                "last": "Son",
                "next": "Sonraki",
                "previous": "Önceki"
            }
        }
    });
});
</script>
@endpush 