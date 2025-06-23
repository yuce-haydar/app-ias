@extends('layouts.app')

@section('title', 'Ekip Detayı - Nexta İş Danışmanlığı')
@section('description', 'Uzman ekip üyemizin detaylı bilgileri ve deneyimleri.')
@section('keywords', 'ekip detayı, uzman, deneyim, biyografi')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Ekip Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('team') }}">Ekip</a></li>
                    <li>Ekip Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Ekip Detay Bölümü
==============================-->
<section class="team-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-details-thumb">
                    <img src="{{ asset('assets/images/team/details1.jpg') }}" alt="Ekip Üyesi">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-details-content">
                    <h2 class="name">Ahmet Yılmaz</h2>
                    <p class="designation">Genel Müdür</p>
                    
                    <div class="team-info">
                        <h4>İletişim Bilgileri</h4>
                        <ul class="team-contact">
                            <li><strong>E-posta:</strong> ahmet.yilmaz@nexta.com.tr</li>
                            <li><strong>Telefon:</strong> +90 212 123 45 67</li>
                            <li><strong>LinkedIn:</strong> /in/ahmet-yilmaz</li>
                        </ul>
                    </div>

                    <div class="team-bio">
                        <h4>Biyografi</h4>
                        <p>15 yıllık deneyimle stratejik danışmanlık alanında uzman olan Ahmet Yılmaz, çeşitli sektörlerde başarılı projelere imza atmıştır. İş dünyasındaki derin bilgisi ve analitik yaklaşımıyla müşterilerine değer katmaya odaklanmaktadır.</p>
                        
                        <p>Kariyer hayatında uluslararası şirketlerde üst düzey yöneticilik görevlerinde bulunmuş, özellikle dijital dönüşüm ve strateji geliştirme alanlarında uzmanlaşmıştır.</p>
                    </div>

                    <div class="team-skills">
                        <h4>Uzmanlık Alanları</h4>
                        <div class="skills-list">
                            <span class="skill-tag">Stratejik Planlama</span>
                            <span class="skill-tag">İş Geliştirme</span>
                            <span class="skill-tag">Dijital Dönüşüm</span>
                            <span class="skill-tag">Liderlik</span>
                            <span class="skill-tag">Proje Yönetimi</span>
                        </div>
                    </div>

                    <div class="team-social">
                        <h4>Sosyal Medya</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 