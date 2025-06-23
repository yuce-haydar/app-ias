@extends('layouts.app')

@section('title', 'İhale Detayı - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İhale Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İhaleler</a></li>
                    <li>İhale Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="project-details-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    @if($id == 1)
                        <h1 class="project-title mb-30">Parke Taşı Üretim Malzemeleri Alımı</h1>
                        
                        <div class="tender-meta mb-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <h6>İhale Türü:</h6>
                                        <p>Açık İhale</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="meta-item">
                                        <h6>Son Başvuru:</h6>
                                        <p>30.12.2024 - 17:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>İhale Konusu</h3>
                        <p>2025 yılı parke taşı üretim faaliyetlerimiz için gerekli olan çimento, agrega, renk pigmentleri ve diğer ham maddelerin tedarik edilmesi işi ihale konusudur.</p>

                        <h3>Teknik Şartlar</h3>
                        <ul class="project-objectives">
                            <li>Portland çimentosu CEM I 42.5 R standardında</li>
                            <li>0-4 mm ve 4-8 mm agrega karışımı</li>
                            <li>Demir oksit bazlı renk pigmentleri</li>
                            <li>TSE standartlarına uygun malzemeler</li>
                        </ul>
                    @else
                        <h1 class="project-title mb-30">İhale Detayı</h1>
                        <p>İhale detay bilgileri yükleniyor...</p>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">İhale Bilgileri</h3>
                        <ul class="project-info-list">
                            <li><strong>İhale No:</strong><span>2024-001</span></li>
                            <li><strong>Yaklaşık Maliyet:</strong><span>500.000 TL</span></li>
                            <li><strong>Geçici Teminat:</strong><span>15.000 TL</span></li>
                            <li><strong>İhale Tarihi:</strong><span>02.01.2025</span></li>
                            <li><strong>İhale Saati:</strong><span>14:00</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 