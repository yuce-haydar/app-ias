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

/* Hero Slider Mobil Optimizasyonu */
.hero-section.style-6 {
    position: relative;
    overflow: hidden;
    touch-action: pan-y pinch-zoom;
}

.hero-slider-6 {
    touch-action: pan-y;
    -webkit-overflow-scrolling: touch;
    overflow: hidden;
}

.hero-slider-6 .swiper-slide {
    overflow: hidden;
    position: relative;
    touch-action: manipulation;
}

/* Mobil için optimizasyon */
@media (max-width: 991px) {
    .hero-slider-6 .swiper-slide {
        min-height: 70vh !important;
        background-attachment: scroll !important;
    }
    
    .hero-content .title {
        font-size: 2.5rem !important;
        line-height: 1.2 !important;
    }
    
    .hero-right .image-box {
        margin-top: 30px;
        max-width: 100%;
        overflow: hidden;
    }
    
    .hero-right .image-box img {
        width: 100% !important;
        height: auto !important;
        object-fit: cover;
        border-radius: 10px;
    }
}

@media (max-width: 767px) {
    .hero-slider-6 .swiper-slide {
        min-height: 60vh !important;
        background-size: cover !important;
        background-position: center center !important;
        background-attachment: scroll !important;
    }
    
    .hero-content {
        text-align: center;
        padding: 20px 0;
    }
    
    .hero-content .title {
        font-size: 2rem !important;
        margin-bottom: 20px !important;
    }
    
    .hero-content .text p {
        font-size: 14px !important;
        margin-bottom: 25px !important;
    }
    
    .hero-right {
        margin-top: 20px;
    }
    
    .hero-right .image-box {
        padding: 0 15px;
    }
    
    .hero-right .image-box img {
        max-height: 250px !important;
        object-fit: cover;
    }
}

@media (max-width: 480px) {
    .hero-slider-6 .swiper-slide {
        min-height: 50vh !important;
    }
    
    .hero-content .title {
        font-size: 1.8rem !important;
    }
    
    .hero-content .text {
        margin: 15px 0;
    }
    
    .theme-btn {
        padding: 12px 20px !important;
        font-size: 14px !important;
    }
}

