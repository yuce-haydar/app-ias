@extends('layouts.app')

@section('title', 'Tesis Detayı - Hatay İmar')
@section('description', 'Hatay İmar tesislerinin detaylı bilgileri ve özellikleri.')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Tesis Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('facilities.index') }}">Tesisler</a></li>
                    <li>Tesis Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Tesis Detay Bölümü
==============================-->
<section class="project-details-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    
                    @if($id == 1)
                        <!-- Büz Üretim Tesisi -->
                        <div class="project-details-thumb mb-40">
                            <img src="{{ asset('assets/images/projeler/Büz-Üretim-Tesisi.jpg') }}" alt="Büz Üretim Tesisi" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
                        </div>
                        
                        <h1 class="project-title mb-30">Büz Üretim Tesisi</h1>
                        
                        <div class="project-meta mb-40">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Tesis Türü:</h6>
                                        <p>Üretim Tesisi</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Kategori:</h6>
                                        <p>Beton Ürünleri</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Durum:</h6>
                                        <p>Aktif</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Açılış:</h6>
                                        <p>2010</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Tesis Hakkında</h3>
                        <p>Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan beton borulardır. Modern üretim tesisimizde şehrimizin altyapı ihtiyaçlarını karşılayacak kalitede ürünler üretiyoruz.</p>

                        <h3>Üretim Kapasitesi</h3>
                        <ul class="project-objectives">
                            <li>Günlük 500 adet büz üretim kapasitesi</li>
                            <li>30-120 cm çap aralığında üretim</li>
                            <li>TSE standartlarına uygun kalite</li>
                            <li>Çevre dostu üretim teknolojisi</li>
                            <li>7/24 üretim imkanı</li>
                        </ul>

                        <div class="project-results mt-40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>500+</h4>
                                        <p>Günlük Üretim</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>14</h4>
                                        <p>Yıllık Deneyim</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>%100</h4>
                                        <p>Kalite Garantisi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tesis Fotoğrafları -->
                        <div class="facility-gallery mt-50">
                            <h3 class="mb-30">Tesis Fotoğrafları</h3>
                            <div class="row gy-20">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/images/projeler/Büz-Üretim-Tesisi.jpg') }}" alt="Büz Üretim" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                                </div>
                               
                            </div>
                        </div>

                        <!-- Çalışma Saatleri -->
                        <div class="working-hours mt-40">
                            <h3 class="mb-20">Çalışma Saatleri</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="working-hours-list">
                                        <li><strong>Pazartesi - Cuma:</strong> 08:00 - 17:00</li>
                                        <li><strong>Cumartesi:</strong> 08:00 - 12:00</li>
                                        <li><strong>Pazar:</strong> Kapalı</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <p><strong>Sipariş Telefonu:</strong> +90 326 214 15 16</p>
                                        <p><strong>E-posta:</strong> buz@hatayimar.gov.tr</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($id == 2)
                        <!-- Katlı Otopark -->
                        <div class="project-details-thumb mb-40">
                            <img src="{{ asset('assets/images/projeler/katlı-otopark.jpg') }}" alt="Katlı Otopark" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
                        </div>
                        
                        <h1 class="project-title mb-30">Katlı Otopark</h1>
                        
                        <div class="project-meta mb-40">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Tesis Türü:</h6>
                                        <p>Otopark</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Kategori:</h6>
                                        <p>Ulaşım Altyapısı</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Durum:</h6>
                                        <p>Aktif</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Açılış:</h6>
                                        <p>2005</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Tesis Hakkında</h3>
                        <p>2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan vatandaşlarımızın ihtiyacını karşılamak amacıyla inşa edilmiştir.</p>

                        <h3>Otopark Özellikleri</h3>
                        <ul class="project-objectives">
                            <li>4 katlı modern otopark yapısı</li>
                            <li>300 araç kapasitesi</li>
                            <li>24 saat güvenlik hizmeti</li>
                            <li>Modern güvenlik kamera sistemleri</li>
                            <li>Otomatik giriş-çıkış sistemleri</li>
                        </ul>

                        <div class="project-results mt-40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>300</h4>
                                        <p>Araç Kapasitesi</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>19</h4>
                                        <p>Yıllık Hizmet</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>24/7</h4>
                                        <p>Güvenlik</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Otopark Fotoğrafları -->
                        <div class="facility-gallery mt-50">
                            <h3 class="mb-30">Otopark Fotoğrafları</h3>
                            <div class="row gy-20">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/images/projeler/katlı-otopark.jpg') }}" alt="Otopark Girişi" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                                </div>
                               
                            </div>
                        </div>

                        <!-- Ücret Tarifesi -->
                        <div class="pricing-info mt-40">
                            <h3 class="mb-20">Ücret Tarifesi</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="pricing-list">
                                      
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <p><strong>Bilgi Telefonu:</strong> +90 326 214 15 17</p>
                                        <p><strong>E-posta:</strong> otopark@hatayimar.gov.tr</p>
                                        <p><strong>Açık:</strong> 24 Saat Hizmet</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($id == 3)
                        <!-- Habib-i Neccar Sosyal Tesis -->
                        <div class="project-details-thumb mb-40">
                            <img src="{{ asset('assets/images/projeler/Habib-i-Neccar-Sosyal-Tesis.jpg') }}" alt="Habib-i Neccar Sosyal Tesis" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
                        </div>
                        
                        <h1 class="project-title mb-30">Habib-i Neccar Sosyal Tesis</h1>
                        
                        <div class="project-meta mb-40">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Tesis Türü:</h6>
                                        <p>Sosyal Tesis</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Kategori:</h6>
                                        <p>Rekreasyon</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Durum:</h6>
                                        <p>Aktif</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Açılış:</h6>
                                        <p>2013</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Tesis Hakkında</h3>
                        <p>2013 yılında faaliyete açıldı. Habib-i Neccar Dağı Eteklerinde İzmir Caddesi'nde, Antakyalıların ailece ziyaret edebilecekleri, doğayla iç içe bir ortamda hizmet veren sosyal tesisimizdir.</p>

                        <h3>Tesis Özellikleri</h3>
                        <ul class="project-objectives">
                            <li>Doğal ortamda sosyal aktivite alanları</li>
                            <li>Aile piknik alanları</li>
                            <li>Çocuk oyun parkları</li>
                            <li>Restoran ve kafeterya hizmetleri</li>
                            <li>Geniş yeşil alanlar</li>
                        </ul>

                        <div class="project-results mt-40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>11</h4>
                                        <p>Yıllık Hizmet</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>1000+</h4>
                                        <p>Aylık Ziyaretçi</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>%95</h4>
                                        <p>Memnuniyet</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sosyal Tesis Fotoğrafları -->
                        <div class="facility-gallery mt-50">
                            <h3 class="mb-30">Tesis Fotoğrafları</h3>
                            <div class="row gy-20">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/images/projeler/Habib-i-Neccar-Sosyal-Tesis.jpg') }}" alt="Sosyal Alan" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                                </div>
                                
                            </div>
                        </div>

                        <!-- Hizmet Saatleri ve Menü -->
                        <div class="service-hours mt-40">
                            <h3 class="mb-20">Hizmet Saatleri ve Bilgiler</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="service-hours-list">
                                        <li><strong>Hafta İçi:</strong> 09:00 - 22:00</li>
                                        <li><strong>Hafta Sonu:</strong> 08:00 - 23:00</li>
                                        <li><strong>Restoran:</strong> 12:00 - 21:00</li>
                                        <li><strong>Rezervasyon:</strong> Önerilir</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <p><strong>Rezervasyon:</strong> +90 326 214 15 18</p>
                                        <p><strong>E-posta:</strong> sosyal@hatayimar.gov.tr</p>
                                        <p><strong>Adres:</strong> Habib-i Neccar Dağı Etekleri</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($id == 4)
                        <!-- Parke Taşı Üretim Tesisi -->
                        <div class="project-details-thumb mb-40">
                                <img src="{{ asset('assets/images/projeler/Parke-Taşı-Üretim-Tesisi.jpg') }}" alt="Parke Taşı Üretim Tesisi" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
                        </div>
                        
                        <h1 class="project-title mb-30">Parke Taşı Üretim Tesisi</h1>
                        
                        <div class="project-meta mb-40">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Tesis Türü:</h6>
                                        <p>Üretim Tesisi</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Kategori:</h6>
                                        <p>Parke Taşı</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Durum:</h6>
                                        <p>Aktif</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="meta-item">
                                        <h6>Başlangıç:</h6>
                                        <p>2008</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Tesis Hakkında</h3>
                        <p>Kullanımı çok eski çağlara dayanan parke taşı: taşın yontulup şekle konulması veya mevcut şekliyle montajının yapılması ile elde edilen döşeme malzemesidir. Modern tesisimizde kaliteli parke taşı üretimi yapılmaktadır.</p>

                        <h3>Üretim Çeşitleri</h3>
                        <ul class="project-objectives">
                            <li>Kilitli parke taşı çeşitleri</li>
                            <li>Renkli parke taşı seçenekleri</li>
                            <li>Farklı desen ve boyutlarda üretim</li>
                            <li>Çevre dostu malzemeler</li>
                            <li>Dayanıklı ve estetik ürünler</li>
                        </ul>

                        <div class="project-results mt-40">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>16</h4>
                                        <p>Yıllık Deneyim</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>50+</h4>
                                        <p>Çeşit Üretim</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="result-item text-center">
                                        <h4>%100</h4>
                                        <p>Yerli Üretim</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <h1 class="project-title mb-30">Hatay İmar Tesisi</h1>
                        <p>Hatay İmar olarak şehrimizin gelişimi için çalışıyoruz.</p>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">Tesis Bilgileri</h3>
                        <ul class="project-info-list">
                            @if($id == 1)
                                <li><strong>Tesis:</strong><span>Büz Üretim</span></li>
                                <li><strong>Kapasite:</strong><span>500 adet/gün</span></li>
                                <li><strong>Çap Aralığı:</strong><span>30-120 cm</span></li>
                                <li><strong>Standart:</strong><span>TSE Uygun</span></li>
                                <li><strong>Teslimat:</strong><span>48 Saat</span></li>
                            @elseif($id == 2)
                                <li><strong>Tesis:</strong><span>Katlı Otopark</span></li>
                                <li><strong>Kapasite:</strong><span>300 Araç</span></li>
                                <li><strong>Kat Sayısı:</strong><span>4 Kat</span></li>
                                <li><strong>Güvenlik:</strong><span>24/7</span></li>
                                <li><strong>Konum:</strong><span>Şehir Merkezi</span></li>
                            @elseif($id == 3)
                                <li><strong>Tesis:</strong><span>Sosyal Tesis</span></li>
                                <li><strong>Konum:</strong><span>Habib-i Neccar</span></li>
                                <li><strong>Alan:</strong><span>Geniş Yeşil Alan</span></li>
                                <li><strong>Hizmet:</strong><span>Aile Rekreasyonu</span></li>
                                <li><strong>Açık:</strong><span>7 Gün</span></li>
                            @elseif($id == 4)
                                <li><strong>Tesis:</strong><span>Parke Üretim</span></li>
                                <li><strong>Çeşit:</strong><span>50+ Model</span></li>
                                <li><strong>Kalite:</strong><span>TSE Belgeli</span></li>
                                <li><strong>Renk:</strong><span>Çok Seçenek</span></li>
                                <li><strong>Üretim:</strong><span>Yerli</span></li>
                            @else
                                <li><strong>Tesis:</strong><span>Genel</span></li>
                            @endif
                        </ul>
                    </div>

                    <div class="widget location-widget">
                        <h3 class="widget-title">Tesise Git</h3>
                        <p>Tesisimizi ziyaret etmek için harita üzerinden konum bilgilerini görüntüleyin.</p>
                        @if($id == 1)
                            <a href="https://maps.google.com/?q=Büz+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn bg-success mb-3">
                                <span class="link-effect">
                                    <span class="effect-1">Haritada Göster</span>
                                    <span class="effect-1">Haritada Göster</span>
                                </span><i class="fa-solid fa-location-dot"></i>
                            </a>
                        @elseif($id == 2)
                            <a href="https://maps.google.com/?q=Katlı+Otopark+Antakya+Hatay" target="_blank" class="theme-btn bg-success mb-3">
                                <span class="link-effect">
                                    <span class="effect-1">Haritada Göster</span>
                                    <span class="effect-1">Haritada Göster</span>
                                </span><i class="fa-solid fa-location-dot"></i>
                            </a>
                        @elseif($id == 3)
                            <a href="https://maps.google.com/?q=Habib-i+Neccar+Sosyal+Tesis+Antakya+Hatay" target="_blank" class="theme-btn bg-success mb-3">
                                <span class="link-effect">
                                    <span class="effect-1">Haritada Göster</span>
                                    <span class="effect-1">Haritada Göster</span>
                                </span><i class="fa-solid fa-location-dot"></i>
                            </a>
                        @elseif($id == 4)
                            <a href="https://maps.google.com/?q=Parke+Taşı+Üretim+Tesisi+Hatay" target="_blank" class="theme-btn bg-success mb-3">
                                <span class="link-effect">
                                    <span class="effect-1">Haritada Göster</span>
                                    <span class="effect-1">Haritada Göster</span>
                                </span><i class="fa-solid fa-location-dot"></i>
                            </a>
                        @endif
                    </div>

                    <div class="widget contact-widget">
                        <h3 class="widget-title">Bilgi Almak İçin</h3>
                        <p>Tesislerimiz hakkında detaylı bilgi almak için bizimle iletişime geçin.</p>
                        <a href="{{ route('contact') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">İletişime Geç</span>
                                <span class="effect-1">İletişime Geç</span>
                            </span><i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>

                    <div class="widget related-projects-widget">
                        <h3 class="widget-title">Diğer Tesisler</h3>
                        @if($id != 1)
                        <div class="related-project-item">
                            <h6><a href="{{ route('facilities.details', ['id' => 1]) }}">Büz Üretim Tesisi</a></h6>
                            <span class="category">Üretim</span>
                        </div>
                        @endif
                        @if($id != 2)
                        <div class="related-project-item">
                            <h6><a href="{{ route('facilities.details', ['id' => 2]) }}">Katlı Otopark</a></h6>
                            <span class="category">Altyapı</span>
                        </div>
                        @endif
                        @if($id != 3)
                        <div class="related-project-item">
                            <h6><a href="{{ route('facilities.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a></h6>
                            <span class="category">Sosyal</span>
                        </div>
                        @endif
                        @if($id != 4)
                        <div class="related-project-item">
                            <h6><a href="{{ route('facilities.details', ['id' => 4]) }}">Parke Taşı Üretim</a></h6>
                            <span class="category">Üretim</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 