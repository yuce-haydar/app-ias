@extends('layouts.app')

@section('title', $facility->name . ' - Hatay İmar')
@section('description', $facility->short_description)

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $facility->name }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('facilities.index') }}">Tesisler</a></li>
                    <li>{{ $facility->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Tesis Detay Bölümü
==============================-->
<section class="project-details-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    
                    <!-- Ana Görsel -->
                    <div class="project-details-thumb mb-40">
                        <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; cursor: pointer;" onclick="openImageModal('{{ $facility->image_url }}', 0, {{ json_encode(array_merge([$facility->image_url], $facility->gallery_urls ?? [])) }})">
                    </div>
                    
                    <h1 class="project-title mb-30">{{ $facility->name }}</h1>
                    
                    <div class="project-meta mb-40">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="meta-item">
                                    <h6>Tesis Türü:</h6>
                                    <p>{{ $facility->category }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>{{ ucfirst($facility->facility_type) }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>{{ $facility->status == 'active' ? 'Aktif' : 'Pasif' }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-item">
                                    <h6>Açılış:</h6>
                                    <p>{{ $facility->opening_date ? date('Y', strtotime($facility->opening_date)) : '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Tesis Hakkında</h3>
                    {!! $facility->description !!}

                    @if($facility->features && is_array($facility->features) && count($facility->features) > 0)
                    <h3 class="mt-4">Tesis Özellikleri</h3>
                    <ul class="project-objectives">
                        @foreach($facility->features as $feature)
                        <li>{!! $feature !!}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="project-results mt-40">
                        <div class="row">
                            @if($facility->capacity)
                            <div class="col-md-4">
                                <div class="result-item text-center">
                                    <h4>{{ explode(' ', $facility->capacity)[0] ?? $facility->capacity }}</h4>
                                    <p>{{ implode(' ', array_slice(explode(' ', $facility->capacity), 1)) ?: 'Kapasite' }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if($facility->opening_date)
                            <div class="col-md-4">
                                <div class="result-item text-center">
                                    <h4>{{ date('Y') - date('Y', strtotime($facility->opening_date)) }}</h4>
                                    <p>Yıllık Deneyim</p>
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-md-4">
                                <div class="result-item text-center">
                                    <h4>%100</h4>
                                    <p>Kalite Garantisi</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tesis Fotoğrafları -->
                    @if($facility->gallery_urls && count($facility->gallery_urls) > 0)
                    <div class="facility-gallery mt-50">
                        <h3 class="mb-30">Tesis Fotoğrafları</h3>
                        <div class="row gy-20">
                            @foreach($facility->gallery_urls as $index => $image)
                            <div class="col-md-4">
                                <img src="{{ $image }}" alt="{{ $facility->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; cursor: pointer;" onclick="openImageModal('{{ $image }}', {{ $index }}, {{ json_encode($facility->gallery_urls) }})">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Çalışma Saatleri -->
                    @if($facility->working_hours && is_array($facility->working_hours) && count($facility->working_hours) > 0)
                    <div class="working-hours mt-40">
                        <h3 class="mb-20">Çalışma Saatleri</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="working-hours-list">
                                    @foreach($facility->working_hours as $day => $hours)
                                    <li><strong>{{ $day }}:</strong> {{ $hours }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-info">
                                    @if($facility->phone)
                                    <p><strong>Telefon:</strong> {{ $facility->phone }}</p>
                                    @endif
                                    @if($facility->email)
                                    <p><strong>E-posta:</strong> {{ $facility->email }}</p>
                                    @endif
                                    @if($facility->address)
                                    <p><strong>Adres:</strong> {{ $facility->address }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">Tesis Bilgileri</h3>
                        <ul class="project-info-list">
                            <li><strong>Tesis:</strong><span>{{ $facility->name }}</span></li>
                            @if($facility->capacity)
                            <li><strong>Kapasite:</strong><span>{{ $facility->capacity }}</span></li>
                            @endif
                            @if($facility->category)
                            <li><strong>Kategori:</strong><span>{{ $facility->category }}</span></li>
                            @endif
                            <li><strong>Durum:</strong><span>{{ $facility->status == 'active' ? 'Aktif' : 'Pasif' }}</span></li>
                            @if($facility->opening_date)
                            <li><strong>Açılış:</strong><span>{{ date('Y', strtotime($facility->opening_date)) }}</span></li>
                            @endif
                        </ul>
                    </div>

                    @if($facility->google_maps_link || ($facility->latitude && $facility->longitude))
                    <div class="widget location-widget">
                        <h3 class="widget-title">Tesis Konumu</h3>
                        <p>Tesisimizi ziyaret etmek için harita üzerinden konum bilgilerini görüntüleyin.</p>
                        
                        <!-- Leaflet Harita -->
                        @if($facility->latitude && $facility->longitude)
                        <div id="facilityLocationMap" style="height: 300px; width: 100%; border-radius: 10px; border: 1px solid #ddd; margin-bottom: 15px;"></div>
                        @endif
                        
                        <a href="{{ $facility->google_maps_link ?: 'https://maps.google.com/?q=' . $facility->latitude . ',' . $facility->longitude }}" target="_blank" class="theme-btn bg-success">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fa-solid fa-route"></i> Tesise Git</span>
                                <span class="effect-1"><i class="fa-solid fa-route"></i> Tesise Git</span>
                            </span>
                        </a>
                    </div>
                    @endif

                    <div class="widget contact-widget">
                        <h3 class="widget-title">Bilgi Almak İçin</h3>
                        <p>Tesislerimiz hakkında detaylı bilgi almak için bizimle iletişime geçin.</p>
                        <a href="{{ route('contact') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">İletişime Geç</span>
                                <span class="effect-1">İletişime Geç</span>
                            </span><i class="fa-regular fa-phone"></i>
                        </a>
                    </div>

                    @if($relatedFacilities->count() > 0)
                    <div class="widget related-projects-widget">
                        <h3 class="widget-title">Diğer Tesisler</h3>
                        <ul class="related-projects-list">
                            @foreach($relatedFacilities as $related)
                            <li>
                                <a href="{{ route('facilities.details', ['id' => $related->id]) }}">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    <span>{{ $related->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
CTA Bölümü
==============================-->
<section class="cta-section space bg-theme">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <h2 class="title text-white">Tesisimiz hakkında daha fazla bilgi almak ister misiniz?</h2>
                    <p class="text text-white">{{ $facility->name }} hakkında detaylı bilgi almak, ziyaret planlamak veya hizmetlerimizden yararlanmak için bizimle iletişime geçin.</p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                    <i class="fa-solid fa-phone"></i> İletişime Geç
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.project-results .result-item {
    background: #f8f9fa;
    padding: 30px 20px;
    border-radius: 8px;
    transition: all 0.3s;
}

.project-results .result-item:hover {
    background: var(--theme-color);
    color: white;
}

.project-results .result-item h4 {
    font-size: 36px;
    font-weight: bold;
    color: var(--theme-color);
    margin-bottom: 10px;
}

.project-results .result-item:hover h4 {
    color: white;
}

.working-hours-list li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.contact-info p {
    margin-bottom: 10px;
}

.related-projects-list li {
    margin-bottom: 15px;
}

.related-projects-list li a {
    display: flex;
    align-items: center;
    gap: 15px;
    color: var(--body-color);
    text-decoration: none;
}

.related-projects-list li a:hover {
    color: var(--theme-color);
}

.facility-gallery img {
    cursor: pointer;
    transition: transform 0.3s;
}

.facility-gallery img:hover {
    transform: scale(1.05);
}
</style>

@endsection

<!-- Image Modal -->
<div id="imageModal" class="image-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>
        <img id="modalImage" src="" alt="Tesis Fotoğrafı">
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

@if($facility->latitude && $facility->longitude)
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tesis koordinatları
    var facilityCoords = [{{ $facility->latitude }}, {{ $facility->longitude }}];
    
    // Harita oluştur
    var map = L.map('facilityLocationMap', {
        center: facilityCoords,
        zoom: 16,
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

    // Marker iconı
    var facilityIcon = L.divIcon({
        className: 'custom-facility-marker',
        html: '<div style="background: #007bff; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3); border: 3px solid white;"><i class="fa-solid fa-building" style="color: white; font-size: 16px;"></i></div>',
        iconSize: [35, 35],
        iconAnchor: [17.5, 17.5]
    });

    // Marker oluştur
    var marker = L.marker(facilityCoords, {icon: facilityIcon}).addTo(map);
    
    // Tesis bilgileri
    var facilityName = "{{ addslashes($facility->name) }}";
    var facilityCategory = "{{ addslashes($facility->category ?? 'Tesis') }}";
    var facilityAddress = "{{ addslashes($facility->address ?? '') }}";
    var facilityMapLink = "{{ $facility->google_maps_link ?: 'https://maps.google.com/?q=' . $facility->latitude . ',' . $facility->longitude }}";
    
    var popupContent = `
        <div style="text-align: center; min-width: 220px;">
            <h6 style="margin: 0 0 8px 0; color: #333;">${facilityName}</h6>
            <p style="margin: 0 0 8px 0; color: #666; font-size: 12px;">${facilityCategory}</p>
            ${facilityAddress ? '<p style="margin: 0 0 10px 0; color: #666; font-size: 11px;">' + facilityAddress + '</p>' : ''}
            <div style="margin-top: 10px;">
                <a href="${facilityMapLink}" target="_blank" 
                   style="background: #28a745; color: white; padding: 8px 16px; border-radius: 20px; text-decoration: none; font-size: 12px; font-weight: 500; display: inline-block;">
                    <i class="fa-solid fa-route" style="margin-right: 5px;"></i>Tesise Git
                </a>
            </div>
        </div>
    `;
    
    marker.bindPopup(popupContent);
    
    // Popup'ı otomatik aç
    marker.openPopup();
});
</script>
@endif