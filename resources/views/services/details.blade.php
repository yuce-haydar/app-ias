@extends('layouts.app')

@section('title', 'Hizmet Detayı - Nexta İş Danışmanlığı')
@section('description', 'Nexta\'nın sunduğu profesyonel danışmanlık hizmetlerinin detayları.')
@section('keywords', 'hizmet detayı, iş danışmanlığı, çözüm, strateji')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Hizmet Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('services') }}">Hizmetler</a></li>
                    <li>Hizmet Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Hizmet Detay Bölümü
==============================-->
<section class="service-details-section space bg-theme3">
    <div class="container">
        <div class="row gy-30">
            <div class="col-lg-8">
                <div class="service-details-content">
                    <div class="service-details-thumb">
                        <img src="{{ asset('assets/images/service/details01.jpg') }}" alt="Hizmet Detayı">
                    </div>
                    <div class="service-details-wrapper">
                        <h2 class="title">Profesyonel İş Danışmanlığı Hizmetleri</h2>
                        <p class="text">İşletmenizin başarıya ulaşması için kapsamlı danışmanlık hizmetleri sunuyoruz. Uzman ekibimizle her aşamada yanınızdayız ve işinizin büyümesine odaklanıyoruz.</p>
                        
                        <h3 class="subtitle">Hizmet Kapsamı</h3>
                        <ul class="service-list">
                            <li>Stratejik planlama ve hedef belirleme</li>
                            <li>Operasyonel verimlilik analizi</li>
                            <li>Finansal performans değerlendirmesi</li>
                            <li>Pazar araştırması ve rekabet analizi</li>
                            <li>Organizasyonel gelişim danışmanlığı</li>
                        </ul>

                        <h3 class="subtitle">Neden Bizi Seçmelisiniz?</h3>
                        <div class="row gy-20 mt-30">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="flaticon-service"></i>
                                    </div>
                                    <div class="content">
                                        <h4>15+ Yıl Deneyim</h4>
                                        <p>Sektörde kanıtlanmış başarı geçmişi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="flaticon-people"></i>
                                    </div>
                                    <div class="content">
                                        <h4>Uzman Ekip</h4>
                                        <p>Alanında uzman danışmanlar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="widget service-widget">
                        <h3 class="widget-title">Diğer Hizmetlerimiz</h3>
                        <ul class="service-list-widget">
                            <li><a href="{{ route('service.details', ['id' => 1]) }}">İş Zekası <i class="fa-regular fa-arrow-right-long"></i></a></li>
                            <li><a href="{{ route('service.details', ['id' => 2]) }}">Risk Yönetimi <i class="fa-regular fa-arrow-right-long"></i></a></li>
                            <li><a href="{{ route('service.details', ['id' => 3]) }}">Finans Danışmanlığı <i class="fa-regular fa-arrow-right-long"></i></a></li>
                            <li><a href="{{ route('service.details', ['id' => 4]) }}">Portföy Yönetimi <i class="fa-regular fa-arrow-right-long"></i></a></li>
                            <li><a href="{{ route('service.details', ['id' => 5]) }}">Danışmanlık Ağı <i class="fa-regular fa-arrow-right-long"></i></a></li>
                        </ul>
                    </div>
                    
                    <div class="widget contact-widget">
                        <h3 class="widget-title">İletişime Geçin</h3>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-light fa-circle-phone"></i>
                                </div>
                                <div class="info">
                                    <a href="tel:+902121234567">+90 212 123 45 67</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-light fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <a href="mailto:info@nexta.com.tr">info@nexta.com.tr</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="theme-btn bg-dark">
                            <span class="link-effect">
                                <span class="effect-1">Teklif Al</span>
                                <span class="effect-1">Teklif Al</span>
                            </span><i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 