@extends('layouts.app')

@section('title', 'Yönetim Kurulu - Hatay İmar')
@section('description', 'Hatay İmar\'ın deneyimli yönetim kurulu üyeleri. Şehrimize hizmet eden uzman ekibimiz.')
@section('keywords', 'yönetim kurulu, hatay imar, ekip, uzmanlar, belediye, şehir yönetimi')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Ekip</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('team') }}">Ekip</a></li>
                    <li>Ekip</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Ekip Bölümü
==============================-->
<section class="team-section space bg-theme3">
    <div class="container">
        <div class="title-area text-center">
            <div class="sub-title"><span><i class="asterisk"></i></span>YÖNETİM KURULU</div>
            <h2 class="sec-title mb-60">Hatay İmar <span class="bold">Yönetim</span> Kurulu</h2>
            <p class="sec-text">Şehrimizin gelişimi için çalışan deneyimli yönetim kurulu üyelerimiz <br> ile Hatay'ın geleceğini birlikte inşa ediyoruz.</p>
        </div>
        
        <div class="row gy-30">
            <!-- Yönetim Kurulu Üyesi 1 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-single-box">
                    <div class="team-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay17.jpeg') }}" alt="Yönetim Kurulu Başkanı" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h4 class="name"><a href="{{ route('team.details', ['id' => 1]) }}">Yönetim Kurulu Başkanı</a></h4>
                        <p class="designation">Başkan</p>
                        <p class="text">Hatay İmar'ın stratejik yönetimi ve şehir kalkınması alanında uzman.</p>
                    </div>
                </div>
            </div>

            <!-- Yönetim Kurulu Üyesi 2 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-single-box">
                    <div class="team-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay18.jpeg') }}" alt="Genel Müdür" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h4 class="name"><a href="{{ route('team.details', ['id' => 2]) }}">Genel Müdür</a></h4>
                        <p class="designation">Genel Müdür</p>
                        <p class="text">Operasyonel yönetim ve proje koordinasyonu alanında deneyimli.</p>
                    </div>
                </div>
            </div>

            <!-- Yönetim Kurulu Üyesi 3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-single-box">
                    <div class="team-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay19.jpeg') }}" alt="Teknik Müdür" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h4 class="name"><a href="{{ route('team.details', ['id' => 3]) }}">Teknik Müdür</a></h4>
                        <p class="designation">Teknik Müdür</p>
                        <p class="text">İnşaat mühendisliği ve üretim tesisleri yönetimi uzmanı.</p>
                    </div>
                </div>
            </div>

            <!-- Yönetim Kurulu Üyesi 4 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-single-box">
                    <div class="team-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay20.jpeg') }}" alt="Mali İşler Müdürü" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="team-overlay">
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-content">
                        <h4 class="name"><a href="{{ route('team.details', ['id' => 4]) }}">Mali İşler Müdürü</a></h4>
                        <p class="designation">Mali İşler Müdürü</p>
                        <p class="text">Finansal yönetim ve bütçe planlama alanında uzman.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection 
 