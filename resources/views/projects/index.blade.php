@extends('layouts.app')

@section('title', 'Projelerimiz - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tamamlanan projeler ve devam eden çalışmalarımız.')
@section('keywords', 'hatay imar, projeler, büz üretim, katlı otopark, sosyal tesis, parke taşı, tamamlanan projeler')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Projelerimiz</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>Projelerimiz</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Projeler Grid Bölümü
==============================-->
<section class="blog-section style-grid space bg-theme3">
    <div class="container">
        <!-- Başlık Bölümü -->
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-60">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Projelerimiz</div>
                    <h2 class="sec-title">Şehrimize <span class="bold">Kazandırdığımız</span><br>Projeler</h2>
                    <p class="sec-text">Hatay İmar olarak şehrimizin kalkınması ve vatandaşlarımızın yaşam kalitesinin artması için hayata geçirdiğimiz projelerimizi keşfedin. Her proje, şehrimizin geleceğine yaptığımız yatırımdır.</p>
                </div>
            </div>
        </div>

        <div class="row gy-30">
            <!-- Büz Üretim Tesisi Projesi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi Projesi">
                        <div class="date">
                            <span class="day">2010</span>
                            <span class="month">Yılında</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Üretim Tesisi</a></span>
                            <span class="category">Tamamlandı</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 1]) }}">Büz Üretim Tesisi Projesi</a>
                        </h4>
                        <p class="text">Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimizin üretildiği modern tesisimiz. Günlük 500 adet üretim kapasitesi ile şehrimizin altyapı ihtiyaçlarını karşılıyor.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-calendar-check"></i> 2010 yılında tamamlandı</span>
                            <span class="stat-item"><i class="fa-solid fa-industry"></i> 500 adet/gün kapasite</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 1]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Büz+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Konumu Gör
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Katlı Otopark Projesi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark Projesi">
                        <div class="date">
                            <span class="day">2005</span>
                            <span class="month">Yılında</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Altyapı Projesi</a></span>
                            <span class="category">Tamamlandı</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 2]) }}">Katlı Otopark Projesi</a>
                        </h4>
                        <p class="text">Şehir merkezindeki park sorununun çözümü için hayata geçirilen katlı otopark projemiz. 300 araç kapasitesi ile vatandaşlarımıza güvenli park hizmeti sunuyor.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-calendar-check"></i> 2005 yılında tamamlandı</span>
                            <span class="stat-item"><i class="fa-solid fa-car"></i> 300 araç kapasitesi</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 2]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Katlı+Otopark+Antakya+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Konumu Gör
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Habib-i Neccar Sosyal Tesis Projesi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis Projesi">
                        <div class="date">
                            <span class="day">2013</span>
                            <span class="month">Yılında</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Sosyal Proje</a></span>
                            <span class="category">Tamamlandı</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis Projesi</a>
                        </h4>
                        <p class="text">Habib-i Neccar Dağı eteklerinde doğayla iç içe bir sosyal tesis projesi. Aileler için piknik alanları, restoran ve rekreasyon imkanları sunuyor.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-calendar-check"></i> 2013 yılında tamamlandı</span>
                            <span class="stat-item"><i class="fa-solid fa-mountain"></i> Doğal ortam</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 3]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Habib-i+Neccar+Sosyal+Tesis+Antakya+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Konumu Gör
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Parke Taşı Üretim Tesisi Projesi -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim Tesisi Projesi">
                        <div class="date">
                            <span class="day">2008</span>
                            <span class="month">Yılında</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Üretim Tesisi</a></span>
                            <span class="category">Tamamlandı</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 4]) }}">Parke Taşı Üretim Tesisi Projesi</a>
                        </h4>
                        <p class="text">Modern teknolojilerle donatılmış parke taşı üretim tesisimiz. 50'den fazla çeşitte kaliteli parke taşı üretimi yaparak şehrimizin estetik ihtiyaçlarını karşılıyor.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-calendar-check"></i> 2008 yılında tamamlandı</span>
                            <span class="stat-item"><i class="fa-solid fa-shapes"></i> 50+ çeşit üretim</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 4]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="https://maps.google.com/?q=Parke+Taşı+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn btn-sm bg-success">
                                <i class="fa-solid fa-location-dot"></i> Konumu Gör
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Yeni Proje 1 - Kentsel Dönüşüm -->
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje8.jpeg') }}" alt="Kentsel Dönüşüm Projesi">
                        <div class="date">
                            <span class="day">2024</span>
                            <span class="month">Devam Ediyor</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Kentsel Dönüşüm</a></span>
                            <span class="category">Devam Ediyor</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 5]) }}">Kentsel Dönüşüm Projesi</a>
                        </h4>
                        <p class="text">Şehrimizin tarihi dokusunu koruyarak modern yaşam standartlarına kavuşturan kapsamlı kentsel dönüşüm projemiz. Deprem sonrası yeniden yapılanma çalışmaları.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-hammer"></i> Devam ediyor</span>
                            <span class="stat-item"><i class="fa-solid fa-building"></i> 500 konut</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 5]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="#" class="theme-btn btn-sm bg-warning">
                                <i class="fa-solid fa-clock"></i> Devam Ediyor
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Yeni Proje 2 - Spor Kompleksi -->
            <div class="col-lg-6 col-md-6 ">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje9.jpeg') }}" alt="Spor Kompleksi Projesi">
                        <div class="date">
                            <span class="day">2024</span>
                            <span class="month">Planlanıyor</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">Spor Tesisi</a></span>
                            <span class="category">Planlama Aşaması</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => 6]) }}">Modern Spor Kompleksi Projesi</a>
                        </h4>
                        <p class="text">Gençlerimiz ve sporseverler için modern spor kompleksi projemiz. Futbol sahası, basketbol kortları, yüzme havuzu ve fitness merkezi içerecek.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-clipboard-list"></i> Planlama aşaması</span>
                            <span class="stat-item"><i class="fa-solid fa-dumbbell"></i> Çok amaçlı</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => 6]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <a href="#" class="theme-btn btn-sm bg-info">
                                <i class="fa-solid fa-lightbulb"></i> Planlama
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!--==============================
Proje İstatistikleri
==============================-->
<section class="counter-section space bg-dark mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-50">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Proje İstatistiklerimiz</div>
                    <h2 class="sec-title text-white">Sayılarla <span class="bold">Projelerimiz</span></h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-project-diagram"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">6</h3>
                        <p class="counter-text">Toplam Proje</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-check-circle"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">4</h3>
                        <p class="counter-text">Tamamlanan Proje</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-hammer"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">1</h3>
                        <p class="counter-text">Devam Eden Proje</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item text-center">
                    <div class="counter-icon">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">1</h3>
                        <p class="counter-text">Planlanan Proje</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Proje Süreci
==============================-->


<!--==============================
CTA Bölümü
==============================-->

<style>
.project-stats .stat-item {
    display: inline-block;
    margin-right: 15px;
    font-size: 13px;
    color: var(--body-color);
}

.project-stats .stat-item i {
    color: var(--theme-color);
    margin-right: 5px;
}

.project-buttons {
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

.theme-btn.bg-warning {
    background-color: #ffc107 !important;
    color: #212529 !important;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 12px;
}

.theme-btn.bg-warning:hover {
    background-color: #e0a800 !important;
}

.theme-btn.bg-info {
    background-color: #17a2b8 !important;
    color: white !important;
    padding: 8px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 12px;
}

.theme-btn.bg-info:hover {
    background-color: #138496 !important;
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

.service-overview-item {
    padding: 40px 20px;
    background: var(--white-color);
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.service-overview-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.service-icon i {
    color: var(--theme-color);
    font-size: 48px;
    margin-bottom: 20px;
}

.service-title {
    color: var(--title-color);
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
}

.service-text {
    color: var(--body-color);
    font-size: 14px;
    line-height: 1.6;
}
</style>

@endsection 