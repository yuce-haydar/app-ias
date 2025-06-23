@extends('layouts.app')

@section('title', 'İnsan Kaynakları - Hatay İmar')
@section('description', 'Hatay İmar kariyer fırsatları, açık pozisyonlar ve iş başvuruları.')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İnsan Kaynakları</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li>İnsan Kaynakları</li>
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
                    <div class="sub-title"><span><i class="asterisk"></i></span>Kariyer</div>
                    <h2 class="sec-title mb-60">Hatay İmar'da <span class="bold">Kariyer</span> Fırsatları</h2>
                    <p class="sec-text">Şehrimizin gelişimine katkıda bulunmak isteyen yetenekli profesyonelleri aramaktayız.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- İş İlanı 1 -->
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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
            
            <!-- İş İlanı 3 -->
            <div class="col-lg-6 col-md-6">
                <div class="job-item">
                    <div class="job-header">
                        <div class="job-title">
                            <h4><a href="{{ route('job.details', ['id' => 3]) }}">Üretim Operatörü</a></h4>
                            <span class="job-type">Vardiyalı</span>
                        </div>
                        <div class="job-meta">
                            <span><i class="fa-solid fa-location-dot"></i> Antakya</span>
                            <span><i class="fa-solid fa-calendar"></i> Son Başvuru: 20.12.2024</span>
                        </div>
                    </div>
                    <div class="job-content">
                        <p>Parke taşı ve büz üretim tesislerimizde çalışacak üretim operatörü aranmaktadır.</p>
                        <div class="job-requirements">
                            <span class="requirement">Lise mezunu</span>
                            <span class="requirement">Vardiyalı çalışma</span>
                            <span class="requirement">Fiziksel güç</span>
                        </div>
                        <a href="{{ route('job.details', ['id' => 3]) }}" class="job-apply-btn">
                            Başvur <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- İş İlanı 4 -->
            <div class="col-lg-6 col-md-6">
                <div class="job-item">
                    <div class="job-header">
                        <div class="job-title">
                            <h4><a href="{{ route('job.details', ['id' => 4]) }}">Güvenlik Görevlisi</a></h4>
                            <span class="job-type">24 Saat</span>
                        </div>
                        <div class="job-meta">
                            <span><i class="fa-solid fa-location-dot"></i> Antakya</span>
                            <span><i class="fa-solid fa-calendar"></i> Son Başvuru: 15.12.2024</span>
                        </div>
                    </div>
                    <div class="job-content">
                        <p>Katlı otopark ve sosyal tesislerimizde görev yapacak güvenlik görevlisi aranmaktadır.</p>
                        <div class="job-requirements">
                            <span class="requirement">Güvenlik sertifikası</span>
                            <span class="requirement">24 saat vardiya</span>
                            <span class="requirement">Askerlik tamamlanmış</span>
                        </div>
                        <a href="{{ route('job.details', ['id' => 4]) }}" class="job-apply-btn">
                            Başvur <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Neden Hatay İmar -->
<section class="why-us-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Neden Hatay İmar?</div>
                    <h2 class="sec-title mb-60">Hatay İmar'da Çalışmanın <span class="bold">Avantajları</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h4 class="feature-title">Güçlü Ekip</h4>
                    <p class="feature-text">Deneyimli ve uyumlu bir ekiple birlikte çalışma fırsatı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h4 class="feature-title">Kariyer Gelişimi</h4>
                    <p class="feature-text">Sürekli eğitim ve kariyer gelişim imkanları.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h4 class="feature-title">Sosyal Haklar</h4>
                    <p class="feature-text">Kapsamlı sosyal haklar ve yan ödemeler.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <h4 class="feature-title">Modern Tesisler</h4>
                    <p class="feature-text">Güncel teknoloji ile donatılmış modern çalışma ortamı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h4 class="feature-title">İş Güvencesi</h4>
                    <p class="feature-text">Belediye kuruluşu olarak sunduğumuz istikrarlı iş imkanı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <h4 class="feature-title">Şehre Hizmet</h4>
                    <p class="feature-text">Hatay'ın gelişimine katkıda bulunma fırsatı.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Başvuru Süreci -->
<section class="application-process space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Başvuru Süreci</div>
                    <h2 class="sec-title mb-60">Nasıl <span class="bold">Başvuru</span> Yapabilirsiniz?</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-search"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">Pozisyon Seçimi</h4>
                    <p class="process-text">Size uygun pozisyonu bulun ve detaylarını inceleyin.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-file-upload"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Online Başvuru</h4>
                    <p class="process-text">CV'nizi ve gerekli belgeleri online olarak gönderin.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-comments"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">Mülakat</h4>
                    <p class="process-text">Uygun adaylar mülakat için davet edilir.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-user-check"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">İşe Başlama</h4>
                    <p class="process-text">Başarılı adaylar ile işe başlama süreci tamamlanır.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 