/* Mobil Zoom Engelleyici */
@media (max-width: 768px) {
    body {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        overflow-x: hidden;
    }
    
    .container {
        overflow-x: hidden;
    }
    
    /* Safari double-tap zoom engelleme */
    * {
        -webkit-touch-callout: none;
        -webkit-tap-highlight-color: transparent;
    }
    
    .hero-slider-6 .swiper-slide * {
        pointer-events: auto;
        touch-action: manipulation;
    }
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
            @if($homeSettings->hero_slides && count($homeSettings->hero_slides) > 0)
                @foreach($homeSettings->hero_slides as $index => $slide)
                <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)){{ isset($slide['image']) && $slide['image'] ? ', url(\'' . asset('storage/' . $slide['image']) . '\')' : ', url(\'' . asset('storage/projeler/isk-kapali-spor-ve-yari-olimpik/5.jpg') . '\')' }}; background-size: cover; background-position: center; min-height: 100vh;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                    <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                        {!! isset($slide['title']) && $slide['title'] ? nl2br(e($slide['title'])) : 'Modern<br><span>İnşaat</span><br>Çözümleri' !!}
                                    </h1>
                                    <div class="text">
                                        <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                        <p>{!! isset($slide['description']) && $slide['description'] ? $slide['description'] : 'Hatay\'ın geleceğini şekillendiren projelerle şehrimize değer katıyoruz. Kaliteli ve sürdürülebilir inşaat hizmetleri sunuyoruz.' !!}</p>
                                    </div>
                                    <a href="{{ isset($slide['button_link']) && $slide['button_link'] ? $slide['button_link'] : route('projects') }}" class="theme-btn bg-color10">
                                        <span class="link-effect">
                                            <span class="effect-1">{{ isset($slide['button_text']) && $slide['button_text'] ? $slide['button_text'] : 'Projelerimizi İncele' }}</span>
                                            <span class="effect-1">{{ isset($slide['button_text']) && $slide['button_text'] ? $slide['button_text'] : 'Projelerimizi İncele' }}</span>
                                        </span><i class="fa-regular fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero-right">
                                    <div class="image-box">
                                        <img class="lazy-img" data-src="{{ isset($slide['small_image']) && $slide['small_image'] ? asset('storage/' . $slide['small_image']) : (isset($slide['image']) && $slide['image'] ? asset('storage/' . $slide['image']) : asset('storage/projeler/isk-kapali-spor-ve-yari-olimpik/4.jpg')) }}" alt="{{ isset($slide['title']) ? strip_tags($slide['title']) : 'Proje Görseli' }}" style="width: 100%; height: auto; border-radius: 10px;" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback slide eğer JSON slider yoksa -->
                <div class="swiper-slide" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('storage/projeler/isk-kapali-spor-ve-yari-olimpik/5.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="hero-content md-mb-50" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                                    <h1 class="title" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Modern<br><span>İnşaat</span><br>Çözümleri</h1>
                                    <div class="text">
                                        <div class="icon spin"><img src="{{ asset('assets/images/shapes/star3.png') }}" alt=""></div>
                                        <p>Hatay'ın geleceğini şekillendiren projelerle şehrimize değer katıyoruz. Kaliteli ve sürdürülebilir inşaat hizmetleri sunuyoruz.</p>
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
                                        <img class="lazy-img" data-src="{{ asset('storage/projeler/isk-kapali-spor-ve-yari-olimpik/4.jpg') }}" alt="Modern İnşaat Projesi" style="width: 100%; height: auto; border-radius: 10px;" loading="lazy">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section>
<!--======== / Hero Bölümü ========-->

<!--==============================
Slider Altı İframe Bölümü
==============================-->
@if($homeSettings && $homeSettings->slider_iframe_code)
<section class="slider-iframe-section space-bottom mt-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="iframe-wrapper">
                    <div class="iframe-container" style="width: 100%; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                        {!! $homeSettings->slider_iframe_code !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

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
                            @if($homeSettings->about_images && count($homeSettings->about_images) > 0)
                                @foreach($homeSettings->about_images as $image)
                                    @if(isset($image['image']) && $image['image'])
                                    <div class="swiper-slide">
                                        <div class="about-slide_thumb" style="height: 350px; overflow: hidden; border-radius: 10px;">
                                            <img class="lazy-img" data-src="{{ asset('storage/' . $image['image']) }}" alt="{{ $image['caption'] ?? 'Hakkımızda Görseli' }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;" loading="lazy">
                                            @if(isset($image['caption']) && $image['caption'])
                                                <div class="slide-caption" style="position: absolute; bottom: 10px; left: 10px; right: 10px; background: rgba(0,0,0,0.7); color: white; padding: 8px; border-radius: 5px; font-size: 14px;">
                                                    {{ $image['caption'] }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <!-- Fallback: Projelerden görseller kullan -->
                                @foreach($projects as $project)
                                <div class="swiper-slide">
                                    <div class="about-slide_thumb" style="height: 350px; overflow: hidden; border-radius: 10px;">
                                        <img class="lazy-img" data-src="{{ $project->image_url ?? \App\Helpers\ImageHelper::getImageUrl($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover; object-position: center;" loading="lazy">
                                    </div>
                                </div>
                                @endforeach
                            @endif
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
                        <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->about_subtitle ?: 'Hayata Geçirdiğimiz Projeler' }}</div>
                        <h2 class="sec-title mb-25">{!! $homeSettings->about_title ? nl2br(e($homeSettings->about_title)) : 'Hatay\'ın <span class="bold">Geleceğini</span><br>İnşa Ediyoruz!' !!}</h2>
                                                    <p class="sec-text text-gray">{!! $homeSettings->about_description ?: '15 ilçede eş zamanlı yürüttüğümüz projelerle Hatay\'ın spor, sosyal ve kültürel altyapısını güçlendiriyoruz.' !!}</p>
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
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>{{ $homeSettings->facilities_subtitle ?: 'Tamamlanan Tesisler' }}</div>
                    <h2 class="sec-title text-white mb-60">{!! $homeSettings->facilities_title ? nl2br(e($homeSettings->facilities_title)) : 'Şehrimize <span class="bold">Kazandırdığımız</span><br>Tesisler' !!}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-30">
            @foreach($facilities as $facility)
            <div class="col-lg-3 col-md-6">
                <div class="service-item style-6">
                    <div class="service-thumb mb-20">
                        <img src="{{ $facility->image_url ?? \App\Helpers\ImageHelper::getImageUrl($facility->image) }}" alt="{{ $facility->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;" loading="lazy">
                    </div>
                    <div class="service-icon">
                        <i class="{{ $facility->icon_class }}"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title" style="height: 50px; display: flex; align-items: center;">
                            <a href="{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}" style="text-decoration: none; color: #ffc107;">
                                {{ $facility->name }}
                            </a>
                        </h4>
                                                        <p class="service-text">{!! $facility->short_description !!}</p>
                        <a href="{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}" class="service-link mb-15">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                        <a href="{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}" class="theme-btn bg-color10 btn-sm">
                            <span class="link-effect">
                                <span class="effect-1">Devamını Oku</span>
                                <span class="effect-1">Devamını Oku</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
                        <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->expertise_subtitle ?: 'İnşaat ve Yapı Uzmanlığımız' }}</div>
                        <h2 class="sec-title mb-25">{!! $homeSettings->expertise_title ? nl2br(e($homeSettings->expertise_title)) : 'Modern İnşaat<br><span class="bold">Teknolojileri</span> ile' !!}</h2>
                        <p class="sec-text">{!! $homeSettings->expertise_description ?: 'Hatay İmar olarak 15 yılı aşkın tecrübemizle, modern inşaat teknolojilerini kullanarak şehrimizin altyapısını güçlendiriyoruz. Çelik konstrüksiyon, betonarme yapılar ve prefabrik sistemler konularında uzmanlaşmış ekibimizle hizmet veriyoruz.' !!}</p>
                    </div>
                    <div class="about-feature-list">
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-building"></i></div>
                            <div class="content">
                                <h5>{{ $homeSettings->expertise_stat_1_number ?: '16+ Proje' }}</h5>
                                <p>{{ $homeSettings->expertise_stat_1_text ?: 'Aktif İnşaat Projesi' }}</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-hard-hat"></i></div>
                            <div class="content">
                                <h5>{{ $homeSettings->expertise_stat_2_number ?: '15+ Yıl' }}</h5>
                                <p>{{ $homeSettings->expertise_stat_2_text ?: 'İnşaat Tecrübesi' }}</p>
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
                    @php
                        $expertiseImages = $homeSettings->expertise_images ?? [];
                        $mainImage = collect($expertiseImages)->firstWhere('type', 'main');
                        $main2Image = collect($expertiseImages)->firstWhere('type', 'main2');
                        $galleryImages = collect($expertiseImages)->where('type', 'gallery')->take(5);
                    @endphp
                    
                    <div class="about-thumb">
                        <img src="{{ $mainImage && isset($mainImage['image']) ? \App\Helpers\ImageHelper::getImageUrl($mainImage['image']) : ($projects->count() > 0 ? \App\Helpers\ImageHelper::getImageUrl($projects->shuffle()->first()->image) : asset('assets/images/logo/logo.png')) }}" 
                             alt="{{ $mainImage['caption'] ?? ($projects->count() > 0 ? $projects->shuffle()->first()->title : 'Modern Spor Kompleksi İnşaatı') }}" 
                             style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;" loading="lazy">
                    </div>
                    <div class="about-thumb-2">
                        <img src="{{ $main2Image && isset($main2Image['image']) ? \App\Helpers\ImageHelper::getImageUrl($main2Image['image']) : ($projects->count() > 1 ? \App\Helpers\ImageHelper::getImageUrl($projects->shuffle()->skip(1)->first()->image) : asset('assets/images/logo/logo.png')) }}" 
                             alt="{{ $main2Image['caption'] ?? ($projects->count() > 1 ? $projects->shuffle()->skip(1)->first()->title : 'İnşaat Projesi') }}" 
                             style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;" loading="lazy">
                    </div>
                    <div class="experience-box">
                        <div class="icon"><i class="fa-solid fa-hard-hat"></i></div>
                        <div class="content">
                            <h4>15+</h4>
                            <p>Yıllık İnşaat<br>Tecrübesi</p>
                        </div>
                    </div>

                    <!-- Projelerden Rastgele Galeri -->
                    @if($projects->count() > 0)
                    <div class="construction-gallery mt-30">
                        <div class="row g-2">
                            @foreach($projects->shuffle()->take(3) as $project)
                            <div class="col-4">
                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($project->image) }}" 
                                     alt="{{ $project->title }}" 
                                     style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;" loading="lazy">
                            </div>
                            @endforeach
                        </div>
                        @if($projects->count() > 3)
                        <div class="row g-2 mt-2">
                            @foreach($projects->shuffle()->take(2) as $project)
                            <div class="col-6">
                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($project->image) }}" 
                                     alt="{{ $project->title }}" 
                                     style="width: 100%; height: 80px; object-fit: cover; border-radius: 8px;" loading="lazy">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endif
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
                    <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->news_subtitle ?: 'Haberler & Duyurular' }}</div>
                    <h2 class="baslik mb-60">{!! $homeSettings->news_title ? nl2br(e($homeSettings->news_title)) : 'Son <span class="bold">Haberlerimiz</span>' !!}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            @forelse($news as $article)
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->featured_image) }}" alt="{{ $article->title }}" style="width: 100%; height: 250px; object-fit: cover;">
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
                        <h4 class="blog-title"><a href="{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a></h4>
                                                            <p class="blog-text">{!! Str::limit($article->summary, 120) !!}</p>
                        <a href="{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug]) }}" class="blog-link">
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
Ek Bilgiler ve Haritalar Bölümü (4 Tane Yan Yana)
==============================-->
@if($homeSettings && $homeSettings->contact_iframe_codes && is_array($homeSettings->contact_iframe_codes) && count($homeSettings->contact_iframe_codes) > 0)
<section class="contact-iframe-section space bg-dark">
    <div class="container">
        <div class="row gy-30">
            @foreach($homeSettings->contact_iframe_codes as $index => $iframe)
                @if(!empty($iframe['code']))
                    <div class="col-lg-3 col-md-6">
                        <div class="iframe-card">
                            <div class="iframe-container" style="width: 100%; overflow: hidden; ">
                                {!! $iframe['code'] !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="text-center mt-40">
            <a href="https://www.youtube.com/@hbbimar" class="theme-btn bg-color10" target="_blank">
                <span class="link-effect">
                    <span class="effect-1">Devamı</span>
                    <span class="effect-1">Devamı</span>
                </span><i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>
    </div>
</section>

<style>
.contact-iframe-section .iframe-card {
    background: transparent;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.contact-iframe-section .iframe-card:hover {
    transform: translateY(-5px);
}

.contact-iframe-section .iframe-container {
    position: relative;
    overflow: hidden;
    background: white;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(255,255,255,0.1);
}

.contact-iframe-section .iframe-card:hover .iframe-container {
    box-shadow: 0 15px 35px rgba(255,255,255,0.15);
}

.contact-iframe-section .iframe-container iframe {
    width: 100% !important;
    height: 300px !important;
    border: none !important;
    border-radius: 10px !important;
}

/* Mobil responsive */
@media (max-width: 768px) {
    .contact-iframe-section .iframe-container iframe {
        height: 250px !important;
    }
}

@media (max-width: 576px) {
    .contact-iframe-section .iframe-container iframe {
        height: 200px !important;
    }
}
</style>
@endif

<!--==============================
Projelerimiz Özet Bölümü
==============================-->
<section class="projects-summary-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->projects_subtitle ?: 'Projelerimiz' }}</div>
                    <h2 class="sec-title mb-60">{!! $homeSettings->projects_title ? nl2br(e($homeSettings->projects_title)) : 'Devam Eden Projeler' !!}</h2>
                </div>
            </div>
        </div>
        <div class="row gy-30">
            @foreach($projects->take(6) as $project)
            <div class="col-lg-4 col-md-6">
                <div class="simple-project-item">
                    <div class="project-image">
                        <a href="{{ route('project.details', ['id' => $project->id]) }}">
                            <img src="{{ \App\Helpers\ImageHelper::getImageUrl($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                        </a>
                    </div>
                    <div class="project-title">
                        <h4>
                            <a href="{{ route('project.details', ['id' => $project->id]) }}" style="color: inherit; text-decoration: none;">
                                {{ $project->title }}
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
            @endforeach
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
Interaktif Proje Haritası
==============================-->
<section class="interactive-map-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Hatay İmar Haritası</div>
                    <h2 class="sec-title text-white mb-60">Projelerimizin ve <span class="bold">Tesislerimizin</span><br>Gerçek Konumları</h2>
                </div>
            </div>
        </div>

        <!-- Modern Harita Container -->
        <div class="row">
            <div class="col-lg-12">
                <div class="modern-map-wrapper">
                    <div id="hatayImarMap" class="hatay-imar-map"></div>
                    
                </div>
            </div>
        </div>

        <!-- Harita Legend -->
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="map-legend-modern">
                    <div class="legend-title">
                        <h4>Harita Açıklaması</h4>
                        </div>
                    <div class="legend-grid">
                        <div class="legend-item clickable" onclick="showProjectsList('ongoing')" style="cursor: pointer;">
                            <div class="marker-icon ongoing"></div>
                            <span>Devam Eden Projeler</span>
                            <i class="fas fa-chevron-down legend-arrow" style="margin-left: 10px; color: #cf9f38;"></i>
                        </div>
                        <div class="legend-item clickable" onclick="showFacilitiesList()" style="cursor: pointer;">
                            <div class="marker-icon facility"></div>
                            <span>Aktif Tesislerimiz</span>
                            <i class="fas fa-chevron-down legend-arrow" style="margin-left: 10px; color: #cf9f38;"></i>
                        </div>
                    </div>
                    
                    <!-- Dropdown Lists -->
                    <div id="projectsList" class="legend-dropdown" style="display: none;">
                        <h5 style="color: #fff; margin-bottom: 15px;">Devam Eden Projeler</h5>
                        <div class="dropdown-items" id="projectsItems">
                            <!-- JavaScript ile doldurulacak -->
                        </div>
                    </div>
                    
                    <div id="facilitiesList" class="legend-dropdown" style="display: none;">
                        <h5 style="color: #fff; margin-bottom: 15px;">Aktif Tesislerimiz</h5>
                        <div class="dropdown-items" id="facilitiesItems">
                            <!-- JavaScript ile doldurulacak -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Map CSS -->
<style>
.interactive-map-section {
    position: relative;
    overflow: hidden;
}

.modern-map-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.4);
    background: #1a1a1a;
}

