@extends('admin.layouts.app')

@section('title', 'Başkanlar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Başkanlar Yönetimi</h3>
                    <a href="{{ route('admin.chairmen.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Yeni Başkan Ekle
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($chairmen->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="80">Sıra</th>
                                        <th width="100">Resim</th>
                                        <th>Ad Soyad</th>
                                        <th>Unvan</th>
                                        <th>Mesaj</th>
                                        <th width="100">Durum</th>
                                        <th width="150">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chairmen as $chairman)
                                        <tr>
                                            <td>{{ $chairman->sort_order }}</td>
                                            <td>
                                                <img src="{{ $chairman->main_image_url }}" 
                                                     alt="{{ $chairman->name }}" 
                                                     class="img-thumbnail" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            </td>
                                            <td>
                                                <strong>{{ $chairman->name }}</strong>
                                            </td>
                                            <td>{{ $chairman->title }}</td>
                                            <td>{{ $chairman->short_message }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-toggle {{ $chairman->is_active ? 'btn-success' : 'btn-secondary' }}" 
                                                        onclick="toggleStatus({{ $chairman->id }}, this)">
                                                    <i class="fas {{ $chairman->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                                    {{ $chairman->is_active ? 'Aktif' : 'Pasif' }}
                                                </button>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.chairmen.show', $chairman) }}" 
                                                       class="btn btn-sm btn-info" title="Görüntüle">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.chairmen.edit', $chairman) }}" 
                                                       class="btn btn-sm btn-warning" title="Düzenle">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger" 
                                                            onclick="deleteChairman({{ $chairman->id }})" title="Sil">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Henüz başkan eklenmemiş</h5>
                            <p class="text-muted">İlk başkanı eklemek için yukarıdaki butonu kullanın.</p>
                            <a href="{{ route('admin.chairmen.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Başkan Ekle
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<style>
.btn-toggle {
    min-width: 80px;
    transition: all 0.3s ease;
}

.img-thumbnail {
    border-radius: 8px;
}

.alert {
    border-radius: 8px;
}

.card {
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
</style>

<script>
function toggleStatus(chairmanId, button) {
    fetch(`/admin/chairmen/${chairmanId}/toggle-status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const icon = button.querySelector('i');
            if (data.is_active) {
                button.className = 'btn btn-sm btn-toggle btn-success';
                icon.className = 'fas fa-check';
                button.innerHTML = '<i class="fas fa-check"></i> Aktif';
            } else {
                button.className = 'btn btn-sm btn-toggle btn-secondary';
                icon.className = 'fas fa-times';
                button.innerHTML = '<i class="fas fa-times"></i> Pasif';
            }
            
            // Toast notification
            showToast(data.message, 'success');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Bir hata oluştu!', 'error');
    });
}

function deleteChairman(chairmanId) {
    if (confirm('Bu başkanı silmek istediğinizden emin misiniz? Bu işlem geri alınamaz.')) {
        const form = document.getElementById('delete-form');
        form.action = `/admin/chairmen/${chairmanId}`;
        form.submit();
    }
}

function showToast(message, type) {
    // Simple toast notification
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `;
    document.body.appendChild(toast);
    
    setTimeout(() => toast.remove(), 3000);
}
</script>
@endsection 