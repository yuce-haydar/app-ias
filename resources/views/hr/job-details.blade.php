@extends('layouts.app')

@section('title', 'İş İlanı Detayı - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İş İlanı Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li>İş İlanı Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="job-details-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job-details-content">
                    @if($id == 1)
                        <div class="job-header mb-40">
                            <h1 class="job-title">İnşaat Mühendisi</h1>
                            <div class="job-meta">
                                <span class="job-type">Tam Zamanlı</span>
                                <span class="job-location"><i class="fa-solid fa-location-dot"></i> Antakya</span>
                                <span class="job-deadline"><i class="fa-solid fa-calendar"></i> Son Başvuru: 31.12.2024</span>
                            </div>
                        </div>

                        <div class="job-description mb-40">
                            <h3>İş Tanımı</h3>
                            <p>Hatay İmar bünyesinde, üretim tesislerimizde ve inşaat projelerinde görev alacak deneyimli inşaat mühendisi aranmaktadır. Şehrimizin gelişimine katkıda bulunacak projelerimizde yer almak üzere ekibimize katılacak mühendis adayları bekliyoruz.</p>
                            
                            <h3>Aranan Nitelikler</h3>
                            <ul class="job-requirements-list">
                                <li>İnşaat Mühendisliği mezunu</li>
                                <li>En az 3 yıl deneyim</li>
                                <li>AutoCAD, Sta4CAD bilgisi</li>
                                <li>MS Office programlarına hakim</li>
                                <li>Takım çalışmasına yatkın</li>
                                <li>Askerlik hizmetini tamamlamış (erkek adaylar için)</li>
                                <li>Saha çalışmasına uygun</li>
                            </ul>

                            <h3>İş Kapsamı</h3>
                            <ul class="job-scope-list">
                                <li>Büz ve parke taşı üretim tesislerinin teknik kontrolü</li>
                                <li>İnşaat projelerinin planlama ve uygulama aşamalarında görev alma</li>
                                <li>Teknik çizimlerin hazırlanması ve kontrolü</li>
                                <li>Kalite kontrol süreçlerinin takibi</li>
                                <li>İş güvenliği kurallarının uygulanmasının sağlanması</li>
                                <li>Proje raporlarının hazırlanması</li>
                            </ul>

                            <h3>Sunduğumuz İmkanlar</h3>
                            <ul class="job-benefits-list">
                                <li>Rekabetçi maaş</li>
                                <li>SGK ve özel sağlık sigortası</li>
                                <li>Yemek yardımı</li>
                                <li>Ulaşım desteği</li>
                                <li>Eğitim ve gelişim imkanları</li>
                                <li>Performans primi</li>
                                <li>İş güvencesi</li>
                            </ul>
                        </div>

                    @elseif($id == 2)
                        <div class="job-header mb-40">
                            <h1 class="job-title">Muhasebe Uzmanı</h1>
                            <div class="job-meta">
                                <span class="job-type">Tam Zamanlı</span>
                                <span class="job-location"><i class="fa-solid fa-location-dot"></i> Antakya</span>
                                <span class="job-deadline"><i class="fa-solid fa-calendar"></i> Son Başvuru: 25.12.2024</span>
                            </div>
                        </div>

                        <div class="job-description mb-40">
                            <h3>İş Tanımı</h3>
                            <p>Mali işler departmanımızda çalışacak muhasebe uzmanı pozisyonu için başvurular alınmaktadır. Kurumumuzun mali işlemlerinin düzenli takibi ve raporlanması konusunda deneyimli adayları aramaktayız.</p>
                            
                            <h3>Aranan Nitelikler</h3>
                            <ul class="job-requirements-list">
                                <li>İşletme, İktisat veya ilgili bölümlerden mezun</li>
                                <li>En az 2 yıl muhasebe deneyimi</li>
                                <li>Logo, SAP bilgisi</li>
                                <li>Vergi mevzuatına hakim</li>
                                <li>MS Excel ileri seviye</li>
                                <li>Detaylara dikkat eden</li>
                                <li>Analitik düşünce yapısına sahip</li>
                            </ul>

                            <h3>İş Kapsamı</h3>
                            <ul class="job-scope-list">
                                <li>Günlük muhasebe kayıtlarının tutulması</li>
                                <li>Fatura kontrolü ve kayıt işlemleri</li>
                                <li>Banka mutabakat işlemleri</li>
                                <li>Vergi beyannamelerinin hazırlanması</li>
                                <li>Mali raporların hazırlanması</li>
                                <li>Bütçe takibi</li>
                            </ul>

                            <h3>Sunduğumuz İmkanlar</h3>
                            <ul class="job-benefits-list">
                                <li>Rekabetçi maaş</li>
                                <li>SGK ve sağlık sigortası</li>
                                <li>Yemek yardımı</li>
                                <li>Mesai saatleri: 08:30-17:30</li>
                                <li>Profesyonel gelişim imkanları</li>
                                <li>Yıllık izin</li>
                            </ul>
                        </div>

                    @elseif($id == 3)
                        <div class="job-header mb-40">
                            <h1 class="job-title">Üretim Operatörü</h1>
                            <div class="job-meta">
                                <span class="job-type">Vardiyalı</span>
                                <span class="job-location"><i class="fa-solid fa-location-dot"></i> Antakya</span>
                                <span class="job-deadline"><i class="fa-solid fa-calendar"></i> Son Başvuru: 20.12.2024</span>
                            </div>
                        </div>

                        <div class="job-description mb-40">
                            <h3>İş Tanımı</h3>
                            <p>Parke taşı ve büz üretim tesislerimizde çalışacak üretim operatörü aranmaktadır. Üretim süreçlerinde aktif rol alacak ve kalite standartlarının sağlanmasında görev yapacak operatör adayları bekliyoruz.</p>
                            
                            <h3>Aranan Nitelikler</h3>
                            <ul class="job-requirements-list">
                                <li>Lise mezunu</li>
                                <li>Vardiyalı çalışmaya uygun</li>
                                <li>Fiziksel olarak güçlü</li>
                                <li>Makine kullanımına yatkın</li>
                                <li>Takım çalışmasına uygun</li>
                                <li>İş güvenliği kurallarına uyum</li>
                                <li>Askerlik hizmetini tamamlamış</li>
                            </ul>

                            <h3>İş Kapsamı</h3>
                            <ul class="job-scope-list">
                                <li>Üretim makinelerinin operasyonu</li>
                                <li>Kalite kontrol işlemleri</li>
                                <li>Hammadde hazırlama</li>
                                <li>Ürün paketleme ve stoklamı</li>
                                <li>Makine bakım destegi</li>
                                <li>İş güvenliği kurallarına uyum</li>
                            </ul>

                            <h3>Sunduğumuz İmkanlar</h3>
                            <ul class="job-benefits-list">
                                <li>Vardiya ücreti</li>
                                <li>SGK</li>
                                <li>Yemek</li>
                                <li>Servis</li>
                                <li>İş kıyafeti</li>
                                <li>Prim sistemi</li>
                            </ul>
                        </div>

                    @elseif($id == 4)
                        <div class="job-header mb-40">
                            <h1 class="job-title">Güvenlik Görevlisi</h1>
                            <div class="job-meta">
                                <span class="job-type">24 Saat</span>
                                <span class="job-location"><i class="fa-solid fa-location-dot"></i> Antakya</span>
                                <span class="job-deadline"><i class="fa-solid fa-calendar"></i> Son Başvuru: 15.12.2024</span>
                            </div>
                        </div>

                        <div class="job-description mb-40">
                            <h3>İş Tanımı</h3>
                            <p>Katlı otopark ve sosyal tesislerimizde görev yapacak güvenlik görevlisi aranmaktadır. 24 saat vardiya sistemi ile çalışacak ve tesislerimizin güvenliğini sağlayacak deneyimli güvenlik görevlileri bekliyoruz.</p>
                            
                            <h3>Aranan Nitelikler</h3>
                            <ul class="job-requirements-list">
                                <li>Güvenlik sertifikası sahibi</li>
                                <li>24 saat vardiya sistemine uygun</li>
                                <li>Askerlik hizmetini tamamlamış</li>
                                <li>Temiz sabıka kaydı</li>
                                <li>İletişim becerisi gelişmiş</li>
                                <li>Sorumluluk sahibi</li>
                                <li>Acil durumlarda soğukkanlı</li>
                            </ul>

                            <h3>İş Kapsamı</h3>
                            <ul class="job-scope-list">
                                <li>Tesis güvenliğinin sağlanması</li>
                                <li>Giriş-çıkış kontrolü</li>
                                <li>Güvenlik kameralarının takibi</li>
                                <li>Olay raporlarının tutulması</li>
                                <li>Acil durumlarda müdahale</li>
                                <li>Ziyaretçi karşılama</li>
                            </ul>

                            <h3>Sunduğumuz İmkanlar</h3>
                            <ul class="job-benefits-list">
                                <li>Vardiya ücreti</li>
                                <li>SGK</li>
                                <li>Yemek</li>
                                <li>Üniform</li>
                                <li>Gece vardiya zammı</li>
                                <li>İkramiye</li>
                            </ul>
                        </div>

                    @else
                        <div class="job-header mb-40">
                            <h1 class="job-title">İş İlanı Detayı</h1>
                        </div>
                        <p>İş ilanı detayları yükleniyor...</p>
                    @endif

                    <div class="application-form mt-50">
                        <h3>Başvuru Formu</h3>
                        <form class="contact-form" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Ad Soyad *</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-posta *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefon *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cv_file">CV Dosyası (PDF) *</label>
                                        <input type="file" class="form-control" id="cv_file" name="cv_file" accept=".pdf" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cover_letter">Ön Yazı</label>
                                        <textarea class="form-control" id="cover_letter" name="cover_letter" rows="5" placeholder="Kendinizi tanıtın ve neden bu pozisyon için uygun olduğunuzu belirtin..."></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Başvuru Gönder</span>
                                        <span class="effect-1">Başvuru Gönder</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="job-sidebar">
                    <div class="widget job-info-widget">
                        <h3 class="widget-title">İş Bilgileri</h3>
                        <ul class="job-info-list">
                            @if($id == 1)
                                <li><strong>Pozisyon:</strong><span>İnşaat Mühendisi</span></li>
                                <li><strong>Departman:</strong><span>Teknik</span></li>
                                <li><strong>Çalışma Şekli:</strong><span>Tam Zamanlı</span></li>
                                <li><strong>Deneyim:</strong><span>3+ yıl</span></li>
                                <li><strong>Maaş:</strong><span>Görüşülecek</span></li>
                            @elseif($id == 2)
                                <li><strong>Pozisyon:</strong><span>Muhasebe Uzmanı</span></li>
                                <li><strong>Departman:</strong><span>Mali İşler</span></li>
                                <li><strong>Çalışma Şekli:</strong><span>Tam Zamanlı</span></li>
                                <li><strong>Deneyim:</strong><span>2+ yıl</span></li>
                                <li><strong>Maaş:</strong><span>Görüşülecek</span></li>
                            @elseif($id == 3)
                                <li><strong>Pozisyon:</strong><span>Üretim Operatörü</span></li>
                                <li><strong>Departman:</strong><span>Üretim</span></li>
                                <li><strong>Çalışma Şekli:</strong><span>Vardiyalı</span></li>
                                <li><strong>Deneyim:</strong><span>Deneyimsiz kabul</span></li>
                                <li><strong>Maaş:</strong><span>Asgari ücret + prim</span></li>
                            @elseif($id == 4)
                                <li><strong>Pozisyon:</strong><span>Güvenlik Görevlisi</span></li>
                                <li><strong>Departman:</strong><span>Güvenlik</span></li>
                                <li><strong>Çalışma Şekli:</strong><span>24 Saat Vardiya</span></li>
                                <li><strong>Deneyim:</strong><span>Sertifika gerekli</span></li>
                                <li><strong>Maaş:</strong><span>Vardiya ücreti</span></li>
                            @endif
                        </ul>
                    </div>
                    
                    <div class="widget contact-widget">
                        <h3 class="widget-title">İletişim</h3>
                        <div class="contact-info">
                            <p><i class="fa-solid fa-envelope"></i> ik@hatayimar.com.tr</p>
                            <p><i class="fa-solid fa-phone"></i> +90 326 213 23 26</p>
                            <p><i class="fa-solid fa-location-dot"></i> Antakya, Hatay</p>
                        </div>
                    </div>
                    
                    <div class="widget related-jobs-widget">
                        <h3 class="widget-title">Diğer İş İlanları</h3>
                        <ul class="related-jobs-list">
                            @if($id != 1)
                                <li><a href="{{ route('job.details', ['id' => 1]) }}">İnşaat Mühendisi</a></li>
                            @endif
                            @if($id != 2)
                                <li><a href="{{ route('job.details', ['id' => 2]) }}">Muhasebe Uzmanı</a></li>
                            @endif
                            @if($id != 3)
                                <li><a href="{{ route('job.details', ['id' => 3]) }}">Üretim Operatörü</a></li>
                            @endif
                            @if($id != 4)
                                <li><a href="{{ route('job.details', ['id' => 4]) }}">Güvenlik Görevlisi</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 