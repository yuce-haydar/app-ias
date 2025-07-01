@extends('layouts.app')

@section('title', $facility->name . ' - Hatay İmar')
@section('description', $facility->short_description)

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
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
                        <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
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
                    {!! nl2br(e($facility->description)) !!}

                    @if($facility->features && is_array($facility->features) && count($facility->features) > 0)
                    <h3 class="mt-4">Tesis Özellikleri</h3>
                    <ul class="project-objectives">
                        @foreach($facility->features as $feature)
                        <li>{{ $feature }}</li>
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
                            @foreach($facility->gallery_urls as $image)
                            <div class="col-md-4">
                                <img src="{{ $image }}" alt="{{ $facility->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
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
                        <h3 class="widget-title">Tesise Git</h3>
                        <p>Tesisimizi ziyaret etmek için harita üzerinden konum bilgilerini görüntüleyin.</p>
                        <a href="{{ $facility->google_maps_link ?: 'https://maps.google.com/?q=' . $facility->latitude . ',' . $facility->longitude }}" target="_blank" class="theme-btn bg-success mb-3">
                            <span class="link-effect">
                                <span class="effect-1">Haritada Göster</span>
                                <span class="effect-1">Haritada Göster</span>
                            </span><i class="fa-solid fa-location-dot"></i>
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