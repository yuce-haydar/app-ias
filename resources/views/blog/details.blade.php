@extends('layouts.app')

@section('title', 'Haber Detayı - Hatay İmar')
@section('description', 'Hatay İmar projelerinden son haberler ve duyurular.')
@section('keywords', 'hatay imar, haber, proje, sosyal tesis, parke taşı, otopark')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Haber Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('blog.grid') }}">Haberler</a></li>
                    <li>Haber Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Haber Detay Bölümü
==============================-->
<section class="blog-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details-content">
                    <div class="blog-details-thumb">
                        @if($id == 1)
                            <img src="{{ asset('assets/images/imageshatay/proje8.jpeg') }}" alt="Yeni Sosyal Tesis Projesi">
                        @elseif($id == 2)
                            <img src="{{ asset('assets/images/imageshatay/proje9.jpeg') }}" alt="Parke Taşı Üretimi">
                        @elseif($id == 3)
                            <img src="{{ asset('assets/images/imageshatay/proje10.jpeg') }}" alt="Katlı Otopark Yenileme">
                        @else
                            <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Hatay İmar">
                        @endif
                        <div class="date">
                            <span class="day">15</span>
                            <span class="month">Ara</span>
                            <span class="year">2024</span>
                        </div>
                    </div>
                    
                    <div class="blog-details-wrapper">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Hatay İmar</a></span>
                            <span class="category">
                                @if($id == 1) Sosyal Tesisler
                                @elseif($id == 2) Üretim
                                @elseif($id == 3) Altyapı
                                @else Genel @endif
                            </span>
                            <span class="comments">
                                @if($id == 1) 5 Yorum
                                @elseif($id == 2) 8 Yorum
                                @elseif($id == 3) 12 Yorum
                                @else 0 Yorum @endif
                            </span>
                        </div>
                        
                        @if($id == 1)
                            <h1 class="title">Yeni Sosyal Tesis Projesi Başlıyor</h1>
                            
                            <p>Hatay İmar olarak şehrimize yeni bir sosyal tesis kazandırma projemiz başlıyor. Vatandaşlarımızın daha kaliteli hizmet alması ve sosyal ihtiyaçlarının karşılanması için planladığımız bu tesis, modern mimarisi ve geniş hizmet yelpazesi ile dikkat çekiyor.</p>
                            
                            <p>Şehrimizin kuzey bölgesinde inşa edilecek olan sosyal tesis, toplam 5.000 metrekare kapalı alan üzerine kurulacak. Tesis içerisinde konferans salonu, kültürel etkinlik alanları, spor tesisleri ve sosyal aktivite merkezleri yer alacak.</p>
                            
                            <h3>Projenin Ana Özellikleri</h3>
                            
                            <ul>
                                <li>Modern konferans ve toplantı salonları</li>
                                <li>Kültürel etkinlikler için çok amaçlı salonlar</li>
                                <li>Spor ve rekreasyon alanları</li>
                                <li>Kafeterya ve dinlenme alanları</li>
                                <li>Geniş otopark alanı</li>
                            </ul>
                            
                            <blockquote>
                                "Bu proje ile vatandaşlarımızın sosyal ve kültürel ihtiyaçlarını karşılayacak modern bir tesis kazandırıyoruz." - Hatay İmar Yönetimi
                            </blockquote>
                            
                            <h3>İnşaat Süreci ve Tamamlanma Tarihi</h3>
                            
                            <p>Projenin temeli 2025 yılının ilk çeyreğinde atılacak ve yaklaşık 18 ay içerisinde tamamlanması planlanıyor. İnşaat sürecinde çevre dostu malzemeler kullanılacak ve enerji verimliliği ön planda tutulacak.</p>
                            
                        @elseif($id == 2)
                            <h1 class="title">Parke Taşı Üretiminde Yeni Teknoloji</h1>
                            
                            <p>Üretim tesisimizde kullanmaya başladığımız yeni teknoloji ile daha kaliteli ve dayanıklı parke taşları üretiyoruz. Modern makinelerimiz ve gelişmiş üretim teknikleri sayesinde, şehrimizin altyapı ihtiyaçlarını en iyi şekilde karşılıyoruz.</p>
                            
                            <p>Yeni teknoloji ile üretilen parke taşları, daha uzun ömürlü ve çevre dostu özellikler taşıyor. Ayrıca farklı renk ve desen seçenekleri ile estetik açıdan da üstün kalite sunuyoruz.</p>
                            
                            <h3>Yeni Teknolojinin Avantajları</h3>
                            
                            <ul>
                                <li>%30 daha dayanıklı parke taşı üretimi</li>
                                <li>Çevre dostu üretim süreci</li>
                                <li>Geniş renk ve desen seçenekleri</li>
                                <li>Hızlı üretim kapasitesi</li>
                                <li>Kalite standartlarına uygunluk</li>
                            </ul>
                            
                            <blockquote>
                                "Teknolojik yenileşme ile şehrimize daha kaliteli hizmet sunmaya devam ediyoruz." - Üretim Müdürü
                            </blockquote>
                            
                        @elseif($id == 3)
                            <h1 class="title">Katlı Otopark Yenileme Çalışmaları</h1>
                            
                            <p>2005 yılından bu yana hizmet veren Katlı Otopark tesisimizde modernizasyon çalışmaları devam ediyor. Güvenlik sistemlerinin yenilenmesi, aydınlatmanın iyileştirilmesi ve otopark kapasitesinin artırılması hedefleniyor.</p>
                            
                            <p>Yenileme çalışmaları kapsamında, modern güvenlik kameraları, LED aydınlatma sistemleri ve otomatik giriş-çıkış sistemleri kurulacak. Ayrıca elektrikli araçlar için şarj istasyonları da eklenecek.</p>
                            
                            <h3>Yenileme Kapsamındaki Çalışmalar</h3>
                            
                            <ul>
                                <li>Güvenlik kamera sistemlerinin yenilenmesi</li>
                                <li>LED aydınlatma sistemine geçiş</li>
                                <li>Otomatik giriş-çıkış sistemleri</li>
                                <li>Elektrikli araç şarj istasyonları</li>
                                <li>Kat işaretlemelerinin yenilenmesi</li>
                            </ul>
                            
                        @else
                            <h1 class="title">Hatay İmar Genel Haberi</h1>
                            <p>Hatay İmar olarak şehrimizin gelişimi için sürekli çalışmalarımıza devam ediyoruz.</p>
                        @endif
                    </div>
                    
                    <!-- Sosyal Paylaşım -->
                    <div class="blog-share">
                        <h6>Paylaş:</h6>
                        <a href="#" class="social-link facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Son Haberler Widget -->
                    <div class="widget recent-posts-widget">
                        <h3 class="widget-title">Son Haberler</h3>
                        <div class="recent-post-item">
                            <div class="post-thumb">
                                <img src="{{ asset('assets/images/imageshatay/proje11.jpeg') }}" alt="Son Haber">
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog.details', ['id' => 2]) }}">Parke Taşı Üretiminde Yeni Teknoloji</a></h6>
                                <span class="date">12 Aralık 2024</span>
                            </div>
                        </div>
                        <div class="recent-post-item">
                            <div class="post-thumb">
                                <img src="{{ asset('assets/images/imageshatay/proje12.jpeg') }}" alt="Son Haber">
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog.details', ['id' => 3]) }}">Katlı Otopark Yenileme Çalışmaları</a></h6>
                                <span class="date">10 Aralık 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 