.hatay-imar-map {
    width: 100%;
    height: 500px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
}

.map-info-panel {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(255,255,255,0.95);
    padding: 15px;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    z-index: 1000;
}

.map-info-panel h5 {
    margin: 0 0 8px 0;
    color: #333;
    font-size: 14px;
    font-weight: 600;
}

.map-info-panel p {
    margin: 3px 0;
    color: #666;
    font-size: 12px;
}

.map-legend-modern {
    background: rgba(255,255,255,0.1);
    border-radius: 15px;
    padding: 30px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
}

.legend-title h4 {
    color: #fff;
    margin: 0 0 20px 0;
    text-align: center;
    font-size: 20px;
}

.legend-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    transition: all 0.3s ease;
}

.legend-item:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
}

.marker-icon {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: white;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
}

.marker-icon.ongoing {
    background: #28a745;
}

.marker-icon.planning {
    background: #ffc107;
}

.marker-icon.completed {
    background: #007bff;
}

.marker-icon.facility {
    background: #6f42c1;
    border: 2px solid white;
}

.legend-item span {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
}

.legend-item.clickable:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-3px);
}

.legend-dropdown {
    background: rgba(255,255,255,0.1);
    border-radius: 10px;
    padding: 20px;
    margin-top: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    animation: slideDown 0.3s ease;
}

