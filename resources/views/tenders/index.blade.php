@extends('layouts.app')

@section('title', 'İhale Bilgileri - Hatay İmar')
@section('description', 'Hatay İmar ihale bilgileri, açık ihaleler ve duyurular.')
@section('keywords', 'hatay imar, ihale, açık ihale, ihale bilgileri, duyuru')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İhaleler</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İhaleler</a></li>
                    <li>İhaleler</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--==============================
    İhale Bilgileri Bölümü
==============================-->
<section class="blog-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İhale Bilgileri</div>
                    <h2 class="sec-title mb-60">Açık <span class="bold">İhaleler</span> ve Duyurular</h2>
                    <p class="sec-text">Hatay İmar tarafından açılan ihaleler ve duyurular hakkında güncel bilgiler.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- İhale 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje11.jpeg') }}" alt="İhale" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">25</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 30.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 1]) }}">Parke Taşı Üretim Malzemeleri Alımı</a></h4>
                        <p class="blog-text">2025 yılı parke taşı üretimi için gerekli ham madde ve malzemelerin tedarik edilmesi ihalesi.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 500.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 1]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İhale 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje12.jpeg') }}" alt="Sosyal Tesis Tadilat İhalesi" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">20</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 28.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 2]) }}">Habib-i Neccar Sosyal Tesis Tadilat İşi</a></h4>
                        <p class="blog-text">Sosyal tesisimizin modernizasyon ve tadilat çalışmaları için müteahhit firmaların katılımı.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 750.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 2]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İhale 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay23.jpeg') }}" alt="Büz Üretim Ekipman İhalesi" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">15</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 22.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 3]) }}">Büz Üretim Ekipmanları Yenileme</a></h4>
                        <p class="blog-text">Üretim tesisimizde kullanılan eski ekipmanların yenilenmesi ve modernizasyonu ihalesi.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 1.200.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 3]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İhale 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay24.jpeg') }}" alt="Otopark Güvenlik Sistemi" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">10</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 18.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 4]) }}">Katlı Otopark Güvenlik Sistemi Kurulumu</a></h4>
                        <p class="blog-text">Otopark tesisimizde modern güvenlik kamera ve kontrol sistemlerinin kurulması.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 300.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 4]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İhale 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay25.jpeg') }}" alt="Yeşil Alan Düzenleme" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">05</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 15.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 5]) }}">Sosyal Tesis Çevre Düzenleme İşi</a></h4>
                        <p class="blog-text">Habib-i Neccar Sosyal Tesis çevresinde peyzaj ve yeşil alan düzenleme çalışmaları.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 400.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 5]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İhale 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay26.jpeg') }}" alt="Bakım Onarım İhalesi" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">01</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span><i class="fa-regular fa-calendar"></i> Son Başvuru: 10.12.2024</span>
                            <span><i class="fa-regular fa-clock"></i> Açık İhale</span>
                        </div>
                        <h4 class="blog-title"><a href="{{ route('tender.details', ['id' => 6]) }}">Genel Bakım ve Onarım Hizmetleri</a></h4>
                        <p class="blog-text">Tüm tesislerimizde yıllık bakım, onarım ve temizlik hizmetlerinin verilmesi.</p>
                        <div class="tender-info">
                            <span class="tender-price">Yaklaşık Maliyet: 600.000 TL</span>
                        </div>
                        <a href="{{ route('tender.details', ['id' => 6]) }}" class="blog-link">
                            Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    İhale Süreci Bilgileri
==============================-->
<section class="process-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İhale Süreci</div>
                    <h2 class="sec-title mb-60">İhaleye Nasıl <span class="bold">Katılabilirsiniz?</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-file-text"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">İhale Şartnamesi</h4>
                    <p class="process-text">İhale detaylarını ve şartlarını inceleyin, gerekli belgeleri hazırlayın.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-clipboard-check"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Başvuru</h4>
                    <p class="process-text">Belirtilen süre içinde tüm belgelerle birlikte başvurunuzu yapın.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-gavel"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">İhale Açılışı</h4>
                    <p class="process-text">Belirlenen tarih ve saatte ihale komisyonu önünde teklifler açılır.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-handshake"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">Sözleşme</h4>
                    <p class="process-text">En uygun teklif sahibi ile sözleşme imzalanır ve iş başlatılır.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hızlı Linkler
==============================-->
<section class="cta-section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Hızlı Erişim</div>
                    <h2 class="sec-title text-white mb-60">İhale İşlemleri için <span class="bold">Hızlı Linkler</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <h4 class="cta-title">İlanlar</h4>
                    <p class="cta-text">Güncel duyuru ve ilanları görüntüleyin.</p>
                    <a href="{{ route('announcements') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">İlanları Gör</span>
                            <span class="effect-1">İlanları Gör</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <h4 class="cta-title">İlan Başvuru Formu</h4>
                    <p class="cta-text">İlan vermek için başvuru formunu doldurun.</p>
                    <a href="{{ route('tender.application') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">Başvuru Yap</span>
                            <span class="effect-1">Başvuru Yap</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h4 class="cta-title">İletişim</h4>
                    <p class="cta-text">Sorularınız için bizimle iletişime geçin.</p>
                    <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">İletişim</span>
                            <span class="effect-1">İletişim</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 