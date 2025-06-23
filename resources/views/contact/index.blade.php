@extends('layouts.app')

@section('title', 'İletişim - Hatay İmar')
@section('description', 'Hatay İmar ile iletişime geçin. Sorularınız ve önerileriniz için bizimle iletişim kurun.')
@section('keywords', 'hatay imar, iletişim, telefon, e-posta, adres, antakya')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İletişim</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('contact') }}">İletişim</a></li>
                    <li>İletişim</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim Bölümü
==============================-->
<section class="contact-section space bg-theme3">
    <div class="container">
        <div class="row gy-40">
            <div class="col-lg-5">
                <div class="contact-content-wrap">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>BİZİMLE İLETİŞİME GEÇİN</div>
                        <h2 class="sec-title">Hatay İmar ile iletişime geçin <span class="bold">iletişim bilgilerimiz</span></h2>
                        <p class="sec-text">Sorularınız, önerileriniz ve talepleriniz için bizimle iletişim kurabilirsiniz. Size en kısa sürede dönüş yapacağız.</p>
                    </div>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">Merkez Ofisimiz</h4>
                                <p>Antakya Belediye Binası, <br> Kurtuluş Mahallesi, Atatürk Caddesi <br> Antakya/HATAY - TÜRKİYE</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">Telefon Numaralarımız</h4>
                                <div class="content">
                                    Genel: <a href="tel:+903262141234">+90 326 214 12 34</a><br>
                                    Faks: <a href="tel:+903262141235">+90 326 214 12 35</a>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">E-posta Adreslerimiz</h4>
                                <div class="content">
                                    <a href="mailto:info@hatayimar.gov.tr">info@hatayimar.gov.tr</a><br>
                                    <a href="mailto:iletisim@hatayimar.gov.tr">iletisim@hatayimar.gov.tr</a>
                                </div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">Çalışma Saatlerimiz</h4>
                                <div class="content">
                                    Pazartesi - Cuma: 08:30 - 17:30<br>
                                    Cumartesi - Pazar: Kapalı
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#">
                            <span class="link-effect">
                                <span class="effect-1">Facebook</span>
                                <span class="effect-1">Facebook</span>
                            </span>
                        </a>
                        <a href="#">
                            <span class="link-effect">
                                <span class="effect-1">Twitter</span>
                                <span class="effect-1">Twitter</span>
                            </span>
                        </a>
                        <a href="#">
                            <span class="link-effect">
                                <span class="effect-1">Instagram</span>
                                <span class="effect-1">Instagram</span>
                            </span>
                        </a>
                        <a href="#">
                            <span class="link-effect">
                                <span class="effect-1">YouTube</span>
                                <span class="effect-1">YouTube</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-form">
                    <h2 class="title mb-35">Bize Yazın</h2>
                    <p class="mb-30">Sorularınızı, önerilerinizi ve taleplerinizi aşağıdaki formu kullanarak bize iletebilirsiniz. En kısa sürede size geri dönüş yapacağız.</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="contact_form" class="contact_form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                                <input type="text" id="name" name="name" placeholder="Ad Soyad *" required autocomplete="on" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" id="email" name="email" placeholder="E-posta Adresiniz *" required autocomplete="on" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" id="phone" name="phone" placeholder="Telefon Numarası" autocomplete="off" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-building"></i></span>
                                <select id="department" name="department" class="form-control">
                                    <option value="">Hangi Departman?</option>
                                    <option value="genel">Genel Bilgi</option>
                                    <option value="tesisler">Tesisler</option>
                                    <option value="projeler">Projeler</option>
                                    <option value="ihale">İhale Bilgileri</option>
                                    <option value="insan-kaynaklari">İnsan Kaynakları</option>
                                    <option value="muhasebe">Mali İşler</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="icon"><i class="fa-solid fa-tag"></i></span>
                            <input type="text" id="subject" name="subject" placeholder="Konu *" required autocomplete="off" value="{{ old('subject') }}">
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" placeholder="Mesajınızı detaylı olarak yazın *" required rows="6">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group terms">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">Kişisel verilerimin işlenmesine ve KVKK kapsamında değerlendirilmesine onay veriyorum.</label>
                        </div>
                        <button type="submit" class="theme-btn bg-dark mt-35" data-loading-text="Gönderiliyor...">
                            <span class="link-effect">
                                <span class="btn-title">Mesajı Gönder</span>
                            </span><i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim Haritası
==============================-->
<div class="contact-map">
    <div class="container-fluid p-0">
        <div class="row">
            <!--Harita-->
            <div class="map-box">
                <iframe class="map-canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.5!2d36.1611!3d36.2019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152f7b6b8b1c2345%3A0x1234567890abcdef!2sAntakya%2C%20Hatay%2C%20Turkey!5e0!3m2!1str!2str!4v1737096357024!5m2!1str!2str" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>

<!--==============================
Tesislerimiz Bölümü
==============================-->
<section class="facilities-section space bg-white">
    <div class="container">
        <div class="title-area three text-center">
            <div class="sub-title"><span><i class="asterisk"></i></span>TESİSLERİMİZ</div>
            <h2 class="sec-title">Hatay İmar <span class="bold">tesislerini</span> keşfedin</h2>
            <p class="sec-text text-gray">Şehrimize hizmet eden modern tesislerimiz ile kaliteli hizmet sunuyoruz. <br> Sosyal tesislerden üretim tesislerine kadar geniş bir yelpazede faaliyet gösteriyoruz.</p>
        </div>
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="{{ asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="Büz Üretim Tesisi" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="facility-content" style="padding: 20px; text-align: center;">
                        <h4 style="color: #333; margin-bottom: 10px;">Büz Üretim Tesisi</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">Modern teknoloji ile büz üretimi yapan tesisimiz</p>
                        <a href="{{ route('facilities.details', 1) }}" class="theme-btn btn-sm">Detayları Gör</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="{{ asset('assets/images/imageshatay/hatay2.jpeg') }}" alt="Katlı Otopark" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="facility-content" style="padding: 20px; text-align: center;">
                        <h4 style="color: #333; margin-bottom: 10px;">Katlı Otopark</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">Şehir merkezindeki modern otopark tesisimiz</p>
                        <a href="{{ route('facilities.details', 2) }}" class="theme-btn btn-sm">Detayları Gör</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="{{ asset('assets/images/imageshatay/hatay3.jpeg') }}" alt="Habib-i Neccar Sosyal Tesis" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="facility-content" style="padding: 20px; text-align: center;">
                        <h4 style="color: #333; margin-bottom: 10px;">Habib-i Neccar Sosyal Tesis</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">Sosyal etkinlikler için modern tesis</p>
                        <a href="{{ route('facilities.details', 3) }}" class="theme-btn btn-sm">Detayları Gör</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="{{ asset('assets/images/imageshatay/hatay4.jpeg') }}" alt="Parke Taşı Üretim" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="facility-content" style="padding: 20px; text-align: center;">
                        <h4 style="color: #333; margin-bottom: 10px;">Parke Taşı Üretim</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">Kaliteli parke taşı üretim tesisimiz</p>
                        <a href="{{ route('facilities.details', 4) }}" class="theme-btn btn-sm">Detayları Gör</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-40">
            <a href="{{ route('facilities.index') }}" class="theme-btn">
                <span class="link-effect">
                    <span class="btn-title">Tüm Tesisleri Gör</span>
                </span><i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection 