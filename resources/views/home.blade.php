@extends('layouts.app')



@section('title', 'Ana Sayfa - Hatay İmar')
@section('description', 'Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.')
@section('keywords', 'hatay imar, belediye, sosyal tesis, parke taşı, büz üretim, katlı otopark, antakya')

@section('content')

<style>
.simple-project-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    text-align: center;
}

.simple-project-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.simple-project-item .project-image {
    position: relative;
    overflow: hidden;
}

.simple-project-item .project-image img {
    transition: all 0.3s ease;
}

.simple-project-item:hover .project-image img {
    transform: scale(1.05);
}

.simple-project-item .project-title {
    padding: 20px 15px;
}

.simple-project-item .project-title h4 {
    margin: 0;
    color: #333;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.4;
}

/* Harita stilleri */
.leaflet-popup-content {
    text-align: center;
}

.leaflet-popup-content h5 {
    margin: 0 0 8px 0;
    color: #333;
    font-size: 16px;
}

.leaflet-popup-content p {
    margin: 0 0 10px 0;
    color: #666;
    font-size: 13px;
}

/* İletişim CTA Stilleri */
.contact-cta-item {
    background: white;
    padding: 40px 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.contact-cta-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.contact-cta-item .cta-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(45deg, #007bff, #0056b3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    font-size: 35px;
    color: white;
}

.contact-cta-item .cta-content h4 {
    margin: 0 0 15px 0;
    color: #333;
    font-size: 24px;
    font-weight: 600;
}

.contact-cta-item .cta-content p {
    color: #666;
    margin: 0 0 25px 0;
    line-height: 1.6;
}

.baslik{
    color: #cf9f38 !important;
    text-decoration: none;
    transition: color 0.3s ease;
}
</style>

<!--==============================
Hero Bölümü
==============================-->
<section class="hero-section style-6 mx-30 nhb-br-0 lg-mx-0 mt-30 lg-mt-0">
    <div class="hero-scroll smooth">
        <a href="#about-section" id="scrollLink">
            <div class="scroll-me">Aşağı Kaydır</div>
            <div class="hero-social_arrow">
                <img src="{{ asset('assets/images/icons/arrow-down-long.png') }}" alt="">
            </div>
        </a>
    </div>
    <div class="p-top-right wow slideInDown" data-wow-delay="500ms" data-wow-duration="1000ms">
        <img src="{{ asset('assets/images/banner/home4-shape01.png') }}" alt="şekil">
    </div>
    <div class="hero-slider-6 swiper">
        <div class="swiper-wrapper">
            <!-- İSK Kapalı Spor ve Yarı Olimpik Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/5.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">İskenderun<br><span>Kapalı Spor</span> ve<br>Yarı Olimpik Havuz<br>Kompleksi</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>Modern spor tesisleri ile şehrimizin spor altyapısını<br>
                                        güçlendiriyoruz. Uluslararası standartlarda havuz kompleksi.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/4.jpg') }}" alt="İSK Spor Kompleksi" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kırıkhan Butik Yarı Olimpik Yüzme Havuzu Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/8f716ef6-3ea1-4442-85c9-df8c033a7eee.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Kırıkhan<br><span>Butik Yarı Olimpik</span><br>Yüzme Havuzu</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>1500 m² alana sahip, 25x12,5 m ölçülerinde 5 kulvarlı<br>
                                        butik yüzme havuzu ile 200 kişilik kapasiteye sahip modern tesis.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/290e33ae-a63c-4c20-b17a-63936fdf517a.jpg') }}" alt="Kırıkhan Yüzme Havuzu" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Halısaha Render Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/halısaha-render/WhatsApp Image 2024-11-20 at 10.22.05.jpeg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Modern<br><span>Halısaha</span><br>Kompleksi</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>Gençlerimizin sporla buluşması için modern halısaha<br>
                                        tesisleri inşa ediyoruz. Kaliteli spor altyapısı.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/halısaha-render/WhatsApp Image 2024-11-20 at 10.22.00.jpeg') }}" alt="Halısaha Kompleksi" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kırıkhan Külliye Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/kirkhan-kulliye/K (9).jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Kırıkhan<br><span>Külliye</span><br>Projesi</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>Kültürel ve dini değerlerimizi koruyan<br>
                                        modern külliye kompleksi ile manevi ihtiyaçları karşılıyoruz.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/kirkhan-kulliye/K (4).jpg') }}" alt="Kırıkhan Külliye" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Belen Bedesten Meydan Projesi Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.58.jpeg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Belen<br><span>Bedesten Meydan</span><br>Projesi</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>2500 m² alanda 15 bölümlü modern bedesten projesi.<br>
                                        Fırın, restoran, market, muhtarlık ve sosyal donatılarla hizmet verecek.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.58 (1).jpeg') }}" alt="Belen Bedesten Meydan Projesi" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 200 Kişilik Yarı Olimpik Slide -->
            <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">200 Kişilik<br><span>Yarı Olimpik</span><br>Altınözü Havuzu</h1>
                                <div class="text">
                                    <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                    <p>Altınözü ilçemize modern yüzme havuzu kompleksi<br>
                                        ile spor faaliyetlerini destekliyoruz.
                                    </p>
                                </div>
                                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Projelerimizi İncele</span>
                                        <span class="effect-1">Projelerimizi İncele</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="hero-right">
                                <div class="image-box">
                                    <img src="{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/dfc99099-3568-430c-af5e-d36439aabf6f.jpg') }}" alt="Yarı Olimpik Havuz" style="width: 100%; height: auto; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
   
</section>
<!--======== / Hero Bölümü ========-->

<!--==============================
Hakkımızda Bölümü
==============================-->
<section class="about-section style-6 space overflow-hidden bg-theme3" id="about-section">
    <div class="container">
        <div class="row gy-50">
            <div class="col-lg-6">
                <div class="about-thumb-area mr-60 xl-mr-0">
                    <div class="about-slider swiper" style="height: 400px; overflow: hidden;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="about-slide_thumb" style="height: 350px; overflow: hidden; border-radius: 10px;">
                                    <img src="{{ asset('assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/5.jpg') }}" alt="İSK Spor Kompleksi" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb" style="height: 350px; overflow: hidden; border-radius: 10px;">
                                    <img src="{{ asset('assets/images/projeler/kirkhan-kulliye/K (9).jpg') }}" alt="Kırıkhan Külliye Projesi" style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg') }}" alt="Sebze Hali Projesi">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/halısaha-render/WhatsApp Image 2024-11-20 at 10.22.05.jpeg') }}" alt="Halısaha Projesi">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/kres/KRES1 (1).jpg') }}" alt="Kreş Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg') }}" alt="Yüzme Havuzu Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg') }}" alt="Çok Amaçlı Projeler">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg') }}" alt="Taziye Evi Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay9.jpeg') }}" alt="Hatay Otopark Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay10.jpeg') }}" alt="Hatay İnşaat Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay11.jpeg') }}" alt="Hatay Gelişim Alanları">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay12.jpeg') }}" alt="Hatay Şehir Planlaması">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay13.jpeg') }}" alt="Hatay Yeşil Alanlar">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay14.jpeg') }}" alt="Hatay Ulaşım Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay15.jpeg') }}" alt="Hatay Kültür Merkezleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay16.jpeg') }}" alt="Hatay Park Alanları">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay17.jpeg') }}" alt="Hatay Spor Tesisleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay18.jpeg') }}" alt="Hatay Eğitim Tesisleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay19.jpeg') }}" alt="Hatay Sağlık Tesisleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay20.jpeg') }}" alt="Hatay Turizm Alanları">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay21.jpeg') }}" alt="Hatay Tarih ve Gelecek">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay22.jpeg') }}" alt="Hatay İmar Çalışmaları">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay23.jpeg') }}" alt="Hatay Belediye Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay24.jpeg') }}" alt="Hatay Gelecek Vizyonu">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay25.jpeg') }}" alt="Hatay Teknoloji Merkezi">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay26.jpeg') }}" alt="Hatay Sanayi Bölgesi">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay27.jpeg') }}" alt="Hatay Ticaret Merkezi">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay28.jpeg') }}" alt="Hatay Çevre Projeleri">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay29.jpeg') }}" alt="Hatay Sürdürülebilir Kalkınma">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay30.jpeg') }}" alt="Hatay Akıllı Şehir">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay31.jpeg') }}" alt="Hatay Kentsel Dönüşüm">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay32.jpeg') }}" alt="Hatay Geleceğe Hazırlık">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="about-slide_thumb">
                                    <img src="{{ asset('assets/images/imageshatay/hatay33.jpeg') }}" alt="Hatay Toplumsal Projeler">
                                </div>
                            </div>
                        </div>
                        <div class="array-button">
                            <button class="array-prev"><i class="fa-light fa-arrow-left-long"></i></button>
                            <button class="array-next active"><i class="fa-light fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-wrapper">
                    <div class="title-area two">
                        <div class="sub-title"><span><i class="asterisk"></i></span>Hayata Geçirdiğimiz Projeler</div>
                        <h2 class="sec-title mb-25">Hatay'ın <span class="bold">Geleceğini</span><br>İnşa Ediyoruz!</h2>
                        <p class="sec-text text-gray">15 ilçede eş zamanlı yürüttüğümüz projelerle<br>
                            Hatay'ın spor, sosyal ve kültürel altyapısını güçlendiriyoruz.</p>
                    </div>
                    <div class="feature-list">
                        <div class="feature-item">
                            <div class="icon"><i class="flaticon-service"></i></div>
                            <p>Modern Spor Tesisleri</p>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="flaticon-people"></i></div>
                            <p>Sosyal ve Kültürel Projeler</p>
                        </div>
                    </div>
                    <div class="pt-35 pb-25">
                        <div class="border"><span class="bar"></span></div>
                    </div>
                    <ul class="features-list">
                        <li>13 farklı projede eş zamanlı çalışma</li>
                        <li>Yarı olimpik yüzme havuzları</li>
                        <li>Modern halısaha ve spor kompleksleri</li>
                        <li>Kreş ve eğitim tesisleri</li>
                        <li>Taziye evleri ve sosyal tesisler</li>
                    </ul>
                    <a href="{{ route('projects') }}" class="theme-btn bg-dark mt-35">
                        <span class="link-effect">
                            <span class="effect-1">Projelerimizi İncele</span>
                            <span class="effect-1">Projelerimizi İncele</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="p-top-right wow slideInRight"><img src="{{ asset('assets/images/choose/shape01.png') }}" alt="hakkımızda şekli"></div>
    <div class="p-bottom-right wow img-anim-right"><img src="{{ asset('assets/images/about/hm6-about-line.png') }}" alt="hakkımızda şekli"></div>
