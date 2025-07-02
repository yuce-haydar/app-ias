@extends('layouts.app')

@section('title', $tender->title . ' - Hatay İmar')
@section('description', $tender->description)

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $tender->title }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İhaleler</a></li>
                    <li>{{ Str::limit($tender->title, 30) }}</li>
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
                    @if($tender->image)
                    <div class="project-thumb mb-40">
                        <img src="{{ asset('storage/' . $tender->image) }}" alt="{{ $tender->title }}" 
                             style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px;">
                    </div>
                    @endif

                    <h1 class="project-title mb-30">{{ $tender->title }}</h1>
                    
                    <div class="tender-meta mb-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <h6>İhale Türü:</h6>
                                    <p>{{ $tender->tender_type ?? 'Açık İhale' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <h6>Son Başvuru:</h6>
                                    <p>{{ $tender->application_deadline ? $tender->application_deadline->format('d.m.Y - H:i') : 'Belirtilmemiş' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <h6>Kategori:</h6>
                                    <p>{{ $tender->category ?? 'Genel' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <h6>Durum:</h6>
                                    <p>
                                        @if($tender->application_deadline && $tender->application_deadline->isPast())
                                            <span class="badge badge-danger">Süresi Dolmuş</span>
                                        @else
                                            <span class="badge badge-success">Başvuru Açık</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>İhale Konusu</h3>
                    <div class="tender-description">
                        {!! nl2br(e($tender->description)) !!}
                    </div>

                    @if($tender->requirements)
                    <h3>Teknik Şartlar ve Gereksinimler</h3>
                    <div class="tender-requirements">
                        {!! nl2br(e($tender->requirements)) !!}
                    </div>
                    @endif

                    @if($tender->documents)
                    <h3>İhale Belgeleri</h3>
                    <div class="tender-documents">
                        @foreach(json_decode($tender->documents, true) ?? [] as $document)
                        <div class="document-item">
                            <a href="{{ asset('storage/' . $document) }}" target="_blank" class="btn btn-outline-primary mb-2">
                                <i class="fa-regular fa-file-pdf"></i> Belgeyi İndir
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- Başvuru Butonu -->
                    @if(!$tender->application_deadline || !$tender->application_deadline->isPast())
                    <div class="tender-apply mt-40">
                        <a href="{{ route('tender.application', $tender->id) }}" class="theme-btn">
                            <i class="fa-regular fa-paper-plane"></i> Başvuru Yap
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="project-sidebar">
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">İhale Bilgileri</h3>
                        <ul class="project-info-list">
                            <li><strong>İhale No:</strong><span>{{ $tender->tender_number ?? 'TBD-' . $tender->id }}</span></li>
                            @if($tender->estimated_cost)
                            <li><strong>Yaklaşık Maliyet:</strong><span>{{ number_format($tender->estimated_cost) }} TL</span></li>
                            @endif
                            @if($tender->guarantee_amount)
                            <li><strong>Geçici Teminat:</strong><span>{{ number_format($tender->guarantee_amount) }} TL</span></li>
                            @endif
                            @if($tender->tender_date)
                            <li><strong>İhale Tarihi:</strong><span>{{ $tender->tender_date->format('d.m.Y') }}</span></li>
                            @endif
                            @if($tender->tender_time)
                            <li><strong>İhale Saati:</strong><span>{{ $tender->tender_time }}</span></li>
                            @endif
                            <li><strong>Görüntülenme:</strong><span>{{ $tender->view_count ?? 0 }}</span></li>
                        </ul>
                    </div>

                    <!-- İlgili İhaleler -->
                    @if($relatedTenders->count() > 0)
                    <div class="widget related-tenders-widget">
                        <h3 class="widget-title">İlgili İhaleler</h3>
                        @foreach($relatedTenders as $related)
                        <div class="related-tender-item">
                            <h6><a href="{{ route('tender.details', $related->id) }}">{{ Str::limit($related->title, 50) }}</a></h6>
                            <p class="tender-meta">
                                <small>Son Başvuru: {{ $related->application_deadline ? $related->application_deadline->format('d.m.Y') : 'TBD' }}</small>
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    <!-- İletişim -->
                    <div class="widget contact-widget">
                        <h3 class="widget-title">İletişim</h3>
                        <p>İhale hakkında sorularınız için bizimle iletişime geçebilirsiniz.</p>
                        <a href="{{ route('contact') }}" class="theme-btn style-2">İletişime Geç</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 