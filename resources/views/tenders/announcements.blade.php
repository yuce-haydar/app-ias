@extends('layouts.app')

@section('title', 'İlanlar - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İlanlar</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İlanlar</a></li>
                    <li>İlanlar</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="blog-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İlanlar</div>
                    <h2 class="sec-title mb-60">Güncel <span class="bold">Duyurular</span> ve İlanlar</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay25.jpeg') }}" alt="Duyuru" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">20</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title">Yılbaşı Tatil Duyurusu</h4>
                        <p class="blog-text">31 Aralık 2024 - 2 Ocak 2025 tarihleri arasında tesislerimiz kapalı olacaktır.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay26.jpeg') }}" alt="Duyuru" style="width: 100%; height: 250px; object-fit: cover;">
                        <div class="blog-date">
                            <span class="day">18</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <h4 class="blog-title">Sosyal Tesis Rezervasyon</h4>
                        <p class="blog-text">2025 yılı organizasyonları için rezervasyon alımına başlanmıştır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 