.dropdown-items {
    max-height: 300px;
    overflow-y: auto;
}

.dropdown-item {
    background: rgba(255,255,255,0.1);
    padding: 12px 15px;
    margin-bottom: 8px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    border-left: 3px solid #cf9f38;
}

.dropdown-item:hover {
    background: rgba(255,255,255,0.2);
    transform: translateX(5px);
}

.dropdown-item h6 {
    color: #fff;
    margin: 0 0 5px 0;
    font-size: 14px;
    font-weight: 600;
}

.dropdown-item p {
    color: rgba(255,255,255,0.8);
    margin: 0;
    font-size: 12px;
}

.legend-arrow {
    transition: transform 0.3s ease;
}

.legend-item.active .legend-arrow {
    transform: rotate(180deg);
}

/* Dropdown ve Tooltip animasyonları */
@keyframes slideDown {
    from {
        opacity: 0;
        max-height: 0;
    }
    to {
        opacity: 1;
        max-height: 500px;
    }
}

@keyframes tooltipFadeIn {
    from {
        opacity: 0;
        transform: translateX(-50%) translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
}

@keyframes tooltipFadeOut {
    from {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
    to {
        opacity: 0;
        transform: translateX(-50%) translateY(10px);
    }
}

/* Hover tooltip stilleri */
.marker-hover-tooltip .tooltip-content {
    text-align: center;
}

.marker-hover-tooltip .tooltip-content h6 {
    margin: 0 0 10px 0;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    line-height: 1.3;
}

.marker-hover-tooltip .tooltip-content p {
    margin: 5px 0;
    font-size: 13px;
    color: rgba(255,255,255,0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.marker-hover-tooltip .tooltip-content i {
    font-size: 12px;
    color: #cf9f38;
}

.tooltip-status {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 8px;
}

.tooltip-status.ongoing {
    background: rgba(40, 167, 69, 0.9);
    color: white;
}

.tooltip-status.completed {
    background: rgba(0, 123, 255, 0.9);
    color: white;
}

.tooltip-status.planning {
    background: rgba(255, 193, 7, 0.9);
    color: #333;
}

.tooltip-status.facility {
    background: rgba(111, 66, 193, 0.9);
    color: white;
}

/* Mobil Responsive */
@media (max-width: 768px) {
    .hatay-imar-map {
        height: 350px;
    }
    
    .map-info-panel {
        top: 10px;
        right: 10px;
        padding: 10px;
    }
    
    .legend-grid {
        grid-template-columns: 1fr;
    }
    
    .modern-map-wrapper {
        border-radius: 10px;
        margin: 0 -15px;
    }
}

@media (max-width: 480px) {
    .hatay-imar-map {
        height: 300px;
    }
    
    .map-legend-modern {
        padding: 20px;
        margin: 0 -15px;
        border-radius: 0;
    }
}
</style>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<!-- Modern Map JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 Hatay İmar Haritası Başlatılıyor...');
    
    // Harita konteynerini kontrol et
    const mapContainer = document.getElementById('hatayImarMap');
    if (!mapContainer) {
        console.error('❌ Harita konteyneri bulunamadı!');
        return;
    }

    // Leaflet kontrolü
    if (typeof L === 'undefined') {
        console.error('❌ Leaflet kütüphanesi yüklenmedi!');
        mapContainer.innerHTML = '<div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #fff; font-size: 18px;">📡 Harita kütüphanesi yüklenemiyor...</div>';
        return;
    }

    try {
        // Hatay merkez koordinatları
        const hatayCenter = [36.2027, 36.1621];
        
        // Responsive zoom seviyeleri
        const isMobile = window.innerWidth <= 768;
        const isTablet = window.innerWidth <= 1024;

        // Harita oluştur
        const map = L.map('hatayImarMap', {
            center: hatayCenter,
            zoom: isMobile ? 10 : (isTablet ? 11 : 12),
            minZoom: 8,
            maxZoom: 18,
            zoomControl: true,
            scrollWheelZoom: !isMobile,
            doubleClickZoom: true,
            touchZoom: true,
            dragging: true,
            boxZoom: false,
            keyboard: false,
            attributionControl: false
        });

        console.log('✅ Harita başarıyla oluşturuldu');

        // Uydu görünümü (Google Satellite)
        L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: '&copy; <a href="https://www.google.com/maps">Google</a>',
            maxZoom: 20
        }).addTo(map);

        // Zoom kontrolünü özelleştir
        L.control.zoom({
            position: 'topright'
    }).addTo(map);

        // Modern marker ikonları
        function createMarkerIcon(color, icon, size = 35) {
            return L.divIcon({
                className: 'custom-modern-marker',
                html: `
                    <div class="marker-container" style="
                        background: ${color};
                        width: ${size}px;
                        height: ${size}px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.4);
                        border: 3px solid white;
                        position: relative;
                        cursor: pointer;
                        z-index: 1000;
                    ">
                        <i class="${icon}" style="color: white; font-size: ${size * 0.4}px; pointer-events: none;"></i>
                        <div style="
                            position: absolute;
                            bottom: -8px;
                            left: 50%;
                            transform: translateX(-50%);
                            width: 0;
                            height: 0;
                            border-left: 8px solid transparent;
                            border-right: 8px solid transparent;
                            border-top: 8px solid ${color};
                            pointer-events: none;
                        "></div>
                    </div>
                `,
                iconSize: [size, size + 8],
                iconAnchor: [size/2, size + 8],
                popupAnchor: [0, -(size + 8)]
    });
        }

        // Marker icon tanımları
        const markerIcons = {
            ongoing: createMarkerIcon('#28a745', 'fas fa-cog'),
            planning: createMarkerIcon('#ffc107', 'fas fa-drafting-compass'),
            completed: createMarkerIcon('#007bff', 'fas fa-check-circle'),
            facility: createMarkerIcon('#6f42c1', 'fas fa-building', 38)
        };

        // Veri hazırlama
        @php
            // Proje verileri
            $mapProjects = [];
            foreach($allProjects as $project) {
                if ($project->locations && $project->locations->count() > 0) {
                    foreach ($project->locations as $location) {
                        if ($location->latitude && $location->longitude) {
                            $mapProjects[] = [
                                'id' => $project->id,
                                'name' => $project->title . ' - ' . $location->name,
                                'lat' => (float)$location->latitude,
                                'lng' => (float)$location->longitude,
                                'status' => $project->status,
                                'description' => $location->description ?: strip_tags($project->short_description),
                                'url' => route('project.details', $project->id),
                                'type' => 'project',
                                'category' => $project->category ?: 'İnşaat Projesi',
                                'district' => $location->district ?: ($project->district ?: 'Hatay Merkez'),
                                'budget' => $project->budget ?? null,
                                'start_date' => $project->start_date ?? null
                            ];
                        }
                    }
                } elseif ($project->latitude && $project->longitude) {
                    $mapProjects[] = [
                        'id' => $project->id,
                        'name' => $project->title,
                        'lat' => (float)$project->latitude,
                        'lng' => (float)$project->longitude,
                        'status' => $project->status,
                        'description' => strip_tags($project->short_description),
                        'url' => route('project.details', $project->id),
                        'type' => 'project',
                        'category' => $project->category ?: 'İnşaat Projesi',
                        'district' => $project->district ?: 'Hatay Merkez',
                        'budget' => $project->budget ?? null,
                        'start_date' => $project->start_date ?? null
                    ];
                }
            }

            // Tesis verileri
            $mapFacilities = [];
            foreach($allFacilities as $facility) {
                if ($facility->latitude && $facility->longitude) {
                    $mapFacilities[] = [
                        'id' => $facility->id,
                        'name' => $facility->name,
                        'lat' => (float)$facility->latitude,
                        'lng' => (float)$facility->longitude,
                        'category' => $facility->category ?: 'Tesis',
                        'description' => strip_tags($facility->short_description),
                        'url' => route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]),
                        'type' => 'facility'
                    ];
                }
            }
        @endphp

        const projects = @json($mapProjects);
        const facilities = @json($mapFacilities);

        console.log(`📊 Yüklenen veriler: ${projects.length} proje, ${facilities.length} tesis`);

        // Modern popup stil fonksiyonu
        function createModernPopup(item) {
            const isProject = item.type === 'project';
            const statusText = isProject ? 
                (item.status === 'ongoing' ? 'Devam Ediyor' :
                 item.status === 'completed' ? 'Tamamlandı' : 'Planlama Aşamasında') :
                'Aktif Tesis';
            
            const statusColor = isProject ?
                (item.status === 'ongoing' ? '#28a745' :
                 item.status === 'completed' ? '#007bff' : '#ffc107') :
                '#6f42c1';

            const statusIcon = isProject ?
                (item.status === 'ongoing' ? 'fas fa-cog fa-spin' :
                 item.status === 'completed' ? 'fas fa-check-circle' : 'fas fa-clock') :
                'fas fa-building';

            return `
                <div style="
                    min-width: 280px;
                    max-width: 320px;
                    font-family: 'Segoe UI', 'Arial', sans-serif;
                    padding: 0;
                    margin: 0;
                    overflow: hidden;
                ">
                    <!-- Header with gradient -->
                    <div style="
                        background: linear-gradient(135deg, ${statusColor}ee, ${statusColor});
                        color: white;
                        padding: 15px;
                        margin: -20px -20px 15px -20px;
                        border-radius: 12px 12px 0 0;
                        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
                    ">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                            <i class="${statusIcon}" style="font-size: 14px; opacity: 0.9;"></i>
                            <h3 style="margin: 0; font-size: 16px; font-weight: 700; line-height: 1.3;">
                                ${item.name}
                            </h3>
                        </div>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <span style="
                                background: rgba(255,255,255,0.25);
                                padding: 3px 8px;
                                border-radius: 10px;
                                font-size: 10px;
                                font-weight: 600;
                                text-transform: uppercase;
                                letter-spacing: 0.3px;
                            ">
                                ${isProject ? (item.category || 'PROJESİ') : item.category}
                            </span>
                            <span style="
                                background: rgba(255,255,255,0.9);
                                color: ${statusColor};
                                padding: 3px 6px;
                                border-radius: 8px;
                                font-size: 9px;
                                font-weight: 700;
                            ">
                                ${statusText.toUpperCase()}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div style="padding: 0 8px; margin-bottom: 15px;">
                        <p style="
                            margin: 0 0 15px 0;
                            color: #444;
                            font-size: 13px;
                            line-height: 1.4;
                            text-align: justify;
                        ">
                            ${item.description.substring(0, 100)}${item.description.length > 100 ? '...' : ''}
                        </p>
                        
                        <!-- Quick action button -->
                        <div style="text-align: center; margin-bottom: 12px;">
                            <button onclick="openLocationModal('${item.id}', '${item.type}', '${item.name.replace(/'/g, '\\\'')}')" style="
                                background: linear-gradient(135deg, #ff6b35, #f7931e);
                                color: white;
                                border: none;
                                padding: 10px 20px;
                                border-radius: 20px;
                                font-size: 12px;
                                font-weight: 600;
                                cursor: pointer;
                                transition: all 0.3s ease;
                                box-shadow: 0 3px 10px rgba(255,107,53,0.3);
                                width: 100%;
                            " onmouseover="
                                this.style.transform='translateY(-2px)'; 
                                this.style.boxShadow='0 5px 15px rgba(255,107,53,0.4)';
                            " onmouseout="
                                this.style.transform='translateY(0px)'; 
                                this.style.boxShadow='0 3px 10px rgba(255,107,53,0.3)';
                            ">
                                <i class="fas fa-info-circle" style="margin-right: 6px;"></i>
                                ${isProject ? 'Proje Seçenekleri' : 'Tesis Seçenekleri'}
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Projeleri haritaya ekle
        projects.forEach(function(project) {
            const icon = markerIcons[project.status] || markerIcons.planning;
            const marker = L.marker([project.lat, project.lng], { icon: icon }).addTo(map);
            
            // Basit popup içeriği
            const popupContent = `
                <div style="text-align: center; padding: 10px;">
                    <h4 style="margin: 0 0 10px 0; color: #333;">${project.name}</h4>
                    <p style="margin: 0 0 15px 0; color: #666; font-size: 14px;">${project.description.substring(0, 100)}...</p>
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <a href="${project.url}" target="_blank" 
                           style="background: #007bff; color: white; text-decoration: none; padding: 8px 16px; border-radius: 5px; display: inline-block;">
                            Detay
                        </a>
                        <button onclick="window.open('https://www.google.com/maps/search/?api=1&query=${project.lat},${project.lng}', '_blank')" 
                                style="background: #28a745; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                            Konuma Git
                        </button>
                    </div>
                </div>
            `;
            
            marker.bindPopup(popupContent);
            
            // Hover efekti ve tooltip
            marker.on('mouseover', function(e) {
                const markerElement = this.getElement();
                if (markerElement) {
                    const container = markerElement.querySelector('.marker-container');
                    if (container) {
                        container.style.transform = 'scale(1.15)';
                        container.style.filter = 'brightness(1.1)';
                        container.style.zIndex = '1001';
                    }
                }
                
                // Hover tooltip oluştur
                const tooltip = document.createElement('div');
                tooltip.className = 'marker-hover-tooltip';
                tooltip.innerHTML = `
                    <div class="tooltip-content">
                        <h6>${project.name}</h6>
                        <p><i class="fas fa-map-marker-alt"></i> ${project.district || 'Hatay'}</p>
                        <p><i class="fas fa-info-circle"></i> ${project.category}</p>
                        <span class="tooltip-status ${project.status}">${project.status === 'ongoing' ? 'Devam Ediyor' : project.status === 'completed' ? 'Tamamlandı' : 'Planlama'}</span>
                    </div>
                `;
                
                // Tooltip stillerini ayarla
                tooltip.style.cssText = `
                    position: absolute;
                    bottom: 50px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: rgba(0,0,0,0.9);
                    color: white;
                    padding: 15px;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.1);
                    min-width: 200px;
                    max-width: 280px;
                    z-index: 10000;
                    opacity: 0;
                    animation: tooltipFadeIn 0.3s ease forwards;
                    pointer-events: none;
                `;
                
                markerElement.appendChild(tooltip);
                
                // Marker'ı aktif olarak işaretle
                markerElement.setAttribute('data-tooltip-active', 'true');
            });

            marker.on('mouseout', function() {
                const markerElement = this.getElement();
                if (markerElement) {
                    const container = markerElement.querySelector('.marker-container');
                    if (container) {
                        container.style.transform = 'scale(1)';
                        container.style.filter = 'brightness(1)';
                        container.style.zIndex = '1000';
                    }
                    
                    // Tooltip'i kaldır
                    const tooltip = markerElement.querySelector('.marker-hover-tooltip');
                    if (tooltip) {
                        tooltip.style.animation = 'tooltipFadeOut 0.2s ease forwards';
                        setTimeout(() => {
                            if (tooltip.parentNode) {
                                tooltip.parentNode.removeChild(tooltip);
                            }
                        }, 200);
                    }
                    
                    markerElement.removeAttribute('data-tooltip-active');
                }
            });
        });

        // Tesisleri haritaya ekle
        facilities.forEach(function(facility) {
            const marker = L.marker([facility.lat, facility.lng], { icon: markerIcons.facility }).addTo(map);
            
            // Basit popup içeriği
            const popupContent = `
                <div style="text-align: center; padding: 10px;">
                    <h4 style="margin: 0 0 10px 0; color: #333;">${facility.name}</h4>
                    <p style="margin: 0 0 15px 0; color: #666; font-size: 14px;">${facility.description.substring(0, 100)}...</p>
                    <div style="display: flex; gap: 10px; justify-content: center;">
                        <a href="${facility.url}" target="_blank" 
                           style="background: #007bff; color: white; text-decoration: none; padding: 8px 16px; border-radius: 5px; display: inline-block;">
                            Detay
                        </a>
                        <button onclick="window.open('https://www.google.com/maps/search/?api=1&query=${facility.lat},${facility.lng}', '_blank')" 
                                style="background: #28a745; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">
                            Konuma Git
                        </button>
                    </div>
                </div>
            `;
            
            marker.bindPopup(popupContent);
            
            // Hover efekti ve tooltip
            marker.on('mouseover', function(e) {
                const markerElement = this.getElement();
                if (markerElement) {
                    const container = markerElement.querySelector('.marker-container');
                    if (container) {
                        container.style.transform = 'scale(1.15)';
                        container.style.filter = 'brightness(1.1)';
                        container.style.zIndex = '1001';
                    }
                }
                
                // Hover tooltip oluştur
                const tooltip = document.createElement('div');
                tooltip.className = 'marker-hover-tooltip';
                tooltip.innerHTML = `
                    <div class="tooltip-content">
                        <h6>${facility.name}</h6>
                        <p><i class="fas fa-map-marker-alt"></i> ${facility.district || 'Hatay'}</p>
                        <p><i class="fas fa-building"></i> ${facility.category}</p>
                        <span class="tooltip-status facility">Aktif Tesis</span>
                    </div>
                `;
                
                // Tooltip stillerini ayarla
                tooltip.style.cssText = `
                    position: absolute;
                    bottom: 50px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: rgba(0,0,0,0.9);
                    color: white;
                    padding: 15px;
                    border-radius: 12px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(255,255,255,0.1);
                    min-width: 200px;
                    max-width: 280px;
                    z-index: 10000;
                    opacity: 0;
                    animation: tooltipFadeIn 0.3s ease forwards;
                    pointer-events: none;
                `;
                
                markerElement.appendChild(tooltip);
                
                // Marker'ı aktif olarak işaretle
                markerElement.setAttribute('data-tooltip-active', 'true');
            });

            marker.on('mouseout', function() {
                const markerElement = this.getElement();
                if (markerElement) {
                    const container = markerElement.querySelector('.marker-container');
                    if (container) {
                        container.style.transform = 'scale(1)';
                        container.style.filter = 'brightness(1)';
                        container.style.zIndex = '1000';
                    }
                    
                    // Tooltip'i kaldır
                    const tooltip = markerElement.querySelector('.marker-hover-tooltip');
                    if (tooltip) {
                        tooltip.style.animation = 'tooltipFadeOut 0.2s ease forwards';
                        setTimeout(() => {
                            if (tooltip.parentNode) {
                                tooltip.parentNode.removeChild(tooltip);
                            }
                        }, 200);
                    }
                    
                    markerElement.removeAttribute('data-tooltip-active');
                }
            });
        });

        // Haritaya tıklandığında tüm popup'ları kapat
        map.on('click', function(e) {
            map.eachLayer(function(layer) {
                if (layer instanceof L.Marker) {
                    layer.closePopup();
                }
            });
        });

        console.log('🎉 Harita başarıyla yüklendi!');
        
        // Global değişkenler legend fonksiyonları için
        window.hatayImarMap = map;
        window.hatayImarProjects = projects;
        window.hatayImarFacilities = facilities;

    } catch (error) {
        console.error('❌ Harita yükleme hatası:', error);
        mapContainer.innerHTML = `
            <div style="
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100%;
                color: #fff;
                text-align: center;
                padding: 40px;
            ">
                <div style="font-size: 48px; margin-bottom: 20px;">🗺️</div>
                <h3 style="margin: 0 0 10px 0;">Harita Yüklenemiyor</h3>
                <p style="margin: 0; opacity: 0.8;">Lütfen sayfa yenilemeyi deneyin</p>
            </div>
        `;
    }
});

// Legend dropdown fonksiyonları
function showProjectsList(status = 'ongoing') {
    const dropdown = document.getElementById('projectsList');
    const facilitiesDropdown = document.getElementById('facilitiesList');
    const projectsItems = document.getElementById('projectsItems');
    const legendItem = document.querySelector('.legend-item.clickable');
    
    // Facilities dropdown'ını kapat
    facilitiesDropdown.style.display = 'none';
    document.querySelectorAll('.legend-item.clickable')[1].classList.remove('active');
    
    // Projects dropdown'ını aç/kapat
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
        legendItem.classList.remove('active');
        return;
    }
    
    // Projeleri filtrele ve listele
    const ongoingProjects = window.hatayImarProjects ? window.hatayImarProjects.filter(project => project.status === status) : [];
    
    projectsItems.innerHTML = '';
    
    if (ongoingProjects.length === 0) {
        projectsItems.innerHTML = '<p style="color: rgba(255,255,255,0.8); text-align: center;">Devam eden proje bulunamadı.</p>';
    } else {
        ongoingProjects.forEach(project => {
            const item = document.createElement('div');
            item.className = 'dropdown-item';
            item.onclick = () => focusOnLocation(project.lat, project.lng, project.name);
            item.innerHTML = `
                <h6>${project.name}</h6>
                <p>${project.description.substring(0, 80)}...</p>
            `;
            projectsItems.appendChild(item);
        });
    }
    
    dropdown.style.display = 'block';
    legendItem.classList.add('active');
}

function showFacilitiesList() {
    const dropdown = document.getElementById('facilitiesList');
    const projectsDropdown = document.getElementById('projectsList');
    const facilitiesItems = document.getElementById('facilitiesItems');
    const legendItems = document.querySelectorAll('.legend-item.clickable');
    const facilitiesLegendItem = legendItems[1];
    
    // Projects dropdown'ını kapat
    projectsDropdown.style.display = 'none';
    legendItems[0].classList.remove('active');
    
    // Facilities dropdown'ını aç/kapat
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
        facilitiesLegendItem.classList.remove('active');
        return;
    }
    
    // Tesisleri listele
    const facilities = window.hatayImarFacilities || [];
    
    facilitiesItems.innerHTML = '';
    
    if (facilities.length === 0) {
        facilitiesItems.innerHTML = '<p style="color: rgba(255,255,255,0.8); text-align: center;">Aktif tesis bulunamadı.</p>';
    } else {
        facilities.forEach(facility => {
            const item = document.createElement('div');
            item.className = 'dropdown-item';
            item.onclick = () => focusOnLocation(facility.lat, facility.lng, facility.name);
            item.innerHTML = `
                <h6>${facility.name}</h6>
                <p>${facility.description.substring(0, 80)}...</p>
            `;
            facilitiesItems.appendChild(item);
        });
    }
    
    dropdown.style.display = 'block';
    facilitiesLegendItem.classList.add('active');
}

function focusOnLocation(lat, lng, name) {
    if (window.hatayImarMap) {
        // Haritayı konuma zoom yap
        window.hatayImarMap.setView([lat, lng], 16, {
            animate: true,
            duration: 1
        });
        
        // Bilgi mesajı göster
        const infoDiv = document.createElement('div');
        infoDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(207, 159, 56, 0.95);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            z-index: 10000;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            font-weight: 600;
            backdrop-filter: blur(10px);
        `;
        infoDiv.innerHTML = `📍 ${name} konumuna odaklandı`;
        document.body.appendChild(infoDiv);
        
        // 3 saniye sonra mesajı kaldır
        setTimeout(() => {
            document.body.removeChild(infoDiv);
        }, 3000);
        
        // Dropdown'ları kapat
        document.getElementById('projectsList').style.display = 'none';
        document.getElementById('facilitiesList').style.display = 'none';
        document.querySelectorAll('.legend-item.clickable').forEach(item => {
            item.classList.remove('active');
        });
    }
}