</section>

<!--==============================
Vizyon Misyon Bölümü
==============================-->
<section class="mission-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Misyon & Vizyon</div>
                    <h2 class="sec-title mb-60">Geleceğe Yönelik <span class="bold">Hedeflerimiz</span></h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            <div class="col-lg-6">
                <div class="mission-box">
                    <div class="icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div class="content">
                        <h4>Misyonumuz</h4>
                        <p>Hatay İmar olarak, şehrimizin sosyal, kültürel ve ekonomik gelişimine katkıda bulunmak, kaliteli hizmet sunarak vatandaşlarımızın yaşam kalitesini artırmak ve sürdürülebilir kalkınma ilkelerine uygun projeler geliştirmektir.</p>
                        <p>Özverili çalışma anlayışımızla, şehrimize değer katacak tesisler inşa etmek ve işletmek, üretim faaliyetlerimizle yerel ekonomiye katkı sağlamaktır.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-box">
                    <div class="icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="content">
                        <h4>Vizyonumuz</h4>
                        <p>Hatay'ın tarihi ve kültürel mirasını koruyarak, modern yaşam standartlarını şehrimize kazandıran, örnek bir belediye kuruluşu olmaktır.</p>
                        <p>Teknolojik gelişmeleri takip ederek, çevre dostu ve sürdürülebilir projelerle Hatay'ı geleceğe taşıyan, bölgede lider konumda bir kuruluş olmayı hedefliyoruz.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Tamamlanan Tesisler Bölümü
