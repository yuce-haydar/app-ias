@extends('layouts.app')

@section('title', 'Başkanımız')
@section('description', 'Hatay İmar Sanayi A.Ş. yönetimi ve başkanımız hakkında bilgiler')

@section('content')

<!--==============================
Breadcrumb Area
==============================-->
<section class="breadcumb-wrapper bg-theme3" style="background-image: url('{{ asset('assets/images/bg-img/breadcrumb.jpg') }}');">
    <div class="container">
        <div class="page-title-area">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h2 class="text-white">Başkanımız</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Ana Sayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Başkanımız</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($chairmen->count() > 0)
    @foreach($chairmen as $chairman)
        <!--==============================
        Chairman Section
        ==============================-->
        <section class="chairman-section space bg-white">
            <div class="container">
                <div class="row align-items-start">
                    <!-- Sol Taraf - Başkanın Resmi -->
                    <div class="col-lg-5 col-md-6">
                        <div class="chairman-image">
                            <div class="chairman-image-wrapper">
                                <img src="{{ $chairman->main_image_url }}" alt="{{ $chairman->name }}" class="w-100">
                                <div class="chairman-badge">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sağ Taraf - Mesaj ve Bilgiler -->
                    <div class="col-lg-7 col-md-6">
                        <div class="chairman-content">
                            <div class="section-title">
                                <h2 class="title">{{ $chairman->name }}</h2>
                                <span class="sub-title">{{ $chairman->title }}</span>
                            </div>
                            
                            <div class="chairman-message">
                                <blockquote class="chairman-quote">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <div>{!! $chairman->formatted_message !!}</div>
                                </blockquote>
                            </div>
                            
                            @if($chairman->education || $chairman->experience)
                                <div class="chairman-info mt-4">
                                    <div class="row">
                                        @if($chairman->education)
                                            <div class="col-md-6 mb-3">
                                                <div class="info-box">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    <div class="info-content">
                                                        <h6>Eğitim</h6>
                                                        <p>{{ $chairman->education }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($chairman->experience)
                                            <div class="col-md-6 mb-3">
                                                <div class="info-box">
                                                    <i class="fas fa-briefcase"></i>
                                                    <div class="info-content">
                                                        <h6>Deneyim</h6>
                                                        <p>{{ $chairman->experience }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($chairman->gallery && count($chairman->gallery) > 0)
            <!--==============================
            Chairman Gallery
            ==============================-->
            <section class="gallery-section mt-50 bg-light mb-50">
                <div class="container">
                    <div class="title-area text-center mb-5">
                        <h3 class="sec-title">Fotoğraf Galerisi</h3>
                        <p class="sec-text">{{ $chairman->name }} ile ilgili çeşitli anlardan kareler</p>
                        <div class="gallery-stats">
                            <span class="badge bg-primary fs-6">
                                <i class="fas fa-images"></i> 
                                Toplam {{ count($chairman->gallery) }} Fotoğraf
                            </span>
                        </div>
                    </div>
                    
                    <div class="gallery-container">
                        <div class="row gy-30" id="gallery-grid">
                            @foreach($chairman->gallery_urls as $index => $image)
                                <div class="col-lg-4 col-md-6 gallery-item-wrapper {{ $index >= 6 ? 'gallery-hidden' : '' }}" 
                                     data-index="{{ $index }}">
                                    <div class="gallery-item">
                                        <div class="gallery-image">
                                            <img src="{{ $image }}" alt="{{ $chairman->name }} - {{ $index + 1 }}" class="w-100" loading="lazy">
                                            <div class="gallery-overlay">
                                                <a href="{{ $image }}" class="gallery-btn popup-image">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                                <div class="gallery-number">{{ $index + 1 }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if(count($chairman->gallery) > 6)
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-primary btn-lg" id="toggle-gallery" onclick="toggleGallery()">
                                    <i class="fas fa-images me-2"></i>
                                    <span id="toggle-text">Daha Fazla Göster ({{ count($chairman->gallery) - 6 }} Fotoğraf)</span>
                                    <i class="fas fa-chevron-down ms-2" id="toggle-icon"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        <!--==============================
        Biography Section
        ==============================-->
        <section class="biography-section space bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="biography-content">
                            <div class="title-area text-center mb-50">
                                <h3 class="sec-title">Özgeçmiş</h3>
                                <p class="sec-text">{{ $chairman->name }}'ün profesyonel yaşam hikayesi</p>
                            </div>
                            
                            <div class="biography-text">
                                {!! $chairman->formatted_biography !!}
                            </div>
                            
                            @if($chairman->achievements && count($chairman->achievements) > 0)
                                <div class="achievements-section mt-5">
                                    <h4 class="achievements-title">Başarılar ve Ödüller</h4>
                                    <ul class="achievements-list">
                                        @foreach($chairman->achievements as $achievement)
                                            <li>
                                                <i class="fas fa-award"></i>
                                                {{ $achievement }}
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
    @endforeach
@else
    <!--==============================
    No Chairman Section
    ==============================-->
    <section class="no-content-section space bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <i class="fas fa-user-tie fa-5x text-muted mb-4"></i>
                        <h3 class="text-muted">Başkan Bilgisi Bulunamadı</h3>
                        <p class="text-muted">Şu anda görüntülenecek başkan bilgisi bulunmamaktadır.</p>
                        <a href="{{ route('home') }}" class="theme-btn">
                            <span class="link-effect">
                                <span class="effect-1">Ana Sayfaya Dön</span>
                                <span class="effect-1">Ana Sayfaya Dön</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<style>
.chairman-section {
    padding: 80px 0;
}

.chairman-image {
    margin-bottom: 30px; /* Mobile için alt boşluk */
}

.chairman-image-wrapper {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

.chairman-image-wrapper img {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.chairman-image-wrapper:hover img {
    transform: scale(1.05);
}

.chairman-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: var(--theme-color);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.chairman-content .section-title .title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--title-color);
    margin-bottom: 10px;
    margin-top: 0; /* Üst margin'i sıfırla */
}

.chairman-content .section-title .sub-title {
    color: var(--theme-color);
    font-size: 1.2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.chairman-content .section-title {
    margin-bottom: 20px; /* Title ile mesaj arası boşluk */
}

.chairman-content {
    padding-top: 0; /* İçerik üst padding'ini sıfırla */
}

/* Desktop'ta perfect alignment için basit çözüm */
@media (min-width: 768px) {
    .chairman-content {
        padding-top: 0;
        margin-top: 0;
    }
    
    .chairman-content .section-title {
        margin-top: 0;
        padding-top: 0;
    }
}

.chairman-quote {
    position: relative;
    background: #f8f9fa;
    padding: 30px;
    border-radius: 15px;
    border-left: 5px solid var(--theme-color);
    margin: 30px 0;
}

.quote-icon {
    position: absolute;
    top: -10px;
    left: 20px;
    background: var(--theme-color);
    color: white;
    padding: 10px;
    border-radius: 50%;
    font-size: 18px;
}

.chairman-quote p {
    font-style: italic;
    font-size: 1.1rem;
    line-height: 1.8;
    margin: 0;
    color: #555;
}

.info-box {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.info-box:hover {
    transform: translateY(-5px);
}

.info-box i {
    font-size: 24px;
    color: var(--theme-color);
    min-width: 40px;
}

.info-content h6 {
    font-weight: 600;
    margin-bottom: 5px;
    color: var(--title-color);
}

.info-content p {
    margin: 0;
    color: #666;
}

.gallery-item {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.gallery-image {
    position: relative;
    overflow: hidden;
}

.gallery-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-item:hover .gallery-image img {
    transform: scale(1.1);
}

.gallery-btn {
    background: var(--theme-color);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 18px;
    transition: all 0.3s ease;
}

.gallery-btn:hover {
    background: white;
    color: var(--theme-color);
    transform: scale(1.1);
}

/* Yeni Gallery CSS'leri */
.gallery-hidden {
    display: none !important;
}

.gallery-stats {
    margin-top: 15px;
}

.gallery-stats .badge {
    padding: 8px 15px;
    font-size: 0.9rem;
    border-radius: 20px;
}

.gallery-number {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0,0,0,0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.gallery-container .btn {
    border-radius: 25px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid var(--theme-color);
}

.gallery-container .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.gallery-container .btn-outline-primary:hover {
    background: var(--theme-color);
    border-color: var(--theme-color);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOutDown {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(30px);
    }
}

.biography-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
}

.biography-text p {
    margin-bottom: 20px;
}

.achievements-title {
    color: var(--title-color);
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--theme-color);
    display: inline-block;
}

.achievements-list {
    list-style: none;
    padding: 0;
}

.achievements-list li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    display: flex;
    align-items: center;
    gap: 15px;
}

.achievements-list li:last-child {
    border-bottom: none;
}

.achievements-list i {
    color: var(--theme-color);
    font-size: 16px;
}

@media (max-width: 768px) {
    .chairman-content .section-title .title {
        font-size: 2rem;
    }
    
    .chairman-quote {
        padding: 20px;
    }
    
    .info-box {
        padding: 15px;
    }
    
    .gallery-image img {
        height: 200px;
    }
    
    .chairman-image {
        margin-bottom: 40px; /* Mobile'da daha fazla boşluk */
        text-align: center;
    }
    
    .chairman-content {
        text-align: left;
    }
    
    /* Gallery Mobile Responsive */
    .gallery-container .btn {
        width: 100%;
        margin-top: 20px;
    }
    
    .gallery-stats .badge {
        font-size: 0.8rem;
        padding: 6px 12px;
    }
    
    .gallery-number {
        font-size: 11px;
        padding: 3px 8px;
    }
    
    .gallery-item {
        margin-bottom: 20px;
    }
}
</style>

@endsection

@push('scripts')
<script>
// Fancybox for gallery
$(document).ready(function() {
    if (typeof $.fancybox !== 'undefined') {
        $(".popup-image").fancybox({
            buttons: ["zoom", "slideShow", "fullScreen", "download", "close"],
            loop: true,
            protect: true
        });
    }
});

function toggleGallery() {
    const grid = document.getElementById('gallery-grid');
    const hiddenItems = grid.querySelectorAll('.gallery-hidden');
    const toggleButton = document.getElementById('toggle-gallery');
    const isExpanded = hiddenItems.length === 0;

    if (!isExpanded) {
        // Gizli fotoğrafları göster
        hiddenItems.forEach((item, index) => {
            item.classList.remove('gallery-hidden');
            item.style.animation = `fadeInUp 0.5s ease ${index * 0.1}s forwards`;
        });
        toggleButton.innerHTML = `
            <i class="fas fa-images me-2"></i>
            <span>Daha Az Göster</span>
            <i class="fas fa-chevron-up ms-2"></i>
        `;
        toggleButton.classList.remove('btn-outline-primary');
        toggleButton.classList.add('btn-primary');
        
        // Yeni açılan ilk fotoğrafa scroll
        setTimeout(() => {
            const firstNewItem = grid.querySelector('.gallery-item-wrapper[data-index="6"]');
            if (firstNewItem) {
                firstNewItem.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }
        }, 300);
        
    } else {
        // Fazla fotoğrafları gizle (6'dan sonrakileri)
        const allItems = grid.querySelectorAll('.gallery-item-wrapper');
        const hiddenCount = allItems.length - 6;
        
        allItems.forEach((item, index) => {
            if (index >= 6) {
                item.style.animation = 'fadeOutDown 0.3s ease forwards';
                setTimeout(() => {
                    item.classList.add('gallery-hidden');
                }, 300);
            }
        });
        
        setTimeout(() => {
            toggleButton.innerHTML = `
                <i class="fas fa-images me-2"></i>
                <span>Daha Fazla Göster (${hiddenCount} Fotoğraf)</span>
                <i class="fas fa-chevron-down ms-2"></i>
            `;
            toggleButton.classList.remove('btn-primary');
            toggleButton.classList.add('btn-outline-primary');
            
            // Galeri başına smooth scroll
            document.querySelector('.gallery-section').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        }, 300);
    }
}
</script>
@endpush 