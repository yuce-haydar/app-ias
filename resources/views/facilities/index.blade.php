@extends('layouts.app')

@section('title', 'Tesislerimiz - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tüm tesisleri keşfedin.')
@section('keywords', 'hatay imar, tesisler, büz üretim, katlı otopark, sosyal tesis, parke taşı')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
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
    Tesisler Bölümü
==============================-->
<section class="project-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Tesislerimiz</div>
                    <h2 class="sec-title mb-60">Şehrimize <span class="bold">Kazandırdığımız</span><br>Tesisler</h2>
                    <p class="sec-text">Hatay İmar olarak şehrimizin altyapı ve sosyal ihtiyaçlarını karşılamak için çeşitli tesisler işletmekteyiz. Kaliteli hizmet anlayışımızla vatandaşlarımıza hizmet vermeye devam ediyoruz.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- Büz Üretim Tesisi -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Üretim Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('facilities.details', ['id' => 1]) }}">Büz Üretim Tesisi</a></h4>
                                <p class="project-text">Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan kaliteli üretim tesisimiz. Günlük 500 adet üretim kapasitesi.</p>
                                <div class="project-stats">
                                    <span><i class="fa-solid fa-industry"></i> 500 adet/gün</span>
                                    <span><i class="fa-solid fa-calendar"></i> 2010'dan beri</span>
                                </div>
                                <div class="project-buttons mt-20">
                                    <a href="{{ route('facilities.details', ['id' => 1]) }}" class="theme-btn btn-sm me-2">
                                        <i class="fa-solid fa-info-circle"></i> Detayları Gör
                                    </a>
                                    <a href="https://maps.google.com/?q=Büz+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn bg-success btn-sm">
                                        <i class="fa-solid fa-location-dot"></i> Tesise Git
                                    </a>
                                </div>
                                <a href="{{ route('facilities.details', ['id' => 1]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Katlı Otopark -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Otopark Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('facilities.details', ['id' => 2]) }}">Katlı Otopark</a></h4>
                                <p class="project-text">2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan vatandaşlarımıza güvenli park hizmeti sunmaktadır.</p>
                                <div class="project-stats">
                                    <span><i class="fa-solid fa-car"></i> 300 araç kapasitesi</span>
                                    <span><i class="fa-solid fa-shield-halved"></i> 24/7 güvenlik</span>
                                </div>
                                <div class="project-buttons mt-20">
                                    <a href="{{ route('facilities.details', ['id' => 2]) }}" class="theme-btn btn-sm me-2">
                                        <i class="fa-solid fa-info-circle"></i> Detayları Gör
                                    </a>
                                    <a href="https://maps.google.com/?q=Katlı+Otopark+Antakya+Hatay" target="_blank" class="theme-btn bg-success btn-sm">
                                        <i class="fa-solid fa-location-dot"></i> Tesise Git
                                    </a>
                                </div>
                                <a href="{{ route('facilities.details', ['id' => 2]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Habib-i Neccar Sosyal Tesis -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Sosyal Tesis</span>
                                <h4 class="project-title"><a href="{{ route('facilities.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a></h4>
                                <p class="project-text">2013 yılında faaliyete açılan sosyal tesisimiz, Habib-i Neccar Dağı eteklerinde doğayla iç içe bir ortamda ailece vakit geçirebileceğiniz huzurlu bir mekandır.</p>
                                <div class="project-stats">
                                    <span><i class="fa-solid fa-mountain"></i> Doğal ortam</span>
                                    <span><i class="fa-solid fa-utensils"></i> Restoran hizmeti</span>
                                </div>
                                <div class="project-buttons mt-20">
                                    <a href="{{ route('facilities.details', ['id' => 3]) }}" class="theme-btn btn-sm me-2">
                                        <i class="fa-solid fa-info-circle"></i> Detayları Gör
                                    </a>
                                    <a href="https://maps.google.com/?q=Habib-i+Neccar+Sosyal+Tesis+Antakya+Hatay" target="_blank" class="theme-btn bg-success btn-sm">
                                        <i class="fa-solid fa-location-dot"></i> Tesise Git
                                    </a>
                                </div>
                                <a href="{{ route('facilities.details', ['id' => 3]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Parke Taşı Üretim -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Üretim Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('facilities.details', ['id' => 4]) }}">Parke Taşı Üretim Tesisi</a></h4>
                                <p class="project-text">Kullanımı çok eski çağlara dayanan parke taşı üretimimizde modern teknolojiler kullanarak 50'den fazla çeşitte kaliteli ürünler üretmekteyiz.</p>
                                <div class="project-stats">
                                    <span><i class="fa-solid fa-shapes"></i> 50+ çeşit</span>
                                    <span><i class="fa-solid fa-certificate"></i> TSE belgeli</span>
                                </div>
                                <div class="project-buttons mt-20">
                                    <a href="{{ route('facilities.details', ['id' => 4]) }}" class="theme-btn btn-sm me-2">
                                        <i class="fa-solid fa-info-circle"></i> Detayları Gör
                                    </a>
                                    <a href="https://maps.google.com/?q=Parke+Taşı+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn bg-success btn-sm">
                                        <i class="fa-solid fa-location-dot"></i> Tesise Git
                                    </a>
                                </div>
                                <a href="{{ route('facilities.details', ['id' => 4]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
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
                        <h3 class="counter-number">70+</h3>
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
                        <h3 class="counter-number">10000+</h3>
                        <p class="counter-text">Memnun Vatandaş</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">%100</h3>
                        <p class="counter-text">Kalite Garantisi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hizmet Alanlarımız
==============================-->
<section class="service-overview-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Hizmet Alanlarımız</div>
                    <h2 class="sec-title mb-60">Tesislerimizde Sunduğumuz <span class="bold">Hizmetler</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4 col-md-6">
                <div class="service-overview-item text-center">
                    <div class="service-icon">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                    <h4 class="service-title">Üretim Hizmetleri</h4>
                    <p class="service-text">Büz ve parke taşı üretimimizde modern teknolojiler kullanarak kaliteli ürünler üretiyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-overview-item text-center">
                    <div class="service-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <h4 class="service-title">Otopark Hizmetleri</h4>
                    <p class="service-text">Güvenli ve modern otopark hizmetimizle araçlarınız için huzurlu park imkanı sunuyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-overview-item text-center">
                    <div class="service-icon">
                        <i class="fa-solid fa-mountain"></i>
                    </div>
                    <h4 class="service-title">Sosyal Tesis Hizmetleri</h4>
                    <p class="service-text">Doğal ortamda ailece vakit geçirebileceğiniz sosyal aktivite alanları sunuyoruz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    İletişim CTA
==============================-->
<section class="cta-section bg-dark">
    <div class="container">
        <div class="cta-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content">
                        <h3 class="title">Tesislerimiz hakkında daha fazla bilgi almak ister misiniz?</h3>
                        <p class="text">Tesislerimizin detayları, hizmet saatleri ve fiyat bilgileri için bizimle iletişime geçin.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">İletişime Geç</span>
                            <span class="effect-1">İletişime Geç</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 