==============================-->
<section class="service-section style-6 space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Tamamlanan Tesisler</div>
                    <h2 class="sec-title text-white mb-60">Şehrimize <span class="bold">Kazandırdığımız</span><br>Tesisler</h2>
                </div>
            </div>
        </div>
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="service-item style-6">
                    <div class="service-thumb mb-20">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="service-icon">
                        <i class="flaticon-factory"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title" style="height: 50px;"><a href="{{ route('project.details', ['id' => 1]) }}" style="text-decoration: none; color: #ffc107;">Büz Üretim Tesisi</a></h4>
                        <p class="service-text">Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan...</p>
                        <a href="{{ route('project.details', ['id' => 1]) }}" class="service-link mb-15">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('project.details', ['id' => 1]) }}" class="theme-btn bg-color10 btn-sm">
                            <span class="link-effect">
                                <span class="effect-1">Devamını Oku</span>
                                <span class="effect-1">Devamını Oku</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item style-6">
                    <div class="service-thumb mb-20">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="service-icon">
                        <i class="flaticon-parking"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title" style="height: 50px; display: flex; align-items: center;"><a href="{{ route('project.details', ['id' => 2]) }}" style="text-decoration: none; color: #ffc107;">Katlı Otopark</a></h4>
                        <p class="service-text">2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan...</p>
                        <a href="{{ route('project.details', ['id' => 2]) }}" class="service-link mb-15">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('project.details', ['id' => 2]) }}" class="theme-btn bg-color10 btn-sm">
                            <span class="link-effect">
                                <span class="effect-1">Devamını Oku</span>
                                <span class="effect-1">Devamını Oku</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item style-6">
                    <div class="service-thumb mb-20">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="service-icon">
                        <i class="flaticon-mountain"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title" style="height: 50px; display: flex; align-items: center;"><a href="{{ route('project.details', ['id' => 3]) }}" style="text-decoration: none; color: #ffc107;">Habib-i Neccar<br>Sosyal Tesis</a></h4>
                        <p class="service-text">2013 yılında faaliyete açıldı. Habib-i Neccar Dağı Eteklerinde İzmir Caddesi'nde, Antakyalıların ailece ziyaret edebilecekleri...</p>
                        <a href="{{ route('project.details', ['id' => 3]) }}" class="service-link mb-15">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('project.details', ['id' => 3]) }}" class="theme-btn bg-color10 btn-sm">
                            <span class="link-effect">
                                <span class="effect-1">Devamını Oku</span>
                                <span class="effect-1">Devamını Oku</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="service-item style-6">
                    <div class="service-thumb mb-20">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="service-icon">
                        <i class="flaticon-brick"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title" style="height: 50px; display: flex; align-items: center;"><a href="{{ route('project.details', ['id' => 4]) }}" style="text-decoration: none; color: #ffc107;">Parke Taşı Üretim</a></h4>
                        <p class="service-text">Kullanımı çok eski çağlara dayanan parke taşı: taşın yontulup şekle konulması veya mevcut şekliyle montajının yapılması...</p>
                        <a href="{{ route('project.details', ['id' => 4]) }}" class="service-link mb-15">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('project.details', ['id' => 4]) }}" class="theme-btn bg-color10 btn-sm">
                            <span class="link-effect">
                                <span class="effect-1">Devamını Oku</span>
                                <span class="effect-1">Devamını Oku</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-50">
                                        <a href="{{ route('facilities.index') }}" class="theme-btn bg-color10">
                <span class="link-effect">
                    <span class="effect-1">Tüm Tesisleri Gör</span>
                    <span class="effect-1">Tüm Tesisleri Gör</span>
                </span><i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<!--==============================
