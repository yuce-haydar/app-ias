@extends('layouts.app')

@section('title', 'KVKK Başvuru Formu - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
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
                        <h2>HATAY İMAR SANAYİ A.Ş. KİŞİSEL VERİ BAŞVURU FORMU</h2>
                        
                        <div class="kvkk-info mb-4">
                            <h4>GENEL AÇIKLAMALAR</h4>
                            <p>6698 Sayılı Kişisel Verilerin Korunması Kanunu'nun ("Kanun") 11. Maddesinde, ilgili kişi olarak tanımlanan kişisel veri sahiplerine (bundan sonra "Başvuru Sahibi" olarak anılacaktır), kendisiyle ilgili kişisel verilerin işlenip işlenmediğini öğrenme (KVKK 11.1.a), işlenen kişisel veriler varsa bunlar hakkında bilgi talep etme (KVKK 11.1.b), kişisel verilerin işlenme amacını ve bu amaçlar doğrultusunda kullanılıp kullanılmadığını öğrenme (KVKK 11.1.c), yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme (KVKK 11.1.ç), kişisel verilerin eksik veya yanlış işlenmiş olması halinde bunların düzeltilmesini isteme (KVKK 11.1.d), Kanun'un 7. Maddesinde öngörülen şartlar çerçevesinde kişisel verilerin silinmesini veya yok edilmesini isteme (KVKK 11.1.e), yukarıda (d) ve (e) bentlerinde uyarınca yapılan işlemlerin, kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme (KVKK 11.1.f), işlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme (KVKK 11.1.g), kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme (KVKK 11.1.ğ) gibi bir takım haklar tanınmıştır.</p>
                            
                            <p>İşbu kapsamdaki taleplerinizi Hatay İmar Sanayi A.Ş.'ye aşağıda detaylı olarak açıklanan usul ve yöntemlerle iletebilirsiniz. Taleplerinize daha hızlı ve doğru bilgiler verebilmemiz ve talepleriniz doğrultusunda daha etkin bir aksiyon alabilmemiz için sizin için hazırlamış olduğumuz hazır Başvuru Formu'nu doldurarak bize iletebilirsiniz.</p>
                            
                            <p>Kanunu'nun 13'üncü maddesi ile Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ'in 5'inci maddesi uyarınca; bu haklara ilişkin olarak yapılacak başvuruların Türkçe yazılı olarak veya Kişisel Verilerin Korunması Kurulu ("Kurul") tarafından belirlenen diğer yöntemlerle tarafımıza iletilmesi gerekmektedir.</p>
                        </div>
                        
                        <div class="kvkk-basvuru-kanallari mb-4">
                            <h4>Başvuru Kanalları</h4>
                            <p>Aşağıda, yazılı başvuruların ne şekilde tarafımıza ulaştırılabileceğine ilişkin bilgiler verilmektedir.</p>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>BAŞVURU YÖNTEMİ</th>
                                            <th>BAŞVURUNUN YAPILACAĞI ADRES</th>
                                            <th>BAŞVURU GÖNDERİMİNDE BELİRTİLECEK BİLGİ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Yazılı Başvuru<br>(Başvuru sahibinin kimliğini tevsik edici belge ile şahsen başvurusu)</td>
                                            <td>Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya</td>
                                            <td>Zarfın üzerine "KVKK Bilgi Talebi" yazılacaktır.</td>
                                        </tr>
                                        <tr>
                                            <td>Noter Kanalıyla</td>
                                            <td>Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya</td>
                                            <td>Tebligatın konu kısmına "KVKK Bilgi Talebi" yazılacaktır.</td>
                                        </tr>
                                        <tr>
                                            <td>Kayıtlı Elektronik Posta (KEP) Yoluyla</td>
                                            <td>-</td>
                                            <td>E-posta'nın konu kısmına "KVKK Bilgi Talebi" yazılacaktır</td>
                                        </tr>
                                        <tr>
                                            <td>Güvenli elektronik imza, Mobil İmza ya da Sistemimizde kayıtlı E-posta adresi yoluyla</td>
                                            <td>kvkk@hatayimar.com</td>
                                            <td>E-posta'nın konu kısmına "KVKK Bilgi Talebi" yazılacaktır.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="kvkk-basvuru-usulu mb-4">
                            <h4>Başvuru Usulü</h4>
                            <p>Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ(10/03/2018 tarih ve 30356 sayılı R.G.) uyarınca başvurularınızda (a) adınızın, soyadınızın ve imzanızın, (b) Türkiye Cumhuriyeti vatandaşları için T.C. kimlik numarası, yabancılar için uyruğu, pasaport numarası veya varsa kimlik numarasının, (c) tebligata esas yerleşim yerinizin veya iş yeri adresinizin, (ç) varsa bildirime esas elektronik posta adresinizin, telefonunuzun ve faks numarasının, (d) talep konusunun ve ayrıca konuya ilişkin bilgi ve belgelerinizin başvuruya eklenmesi gerekmektedir.</p>
                            
                            <p>Başkası adına başvuruda bulunmaktaysanız, yetkili makamlar tarafından düzenlenmiş veya onaylanmış ve Kanun kapsamında başvuru yapmaya yetkili olduğunuzu gösteren belgeleri (kişisel veri sahibinin velisi /vasisi olduğunu gösterir belge, kişisel verileriniz kapsamında talepte bulunma yetkisini açıkça içerir vekaletname gibi) başvurunun ekinde gönderiniz.</p>
                            
                            <p>Kişisel verilerinizle ilgili olarak aşağıdaki Başvuru Formu'nu kullanabilirsiniz. Hukuka aykırı ve haksız bir şekilde veri paylaşımından kaynaklanabilecek hukuki risklerin bertaraf edilmesi ve özellikle kişisel verilerinizin güvenliğinin sağlanması amacıyla, kimlik ve yetki tespiti için Şirketimiz ek evrak ve malumat (nüfus cüzdanı veya sürücü belgesi sureti vb.) talep etme hakkını saklı tutar. Form kapsamında iletmekte olduğunuz taleplerinize ilişkin bilgilerin doğru ve güncel olmaması ya da yetkisiz bir başvuru yapılması halinde Şirketimiz, söz konusu yanlış bilgi ya da yetkisiz başvuru kaynaklı taleplerden dolayı mesuliyet kabul etmemektedir.</p>
                            
                            <p>Tarafımıza iletilmiş olan başvurularınız Kanunu'nun 13'üncü maddesinin 2'inci fıkrası gereğince, talebin niteliğine göre talebinizin bizlere ulaştığı tarihten itibaren en geç otuz gün içinde yazılı olarak ücretsiz yanıtlandırılacaktır. Ancak, yazılı cevap verilecek durumlarda on sayfaya kadar ücret alınmayacak, on sayfayı geçen her bir sayfa için Kurulca belirlenen işlem ücreti (1 TL) alınacaktır.</p>
                        </div>
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
                        <h2>İlgili Sayfalar</h2>
                        <div class="related-pages">
                            <ul>
                                <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
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