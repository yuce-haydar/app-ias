@extends('layouts.app')

@section('title', 'Proje Detayı - Hatay İmar')
@section('description', 'Hatay İmar projelerinin detaylı bilgileri ve özellikleri.')
@section('keywords', 'hatay imar, proje detayı, sosyal tesis, parke taşı, otopark, büz üretim')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Proje Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>Proje Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Proje Detay Bölümü
==============================-->
<section class="project-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    <div class="project-details-thumb">
                        @if($id == 1)
                            <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi">
                        @elseif($id == 2)
                            <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark">
                        @elseif($id == 3)
                            <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis">
                        @elseif($id == 4)
                            <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim">
                        @else
                            <img src="{{ asset('assets/images/imageshatay/proje1.jpeg') }}" alt="Hatay İmar Projesi">
                        @endif
                    </div>
                    
                    <div class="project-details-wrapper">
                        @if($id == 1)
                            <h1 class="title">Büz Üretim Tesisi</h1>
                            
                            <div class="project-meta">
                                <div class="meta-item">
                                    <h6>Tesis Türü:</h6>
                                    <p>Üretim Tesisi</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>Beton Ürünleri</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>Aktif</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Açılış:</h6>
                                    <p>2010</p>
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

                            <h3>Teknik Özellikler</h3>
                            <div class="solution-phases">
                                <div class="phase-item">
                                    <h5>Kalite Kontrol</h5>
                                    <p>Her üretim aşamasında titiz kalite kontrolleri yapılmaktadır.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Dayanıklılık</h5>
                                    <p>Yüksek basınç dayanımı ve uzun ömür garantisi.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Çevre Dostu</h5>
                                    <p>Geri dönüştürülebilir malzemeler kullanılmaktadır.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Hızlı Teslimat</h5>
                                    <p>Sipariş sonrası 48 saat içinde teslimat.</p>
                                </div>
                            </div>

                        @elseif($id == 2)
                            <h1 class="title">Katlı Otopark</h1>
                            
                            <div class="project-meta">
                                <div class="meta-item">
                                    <h6>Tesis Türü:</h6>
                                    <p>Otopark</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>Ulaşım Altyapısı</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>Aktif</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Açılış:</h6>
                                    <p>2005</p>
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

                            <h3>Hizmet Detayları</h3>
                            <div class="solution-phases">
                                <div class="phase-item">
                                    <h5>Güvenlik</h5>
                                    <p>7/24 güvenlik personeli ve kamera sistemi ile güvenli park.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Kolay Erişim</h5>
                                    <p>Şehir merkezinde stratejik konumda bulunmaktadır.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Uygun Fiyat</h5>
                                    <p>Vatandaş dostu uygun otopark ücretleri.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Modern Sistem</h5>
                                    <p>Otomatik ödeme ve kayıt sistemleri.</p>
                                </div>
                            </div>

                        @elseif($id == 3)
                            <h1 class="title">Habib-i Neccar Sosyal Tesis</h1>
                            
                            <div class="project-meta">
                                <div class="meta-item">
                                    <h6>Tesis Türü:</h6>
                                    <p>Sosyal Tesis</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>Rekreasyon</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>Aktif</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Açılış:</h6>
                                    <p>2013</p>
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

                            <h3>Hizmet Alanları</h3>
                            <div class="solution-phases">
                                <div class="phase-item">
                                    <h5>Piknik Alanları</h5>
                                    <p>Aileler için donatılmış modern piknik alanları.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Çocuk Parkı</h5>
                                    <p>Güvenli ve eğlenceli çocuk oyun alanları.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Restoran</h5>
                                    <p>Yerel lezzetlerin sunulduğu restoran hizmeti.</p>
                                </div>
                                <div class="phase-item">
                                    <h5>Doğal Ortam</h5>
                                    <p>Habib-i Neccar Dağı'nın doğal güzelliği.</p>
                                </div>
                            </div>

                        @elseif($id == 4)
                            <h1 class="title">Parke Taşı Üretim Tesisi</h1>
                            
                            <div class="project-meta">
                                <div class="meta-item">
                                    <h6>Tesis Türü:</h6>
                                    <p>Üretim Tesisi</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>Parke Taşı</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>Aktif</p>
                                </div>
                                <div class="meta-item">
                                    <h6>Başlangıç:</h6>
                                    <p>2008</p>
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

                        @else
                            <h1 class="title">Hatay İmar Projesi</h1>
                            <p>Hatay İmar olarak şehrimizin gelişimi için çalışıyoruz.</p>
                        @endif

                        @if(in_array($id, [1, 2, 3, 4]))
                            <h3>Başarı Göstergeleri</h3>
                            <div class="project-results">
                                @if($id == 1)
                                    <div class="result-item">
                                        <h4>500+</h4>
                                        <p>Günlük Üretim</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>14</h4>
                                        <p>Yıllık Deneyim</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>%100</h4>
                                        <p>Kalite Garantisi</p>
                                    </div>
                                @elseif($id == 2)
                                    <div class="result-item">
                                        <h4>300</h4>
                                        <p>Araç Kapasitesi</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>19</h4>
                                        <p>Yıllık Hizmet</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>24/7</h4>
                                        <p>Güvenlik</p>
                                    </div>
                                @elseif($id == 3)
                                    <div class="result-item">
                                        <h4>11</h4>
                                        <p>Yıllık Hizmet</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>1000+</h4>
                                        <p>Aylık Ziyaretçi</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>%95</h4>
                                        <p>Memnuniyet</p>
                                    </div>
                                @elseif($id == 4)
                                    <div class="result-item">
                                        <h4>16</h4>
                                        <p>Yıllık Deneyim</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>50+</h4>
                                        <p>Çeşit Üretim</p>
                                    </div>
                                    <div class="result-item">
                                        <h4>%100</h4>
                                        <p>Yerli Üretim</p>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">Proje Bilgileri</h3>
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
                                <li><strong>Proje:</strong><span>Genel</span></li>
                            @endif
                        </ul>
                    </div>

                    <div class="widget contact-widget">
                        <h3 class="widget-title">Bilgi Almak İçin</h3>
                        <p>Projelerimiz hakkında detaylı bilgi almak için bizimle iletişime geçin.</p>
                        <a href="{{ route('contact') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">İletişime Geç</span>
                                <span class="effect-1">İletişime Geç</span>
                            </span><i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>

                    <div class="widget related-projects-widget">
                        <h3 class="widget-title">Diğer Projeler</h3>
                        @if($id != 1)
                        <div class="related-project-item">
                            <h6><a href="{{ route('project.details', ['id' => 1]) }}">Büz Üretim Tesisi</a></h6>
                            <span class="category">Üretim</span>
                        </div>
                        @endif
                        @if($id != 2)
                        <div class="related-project-item">
                            <h6><a href="{{ route('project.details', ['id' => 2]) }}">Katlı Otopark</a></h6>
                            <span class="category">Altyapı</span>
                        </div>
                        @endif
                        @if($id != 3)
                        <div class="related-project-item">
                            <h6><a href="{{ route('project.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a></h6>
                            <span class="category">Sosyal</span>
                        </div>
                        @endif
                        @if($id != 4)
                        <div class="related-project-item">
                            <h6><a href="{{ route('project.details', ['id' => 4]) }}">Parke Taşı Üretim</a></h6>
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