Hatay Şehri Bölümü
==============================-->
<section class="about-section style-7 space bg-theme3">
    <div class="container">
        <div class="row gy-50 align-items-center">
            <div class="col-lg-6">
                <div class="about-content-wrapper">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>İnşaat ve Yapı Uzmanlığımız</div>
                        <h2 class="sec-title mb-25">Modern İnşaat<br><span class="bold">Teknolojileri</span> ile</h2>
                        <p class="sec-text">Hatay İmar olarak 15 yılı aşkın tecrübemizle, modern inşaat teknolojilerini kullanarak şehrimizin altyapısını güçlendiriyoruz. Çelik konstrüksiyon, betonarme yapılar ve prefabrik sistemler konularında uzmanlaşmış ekibimizle hizmet veriyoruz.</p>
                        <p class="sec-text">Spor tesisleri, sosyal yapılar, ticaret merkezleri ve konut projelerinde kullandığımız modern yapı teknikleri ile depreme dayanıklı, enerji verimli ve çevre dostu binalar inşa ediyoruz.</p>
                    </div>
                    <div class="about-feature-list">
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-building"></i></div>
                            <div class="content">
                                <h5>16+ Proje</h5>
                                <p>Aktif İnşaat Projesi</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-hard-hat"></i></div>
                            <div class="content">
                                <h5>15+ Yıl</h5>
                                <p>İnşaat Tecrübesi</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="theme-btn bg-dark mt-35">
                        <span class="link-effect">
                            <span class="effect-1">Daha Fazla Bilgi</span>
                            <span class="effect-1">Daha Fazla Bilgi</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-thumb-area">
                    <div class="about-thumb">
                        <img src="{{ asset('assets/images/projeler/isk-kapali-spor-ve-yari-olimpik/1.png') }}" alt="Modern Spor Kompleksi İnşaatı" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="about-thumb-2">
                        <img src="{{ asset('assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg') }}" alt="Sebze Hali İnşaat Projesi" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="experience-box">
                        <div class="icon"><i class="fa-solid fa-hard-hat"></i></div>
                        <div class="content">
                            <h4>15+</h4>
                            <p>Yıllık İnşaat<br>Tecrübesi</p>
                        </div>
                    </div>
                    
                    <!-- İnşaat Projeleri Galerisi -->
                    <div class="construction-gallery mt-30">
                        <div class="row g-2">
                            <div class="col-4">
                                <img src="{{ asset('assets/images/projeler/kres/KRES1 (1).jpg') }}" alt="Kreş İnşaat Projesi" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/projeler/halısaha-render/k1.jpg') }}" alt="Halısaha Yapım Projesi" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;">
                            </div>
                            <div class="col-4">
                                <img src="{{ asset('assets/images/projeler/kirkhan-kulliye/K (1).jpg') }}" alt="Konut Projesi İnşaatı" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-6">
                                <img src="{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg') }}" alt="Yüzme Havuzu Projesi" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg') }}" alt="Sosyal Tesis İnşaatı" style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Blog Bölümü
