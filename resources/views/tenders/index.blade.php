@extends('layouts.app')

@section('title', 'İhale Bilgileri - Hatay İmar')
@section('description', 'Hatay İmar ihale bilgileri, açık ihaleler ve duyurular.')
@section('keywords', 'hatay imar, ihale, açık ihale, ihale bilgileri, duyuru')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İhaleler</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İhaleler</a></li>
                    <li>İhaleler</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--==============================
    İhale Bilgileri Bölümü
==============================-->
<section class="blog-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İhale Bilgileri</div>
                    <h2 class="sec-title mb-60">Açık <span class="bold">İhaleler</span> ve Duyurular</h2>
                    <p class="sec-text">Hatay İmar tarafından açılan ihaleler ve duyurular hakkında güncel bilgiler.</p>
                </div>
            </div>
        </div>
        
        @if($tenders->count() > 0)
            <div class="row gy-40">
                @foreach($tenders as $tender)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="{{ $tender->image ? asset('storage/' . $tender->image) : asset('assets/images/imageshatay/proje11.jpeg') }}" 
                                 alt="{{ $tender->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="blog-date">
                                <span class="day">{{ $tender->application_deadline ? $tender->application_deadline->format('d') : '00' }}</span>
                                <span class="month">{{ $tender->application_deadline ? $tender->application_deadline->format('M') : 'Ara' }}</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-regular fa-calendar"></i> 
                                    Son Başvuru: {{ $tender->application_deadline ? $tender->application_deadline->format('d.m.Y') : 'Belirtilmemiş' }}
                                </span>
                                <span><i class="fa-regular fa-clock"></i> {{ $tender->tender_type ?? 'Açık İhale' }}</span>
                            </div>
                            <h4 class="blog-title">
                                <a href="{{ route('tender.details', $tender->id) }}">{{ $tender->title }}</a>
                            </h4>
                            <p class="blog-text">{{ Str::limit($tender->description, 120) }}</p>
                            @if($tender->estimated_cost)
                            <div class="tender-info">
                                <span class="tender-price">Yaklaşık Maliyet: {{ number_format($tender->estimated_cost) }} TL</span>
                            </div>
                            @endif
                            <a href="{{ route('tender.details', $tender->id) }}" class="blog-link">
                                Detayları Gör <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper mt-50">
                {{ $tenders->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="empty-state">
                    <i class="fa-solid fa-gavel fa-4x text-muted mb-3"></i>
                    <h4>Henüz Aktif İhale Bulunmuyor</h4>
                    <p class="text-muted">Şu anda açık olan bir ihale bulunmamaktadır. Yakında yeni ihaleler duyurulacaktır.</p>
                </div>
            </div>
        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    İhale Süreci Bilgileri
==============================-->
<section class="process-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İhale Süreci</div>
                    <h2 class="sec-title mb-60">İhaleye Nasıl <span class="bold">Katılabilirsiniz?</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-file-text"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">İhale Şartnamesi</h4>
                    <p class="process-text">İhale detaylarını ve şartlarını inceleyin, gerekli belgeleri hazırlayın.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-clipboard-check"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Başvuru</h4>
                    <p class="process-text">Belirtilen süre içinde tüm belgelerle birlikte başvurunuzu yapın.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-gavel"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">İhale Açılışı</h4>
                    <p class="process-text">Belirlenen tarih ve saatte ihale komisyonu önünde teklifler açılır.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-handshake"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">Sözleşme</h4>
                    <p class="process-text">En uygun teklif sahibi ile sözleşme imzalanır ve iş başlatılır.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hızlı Linkler
==============================-->
<section class="cta-section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>Hızlı Erişim</div>
                    <h2 class="sec-title text-white mb-60">İhale İşlemleri için <span class="bold">Hızlı Linkler</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <h4 class="cta-title">İlanlar</h4>
                    <p class="cta-text">Güncel duyuru ve ilanları görüntüleyin.</p>
                    <a href="{{ route('announcements') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">İlanları Gör</span>
                            <span class="effect-1">İlanları Gör</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <h4 class="cta-title">İlan Başvuru Formu</h4>
                    <p class="cta-text">İlan vermek için başvuru formunu doldurun.</p>
                    <a href="{{ route('tenders') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">Başvuru Yap</span>
                            <span class="effect-1">Başvuru Yap</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="cta-item text-center">
                    <div class="cta-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h4 class="cta-title">İletişim</h4>
                    <p class="cta-text">Sorularınız için bizimle iletişime geçin.</p>
                    <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">İletişim</span>
                            <span class="effect-1">İletişim</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 