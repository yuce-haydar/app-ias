@extends('layouts.app')

@section('title', 'İlan Başvuru Formu - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İlan Başvuru Formu</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İlanlar</a></li>
                    <li>İlan Başvuru Formu</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="contact-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>İlan Başvuru</div>
                    <h2 class="sec-title mb-60">İlan Vermek İçin <span class="bold">Başvuru</span> Yapın</h2>
                    <p class="sec-text">Hatay İmar'da ilan vermek istiyorsanız aşağıdaki formu doldurun.</p>
                </div>
                
                <div class="contact-form-wrapper">
                    <form class="contact-form" action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name">Firma Adı *</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_person">Yetkili Kişi *</label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-posta *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telefon *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Adres</label>
                                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ad_type">İlan Türü *</label>
                                    <select class="form-control" id="ad_type" name="ad_type" required>
                                        <option value="">Seçiniz</option>
                                        <option value="job">İş İlanı</option>
                                        <option value="tender">İhale İlanı</option>
                                        <option value="announcement">Duyuru</option>
                                        <option value="service">Hizmet İlanı</option>
                                        <option value="other">Diğer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">İlan Süresi</label>
                                    <select class="form-control" id="duration" name="duration">
                                        <option value="">Seçiniz</option>
                                        <option value="1_week">1 Hafta</option>
                                        <option value="2_weeks">2 Hafta</option>
                                        <option value="1_month">1 Ay</option>
                                        <option value="3_months">3 Ay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ad_title">İlan Başlığı *</label>
                                    <input type="text" class="form-control" id="ad_title" name="ad_title" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ad_content">İlan İçeriği *</label>
                                    <textarea class="form-control" id="ad_content" name="ad_content" rows="8" required placeholder="İlan detaylarını buraya yazın..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_info">Ek Bilgiler</label>
                                    <textarea class="form-control" id="additional_info" name="additional_info" rows="4" placeholder="Varsa ek bilgilerinizi buraya yazın..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                        <label class="form-check-label" for="terms">
                                            <a href="{{ route('terms') }}" target="_blank">Kullanım şartlarını</a> okudum ve kabul ediyorum. *
                                        </label>
                                    </div>
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
    </div>
</section>

<section class="info-section bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Bilgilendirme</div>
                    <h2 class="sec-title mb-60">İlan <span class="bold">Süreci</span> Hakkında</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4">
                <div class="info-item text-center">
                    <div class="info-icon">
                        <i class="fa-solid fa-file-check"></i>
                    </div>
                    <h4 class="info-title">Başvuru İncelemesi</h4>
                    <p class="info-text">Başvurunuz 2-3 iş günü içinde incelenir ve size geri dönüş yapılır.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-item text-center">
                    <div class="info-icon">
                        <i class="fa-solid fa-money-bill"></i>
                    </div>
                    <h4 class="info-title">Ücretlendirme</h4>
                    <p class="info-text">İlan türü ve süresine göre uygun fiyat bilgisi paylaşılır.</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="info-item text-center">
                    <div class="info-icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                    <h4 class="info-title">Yayınlama</h4>
                    <p class="info-text">Onay sonrası ilanınız belirlenen süre boyunca yayınlanır.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 