==============================-->
<section class="blog-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Haberler & Duyurular</div>
                    <h2 class="baslik mb-60">Son <span class="bold">Haberlerimiz</span></h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            @forelse($news as $article)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">{{ $article->published_at->format('d') }}</span>
                            <span class="month">{{ $article->published_at->format('M') }}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="category">{{ $article->category }}</span>
                            <span class="author">{{ $article->author }}</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('blog.details', ['id' => $article->id]) }}">{{ $article->title }}</a></h4>
                        <p class="blog-text">{{ Str::limit($article->summary, 120) }}</p>
                        <a href="{{ route('blog.details', ['id' => $article->id]) }}" class="blog-link">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Henüz haber bulunmamaktadır.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-50">
            <a href="{{ route('blog.grid') }}" class="theme-btn bg-color10">
                <span class="link-effect">
                    <span class="effect-1">Tüm Haberler</span>
                    <span class="effect-1">Tüm Haberler</span>
                </span><i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<!--==============================
Projelerimiz Özet Bölümü
==============================-->
<section class="projects-summary-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Projelerimiz</div>
                    <h2 class="sec-title mb-60">Devam Eden  Projeler</h2>
                </div>
            </div>
        </div>
        <div class="row gy-30">
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje1.jpeg') }}" alt="Yeni Sosyal Tesis Projesi" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Yeni Sosyal Tesis Projesi</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje2.jpeg') }}" alt="Parke Taşı Yenileme" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Parke Taşı Yenileme</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje3.jpeg') }}" alt="Yeşil Alan Düzenleme" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Yeşil Alan Düzenleme</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje4.jpeg') }}" alt="Üretim Tesisi Modernizasyonu" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Üretim Tesisi Modernizasyonu</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje5.jpeg') }}" alt="Yeni Katlı Otopark" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Yeni Katlı Otopark</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <img src="{{ asset('assets/images/imageshatay/proje6.jpeg') }}" alt="Spor Tesisi Projesi" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="project-title">
                        <h4>Spor Tesisi Projesi</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-50">
            <a href="{{ route('projects') }}" class="theme-btn bg-dark">
                <span class="link-effect">
                    <span class="effect-1">Tüm Projeler</span>
                    <span class="effect-1">Tüm Projeler</span>
                </span><i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<!--==============================
Projeler Haritası Bölümü
==============================-->
<section class="projects-map-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Proje Haritası</div>
                    <h2 class="sec-title text-white mb-60">Devam Eden ve <span class="bold">Planlanan</span><br>Projelerimizin Konumu</h2>
                </div>
            </div>
        </div>
        
        <!-- Leaflet Harita -->
        <div class="row">
            <div class="col-lg-12">
                <div class="map-container" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div id="projectMap" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
        
        <!-- Harita Açıklaması -->
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="map-legend text-center">
                    <div class="legend-items d-flex justify-content-center gap-4 flex-wrap">
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 20px; height: 20px; background: #28a745; border-radius: 50%; margin-right: 8px;"></div>
                            <span style="color: #fff;">Devam Eden Projeler</span>
                        </div>
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 20px; height: 20px; background: #ffc107; border-radius: 50%; margin-right: 8px;"></div>
                            <span style="color: #fff;">Planlama Aşamasında</span>
                        </div>
                    </div>
                    <p class="mt-3" style="color: #ccc; font-size: 14px;">Haritadaki işaretlere tıklayarak proje detaylarını görebilirsiniz</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hatay koordinatları (Antakya merkez)
    var hatayCoords = [36.2027, 36.1621];
    
    // Hatay bölgesi sınırları (güneybatı ve kuzeydoğu köşeler)
    var hatayBounds = [
        [35.8, 35.8], // güneybatı köşe
        [36.6, 36.6]  // kuzeydoğu köşe
    ];
    
    // Harita oluştur - zoom kısıtlamaları ile
    var map = L.map('projectMap', {
        center: hatayCoords,
        zoom: 11,
        minZoom: 9,   // minimum zoom (biraz daha uzaklaştırabilsin)
        maxZoom: 15,  // maximum zoom
        maxBounds: hatayBounds, // harita sınırları
        maxBoundsViscosity: 1.0 // sınırlardan çıkamasın
    });
    
    // Satellite görünümü için Esri World Imagery kullan
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: '© Esri, Maxar, Earthstar Geographics'
    }).addTo(map);
    
    // İsteğe bağlı: Yol ve yer adları için overlay ekle
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
        attribution: '© Esri'
    }).addTo(map);
    
    // Özel marker iconları
    var ongoingIcon = L.divIcon({
        className: 'custom-marker ongoing',
        html: '<div style="background: #28a745; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3);"><i class="fa-solid fa-gear" style="color: white; font-size: 14px;"></i></div>',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });
    
    var planningIcon = L.divIcon({
        className: 'custom-marker planning',
        html: '<div style="background: #ffc107; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3);"><i class="fa-solid fa-building-circle-arrow-right" style="color: white; font-size: 14px;"></i></div>',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });
    
    // Proje konumları
    var projects = [
        {
            name: "Yeni Sosyal Tesis Projesi",
            coords: [36.220, 36.150],
            status: "planning",
            description: "Şehrimizin kuzey bölgesinde yeni sosyal tesis"
        },
        {
            name: "Parke Taşı Yenileme",
            coords: [36.202, 36.162],
            status: "ongoing",
            description: "Şehir merkezinde parke taşı yenileme çalışması"
        },
        {
            name: "Yeşil Alan Düzenleme",
            coords: [36.215, 36.175],
            status: "planning",
            description: "Habib-i Neccar çevresinde yeşil alan düzenlemesi"
        },
        {
            name: "Üretim Tesisi Modernizasyonu",
            coords: [36.190, 36.140],
            status: "ongoing",
            description: "Sanayi bölgesinde tesis modernizasyonu"
        },
        {
            name: "Yeni Katlı Otopark",
            coords: [36.205, 36.155],
            status: "ongoing",
            description: "Şehir merkezinde yeni otopark inşaatı"
        },
        {
            name: "Spor Tesisi",
            coords: [36.185, 36.145],
            status: "planning",
            description: "Gençlik ve spor tesisi projesi"
        },
        {
            name: "Kültür Merkezi",
            coords: [36.210, 36.170],
            status: "planning",
            description: "Hatay kültür merkezi projesi"
        },
        {
            name: "Teknoloji Parkı",
            coords: [36.195, 36.180],
            status: "ongoing",
            description: "Modern teknoloji parkı inşaatı"
        }
    ];
    
    // Marker'ları haritaya ekle
    projects.forEach(function(project) {
        var icon = project.status === 'ongoing' ? ongoingIcon : planningIcon;
        var statusText = project.status === 'ongoing' ? 'Devam Ediyor' : 'Planlama Aşamasında';
        var statusColor = project.status === 'ongoing' ? '#28a745' : '#ffc107';
        
        var marker = L.marker(project.coords, {icon: icon}).addTo(map);
        
        var popupContent = `
            <div style="text-align: center; min-width: 200px;">
                <h5 style="margin: 0 0 8px 0; color: #333;">${project.name}</h5>
                <p style="margin: 0 0 10px 0; color: #666; font-size: 13px;">${project.description}</p>
                <span style="background: ${statusColor}; color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px;">${statusText}</span>
            </div>
        `;
        
        marker.bindPopup(popupContent);
        
        // Marker tıklama olayı
        marker.on('click', function() {
            console.log('Clicked project:', project.name);
            // Proje detay sayfasına yönlendirme
            // window.location.href = '/projects/' + project.name.toLowerCase().replace(/\s+/g, '-');
        });
    });
});
</script>
</section>

