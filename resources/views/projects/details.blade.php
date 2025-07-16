@extends('layouts.app')

@section('title', $project->title . ' - Hatay İmar')
@section('description', $project->short_description)
@section('keywords', 'hatay imar, proje detayı, ' . $project->project_type)

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $project->title }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>{{ $project->title }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Proje Detay Bölümü
==============================-->
<section class="project-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    <!-- Ana Resim -->
                    <div class="project-details-thumb">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; cursor: pointer;" onclick="openImageModal('{{ $project->image_url }}', 0, {{ json_encode(array_merge([$project->image_url], $project->gallery_urls ?? [])) }})">
                    </div>
                    
                    <div class="project-details-wrapper">
                        <h1 class="title">{{ $project->title }}</h1>
                        
                        <!-- Proje Meta Bilgileri -->
                        <div class="project-meta">
                            <div class="meta-item">
                                <h6>Proje Türü:</h6>
                                <p>{{ $project->project_type }}</p>
                            </div>
                            @if($project->category)
                            <div class="meta-item">
                                <h6>Kategori:</h6>
                                <p>{{ $project->category }}</p>
                            </div>
                            @endif
                            <div class="meta-item">
                                <h6>Durum:</h6>
                                <p><span class="badge badge-{{ strtolower(str_replace(' ', '-', $project->display_status)) }}">{{ $project->display_status }}</span></p>
                            </div>
                            <div class="meta-item">
                                <h6>Lokasyon:</h6>
                                <p>{{ $project->location }}</p>
                            </div>
                            @if($project->area)
                            <div class="meta-item">
                                <h6>Alan:</h6>
                                <p>{!! $project->area !!}</p>
                            </div>
                            @endif
                            @if($project->capacity)
                            <div class="meta-item">
                                <h6>Kapasite:</h6>
                                <p>{{ $project->capacity }}</p>
                            </div>
                            @endif
                        </div>

                        <!-- Proje Açıklaması -->
                        <h3>Proje Hakkında</h3>
                        <p>{!! $project['description'] ?? 'Bu proje hakkında detaylı bilgi yakında eklenecektir.' !!}</p>

                        <!-- Proje Konumları Haritası -->
                        @if($project->locations && $project->locations->count() > 0)
                        <div class="project-locations-section mt-5">
                            <h3>Proje Konumları</h3>
                            
                            @if($project->locations->count() > 1)
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="mainLocationSelect" class="form-label fw-bold">Haritada Görmek İstediğiniz Lokasyon:</label>
                                    <select id="mainLocationSelect" class="form-select form-select-lg">
                                        <option value="all">🗺️ Tüm Lokasyonlar</option>
                                        @foreach($project->locations as $index => $location)
                                        <option value="{{ $index }}">📍 {{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <div class="location-info">
                                        <span class="badge bg-primary">{{ $project->locations->count() }} Lokasyon</span>
                                        <small class="text-muted ms-2">Haritada tüm konumları görebilirsiniz</small>
                                    </div>
                                </div>
                            </div>
                            @else
                                                         <div class="mb-3">
                                 <div class="d-flex align-items-center gap-3">
                                     <span class="badge bg-primary">{{ $project->locations->first()->name }}</span>
                                     <a href="https://maps.google.com/?q={{ $project->locations->first()->latitude }},{{ $project->locations->first()->longitude }}" target="_blank" 
                                        class="btn btn-success btn-sm">
                                         <i class="fa-solid fa-route"></i> Konuma Git
                                     </a>
                                 </div>
                             </div>
                            @endif
                            
                            <!-- Tam Genişlik Harita -->
                            <div class="full-width-map">
                                <div id="mainProjectLocationMap" style="height: 500px; width: 100%; border-radius: 15px; border: 2px solid #ddd; box-shadow: 0 8px 25px rgba(0,0,0,0.1);"></div>
                            </div>
                            
                            @if($project->locations->count() > 1)
                            <div class="location-grid mt-4">
                                <h4>Proje Lokasyonları</h4>
                                <div class="row g-3">
                                    @foreach($project->locations as $index => $location)
                                    <div class="col-md-6">
                                        <div class="location-card" style="background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 10px; padding: 20px; border-left: 4px solid #1f4788;">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-2" style="color: #1f4788; font-weight: 600;">📍 {{ $location->name }}</h6>
                                                    @if($location->description)
                                                    <p class="mb-3 text-muted" style="font-size: 14px;">{{ $location->description }}</p>
                                                    @endif
                                                    <div class="location-actions">
                                                        <button class="btn btn-outline-primary btn-sm me-2" onclick="focusOnLocation({{ $index }})">
                                                            <i class="fa-solid fa-search-location"></i> Haritada Göster
                                                        </button>
                                                                                                                 <a href="https://maps.google.com/?q={{ $location->latitude }},{{ $location->longitude }}" target="_blank" 
                                                            class="btn btn-success btn-sm">
                                                             <i class="fa-solid fa-route"></i> Konuma Git
                                                         </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif

                        <!-- Proje Özellikleri -->
                        @if(isset($project['features']) && count($project['features']) > 0)
                        <h3>Tesis Özellikleri</h3>
                        <ul class="project-objectives">
                            @foreach($project['features'] as $feature)
                            <li>{!! $feature !!}</li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- Proje Timeline -->
                        @if(isset($project['timeline']) && count($project['timeline']) > 0)
                        <h3>Proje Süreci</h3>
                        <div class="timeline-section">
                            @foreach($project['timeline'] as $timeline)
                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <p>{!! $timeline !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Proje Resimleri Galerisi -->
                        @if($project->gallery_urls && count($project->gallery_urls) > 0)
                        <h3>Proje Galerisi</h3>
                        <div class="project-gallery">
                            <div class="row g-3">
                                @foreach($project->gallery_urls as $index => $image)
                                <div class="col-md-6">
                                    <div class="gallery-item">
                                        <img src="{{ $image }}" alt="{{ $project->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; cursor: pointer;" onclick="openImageModal('{{ $image }}', {{ $index + 1 }}, {{ json_encode(array_merge([$project->image_url], $project->gallery_urls)) }})">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Proje Özeti -->
                    <div class="widget">
                        <h4 class="widget-title">Proje Özeti</h4>
                        <div class="project-summary">
                            <div class="summary-item">
                                <span class="label">Proje Türü:</span>
                                <span class="value">{{ $project['type'] }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Durum:</span>
                                <span class="value">{{ $project['status'] }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Lokasyon:</span>
                                <span class="value">{{ $project['location'] }}</span>
                            </div>
                            @if(isset($project['area']))
                            <div class="summary-item">
                                <span class="label">Alan:</span>
                                <span class="value">
                                    {!! $project['area'] !!}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Proje Lokasyonları Haritası -->
                    @if($project->locations && $project->locations->count() > 0)
                    <div class="widget location-widget">
                        <h4 class="widget-title">Proje Konumları</h4>
                        
                        @if($project->locations->count() > 1)
                        <div class="location-selector mb-3">
                            <label for="locationSelect" class="form-label">Haritada Görmek İstediğiniz Lokasyon:</label>
                            <select id="locationSelect" class="form-select">
                                <option value="all">Tüm Lokasyonlar</option>
                                @foreach($project->locations as $index => $location)
                                <option value="{{ $index }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        
                        <div id="projectLocationMap" style="height: 300px; width: 100%; border-radius: 10px; border: 1px solid #ddd;"></div>
                        
                        @if($project->locations->count() === 1)
                        <div class="single-location-actions mt-3 text-center">
                            <a href="https://maps.google.com/?q={{ $project->locations->first()->latitude }},{{ $project->locations->first()->longitude }}" target="_blank" 
                               class="theme-btn bg-success">
                                <i class="fa-solid fa-route"></i> Konuma Git
                            </a>
                        </div>
                        @endif
                        
                        @if($project->locations->count() > 1)
                        <div class="location-list mt-3">
                            <h6>Proje Lokasyonları:</h6>
                            <ul class="list-unstyled">
                                @foreach($project->locations as $location)
                                <li class="mb-3 p-3" style="background: #f8f9fa; border-radius: 8px; border-left: 4px solid #1f4788;">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong style="color: #1f4788;">{{ $location->name }}</strong>
                                            @if($location->description)
                                            <br><small class="text-muted">{{ $location->description }}</small>
                                            @endif
                                        </div>
                                        <a href="https://maps.google.com/?q={{ $location->latitude }},{{ $location->longitude }}" target="_blank" 
                                           class="btn btn-sm btn-success" style="font-size: 11px; padding: 4px 8px;">
                                            <i class="fa-solid fa-route"></i> Konuma Git
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    @endif

                    <!-- İlgili Projeler -->
                    @if($relatedProjects->count() > 0)
                    <div class="widget">
                        <h4 class="widget-title">Diğer Projelerimiz</h4>
                        <div class="related-projects">
                            @foreach($relatedProjects as $relatedProject)
                            <div class="related-project-item">
                                <div class="project-thumb">
                                    <img src="{{ $relatedProject->image_url }}" alt="{{ $relatedProject->title }}" style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px;">
                                </div>
                                <div class="project-content">
                                    <h6><a href="{{ route('project.details', $relatedProject->id) }}">{{ Str::limit($relatedProject->title, 30) }}</a></h6>
                                    <p>{{ $relatedProject->location }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- İletişim -->
                    <div class="widget">
                        <h4 class="widget-title">Proje Hakkında Bilgi</h4>
                        <div class="contact-info">
                            <p>Bu proje hakkında detaylı bilgi almak için bizimle iletişime geçebilirsiniz.</p>
                            <a href="{{ route('contact') }}" class="theme-btn">
                                <span class="link-effect">
                                    <span class="effect-1">İletişime Geç</span>
                                    <span class="effect-1">İletişime Geç</span>
                                </span>
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.project-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 30px 0;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
}

.meta-item h6 {
    color: #1f4788;
    font-weight: 600;
    margin-bottom: 5px;
}

.meta-item p {
    margin: 0;
    font-weight: 500;
}

.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.badge-tamamlandı {
    background: #28a745;
    color: white;
}

.badge-devam-ediyor {
    background: #007bff;
    color: white;
}

.badge-tasarım {
    background: #ffc107;
    color: #333;
}

.badge-planlanan {
    background: #6c757d;
    color: white;
}

.badge-temel-atıldı {
    background: #17a2b8;
    color: white;
}

.project-objectives {
    padding: 0;
    list-style: none;
}

.project-objectives li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 25px;
}

.project-objectives li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #1f4788;
    font-weight: bold;
}

.timeline-section {
    margin: 20px 0;
}

.timeline-item {
    padding: 15px;
    margin: 10px 0;
    background: #f8f9fa;
    border-left: 4px solid #1f4788;
    border-radius: 5px;
}

.project-summary {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #ddd;
}

.summary-item:last-child {
    border-bottom: none;
}

.label {
    font-weight: 600;
    color: #666;
}

.value {
    font-weight: 500;
    color: #333;
}

.related-project-item {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.project-thumb {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    overflow: hidden;
    flex-shrink: 0;
}

.project-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.project-content h6 {
    margin-bottom: 5px;
    font-size: 14px;
}

.project-content h6 a {
    color: #333;
    text-decoration: none;
}

.project-content h6 a:hover {
    color: #1f4788;
}

.project-content p {
    margin: 0;
    font-size: 12px;
    color: #666;
}

.widget {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.widget-title {
    color: #1f4788;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #1f4788;
}

/* Ana Harita Stilleri */
.project-locations-section h3 {
    color: #1f4788;
    font-weight: 600;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #1f4788;
}

.full-width-map {
    margin: 20px 0;
}

.location-grid h4 {
    color: #1f4788;
    font-weight: 600;
    margin-bottom: 20px;
}

.location-card {
    transition: all 0.3s ease;
    position: relative;
}

.location-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    border-left-color: #28a745 !important;
}

.location-card h6 {
    font-size: 16px;
}

.location-actions .btn {
    transition: all 0.3s ease;
}

.location-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.form-select-lg {
    font-size: 16px;
   
    border-radius: 10px;
    border: 2px solid #ddd;
    transition: all 0.3s ease;
}

.form-select-lg:focus {
    border-color: #1f4788;
    box-shadow: 0 0 0 0.2rem rgba(31, 71, 136, 0.25);
}

.location-info .badge {
    font-size: 14px;
    padding: 8px 16px;
}

/* Responsive Ana Harita */
@media (max-width: 768px) {
    .project-locations-section .row.mb-4 {
        margin-bottom: 20px !important;
    }
    
    .location-card {
        margin-bottom: 20px;
    }
    
    .location-actions .btn {
        font-size: 12px;
        padding: 6px 12px;
        margin-bottom: 5px;
    }
    
    #mainProjectLocationMap {
        height: 350px !important;
    }
}
</style>

@endsection

<!-- Image Modal -->
<div id="imageModal" class="image-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>
        <img id="modalImage" src="" alt="Proje Fotoğrafı">
        <div class="modal-nav">
            <button class="prev-btn" onclick="changeImage(-1)">&#10094;</button>
            <button class="next-btn" onclick="changeImage(1)">&#10095;</button>
        </div>
        <div class="image-counter">
            <span id="imageCounter">1 / 1</span>
        </div>
    </div>
</div>

<style>
.image-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    text-align: center;
}

.modal-content img {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 8px;
}

.close-modal {
    position: absolute;
    top: -40px;
    right: -40px;
    font-size: 40px;
    color: white;
    cursor: pointer;
    z-index: 10000;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.close-modal:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.modal-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    pointer-events: none;
}

.prev-btn, .next-btn {
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 15px 20px;
    font-size: 24px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease;
    pointer-events: auto;
}

.prev-btn:hover, .next-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.prev-btn {
    margin-left: -60px;
}

.next-btn {
    margin-right: -60px;
}

.image-counter {
    position: absolute;
    bottom: -50px;
    left: 50%;
    transform: translateX(-50%);
    color: white;
    font-size: 16px;
    background: rgba(0, 0, 0, 0.5);
    padding: 10px 20px;
    border-radius: 20px;
}

@media (max-width: 768px) {
    .close-modal {
        top: -30px;
        right: -30px;
        width: 40px;
        height: 40px;
        font-size: 30px;
    }
    
    .prev-btn, .next-btn {
        padding: 10px 15px;
        font-size: 20px;
    }
    
    .prev-btn {
        margin-left: -40px;
    }
    
    .next-btn {
        margin-right: -40px;
    }
}
</style>

<script>
let currentImageIndex = 0;
let imageGallery = [];

function openImageModal(imageSrc, index, gallery) {
    currentImageIndex = index;
    imageGallery = gallery;
    
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageCounter').textContent = `${index + 1} / ${gallery.length}`;
    document.getElementById('imageModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function changeImage(direction) {
    currentImageIndex += direction;
    
    if (currentImageIndex >= imageGallery.length) {
        currentImageIndex = 0;
    } else if (currentImageIndex < 0) {
        currentImageIndex = imageGallery.length - 1;
    }
    
    document.getElementById('modalImage').src = imageGallery[currentImageIndex];
    document.getElementById('imageCounter').textContent = `${currentImageIndex + 1} / ${imageGallery.length}`;
}

// Keyboard navigation
document.addEventListener('keydown', function(event) {
    if (document.getElementById('imageModal').style.display === 'flex') {
        if (event.key === 'Escape') {
            closeImageModal();
        } else if (event.key === 'ArrowLeft') {
            changeImage(-1);
        } else if (event.key === 'ArrowRight') {
            changeImage(1);
        }
    }
});

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeImageModal();
    }
});
</script>

@if($project->locations && $project->locations->count() > 0)
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Proje lokasyon verileri
    var projectLocations = [
        @foreach($project->locations as $index => $location)
        {
            index: {{ $index }},
            name: "{{ addslashes($location->name) }}",
            coords: [{{ $location->latitude }}, {{ $location->longitude }}],
            description: "{{ addslashes($location->description ?? '') }}",
            projectTitle: "{{ addslashes($project->title) }}"
        },
        @endforeach
    ];

    // Harita merkez koordinatı (tüm lokasyonların ortası)
    var centerLat = projectLocations.reduce((sum, loc) => sum + loc.coords[0], 0) / projectLocations.length;
    var centerLng = projectLocations.reduce((sum, loc) => sum + loc.coords[1], 0) / projectLocations.length;

    // Ana Harita oluştur (Tam genişlik)
    var mainMap = L.map('mainProjectLocationMap', {
        center: [centerLat, centerLng],
        zoom: projectLocations.length === 1 ? 16 : 13,
        maxZoom: 18,
        minZoom: 8
    });

    // Satellite görünümü - Ana harita
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: '© Esri, Maxar, Earthstar Geographics'
    }).addTo(mainMap);

    // Yol ve yer adları overlay - Ana harita
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
        attribution: '© Esri'
    }).addTo(mainMap);

    // Marker iconları
    var locationIcon = L.divIcon({
        className: 'custom-location-marker',
        html: '<div style="background: #1f4788; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(31,71,136,0.4); border: 3px solid white;"><i class="fa-solid fa-map-marker-alt" style="color: white; font-size: 16px;"></i></div>',
        iconSize: [35, 35],
        iconAnchor: [17.5, 17.5]
    });

    // Ana harita marker'ları
    var mainMarkers = [];

    // Ana harita marker'ları oluştur
    projectLocations.forEach(function(location, index) {
        var marker = L.marker(location.coords, {icon: locationIcon}).addTo(mainMap);
        
        var popupContent = `
            <div style="text-align: center; min-width: 250px;">
                <h5 style="margin: 0 0 10px 0; color: #1f4788; font-weight: 600;">${location.projectTitle}</h5>
                <h6 style="margin: 0 0 8px 0; color: #333; font-weight: 500;">📍 ${location.name}</h6>
                ${location.description ? '<p style="margin: 0 0 12px 0; color: #666; font-size: 13px;">' + location.description + '</p>' : ''}
                <div style="margin-top: 15px;">
                    <a href="https://maps.google.com/?q=${location.coords[0]},${location.coords[1]}" target="_blank" 
                       style="background: #28a745; color: white; padding: 10px 20px; border-radius: 25px; text-decoration: none; font-size: 13px; font-weight: 500; display: inline-block; transition: all 0.3s;">
                                                 <i class="fa-solid fa-route" style="margin-right: 6px;"></i>Konuma Git
                    </a>
                </div>
            </div>
        `;
        
        marker.bindPopup(popupContent);
        mainMarkers.push({marker: marker, location: location});
    });

    // Ana selectbox event listener
    var mainLocationSelect = document.getElementById('mainLocationSelect');
    if (mainLocationSelect) {
        mainLocationSelect.addEventListener('change', function() {
            var selectedValue = this.value;
            
            if (selectedValue === 'all') {
                // Tüm marker'ları göster ve haritayı tüm lokasyonlara odakla
                mainMarkers.forEach(function(item) {
                    item.marker.addTo(mainMap);
                });
                
                // Tüm marker'ları içeren sınırları hesapla
                if (mainMarkers.length > 1) {
                    var group = new L.featureGroup(mainMarkers.map(item => item.marker));
                    mainMap.fitBounds(group.getBounds().pad(0.1));
                } else {
                    mainMap.setView(mainMarkers[0].location.coords, 16);
                }
            } else {
                // Seçili marker'ı göster, diğerlerini gizle
                var selectedIndex = parseInt(selectedValue);
                
                mainMarkers.forEach(function(item, index) {
                    if (index === selectedIndex) {
                        item.marker.addTo(mainMap);
                        mainMap.setView(item.location.coords, 16);
                        item.marker.openPopup();
                    } else {
                        mainMap.removeLayer(item.marker);
                    }
                });
            }
        });
    }

    // focusOnLocation fonksiyonu - location card'lardan çağrılır
    window.focusOnLocation = function(locationIndex) {
        var location = projectLocations[locationIndex];
        mainMap.setView(location.coords, 17);
        mainMarkers[locationIndex].marker.openPopup();
        
        // Select box'ı da güncelle
        if (mainLocationSelect) {
            mainLocationSelect.value = locationIndex;
        }
        
        // Sayfayı haritaya scroll et
        document.getElementById('mainProjectLocationMap').scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center' 
        });
    };
    
    // İlk yükleme ayarları
    if (projectLocations.length === 1) {
        mainMarkers[0].marker.openPopup();
    } else {
        // Çoklu lokasyon varsa tüm marker'ları gösterecek şekilde zoom ayarla
        var group = new L.featureGroup(mainMarkers.map(item => item.marker));
        mainMap.fitBounds(group.getBounds().pad(0.1));
    }

    // Sidebar haritası (küçük harita) - Eğer varsa
    var sidebarMap = document.getElementById('projectLocationMap');
    if (sidebarMap) {
        var map = L.map('projectLocationMap', {
            center: [centerLat, centerLng],
            zoom: projectLocations.length === 1 ? 16 : 14,
            maxZoom: 18,
            minZoom: 10
        });

        // Satellite görünümü
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: '© Esri, Maxar, Earthstar Geographics'
        }).addTo(map);

        // Yol ve yer adları overlay
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
            attribution: '© Esri'
        }).addTo(map);

        // Sidebar marker iconları (daha küçük)
        var sidebarLocationIcon = L.divIcon({
            className: 'custom-location-marker',
            html: '<div style="background: #007bff; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3); border: 2px solid white;"><i class="fa-solid fa-map-marker-alt" style="color: white; font-size: 12px;"></i></div>',
            iconSize: [25, 25],
            iconAnchor: [12.5, 12.5]
        });

        // Sidebar marker'ları
        var markers = [];

        // Sidebar marker'ları oluştur
        projectLocations.forEach(function(location, index) {
            var marker = L.marker(location.coords, {icon: sidebarLocationIcon}).addTo(map);
            
            var popupContent = `
                <div style="text-align: center; min-width: 220px;">
                    <h6 style="margin: 0 0 8px 0; color: #333;">${location.projectTitle}</h6>
                    <h7 style="margin: 0 0 8px 0; color: #666;">${location.name}</h7>
                    ${location.description ? '<p style="margin: 0 0 8px 0; color: #666; font-size: 12px;">' + location.description + '</p>' : ''}
                    <div style="margin-top: 10px;">
                        <a href="https://maps.google.com/?q=${location.coords[0]},${location.coords[1]}" target="_blank" 
                           style="background: #28a745; color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 12px; font-weight: 500; display: inline-block;">
                            <i class="fa-solid fa-route" style="margin-right: 5px;"></i>Konuma Git
                        </a>
                    </div>
                </div>
            `;
            
            marker.bindPopup(popupContent);
            markers.push({marker: marker, location: location});
            
            // İlk marker'ın popup'ını aç
            if (index === 0) {
                marker.openPopup();
            }
        });

        // Sidebar selectbox event listener
        var locationSelect = document.getElementById('locationSelect');
        if (locationSelect) {
            locationSelect.addEventListener('change', function() {
                var selectedValue = this.value;
                
                if (selectedValue === 'all') {
                    // Tüm marker'ları göster ve haritayı tüm lokasyonlara odakla
                    markers.forEach(function(item) {
                        item.marker.addTo(map);
                    });
                    
                    // Tüm marker'ları içeren sınırları hesapla
                    var group = new L.featureGroup(markers.map(item => item.marker));
                    map.fitBounds(group.getBounds().pad(0.1));
                } else {
                    // Seçili marker'ı göster, diğerlerini gizle
                    var selectedIndex = parseInt(selectedValue);
                    
                    markers.forEach(function(item, index) {
                        if (index === selectedIndex) {
                            item.marker.addTo(map);
                            map.setView(item.location.coords, 16);
                            item.marker.openPopup();
                        } else {
                            map.removeLayer(item.marker);
                        }
                    });
                }
            });
        }
        
        // Eğer tek lokasyon varsa, marker'ı aç
        if (projectLocations.length === 1) {
            markers[0].marker.openPopup();
        } else {
            // Çoklu lokasyon varsa tüm marker'ları gösterecek şekilde zoom ayarla
            var group = new L.featureGroup(markers.map(item => item.marker));
            map.fitBounds(group.getBounds().pad(0.1));
        }
    }
});
</script>
@endif 