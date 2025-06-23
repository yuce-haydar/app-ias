@extends('layouts.app')

@section('title', 'Tamamlanan Tesisler - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tüm tesisleri keşfedin.')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Projeler</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>Projeler</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Tesisler Bölümü
==============================-->
<section class="project-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Neler Yaptık</div>
                    <h2 class="sec-title mb-60">Şehrimize <span class="bold">Kazandırdığımız</span><br>Tesisler</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- Büz Üretim Tesisi -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Üretim Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('project.details', ['id' => 1]) }}">Büz Üretim Tesisi</a></h4>
                                <p class="project-text">Büz, Beton Boru (künk) gibi isimlerle anılan ürünlerimiz milimetre cinsinden iç çap genişlikleri ile adlandırılan kaliteli üretim tesisimiz.</p>
                                <a href="{{ route('project.details', ['id' => 1]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Katlı Otopark -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Otopark Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('project.details', ['id' => 2]) }}">Katlı Otopark</a></h4>
                                <p class="project-text">2005 yılında şehir merkezinde faaliyete geçen Katlı Otopark, şehrimizde yoğun trafikten araçlarına park yeri bulamayan vatandaşlarımıza hizmet vermektedir.</p>
                                <a href="{{ route('project.details', ['id' => 2]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Habib-i Neccar Sosyal Tesis -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Sosyal Tesis</span>
                                <h4 class="project-title"><a href="{{ route('project.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a></h4>
                                <p class="project-text">2013 yılında faaliyete açıldı. Habib-i Neccar Dağı Eteklerinde İzmir Caddesi'nde, Antakyalıların ailece ziyaret edebilecekleri, piknik yapabilecekleri sosyal tesisimiz.</p>
                                <a href="{{ route('project.details', ['id' => 3]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Parke Taşı Üretim -->
            <div class="col-lg-6 col-md-6">
                <div class="project-item">
                    <div class="project-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim">
                        <div class="project-overlay">
                            <div class="project-content">
                                <span class="project-category">Üretim Tesisi</span>
                                <h4 class="project-title"><a href="{{ route('project.details', ['id' => 4]) }}">Parke Taşı Üretim</a></h4>
                                <p class="project-text">Kullanımı çok eski çağlara dayanan parke taşı: taşın yontulup şekle konulması veya mevcut şekliyle montajının yapılması esasına dayanan üretim tesisimiz.</p>
                                <a href="{{ route('project.details', ['id' => 4]) }}" class="project-link">
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hatay İmar Dünden Bugüne Bölümü
==============================-->


<!--==============================
    İstatistikler Bölümü
==============================-->


@endsection 