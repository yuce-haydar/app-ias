@extends('layouts.app')

@section('title', 'Sayfa Bulunamadı - 404 Hatası')
@section('description', 'Aradığınız sayfa bulunamadı. Ana sayfaya dönün veya diğer sayfalarımızı keşfedin.')

@section('content')

<!--==============================
404 Hata Bölümü
==============================-->
<section class="error-section space bg-theme3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-content">
                    <div class="error-thumb">
                        <img src="{{ asset('assets/images/error/404.jpg') }}" alt="404 Hatası">
                        <div class="error-shape">
                            <img src="{{ asset('assets/images/error/shape01.png') }}" alt="Shape">
                        </div>
                    </div>
                    
                    <div class="error-text">
                        <h1 class="error-title">404</h1>
                        <h2 class="title">Üzgünüz! Sayfa Bulunamadı</h2>
                        <p class="text">Aradığınız sayfa mevcut değil, kaldırılmış veya geçici olarak kullanım dışı olabilir. Lütfen URL'yi kontrol edin veya ana sayfaya dönün.</p>
                        
                        <!-- Arama Formu -->
                        <div class="error-search">
                            <form class="search-form" action="{{ route('blog.grid') }}" method="GET">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Aradığınızı buraya yazın..." class="form-control">
                                    <button type="submit" class="search-btn">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Eylem Butonları -->
                        <div class="error-actions">
                            <a href="{{ route('home') }}" class="theme-btn">
                                <span class="link-effect">
                                    <span class="effect-1">Ana Sayfaya Dön</span>
                                    <span class="effect-1">Ana Sayfaya Dön</span>
                                </span><i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            
                            <a href="{{ route('contact') }}" class="theme-btn btn-outline ml-20">
                                <span class="link-effect">
                                    <span class="effect-1">Bize Ulaşın</span>
                                    <span class="effect-1">Bize Ulaşın</span>
                                </span><i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
Hızlı Linkler Bölümü
==============================-->
<section class="quick-links-section bg-white pb-50">
    <div class="container">
        <div class="title-area text-center mb-50">
            <h3 class="sec-title">Popüler Sayfalarımız</h3>
            <p class="sec-text">Aradığınızı bulamadınız mı? Bu popüler sayfalarımızdan birinde aradığınızı bulabilirsiniz.</p>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-home"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('home') }}">Ana Sayfa</a></h4>
                    <p class="text">Şirketimiz ve hizmetlerimiz hakkında genel bilgiler</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-info"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('about') }}">Hakkımızda</a></h4>
                                                                <p class="text">Hatay İmar'ın hikayesi, misyonu ve vizyonu</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-service"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('services') }}">Hizmetlerimiz</a></h4>
                    <p class="text">Sunduğumuz profesyonel danışmanlık hizmetleri</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-contact"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('contact') }}">İletişim</a></h4>
                    <p class="text">Bizimle iletişime geçin ve teklif alın</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-blog"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('blog.grid') }}">Blog</a></h4>
                    <p class="text">İş dünyasından güncel haberler ve ipuçları</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-team"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('team') }}">Ekibimiz</a></h4>
                    <p class="text">Uzman danışman kadromuzla tanışın</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-project"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('projects') }}">Projelerimiz</a></h4>
                    <p class="text">Başarıyla tamamladığımız proje örnekleri</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-link-item">
                    <div class="icon">
                        <i class="icon-faq"></i>
                    </div>
                    <h4 class="title"><a href="{{ route('faq') }}">SSS</a></h4>
                    <p class="text">Sık sorulan sorular ve yanıtları</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 