@extends('layouts.app')

@section('title', 'Gizlilik Politikası - Nexta Danışmanlık')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Gizlilik Politikası</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                        <li>Gizlilik Politikası</li>
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
                        <h2>1. Kişisel Verilerin Korunması</h2>
                        <p>Nexta Danışmanlık olarak, 6698 sayılı Kişisel Verilerin Korunması Kanunu'na tam uyum sağlayarak müşterilerimizin gizliliğini korumayı öncelik haline getiriyoruz.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>2. Toplanan Bilgiler</h2>
                        <p>Web sitemizi ziyaret ettiğinizde şu bilgileri toplarız:</p>
                        <ul>
                            <li>İletişim bilgileri (ad, e-posta, telefon)</li>
                            <li>Şirket bilgileri</li>
                            <li>Web sitesi kullanım bilgileri</li>
                            <li>Çerez (cookie) bilgileri</li>
                        </ul>
                    </div>
                    
                    <div class="content-section">
                        <h2>3. Bilgilerin Kullanım Amacı</h2>
                        <p>Topladığımız kişisel veriler aşağıdaki amaçlarla kullanılır:</p>
                        <ul>
                            <li>Hizmet sunumu ve müşteri ilişkileri yönetimi</li>
                            <li>İletişim ve bilgilendirme</li>
                            <li>Hizmet kalitesinin artırılması</li>
                            <li>Yasal yükümlülüklerin yerine getirilmesi</li>
                        </ul>
                    </div>
                    
                    <div class="content-section">
                        <h2>4. Veri Güvenliği</h2>
                        <p>Kişisel verileriniz en yüksek güvenlik standartlarıyla korunmaktadır. Yetkisiz erişim, kayıp veya kötüye kullanıma karşı teknik ve idari önlemler alınmıştır.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>5. Üçüncü Taraflarla Paylaşım</h2>
                        <p>Kişisel verileriniz yasal zorunluluklar dışında üçüncü şahıslarla paylaşılmaz. İş ortaklarımızla yapılan veri paylaşımları gizlilik sözleşmeleri ile korunur.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>6. Çerez Politikası</h2>
                        <p>Web sitemiz deneyiminizi iyileştirmek için çerezler kullanır. Çerez kullanımını tarayıcı ayarlarınızdan kontrol edebilirsiniz.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>7. Haklarınız</h2>
                        <p>KVKK kapsamında aşağıdaki haklara sahipsiniz:</p>
                        <ul>
                            <li>Kişisel verilerinizin hangi amaçla işlendiğini öğrenme</li>
                            <li>Kişisel verilerinizin düzeltilmesini isteme</li>
                            <li>Kişisel verilerinizin silinmesini isteme</li>
                            <li>İşleme faaliyetine itiraz etme</li>
                        </ul>
                    </div>
                    
                    <div class="content-section">
                        <h2>8. İletişim</h2>
                        <p>Gizlilik politikası hakkında sorularınız için bizimle iletişime geçebilirsiniz.</p>
                        <div class="contact-info mt-4">
                            <p><strong>E-posta:</strong> kvkk@nexta.com.tr</p>
                            <p><strong>Telefon:</strong> +90 (212) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection