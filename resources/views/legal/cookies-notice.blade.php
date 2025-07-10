@extends('layouts.app')

@section('title', 'Çerez Aydınlatma Metni - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Çerez Aydınlatma Metni</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                    <li>Çerez Aydınlatma Metni</li>
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
                        <h2>Anasayfa Çerez Aydınlatma Metni</h2>
                        <h3>Çerezler Hakkında Aydınlatma Metni - 1</h3>
                        
                        <div class="cerez-bilgi mb-4">
                            <p>Hatay İmar Sanayi A.Ş. olarak veri sorumlusu sıfatıyla (KVKK 10.a), internet sayfamızın kullanımını kolaylaştırmak, ürünlerimizi ilgi ve ihtiyaçlarınız doğrultusunda daha iyi bir şekilde özelleştirmek, gelecekte sitelerimiz üzerinde gerçekleştireceğiniz faaliyet ve deneyimleri hızlandırmak, ziyaretçilerimizin internet sayfamızı nasıl kullandıklarını anlayabilmek, sayfamızın yapısını ve içeriğini iyileştirebilmek, internet sayfamızı geliştirmek, kullanışlı, etkili ve güvenli hale getirmek amacıyla (KVKK 10.b) çerezler (cookies) vasıtasıyla verileriniz "ilgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla, veri sorumlusunun meşru menfaatleri için veri işlenmesinin zorunlu olması" hukuki sebebi ile tamamen veya kısmen otomatik yolla işlenmektedir (KVKK 10.ç). Bu verileri, herhangi bir 3. kişiye aktarmıyoruz (KVKK 10.c).</p>
                            
                            <p>KVKK'nın 10. Maddesi kapsamında:</p>
                            <ul>
                                <li><strong>a)</strong> kişisel verilerinizin işlenip işlenmediğini öğrenme;</li>
                                <li><strong>b)</strong> kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme;</li>
                                <li><strong>c)</strong> kişisel verilerinizin işlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme;</li>
                                <li><strong>ç)</strong> kişisel verilerinizin yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme;</li>
                                <li><strong>d)</strong> kişisel verilerinizin eksik veya yanlış işlenmiş ise düzeltilmesini isteme;</li>
                                <li><strong>e)</strong> Kanun'un 7. Maddesinde öngörülen şartlar çerçevesinde kişisel verilerinizin silinmesini veya yok edilmesini isteme;</li>
                                <li><strong>f)</strong> kişisel verilerinizin aktarıldığı üçüncü kişilere yukarıda sayılan (d) ve (e) bentleri uyarınca yapılan işlemlerin bildirilmesini isteme;</li>
                                <li><strong>g)</strong> kişisel verilerinizin münhasıran otomatik sistemler ile analiz edilmesi nedeniyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme;</li>
                                <li><strong>ğ)</strong> kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara uğranılması halinde zararın giderilmesini talep etme haklarınız bulunmaktadır (KVKK 10.d).</li>
                            </ul>
                        </div>
                        
                        <div class="kvkk-talepler mb-4">
                            <p>Kanun'un 11. Maddesinde sayılan haklarınız konusunda taleplerinizi bize (Hatay İmar Sanayi A.Ş.) iletebilir ve sizin için hazırladığımız <strong>KVKK Talep Formu</strong>'muzu kullanabilirsiniz.</p>
                            
                            <p>Sitemizde gezinmeye devam etmeniz halinde cihazınızdaki çerezlere erişebileceğimizi de kabul ediyorsunuz. Ayrıntılı bilgiye ve çerezleri engelleme yöntemlerine <a href="{{ route('cookies-policy') }}">Çerez Politikası</a>'ndan ulaşabilirsiniz.</p>
                        </div>
                    </div>
                    
                    <div class="content-section">
                        <h2>İlgili Sayfalar</h2>
                        <div class="related-pages">
                            <ul>
                                <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                                <li><a href="{{ route('cookies-policy') }}">Çerez Politikası</a></li>
                                <li><a href="{{ route('job-application-notice') }}">İlan Başvuru Formu Aydınlatma Metni</a></li>
                                <li><a href="{{ route('contact-notice') }}">İletişim Bölümü Aydınlatma Metni</a></li>
                                <li><a href="{{ route('terms') }}">Şartlar ve Koşullar</a></li>
                                <li><a href="{{ route('privacy') }}">Gizlilik Politikası</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="content-section">
                        <h2>İletişim Bilgileri</h2>
                        <div class="contact-info">
                            <p><strong>Kurum:</strong> Hatay İmar Sanayi A.Ş.</p>
                            <p><strong>Adres:</strong> Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya/HATAY</p>
                            <p><strong>Telefon:</strong> +90 326 213 23 26</p>
                            <p><strong>E-posta:</strong> info@hatayimar.com.tr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 