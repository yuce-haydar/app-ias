@extends('layouts.app')

@section('title', 'Hizmetlerimiz - Hatay İmar')
@section('description', 'Hatay İmar\'ın sunduğu profesyonel inşaat ve altyapı hizmetleri.')

@section('content')

<div class="breadcrumb-wrapper" data-bg-src="{{ asset('assets/images/imageshatay/hatay6.jpeg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h1 class="breadcrumb-title">Hizmetlerimiz</h1>
                    <div class="breadcrumb-link">
                        <span><a href="{{ route('home') }}">Anasayfa</a></span>
                        <i class="fas fa-chevron-right"></i>
                        <span>Hizmetlerimiz</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="service-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Hizmetlerimiz</div>
                    <h2 class="sec-title mb-60">Hatay İmar <span class="bold">Hizmet</span> Alanları</h2>
                    <p class="sec-text">Şehrimizin gelişimi için sunduğumuz kaliteli hizmetler.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            @foreach($services as $service)
                <div class="col-lg-6 col-md-6">
                    <div class="service-item style-modern">
                        <div class="service-thumb">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" style="width: 100%; height: 300px; object-fit: cover; border-radius: 15px;">
                        </div>
                        <div class="service-content">
                            <div class="service-icon">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <h3 class="service-title">{{ $service->title }}</h3>
                            <p class="service-text">{{ $service->short_description }}</p>
                            @if($service->features && count($service->features) > 0)
                                <ul class="service-features">
                                    @foreach(array_slice($service->features, 0, 4) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <a href="{{ route('service.details', ['id' => $service->id]) }}" class="service-link">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($services->hasPages())
            <div class="row mt-50">
                <div class="col-12">
                    <div class="pagination-wrapper text-center">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Hizmet Süreci -->
<section class="process-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Hizmet Sürecimiz</div>
                    <h2 class="sec-title mb-60">Nasıl <span class="bold">Çalışıyoruz?</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-handshake"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">İlk Görüşme</h4>
                    <p class="process-text">İhtiyaçlarınızı dinliyor ve en uygun çözümü belirliyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Planlama</h4>
                    <p class="process-text">Detaylı planlama yaparak en kaliteli hizmeti sunmaya hazırlanıyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-cogs"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">Uygulama</h4>
                    <p class="process-text">Deneyimli ekibimizle planladığımız hizmeti titizlikle uyguluyoruz.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-check-circle"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">Teslim</h4>
                    <p class="process-text">Kalite kontrolü yaparak hizmetimizi eksiksiz teslim ediyoruz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 