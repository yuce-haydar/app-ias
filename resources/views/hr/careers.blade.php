@extends('layouts.app')

@section('title', 'Açık Pozisyonlar - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Açık Pozisyonlar</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li>Açık Pozisyonlar</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="career-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Açık Pozisyonlar</div>
                    <h2 class="sec-title mb-60">Mevcut <span class="bold">İş</span> Fırsatları</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- İş İlanı 1 -->
            <div class="col-lg-6">
                <div class="job-item">
                    <div class="job-header">
                        <div class="job-title">
                            <h4><a href="{{ route('job.details', ['id' => 1]) }}">İnşaat Mühendisi</a></h4>
                            <span class="job-type">Tam Zamanlı</span>
                        </div>
                        <div class="job-meta">
                            <span><i class="fa-solid fa-location-dot"></i> Antakya</span>
                            <span><i class="fa-solid fa-calendar"></i> Son Başvuru: 31.12.2024</span>
                        </div>
                    </div>
                    <div class="job-content">
                        <p>Üretim tesislerimizde ve inşaat projelerinde görev alacak deneyimli inşaat mühendisi aranmaktadır.</p>
                        <div class="job-requirements">
                            <span class="requirement">3+ yıl deneyim</span>
                            <span class="requirement">İnşaat Mühendisliği</span>
                            <span class="requirement">AutoCAD</span>
                        </div>
                        <a href="{{ route('job.details', ['id' => 1]) }}" class="job-apply-btn">
                            Başvur <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İş İlanı 2 -->
            <div class="col-lg-6">
                <div class="job-item">
                    <div class="job-header">
                        <div class="job-title">
                            <h4><a href="{{ route('job.details', ['id' => 2]) }}">Muhasebe Uzmanı</a></h4>
                            <span class="job-type">Tam Zamanlı</span>
                        </div>
                        <div class="job-meta">
                            <span><i class="fa-solid fa-location-dot"></i> Antakya</span>
                            <span><i class="fa-solid fa-calendar"></i> Son Başvuru: 25.12.2024</span>
                        </div>
                    </div>
                    <div class="job-content">
                        <p>Mali işler departmanımızda çalışacak muhasebe uzmanı pozisyonu için başvurular alınmaktadır.</p>
                        <div class="job-requirements">
                            <span class="requirement">2+ yıl deneyim</span>
                            <span class="requirement">İşletme/İktisat</span>
                            <span class="requirement">Logo/SAP</span>
                        </div>
                        <a href="{{ route('job.details', ['id' => 2]) }}" class="job-apply-btn">
                            Başvur <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 