// Modal JavaScript fonksiyonları
function openLocationModal(id, type, name) {
    const modal = document.getElementById('locationModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');
    
    modalTitle.textContent = name;
    
    // Modal içeriğini güncelle
    if (type === 'project') {
        modalContent.innerHTML = `
            <div class="modal-options">
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="option-content">
                        <h4>Proje Lokasyonu</h4>
                        <p>Projenin bulunduğu konumu Google Maps'te görüntüleyin</p>
                        <button onclick="openGoogleMaps('${id}', '${type}')" class="option-btn location-btn">
                            <i class="fas fa-map-marked-alt"></i>
                            Konuma Git
                        </button>
                    </div>
                </div>
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="option-content">
                        <h4>Proje Detayları</h4>
                        <p>Projenin tüm detaylarını, görsellerini ve bilgilerini görüntüleyin</p>
                        <button onclick="goToDetails('${id}', '${type}')" class="option-btn details-btn">
                            <i class="fas fa-external-link-alt"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>
        `;
    } else {
        modalContent.innerHTML = `
            <div class="modal-options">
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="option-content">
                        <h4>Tesis Lokasyonu</h4>
                        <p>Tesisin bulunduğu konumu Google Maps'te görüntüleyin</p>
                        <button onclick="openGoogleMaps('${id}', '${type}')" class="option-btn location-btn">
                            <i class="fas fa-map-marked-alt"></i>
                            Tesise Git
                        </button>
                    </div>
                </div>
                <div class="option-card">
                    <div class="option-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="option-content">
                        <h4>Tesis Detayları</h4>
                        <p>Tesisin tüm detaylarını, görsellerini ve bilgilerini görüntüleyin</p>
                        <button onclick="goToDetails('${id}', '${type}')" class="option-btn details-btn">
                            <i class="fas fa-external-link-alt"></i>
                            Tesis Detayları
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
    
    modal.style.display = 'block';
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
}

function closeLocationModal() {
    const modal = document.getElementById('locationModal');
    modal.classList.remove('show');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

function openGoogleMaps(id, type) {
    // Mevcut verilerden koordinatları bul
    let lat, lng;
    
    if (type === 'project') {
        const project = projects.find(p => p.id == id);
        if (project) {
            lat = project.lat;
            lng = project.lng;
        }
    } else {
        const facility = facilities.find(f => f.id == id);
        if (facility) {
            lat = facility.lat;
            lng = facility.lng;
        }
    }
    
    if (lat && lng) {
        // Google Maps'te aç
        const url = `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
        window.open(url, '_blank');
    }
    
    closeLocationModal();
}

