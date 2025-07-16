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
Projeler Haritası Bölümü
==============================-->
<section class="projects-map-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Proje ve Tesis Haritası</div>
                    <h2 class="sec-title text-white mb-60">Projelerimiz ve <span class="bold">Tesislerimizin</span><br>Konumu</h2>
                </div>
            </div>
        </div>

        <!-- Leaflet Harita -->
        <div class="row">
            <div class="col-lg-12">
                <div class="map-container" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <div id="projectMap" class="project-map"></div>
                </div>
            </div>
        </div>

        <!-- Harita Açıklaması -->
        <div class="row mt-40">
            <div class="col-lg-12">
                <div class="map-legend text-center">
                    <div class="legend-items d-flex justify-content-center gap-3 flex-wrap">
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 20px; height: 20px; background: #28a745; border-radius: 50%; margin-right: 8px;"></div>
                            <span style="color: #fff; font-size: 14px;">Devam Eden Projeler</span>
                        </div>
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 20px; height: 20px; background: #ffc107; border-radius: 50%; margin-right: 8px;"></div>
                            <span style="color: #fff; font-size: 14px;">Planlama Aşamasında</span>
                        </div>
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 20px; height: 20px; background: #007bff; border-radius: 50%; margin-right: 8px;"></div>
                            <span style="color: #fff; font-size: 14px;">Tamamlanan Projeler</span>
                        </div>
                        <div class="legend-item d-flex align-items-center">
                            <div class="legend-marker" style="width: 22px; height: 22px; background: #6f42c1; border-radius: 50%; margin-right: 8px; border: 2px solid white;"></div>
                            <span style="color: #fff; font-size: 14px;">Aktif Tesisler</span>
                        </div>
                    </div>
                    <p class="mt-3" style="color: #ccc; font-size: 14px;">Haritadaki işaretlere tıklayarak proje ve tesis detaylarını görebilirsiniz</p>
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
    console.log('🗺️ Map script loading...');
    
    // Leaflet yüklendi mi kontrol et
    if (typeof L === 'undefined') {
        console.error('❌ Leaflet library not loaded!');
        return;
    }
    console.log('✅ Leaflet library loaded');
    
    // Map container var mı kontrol et
    var mapElement = document.getElementById('projectMap');
    if (!mapElement) {
        console.error('❌ Map container #projectMap not found!');
        return;
    }
    console.log('✅ Map container found');

    // Hatay koordinatları (Antakya merkez)
    var hatayCoords = [36.2027, 36.1621];

    // Hatay bölgesi sınırları (güneybatı ve kuzeydoğu köşeler)
    var hatayBounds = [
        [35.8, 35.8], // güneybatı köşe
        [36.6, 36.6]  // kuzeydoğu köşe
    ];

    // Mobil cihaz tespit et
    var isMobile = window.innerWidth <= 768;

    // Harita oluştur - zoom kısıtlamaları ve mobil optimizasyonu ile
    try {
        console.log('🗺️ Creating map...');
        var map = L.map('projectMap', {
            center: hatayCoords,
            zoom: isMobile ? 10 : 11,  // mobilde biraz daha uzak başlat
            minZoom: isMobile ? 8 : 9,   // mobilde daha uzaklaştırabilsin
            maxZoom: 15,  
            maxBounds: hatayBounds, 
            maxBoundsViscosity: 1.0,
            // Mobil dokunma optimizasyonları
            tap: true,
            tapTolerance: 15,
            touchZoom: isMobile ? true : 'center',
            scrollWheelZoom: !isMobile, // mobilde scroll zoom'u kapat
            doubleClickZoom: true,
            dragging: true,
            // Mobilde pan ve zoom davranışlarını optimize et
            worldCopyJump: false,
            zoomControl: !isMobile, // mobilde zoom butonlarını gizle
            attributionControl: false // mobilde attribution'ı gizle
        });
        console.log('✅ Map created successfully');
    } catch (error) {
        console.error('❌ Map creation failed:', error);
        return;
    }

    // Satellite görünümü için Esri World Imagery kullan
    try {
        console.log('🗺️ Adding tile layers...');
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: '© Esri, Maxar, Earthstar Geographics'
        }).addTo(map);

        // İsteğe bağlı: Yol ve yer adları için overlay ekle
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Reference/World_Boundaries_and_Places/MapServer/tile/{z}/{y}/{x}', {
            attribution: '© Esri'
        }).addTo(map);
        console.log('✅ Tile layers added successfully');
    } catch (error) {
        console.error('❌ Tile layer addition failed:', error);
    }

    // Mobilde basit zoom control ekle
    if (isMobile) {
        L.control.zoom({
            position: 'topright'
        }).addTo(map);
    }

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

    var completedIcon = L.divIcon({
        className: 'custom-marker completed',
        html: '<div style="background: #007bff; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3);"><i class="fa-solid fa-check-circle" style="color: white; font-size: 14px;"></i></div>',
        iconSize: [30, 30],
        iconAnchor: [15, 15]
    });

    // Tesis marker iconları
    var facilityIcon = L.divIcon({
        className: 'custom-marker facility',
        html: '<div style="background: #6f42c1; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 3px 10px rgba(0,0,0,0.3); border: 2px solid white;"><i class="fa-solid fa-building" style="color: white; font-size: 16px;"></i></div>',
        iconSize: [32, 32],
        iconAnchor: [16, 16]
    });

    // Proje konumları - Veritabanından dinamik olarak (birden fazla lokasyon desteği)
    var projects = [
        @foreach($allProjects as $project)
            @if($project->locations && $project->locations->count() > 0)
                @foreach($project->locations as $location)
                {
                    name: "{{ $project->title }} - {{ $location->name }}",
                    coords: [{{ $location->latitude }}, {{ $location->longitude }}],
                    status: "{{ $project->status }}",
                    description: "{{ $location->description ?: Str::limit($project->short_description, 100) }}",
                    url: "{{ route('project.details', ['id' => $project->id]) }}",
                    projectTitle: "{{ $project->title }}",
                    locationName: "{{ $location->name }}"
                },
                @endforeach
            @elseif($project->latitude && $project->longitude)
            {
                name: "{{ $project->title }}",
                coords: [{{ $project->latitude }}, {{ $project->longitude }}],
                status: "{{ $project->status }}",
                description: "{!! Str::limit($project->short_description, 100) !!}",
                url: "{{ route('project.details', ['id' => $project->id]) }}",
                projectTitle: "{{ $project->title }}",
                locationName: "Ana Lokasyon"
            },
            @endif
        @endforeach
        // Fallback projeler (eğer koordinatlı proje yoksa)
        @if($allProjects->whereNotNull('latitude')->whereNotNull('longitude')->count() == 0)
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
        @endif
    ];

    // Tesis konumları - Veritabanından dinamik olarak
    var facilities = [
        @foreach($allFacilities as $facility)
            @if($facility->latitude && $facility->longitude)
            {
                name: "{{ $facility->name }}",
                coords: [{{ $facility->latitude }}, {{ $facility->longitude }}],
                type: "facility",
                category: "{{ $facility->category ?: 'Tesis' }}",
                description: "{!! Str::limit($facility->short_description, 100) !!}",
                url: "{{ route('facilities.details', ['id' => $facility->id, 'slug' => $facility->slug]) }}",
                address: "{{ $facility->address ?: '' }}",
                phone: "{{ $facility->phone ?: '' }}"
            },
            @endif
        @endforeach
    ];
    
    console.log('📍 Facilities data loaded:', facilities.length, 'facilities');
    console.log('🏗️ Projects data loaded:', projects.length, 'projects');

    // Projeler için marker'ları haritaya ekle
    console.log('🗺️ Adding project markers...');
    projects.forEach(function(project) {
        var icon;
        var statusText;
        var statusColor;
        
        if (project.status === 'ongoing') {
            icon = ongoingIcon;
            statusText = 'Devam Ediyor';
            statusColor = '#28a745';
        } else if (project.status === 'completed') {
            icon = completedIcon;
            statusText = 'Tamamlandı';
            statusColor = '#007bff';
        } else {
            icon = planningIcon;
            statusText = 'Planlama Aşamasında';
            statusColor = '#ffc107';
        }

        var marker = L.marker(project.coords, {icon: icon}).addTo(map);

        var popupContent = `
            <div style="text-align: center; min-width: ${isMobile ? '180px' : '200px'}; max-width: ${isMobile ? '250px' : '300px'};">
                <h5 style="margin: 0 0 8px 0; color: #333; font-size: ${isMobile ? '14px' : '16px'};">${project.name}</h5>
                <p style="margin: 0 0 10px 0; color: #666; font-size: ${isMobile ? '12px' : '13px'}; line-height: 1.4;">${project.description}</p>
                <span style="background: ${statusColor}; color: white; padding: 4px 8px; border-radius: 12px; font-size: ${isMobile ? '10px' : '11px'};">${statusText}</span>
                ${project.url ? '<div style="margin-top: 10px;"><a href="' + project.url + '" style="color: #007bff; text-decoration: none; font-size: ' + (isMobile ? '11px' : '12px') + ';">Proje Detayları →</a></div>' : ''}
            </div>
        `;

        marker.bindPopup(popupContent);

        // Marker tıklama olayı
        marker.on('click', function() {
            console.log('Clicked project:', project.name);
            // Eğer proje URL'si varsa detay sayfasına yönlendir
            if (project.url) {
                // Popup'ı açalım, link tıklanabilir olsun
                marker.openPopup();
            }
        });
    });

    // Tesisler için marker'ları haritaya ekle
    console.log('🗺️ Adding facility markers...');
    facilities.forEach(function(facility) {
        var marker = L.marker(facility.coords, {icon: facilityIcon}).addTo(map);

        var popupContent = `
            <div style="text-align: center; min-width: ${isMobile ? '180px' : '200px'}; max-width: ${isMobile ? '250px' : '300px'};">
                <h5 style="margin: 0 0 8px 0; color: #333; font-size: ${isMobile ? '14px' : '16px'};">${facility.name}</h5>
                <p style="margin: 0 0 8px 0; color: #6f42c1; font-size: ${isMobile ? '11px' : '12px'}; font-weight: 600;">${facility.category}</p>
                <p style="margin: 0 0 10px 0; color: #666; font-size: ${isMobile ? '12px' : '13px'}; line-height: 1.4;">${facility.description}</p>
                <span style="background: #6f42c1; color: white; padding: 4px 8px; border-radius: 12px; font-size: ${isMobile ? '10px' : '11px'}; display: inline-block; margin-bottom: 10px;">🏢 Aktif Tesis</span>
                <div style="margin-top: 10px;">
                    <a href="${facility.url}" style="color: #6f42c1; text-decoration: none; font-size: ${isMobile ? '11px' : '12px'}; font-weight: 500;">Tesis Detayları →</a>
                </div>
            </div>
        `;

        marker.bindPopup(popupContent);

        // Marker tıklama olayı
        marker.on('click', function() {
            console.log('Clicked facility:', facility.name);
            marker.openPopup();
        });
    });
    
    console.log('🎉 Map initialization completed successfully!');
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

/* Proje Haritası Responsive */
.project-map {
    height: 500px;
    width: 100%;
    touch-action: pan-x pan-y;
}

/* Mobil cihazlarda harita boyutları */
@media (max-width: 768px) {
    .project-map {
        height: 300px !important;
        touch-action: manipulation;
    }
    
    /* Harita container'ında scroll engellemesi */
    .map-container {
        position: relative;
        overflow: hidden;
    }
    
    /* Legend mobil optimizasyonu */
    .legend-items {
        gap: 15px !important;
        flex-direction: column;
        align-items: center;
    }
    
    .legend-item {
        justify-content: center;
        margin: 5px 0;
    }
    
    .legend-item span {
        font-size: 13px !important;
    }
}

@media (max-width: 480px) {
    .project-map {
        height: 250px !important;
    }
    
    /* Çok küçük ekranlarda daha da küçült */
    .map-container {
        margin: 0 -15px;
        border-radius: 0 !important;
    }
    
    /* Harita başlığını mobilde küçült */
    .projects-map-section .sec-title {
        font-size: 2rem !important;
        line-height: 1.2 !important;
    }
    
    .projects-map-section .sub-title {
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
