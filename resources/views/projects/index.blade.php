@extends('layouts.app')

@section('title', 'Projelerimiz - Hatay İmar')
@section('description', 'Hatay İmar olarak şehrimize kazandırdığımız tamamlanan projeler ve devam eden çalışmalarımız.')
@section('keywords', 'hatay imar, projeler, büz üretim, katlı otopark, sosyal tesis, parke taşı, tamamlanan projeler')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Projelerimiz</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>Projelerimiz</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Projeler Grid Bölümü
==============================-->
<section class="blog-section style-grid space bg-theme3">
    <div class="container">
        <!-- Başlık Bölümü -->
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-60">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Projelerimiz</div>
                    <h2 class="sec-title">Şehrimize <span class="bold">Kazandırdığımız</span><br>Projeler</h2>
                    <p class="sec-text">Hatay İmar olarak şehrimizin kalkınması ve vatandaşlarımızın yaşam kalitesinin artması için hayata geçirdiğimiz projelerimizi keşfedin. Her proje, şehrimizin geleceğine yaptığımız yatırımdır.</p>
                </div>
            </div>
        </div>

        <div class="row gy-30">
            @foreach($projects as $project)
            <div class="col-lg-6 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}">
                        <div class="date">
                            @php
                                $year = $project['status'] == 'Tamamlandı' ? '2023' : '2024';
                            @endphp
                            <span class="day">{{ $year }}</span>
                            <span class="month">{{ $project['status'] }}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Kategori: <a href="#">{{ $project['type'] }}</a></span>
                            <span class="category">{{ $project['status'] }}</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('project.details', ['id' => $project['id']]) }}">{{ $project['title'] }}</a>
                        </h4>
                        <p class="text">{{ $project['location'] }} - {{ $project['area'] }} alanında modern {{ strtolower($project['type']) }} projemiz.</p>
                        <div class="project-stats mb-3">
                            <span class="stat-item"><i class="fa-solid fa-map-marker-alt"></i> {{ $project['location'] }}</span>
                            <span class="stat-item"><i class="fa-solid fa-expand"></i> {{ $project['area'] }}</span>
                        </div>
                        <div class="project-buttons">
                            <a href="{{ route('project.details', ['id' => $project['id']]) }}" class="read-more me-3">
                                Proje Detayları <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--==============================
İstatistik Bölümü
==============================-->
<section class="counter-section space bg-dark">
    <div class="container">
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">16</h3>
                        <p class="counter-text">Toplam Proje</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fa-solid fa-check-circle"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">4</h3>
                        <p class="counter-text">Tamamlanan</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fa-solid fa-hammer"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">8</h3>
                        <p class="counter-text">Devam Eden</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <div class="counter-icon">
                        <i class="fa-solid fa-drafting-compass"></i>
                    </div>
                    <div class="counter-content">
                        <h3 class="counter-number">4</h3>
                        <p class="counter-text">Tasarım/Planlama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 