function goToDetails(id, type) {
    if (type === 'project') {
        const project = projects.find(p => p.id == id);
        if (project) {
            window.location.href = project.url;
        }
    } else {
        const facility = facilities.find(f => f.id == id);
        if (facility) {
            window.location.href = facility.url;
        }
    }
}

// Modal dış alanına tıklandığında kapat
window.onclick = function(event) {
    const modal = document.getElementById('locationModal');
    if (event.target == modal) {
        closeLocationModal();
    }
}
</script>

<!-- Modern Popup Stilleri -->
<style>
.leaflet-popup-content-wrapper {
    border-radius: 12px !important;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3) !important;
    padding: 20px !important;
}

.leaflet-popup-tip {
    background: white !important;
    box-shadow: 0 3px 10px rgba(0,0,0,0.2) !important;
}

.modern-popup .leaflet-popup-content {
    margin: 0 !important;
}

.modern-popup .leaflet-popup-close-button {
    color: #999 !important;
    font-size: 18px !important;
    padding: 8px !important;
}

.custom-modern-marker {
    cursor: pointer;
    z-index: 1000 !important;
}

.custom-modern-marker .marker-container {
    transition: all 0.3s ease;
    position: relative;
    z-index: 1000;
}

.custom-modern-marker .marker-container:hover {
    transform: scale(1.1) !important;
    filter: brightness(1.1) !important;
    z-index: 1001 !important;
}

