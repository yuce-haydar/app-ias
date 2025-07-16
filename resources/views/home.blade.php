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
                    
                    <!-- Harita Overlay Bilgi Paneli -->
                    <div class="map-info-panel">
                        <div class="info-content">
                            <h5>🗺️ Harita Kontrolü</h5>
                            <p>Yakınlaştırmak için çift tıklayın</p>
                            <p>Marker'lara tıklayarak detayları görün</p>
                        </div>
                    </div>
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
                        <div class="legend-item">
                            <div class="marker-icon ongoing"></div>
                            <span>Devam Eden Projeler</span>
                        </div>
                        <div class="legend-item">
                            <div class="marker-icon planning"></div>
                            <span>Planlama Aşamasında</span>
                        </div>
                        <div class="legend-item">
                            <div class="marker-icon completed"></div>
                            <span>Tamamlanan Projeler</span>
                        </div>
                        <div class="legend-item">
                            <div class="marker-icon facility"></div>
                            <span>Aktif Tesislerimiz</span>
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

        // Modern harita katmanı
        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>',
            maxZoom: 20
        }).addTo(map);

        // Yol ve etiket katmanı
        L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_toner_labels/{z}/{x}/{y}{r}.png', {
            attribution: '',
            maxZoom: 20,
            opacity: 0.7
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
                    <div style="
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
                        transform: scale(1);
                        transition: all 0.3s ease;
                    ">
                        <i class="${icon}" style="color: white; font-size: ${size * 0.4}px;"></i>
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
                                'type' => 'project'
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
                        'type' => 'project'
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

            return `
                <div style="
                    min-width: 280px;
                    max-width: 320px;
                    font-family: 'Arial', sans-serif;
                    padding: 0;
                    margin: 0;
                ">
                    <div style="
                        background: linear-gradient(135deg, ${statusColor}, ${statusColor}dd);
                        color: white;
                        padding: 15px;
                        margin: -20px -20px 15px -20px;
                        border-radius: 10px 10px 0 0;
                    ">
                        <h4 style="margin: 0; font-size: 16px; font-weight: 600;">
                            ${item.name}
                        </h4>
                        ${isProject ? `<p style="margin: 5px 0 0 0; font-size: 12px; opacity: 0.9;">${item.category || 'Proje'}</p>` : `<p style="margin: 5px 0 0 0; font-size: 12px; opacity: 0.9;">${item.category}</p>`}
                    </div>
                    
                    <div style="padding: 0 5px;">
                        <p style="
                            margin: 0 0 15px 0;
                            color: #555;
                            font-size: 14px;
                            line-height: 1.4;
                        ">
                            ${item.description.substring(0, 120)}${item.description.length > 120 ? '...' : ''}
                        </p>
                        
                        <div style="
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            margin-top: 15px;
                        ">
                            <span style="
                                background: ${statusColor};
                                color: white;
                                padding: 6px 12px;
                                border-radius: 15px;
                                font-size: 11px;
                                font-weight: 500;
                            ">
                                ${statusText}
                            </span>
                            
                            <a href="${item.url}" style="
                                background: #007bff;
                                color: white;
                                padding: 8px 15px;
                                border-radius: 20px;
                                text-decoration: none;
                                font-size: 12px;
                                font-weight: 500;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.background='#0056b3'" onmouseout="this.style.background='#007bff'">
                                Detayları Gör →
                            </a>
                        </div>
                    </div>
                </div>
            `;
        }

        // Projeleri haritaya ekle
        projects.forEach(function(project) {
            const icon = markerIcons[project.status] || markerIcons.planning;
            const marker = L.marker([project.lat, project.lng], { icon: icon }).addTo(map);
            
            marker.bindPopup(createModernPopup(project), {
                maxWidth: 350,
                className: 'modern-popup'
            });

            // Marker hover efekti
            marker.on('mouseover', function() {
                this.getElement().style.transform = 'scale(1.1)';
                this.getElement().style.zIndex = '1000';
            });

            marker.on('mouseout', function() {
                this.getElement().style.transform = 'scale(1)';
                this.getElement().style.zIndex = '400';
            });
        });

        // Tesisleri haritaya ekle
        facilities.forEach(function(facility) {
            const marker = L.marker([facility.lat, facility.lng], { icon: markerIcons.facility }).addTo(map);
            
            marker.bindPopup(createModernPopup(facility), {
                maxWidth: 350,
                className: 'modern-popup'
            });

            // Marker hover efekti
            marker.on('mouseover', function() {
                this.getElement().style.transform = 'scale(1.1)';
                this.getElement().style.zIndex = '1000';
            });

            marker.on('mouseout', function() {
                this.getElement().style.transform = 'scale(1)';
                this.getElement().style.zIndex = '400';
            });
        });

        console.log('🎉 Harita başarıyla yüklendi!');

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
}

.custom-modern-marker div:hover {
    transform: scale(1.1) !important;
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
                    <div class="sub-title"><span><i class="asterisk"></i></span>{{ $homeSettings->featured_projects_subtitle ?: 'Öne Çıkan Projelerimiz' }}</div>
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
