@extends('layouts.app')

@section('title', 'Tesislerimiz - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tüm tesisleri keşfedin.')
@section('keywords', 'hatay imar, tesisler, büz üretim, katlı otopark, sosyal tesis, parke taşı')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
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
            <!-- Büz Üretim Tesisi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/projeler/b1.jpg') }}" alt="Büz Üretim Tesisi">
                        <div class="date">
                            <span class="day">500</span>
                            <span class="month">Adet/Gün</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Üretim Tesisi</a></span>
                            <span class="category">2010'dan beri</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('facilities.details', ['id' => 1]) }}">Büz Üretim Tesisi</a>
                        </h4>
                        <p class="text">Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan kaliteli üretim tesisimiz. Günlük 500 adet üretim kapasitesi ile hizmet vermekteyiz.</p>
                        <div class="facility-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-industry"></i> 500 adet/gün</span>
                            <span class="stat-item"><i class="fa-solid fa-calendar"></i> 2010'dan beri</span>
                        </div>
                        <div class="facility-buttons">
                            <a href="{{ route('facilities.details', ['id' => 1]) }}" class="read-more me-3">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Büz+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Tesise Git
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Katlı Otopark -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/projeler/katlı-otopark.jpg') }}" alt="Katlı Otopark">
                        <div class="date">
                            <span class="day">300</span>
                            <span class="month">Araç</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Otopark Tesisi</a></span>
                            <span class="category">2005'ten beri</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('facilities.details', ['id' => 2]) }}">Katlı Otopark</a>
                        </h4>
                        <p class="text">2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan vatandaşlarımıza güvenli park hizmeti sunmaktadır.</p>
                        <div class="facility-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-car"></i> 300 araç kapasitesi</span>
                            <span class="stat-item"><i class="fa-solid fa-shield-halved"></i> 24/7 güvenlik</span>
                        </div>
                        <div class="facility-buttons">
                            <a href="{{ route('facilities.details', ['id' => 2]) }}" class="read-more me-3">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Katlı+Otopark+Antakya+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Tesise Git
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Habib-i Neccar Sosyal Tesis -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis">
                        <div class="date">
                            <span class="day">2013</span>
                            <span class="month">Yılında</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Sosyal Tesis</a></span>
                            <span class="category">Doğal Ortam</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('facilities.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a>
                        </h4>
                        <p class="text">2013 yılında faaliyete açılan sosyal tesisimiz, Habib-i Neccar Dağı eteklerinde doğayla iç içe bir ortamda ailece vakit geçirebileceğiniz huzurlu bir mekandır.</p>
                        <div class="facility-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-mountain"></i> Doğal ortam</span>
                            <span class="stat-item"><i class="fa-solid fa-utensils"></i> Restoran hizmeti</span>
                        </div>
                        <div class="facility-buttons">
                            <a href="{{ route('facilities.details', ['id' => 3]) }}" class="read-more me-3">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Habib-i+Neccar+Sosyal+Tesis+Antakya+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Tesise Git
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Parke Taşı Üretim Tesisi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/projeler/p1.jpg') }}" alt="Parke Taşı Üretim">
                        <div class="date">
                            <span class="day">50+</span>
                            <span class="month">Çeşit</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Üretim Tesisi</a></span>
                            <span class="category">TSE Belgeli</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('facilities.details', ['id' => 4]) }}">Parke Taşı Üretim Tesisi</a>
                        </h4>
                        <p class="text">Kullanımı çok eski çağlara dayanan parke taşı üretimimizde modern teknolojiler kullanarak 50'den fazla çeşitte kaliteli ürünler üretmekteyiz.</p>
                        <div class="facility-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-shapes"></i> 50+ çeşit</span>
                            <span class="stat-item"><i class="fa-solid fa-certificate"></i> TSE belgeli</span>
                        </div>
                        <div class="facility-buttons">
                            <a href="{{ route('facilities.details', ['id' => 4]) }}" class="read-more me-3">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Parke+Taşı+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Tesise Git
                            </a>
                        </div>
                    </div>
                </article>
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
                        <h3 class="counter-number">4</h3>
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