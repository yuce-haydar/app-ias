@extends('layouts.app')

@section('title', 'Hizmetlerimiz - Hatay İmar')
@section('description', 'Hatay İmar hizmetleri: Sosyal tesis işletmeciliği, parke taşı üretimi, büz üretimi ve inşaat hizmetleri.')

@section('content')

<div class="breadcrumb-wrapper" data-bg-src="{{ asset('assets/images/logo/a.jpeg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title">'</h1>
                    <div class="breadcrumb-link">
                        <span><a href="{{ route('home') }}">Anasayfa</a></span>
                        <i class="fas fa-chevron-right"></i>
                        <span>Hizmetlerimiz</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="service-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Hizmetlerimiz</div>
                    <h2 class="sec-title mb-60">Hatay İmar <span class="bold">Hizmet</span> Alanları</h2>
                    <p class="sec-text">Şehrimizin gelişimi için sunduğumuz kaliteli hizmetler.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- Sosyal Tesis İşletmeciliği -->
            <div class="col-lg-6 col-md-6">
                <div class="service-item style-modern">
                    <div class="service-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Sosyal Tesis" style="width: 100%; height: 300px; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <h3 class="service-title">Sosyal Tesis İşletmeciliği</h3>
                        <p class="service-text">Habib-i Neccar Sosyal Tesisimizde düğün, nişan, sünnet ve özel organizasyonlar için hizmet vermekteyiz. Modern tesisimizde ailenizin özel günlerini unutulmaz kılıyoruz.</p>
                        <ul class="service-features">
                            <li>500 kişilik kapalı salon</li>
                            <li>Açık hava organizasyon alanı</li>
                            <li>Profesyonel ses sistemi</li>
                            <li>Geniş otopark alanı</li>
                        </ul>
                                                    <a href="{{ route('facilities.index') }}" class="service-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Parke Taşı Üretimi -->
            <div class="col-lg-6 col-md-6">
                <div class="service-item style-modern">
                    <div class="service-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı" style="width: 100%; height: 300px; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fa-solid fa-cube"></i>
                        </div>
                        <h3 class="service-title">Parke Taşı Üretimi</h3>
                        <p class="service-text">Yüksek kaliteli parke taşı üretimi ile şehrimizin kaldırım ve yol yapımında kullanılmak üzere dayanıklı ve estetik ürünler sunuyoruz.</p>
                        <ul class="service-features">
                            <li>TSE standartlarında üretim</li>
                            <li>Çeşitli renk seçenekleri</li>
                            <li>Farklı boyut alternatifleri</li>
                            <li>Yüksek dayanıklılık</li>
                        </ul>
                        <a href="{{ route('project.details', ['id' => 4]) }}" class="service-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Büz Üretimi -->
            <div class="col-lg-6 col-md-6">
                <div class="service-item style-modern">
                    <div class="service-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretimi" style="width: 100%; height: 300px; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fa-solid fa-industry"></i>
                        </div>
                        <h3 class="service-title">Büz (Beton Boru) Üretimi</h3>
                        <p class="service-text">Altyapı projelerinde kullanılan beton borular (büz) üretimi yaparak şehrimizin kanalizasyon ve su altyapısına katkı sağlıyoruz.</p>
                        <ul class="service-features">
                            <li>Çeşitli çap seçenekleri</li>
                            <li>Yüksek basınç dayanımı</li>
                            <li>Uzun ömürlü malzeme</li>
                            <li>Çevre dostu üretim</li>
                        </ul>
                        <a href="{{ route('project.details', ['id' => 1]) }}" class="service-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Otopark İşletmeciliği -->
            <div class="col-lg-6 col-md-6">
                <div class="service-item style-modern">
                    <div class="service-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark" style="width: 100%; height: 300px; object-fit: cover; border-radius: 15px;">
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fa-solid fa-car"></i>
                        </div>
                        <h3 class="service-title">Katlı Otopark İşletmeciliği</h3>
                        <p class="service-text">Şehir merkezindeki katlı otoparkımız ile vatandaşlarımıza güvenli ve uygun fiyatlı park hizmeti sunmaktayız.</p>
                        <ul class="service-features">
                            <li>200 araçlık kapasite</li>
                            <li>24 saat güvenlik</li>
                            <li>Uygun fiyat tarifesi</li>
                            <li>Merkezi konum</li>
                        </ul>
                        <a href="{{ route('project.details', ['id' => 2]) }}" class="service-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hizmet Süreci -->
<section class="process-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Hizmet Sürecimiz</div>
                    <h2 class="sec-title mb-60">Nasıl <span class="bold">Çalışıyoruz?</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-handshake"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">İlk Görüşme</h4>
                    <p class="process-text">İhtiyaçlarınızı dinliyor ve en uygun çözümü belirliyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Planlama</h4>
                    <p class="process-text">Detaylı planlama yaparak en kaliteli hizmeti sunmaya hazırlanıyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-cogs"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">Uygulama</h4>
                    <p class="process-text">Deneyimli ekibimizle planladığımız hizmeti titizlikle uyguluyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-check-circle"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">Teslim</h4>
                    <p class="process-text">Kalite kontrolü yaparak hizmetimizi eksiksiz teslim ediyoruz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 