/* Location Modal Stilleri */
.location-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(5px);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.location-modal.show {
    opacity: 1;
}

.modal-content {
    background: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    width: 90%;
    max-width: 500px;
    position: relative;
    transform: scale(0.9);
    transition: transform 0.3s ease;
    overflow: hidden;
}

.location-modal.show .modal-content {
    transform: scale(1);
}

.modal-header {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    padding: 20px 25px;
    position: relative;
    border-radius: 20px 20px 0 0;
}

.modal-header h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    padding-right: 40px;
}

.modal-close {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
}

.modal-close:hover {
    background: rgba(255,255,255,0.3);
    transform: translateY(-50%) scale(1.1);
}

.modal-body {
    padding: 30px 25px;
}

.modal-options {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.option-card {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 15px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.option-card:hover {
    background: #e9ecef;
    border-color: #667eea;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.option-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    flex-shrink: 0;
}

.option-content {
    flex: 1;
}

.option-content h4 {
    margin: 0 0 8px 0;
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.option-content p {
    margin: 0 0 15px 0;
    color: #666;
    font-size: 14px;
    line-height: 1.4;
}

.option-btn {
    border: none;
    padding: 12px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.location-btn {
    background: linear-gradient(135deg, #28a745, #20c997);
    color: white;
}

.location-btn:hover {
    background: linear-gradient(135deg, #20c997, #28a745);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(40,167,69,0.3);
}

.details-btn {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
}

.details-btn:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,123,255,0.3);
}

/* Mobil Responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
    
    .modal-header {
        padding: 15px 20px;
    }
    
    .modal-header h3 {
        font-size: 18px;
    }
    
    .modal-body {
        padding: 20px;
    }
    
    .option-card {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .option-icon {
        width: 50px;
        height: 50px;
        font-size: 20px;
    }
    
    .option-content h4 {
        font-size: 16px;
    }
    
    .option-content p {
        font-size: 13px;
    }
    
    .option-btn {
        padding: 10px 18px;
        font-size: 13px;
    }
}
</style>
</section>

<!--==============================
Öne Çıkan Projelerimiz
==============================-->
<section class="project-gallery-section space bg-theme">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title" style="color: #fff;"><span><i class="asterisk"></i></span>{{ $homeSettings->featured_projects_subtitle ?: 'Öne Çıkan Projelerimiz' }}</div>
                    <h2 class="sec-title mb-60">{!! $homeSettings->featured_projects_title ? nl2br(e($homeSettings->featured_projects_title)) : 'Hatay\'ın <span class="bold">Gelişimi</span><br>İçin Çalışıyoruz' !!}</h2>
                </div>
            </div>
        </div>

        <div class="row gy-30">
            @foreach($featuredProjects as $project)
            <div class="col-lg-4 col-md-6">
                <div class="project-gallery-item">
                    <div class="gallery-thumb">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($project->image) }}" alt="{{ $project->title }}">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h4>{{ $project->title }}</h4>
                                <p>{!! Str::limit($project->short_description, 100) !!}</p>
                                <div class="project-status {{ $project->status }}">
                                    <i class="fa-solid {{ $project->status == 'completed' ? 'fa-check-circle' : ($project->status == 'ongoing' ? 'fa-gear' : 'fa-clock') }}"></i> 
                                    {{ $project->status == 'completed' ? 'Tamamlandı' : ($project->status == 'ongoing' ? 'Devam Ediyor' : 'Tasarım') }}
                                </div>
                                <a href="{{ route('project.details', ['id' => $project->id]) }}" class="gallery-btn">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-12 text-center mt-50">
                <a href="{{ route('projects') }}" class="theme-btn bg-color10">
                    <span class="link-effect">
                        <span class="effect-1">{{ $homeSettings->featured_projects_button_text ?: 'Tüm Projelerimizi İncele' }}</span>
                        <span class="effect-1">{{ $homeSettings->featured_projects_button_text ?: 'Tüm Projelerimizi İncele' }}</span>
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

/* Modern Harita Responsive Stilleri */
.interactive-map-section .hatay-imar-map {
    background: radial-gradient(circle at center, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

/* Mobil Optimizasyonlar */
@media (max-width: 768px) {
    .interactive-map-section .sec-title {
        font-size: 2rem !important;
        line-height: 1.2 !important;
    }
    
    .interactive-map-section .sub-title {
        font-size: 14px !important;
    }
}
</style>

<!-- Location Modal -->
<div id="locationModal" class="location-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Proje Seçenekleri</h3>
            <button class="modal-close" onclick="closeLocationModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="modalContent">
                <!-- Modal içeriği JavaScript ile doldurulacak -->
            </div>
        </div>
    </div>
</div>



<!--==============================
Soru ve Görüşleriniz Bölümü
==============================-->
<section class="contact-cta-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->contact_subtitle ?: 'Soru ve Görüşleriniz' }}</div>
                    <h2 class="sec-title mb-60">{!! $homeSettings->contact_title ? nl2br(e($homeSettings->contact_title)) : 'Bizimle <span class="bold">İletişime</span><br>Geçmek İçin' !!}</h2>
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
