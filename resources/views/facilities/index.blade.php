@extends('layouts.app')

@section('title', 'Tesislerimiz - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tüm tesisleri keşfedin.')
@section('keywords', 'hatay imar, tesisler, büz üretim, katlı otopark, sosyal tesis, parke taşı')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Tesislerimiz</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('facilities.index') }}">Tesislerimiz</a></li>
                    <li>Tesislerimiz</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Tesisler Grid Bölümü
==============================-->
<section class="blog-section style-grid space bg-theme3">
    <div class="container">
        <!-- Başlık Bölümü -->
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-60">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Tesislerimiz</div>
                    <h2 class="sec-title">Şehrimize <span class="bold">Kazandırdığımız</span><br>Tesisler</h2>
                    <p class="sec-text">Hatay İmar olarak şehrimizin altyapı ve sosyal ihtiyaçlarını karşılamak için çeşitli tesisler işletmekteyiz. Kaliteli hizmet anlayışımızla vatandaşlarımıza hizmet vermeye devam ediyoruz.</p>
                </div>
            </div>
        </div>

        <div class="row gy-30">
            @foreach($facilities as $facility)
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                                                        <img src="{{ $facility->image_url }}" alt="{{ $facility->name }}">
                        <div class="date">
                            @if($facility->capacity)
                                @php
                                    $capacityParts = explode(' ', $facility->capacity);
                                @endphp
                                <span class="day">{{ $capacityParts[0] ?? '' }}</span>
                                <span class="month">{{ $capacityParts[1] ?? '' }}</span>
                            @else
                                <span class="day">{{ date('Y', strtotime($facility->opening_date)) }}</span>
                                <span class="month">Yılında</span>
                            @endif
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">{{ $facility->category }}</a></span>
                            <span class="category">{{ $facility->opening_date ? date('Y', strtotime($facility->opening_date)) . '\'den beri' : '' }}</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}">{{ $facility->name }}</a>
                        </h4>
                        <p class="text">{!! Str::limit($facility->description, 200) !!}</p>
                        <div class="facility-stats mb-3">
                            @if($facility->features && is_array($facility->features))
                                @foreach(array_slice($facility->features, 0, 2) as $feature)
                                    <span class="stat-item"><i class="fa-solid fa-check-circle"></i> {!! $feature !!}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="facility-buttons">
                            <a href="{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}" class="read-more me-3">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            @if($facility->google_maps_link || ($facility->latitude && $facility->longitude))
                                <a href="{{ $facility->google_maps_link ?: 'https://maps.google.com/?q=' . $facility->latitude . ',' . $facility->longitude }}" target="_blank" class="theme-btn btn-sm bg-success">
                                    <i class="fa-solid fa-route"></i> Tesise Git
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        
        <!-- Sayfalama -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="pagination-wrap">
                    {{ $facilities->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Tesisler İstatistikleri
==============================-->
<section class="counter-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-50">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Tesislerimizin Rakamları</div>
                    <h2 class="sec-title text-white">Sayılarla <span class="bold">Tesislerimiz</span></h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                    <div class="counter-content">
                                            <h3 class="counter-number">{{ $facilities->total() }}</h3>
                    <p class="counter-text">Aktif Tesis</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">15</h3>
                        <p class="counter-text">Yıllık Deneyim</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">50000</h3>
                        <p class="counter-text">Memnun Vatandaş</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">100</h3>
                        <p class="counter-text">Kalite Garantisi</p>
                    </div>
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
                    <h2 class="title text-white">Tesislerimiz hakkında daha fazla bilgi almak ister misiniz?</h2>
                    <p class="text text-white">Hatay İmar tesisleri hakkında detaylı bilgi almak, ziyaret planlamak veya hizmetlerimizden yararlanmak için bizimle iletişime geçin.</p>
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
/* Tesis Card Düzenleme Stilleri */
.blog-single-box {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-single-box .blog-thumb {
    height: 320px;
    overflow: hidden;
    position: relative;
}

.blog-single-box .blog-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.blog-single-box .blog-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-single-box .blog-content .text {
    flex: 1;
}

.facility-stats .stat-item {
    display: inline-block;
    margin-right: 15px;
    font-size: 13px;
    color: var(--body-color);
}

.facility-stats .stat-item i {
    color: var(--theme-color);
    margin-right: 5px;
}

.facility-buttons {
    margin-top: auto;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.theme-btn.bg-success {
    background-color: #28a745 !important;
    color: white !important;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 12px;
}

.theme-btn.bg-success:hover {
    background-color: #218838 !important;
}

.counter-section {
    background-color: var(--dark-color);
}

.counter-icon i {
    color: var(--theme-color);
    font-size: 48px;
    margin-bottom: 20px;
}

.counter-number {
    color: var(--theme-color);
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 10px;
}

.counter-text {
    color: var(--white-color);
    font-size: 16px;
}

.cta-section {
    background-color: var(--theme-color);
}

.blog-thumb .date {
    background-color: var(--theme-color);
}

.blog-thumb .date .day {
    color: var(--white-color);
    font-weight: bold;
}

.blog-thumb .date .month {
    color: var(--white-color);
    font-size: 11px;
}
</style>

@endsection 