<!--==============================
Öne Çıkan Projelerimiz
==============================-->
<section class="project-gallery-section space bg-theme">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Öne Çıkan Projelerimiz</div>
                    <h2 class="sec-title mb-60">Hatay'ın <span class="bold">Gelişimi</span><br>İçin Çalışıyoruz</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <!-- Kırıkhan Yüzme Havuzu -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/200-kisilik-yari-olimpik-altinozu/c7eb5dec-3f13-4dcc-b11e-85daaa985401.jpg') }}" alt="Kırıkhan Yüzme Havuzu">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Kırıkhan Butik Yarı Olimpik Yüzme Havuzu</h4>
                                <p>1500 m² alan, 25x12,5 m ölçü, 5 kulvar, 200 kişi kapasiteli modern tesis</p>
                                <div class="project-status ongoing">
                                    <i class="fa-solid fa-gear"></i> Devam Ediyor
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Belen Bedesten Meydan -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/cok-amacli-rendet/WhatsApp Image 2025-02-18 at 16.58.59.jpeg') }}" alt="Belen Bedesten Meydan">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Belen Bedesten Meydan Projesi</h4>
                                <p>2500 m² alanda 15 bölümlü modern bedesten projesi, fırın, restoran, market</p>
                                <div class="project-status ongoing">
                                    <i class="fa-solid fa-gear"></i> Devam Ediyor
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kreş Projeleri -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/kres/KRES1 (1).jpg') }}" alt="Kreş Projeleri">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Modern Kreş Kompleksleri</h4>
                                <p>Kumlu ve Altınözü'nde 600 m² alan, 4 sınıf, yemekhane, oyun alanı</p>
                                <div class="project-status ongoing">
                                    <i class="fa-solid fa-gear"></i> Devam Ediyor
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sebze Hali -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/sebze-hali/WhatsApp Image 2023-05-24 at 10.39.51 (1).jpeg') }}" alt="Sebze Hali">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Modern Sebze Hali Kompleksi</h4>
                                <p>Şehrimizin ticari hayatını destekleyen modern sebze hali projesi</p>
                                <div class="project-status completed">
                                    <i class="fa-solid fa-check-circle"></i> Tamamlandı
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Halısaha Projeleri -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/halısaha-render/k1.jpg') }}" alt="Halısaha Projeleri">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Modern Halısaha Kompleksleri</h4>
                                <p>Payas, Kumlu, Yayladağı'nda modern halısaha ve kafeterya projeleri</p>
                                <div class="project-status ongoing">
                                    <i class="fa-solid fa-gear"></i> Devam Ediyor
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Taziye Evleri -->
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ asset('assets/images/projeler/adak-taziye-evleri/mızrakli-adak-ve-taziye/RENDER/M_Photo - 1.jpg') }}" alt="Taziye Evleri">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>Modern Taziye ve Adakevleri</h4>
                                <p>Samandağ Mızraklı'da 960 m² alan, 240 kişi kapasiteli 2 katlı yapı</p>
                                <div class="project-status planning">
                                    <i class="fa-solid fa-clock"></i> Tasarım
                                </div>
                                <a href="{{ route('projects') }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center mt-50">
                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                    <span class="link-effect">
                        <span class="effect-1">Tüm Projelerimizi İncele</span>
                        <span class="effect-1">Tüm Projelerimizi İncele</span>
                    </span><i class="fa-regular fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* About Slider Image Fix */
