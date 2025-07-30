@extends('admin.layouts.app')

@section('title', 'Başkan Detayları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ $chairman->name }} - Detayları</h3>
                    <div class="btn-group">
                        <a href="{{ route('admin.chairmen.edit', $chairman) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.chairmen.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Sol Taraf - Ana Bilgiler -->
                        <div class="col-lg-4 col-md-5">
                            <div class="chairman-profile text-center">
                                <div class="profile-image-wrapper">
                                    <img src="{{ $chairman->main_image_url }}" alt="{{ $chairman->name }}" 
                                         class="profile-image img-fluid">
                                    <div class="status-badge {{ $chairman->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        <i class="fas {{ $chairman->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                        {{ $chairman->is_active ? 'Aktif' : 'Pasif' }}
                                    </div>
                                </div>
                                <h4 class="chairman-name mt-3">{{ $chairman->name }}</h4>
                                <p class="chairman-title text-muted">{{ $chairman->title }}</p>
                                
                                @if($chairman->education || $chairman->experience)
                                    <div class="additional-info mt-3">
                                        @if($chairman->education)
                                            <div class="info-item mb-2">
                                                <i class="fas fa-graduation-cap text-primary"></i>
                                                <span>{{ $chairman->education }}</span>
                                            </div>
                                        @endif
                                        @if($chairman->experience)
                                            <div class="info-item mb-2">
                                                <i class="fas fa-briefcase text-primary"></i>
                                                <span>{{ $chairman->experience }}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                
                                <div class="meta-info mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-sort-numeric-up"></i> Sıra: {{ $chairman->sort_order }} <br>
                                        <i class="fas fa-calendar"></i> Oluşturulma: {{ $chairman->created_at->format('d.m.Y') }} <br>
                                        <i class="fas fa-edit"></i> Güncelleme: {{ $chairman->updated_at->format('d.m.Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sağ Taraf - Detaylar -->
                        <div class="col-lg-8 col-md-7">
                            <!-- Mesaj -->
                            <div class="section-box mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-quote-left text-primary"></i> Başkanın Mesajı
                                </h5>
                                <div class="section-content">
                                    <blockquote class="chairman-message">
                                        {{ $chairman->message }}
                                    </blockquote>
                                </div>
                            </div>
                            
                            <!-- Özgeçmiş -->
                            <div class="section-box mb-4">
                                <h5 class="section-title">
                                    <i class="fas fa-user text-primary"></i> Özgeçmiş
                                </h5>
                                <div class="section-content">
                                    <div class="biography-text">
                                        {!! $chairman->formatted_biography !!}
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Başarılar -->
                            @if($chairman->achievements && count($chairman->achievements) > 0)
                                <div class="section-box mb-4">
                                    <h5 class="section-title">
                                        <i class="fas fa-award text-primary"></i> Başarılar ve Ödüller
                                    </h5>
                                    <div class="section-content">
                                        <ul class="achievements-list">
                                            @foreach($chairman->achievements as $achievement)
                                                <li>
                                                    <i class="fas fa-trophy text-warning"></i>
                                                    {{ $achievement }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Galeri -->
                    @if($chairman->gallery && count($chairman->gallery) > 0)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="section-box">
                                    <h5 class="section-title">
                                        <i class="fas fa-images text-primary"></i> Fotoğraf Galerisi 
                                        <span class="badge bg-primary">{{ count($chairman->gallery) }} fotoğraf</span>
                                    </h5>
                                    <div class="section-content">
                                        <div class="row">
                                            @foreach($chairman->gallery_urls as $index => $image)
                                                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                                    <div class="gallery-item">
                                                        <img src="{{ $image }}" alt="Galeri {{ $index + 1 }}" 
                                                             class="gallery-image w-100" 
                                                             onclick="openImageModal('{{ $image }}', '{{ $chairman->name }} - Galeri {{ $index + 1 }}')">
                                                        <div class="gallery-overlay">
                                                            <i class="fas fa-search-plus"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.chairmen.edit', $chairman) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <button class="btn btn-{{ $chairman->is_active ? 'secondary' : 'success' }}" 
                                onclick="toggleStatus({{ $chairman->id }}, this)">
                            <i class="fas {{ $chairman->is_active ? 'fa-times' : 'fa-check' }}"></i>
                            {{ $chairman->is_active ? 'Pasif Yap' : 'Aktif Yap' }}
                        </button>
                        <a href="{{ route('chairman') }}" class="btn btn-info" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Frontend'de Görüntüle
                        </a>
                        <button class="btn btn-danger" onclick="deleteChairman({{ $chairman->id }})">
                            <i class="fas fa-trash"></i> Sil
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid">
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
.profile-image-wrapper {
    position: relative;
    display: inline-block;
}

.profile-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    border-radius: 15px;
    border: 3px solid #ddd;
}

.status-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    padding: 5px 10px;
    border-radius: 15px;
    color: white;
    font-size: 12px;
    font-weight: bold;
}

.chairman-name {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.chairman-title {
    font-size: 1.1rem;
    font-weight: 500;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.info-item i {
    width: 20px;
}

.section-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    border-left: 4px solid var(--bs-primary);
}

.section-title {
    color: #333;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.chairman-message {
    background: white;
    padding: 20px;
    border-radius: 8px;
    border-left: 4px solid var(--bs-primary);
    font-style: italic;
    margin: 0;
    line-height: 1.6;
}

.biography-text {
    background: white;
    padding: 20px;
    border-radius: 8px;
    line-height: 1.7;
}

.achievements-list {
    list-style: none;
    padding: 0;
    background: white;
    border-radius: 8px;
    padding: 20px;
}

.achievements-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    display: flex;
    align-items: center;
    gap: 10px;
}

.achievements-list li:last-child {
    border-bottom: none;
}

.gallery-item {
    position: relative;
    cursor: pointer;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: scale(1.05);
}

.gallery-image {
    height: 150px;
    object-fit: cover;
    transition: opacity 0.3s ease;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    color: white;
    font-size: 20px;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.meta-info {
    font-size: 13px;
    line-height: 1.6;
}

.card {
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
</style>

<script>
function openImageModal(imageSrc, title) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModalTitle').textContent = title;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}

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
            location.reload(); // Sayfayı yenile
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu!');
    });
}

function deleteChairman(chairmanId) {
    if (confirm('Bu başkanı silmek istediğinizden emin misiniz? Bu işlem geri alınamaz.')) {
        const form = document.getElementById('delete-form');
        form.action = `/admin/chairmen/${chairmanId}`;
        form.submit();
    }
}
</script>
@endsection 