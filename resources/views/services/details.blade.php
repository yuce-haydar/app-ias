@extends('layouts.app')

@section('title', $service->title . ' - Hatay İmar')
@section('description', $service->short_description)
@section('keywords', 'hizmet detayı, inşaat, ' . $service->title)

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $service->title }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('services') }}">Hizmetler</a></li>
                    <li>{{ $service->title }}</li>
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
                        <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                    </div>
                    <div class="service-details-wrapper">
                        <h2 class="title">{{ $service->title }}</h2>
                        <p class="text">{{ $service->description }}</p>
                        
                        @if($service->features && count($service->features) > 0)
                            <h3 class="subtitle">Hizmet Kapsamı</h3>
                            <ul class="service-list">
                                @foreach($service->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if($service->benefits && count($service->benefits) > 0)
                            <h3 class="subtitle">Neden Bizi Seçmelisiniz?</h3>
                            <div class="row gy-20 mt-30">
                                @foreach($service->benefits as $index => $benefit)
                                    <div class="col-md-6">
                                        <div class="feature-item">
                                            <div class="icon">
                                                <i class="flaticon-service"></i>
                                            </div>
                                            <div class="content">
                                                <h4>{{ $benefit }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($service->gallery && count($service->gallery) > 0)
                            <h3 class="subtitle mt-40">Galeri</h3>
                            <div class="row gy-20 mt-30">
                                @foreach($service->gallery as $image)
                                    <div class="col-md-4">
                                        <a href="{{ asset($image) }}" class="gallery-thumb" data-fancybox="gallery">
                                            <img src="{{ asset($image) }}" alt="Galeri">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="widget service-widget">
                        <h3 class="widget-title">Diğer Hizmetlerimiz</h3>
                        <ul class="service-list-widget">
                            @foreach($relatedServices as $relatedService)
                                <li>
                                    <a href="{{ route('service.details', ['id' => $relatedService->id]) }}" 
                                       class="{{ $relatedService->id == $service->id ? 'active' : '' }}">
                                        {{ $relatedService->title }} 
                                        <i class="fa-regular fa-arrow-right-long"></i>
                                    </a>
                                </li>
                            @endforeach
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
                                    <a href="tel:+903267552222">+90 326 755 22 22</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa-light fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <a href="mailto:info@hatayimar.com">info@hatayimar.com</a>
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