.about-slide_thumb {
    height: 350px !important;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.about-slide_thumb img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
    transition: transform 0.3s ease;
}

.about-slide_thumb:hover img {
    transform: scale(1.05);
}

.project-gallery-item {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.project-gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.gallery-thumb {
    position: relative;
    height: 300px;
    overflow: hidden;
}

.gallery-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.project-gallery-item:hover .gallery-thumb img {
    transform: scale(1.05);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(31, 71, 136, 0.9), rgba(74, 144, 226, 0.9));
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.project-gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-content {
    text-align: center;
    color: white;
}

.gallery-content h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.3;
}

.gallery-content p {
    font-size: 14px;
    margin-bottom: 15px;
    opacity: 0.9;
    line-height: 1.4;
}

.project-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    margin-bottom: 15px;
}

.project-status.ongoing {
    background: rgba(40, 167, 69, 0.9);
    color: white;
}

.project-status.completed {
    background: rgba(25, 135, 84, 0.9);
    color: white;
}

.project-status.planning {
    background: rgba(255, 193, 7, 0.9);
    color: #333;
}

.gallery-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: white;
    color: #1f4788;
    border-radius: 50%;
    transition: all 0.3s ease;
    text-decoration: none;
}

.gallery-btn:hover {
    background: #1f4788;
    color: white;
    transform: scale(1.1);
}

/* Haber Başlıkları - Direkt Turuncu */
.blog-title a {
    color: #cf9f38 !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-title a:hover {
    color: #cf9f38 !important;
}
</style>

<!--==============================
Soru ve Görüşleriniz Bölümü
==============================-->
<section class="contact-cta-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Soru ve Görüşleriniz</div>
                    <h2 class="sec-title mb-60">Bizimle <span class="bold">İletişime</span><br>Geçmek İçin</h2>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center gy-30">
            <div class="col-lg-5 col-md-6">
                <div class="contact-cta-item">
                    <div class="cta-icon">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>
                    <div class="cta-content">
                        <h4>Sık Sorulan Sorular</h4>
                        <p>Merak ettiğiniz konular hakkında sık sorulan soruları inceleyebilir, cevapları bulabilirsiniz.</p>
                        <a href="{{ route('faq') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">SSS Sayfası</span>
                                <span class="effect-1">SSS Sayfası</span>
                            </span><i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-6">
                <div class="contact-cta-item">
                    <div class="cta-icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div class="cta-content">
                        <h4>İletişim Formu</h4>
                        <p>Sorularınızı, görüşlerinizi ve önerilerinizi bizimle paylaşmak için iletişim formunu kullanabilirsiniz.</p>
                        <a href="{{ route('contact') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">İletişim Formu</span>
                                <span class="effect-1">İletişim Formu</span>
                            </span><i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 