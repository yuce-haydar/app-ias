@extends('layouts.app')

@section('title', 'KVKK Başvuru Formu - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">KVKK Başvuru Formu</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                    <li>KVKK Başvuru Formu</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
    İçerik Bölümü
==============================-->
<section class="space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="content-section">
                        <h2>KVKK Başvuru Formu</h2>
                        <p>Kişisel Verilerin Korunması Kanunu (KVKK) kapsamında haklarınızı kullanmak için aşağıdaki formu doldurabilirsiniz.</p>
                        
                        <form class="contact-form mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ad Soyad *</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tc">T.C. Kimlik No *</label>
                                        <input type="text" id="tc" name="tc" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-posta *</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefon</label>
                                        <input type="tel" id="phone" name="phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Adres</label>
                                <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="request_type">Başvuru Türü *</label>
                                <select id="request_type" name="request_type" class="form-control" required>
                                    <option value="">Seçiniz</option>
                                    <option value="bilgi">Kişisel verilerimin işlenip işlenmediğini öğrenme</option>
                                    <option value="erisim">Kişisel verilerime erişim talep etme</option>
                                    <option value="duzeltme">Kişisel verilerimin düzeltilmesini talep etme</option>
                                    <option value="silme">Kişisel verilerimin silinmesini talep etme</option>
                                    <option value="itiraz">Kişisel verilerimin işlenmesine itiraz etme</option>
                                    <option value="zarar">Uğranılan zararın giderilmesini talep etme</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Açıklama *</label>
                                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Başvurunuzla ilgili detaylı açıklama yapınız..." required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" id="agreement" name="agreement" class="form-check-input" required>
                                    <label for="agreement" class="form-check-label">
                                        Verdiğim bilgilerin doğru olduğunu ve KVKK kapsamında başvuru yaptığımı beyan ederim.
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="theme-btn bg-dark">
                                <span class="link-effect">
                                    <span class="effect-1">Başvuru Gönder</span>
                                    <span class="effect-1">Başvuru Gönder</span>
                                </span><i class="fa-regular fa-arrow-right-long"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div class="content-section">
                        <h2>Başvuru Süreci Hakkında</h2>
                        <ul>
                            <li>Başvurunuz en geç 30 gün içinde cevaplanacaktır.</li>
                            <li>Kimlik doğrulama için ek belgeler talep edilebilir.</li>
                            <li>Başvuru sonucu size e-posta veya posta yoluyla bildirilecektir.</li>
                            <li>Başvurunuzla ilgili herhangi bir ücret talep edilmeyecektir.</li>
                        </ul>
                    </div>
                    
                    <div class="content-section">
                        <h2>İletişim Bilgileri</h2>
                        <div class="contact-info">
                            <p><strong>Kurum:</strong> Hatay İmar A.Ş.</p>
                            <p><strong>Adres:</strong> Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya/HATAY</p>
                            <p><strong>Telefon:</strong> +90 326 213 23 26</p>
                            <p><strong>E-posta:</strong> kvkk@hatayimar.com.tr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 