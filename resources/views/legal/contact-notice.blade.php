@extends('layouts.app')

@section('title', 'İletişim Bölümü Aydınlatma Metni - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İletişim Bölümü Aydınlatma Metni</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                    <li>İletişim Bölümü Aydınlatma Metni</li>
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
                        <h2>Hatay İmar Sanayi A.Ş. Kişisel Verilerin Korunması Kanunu Kapsamında İletişim Bölümü Aydınlatma Metni</h2>
                        
                        <div class="giris-bilgi mb-4">
                            <p>Biz, Hatay İmar Sanayi A.Ş. ("Hatay İmar") olarak, kişisel verilerinizin sizler için ne kadar önemli olduğunun farkındayız. Faaliyetlerimizi icra ederken, bünyemizde bulunan kişisel verilerinizi emanet olarak görüyor ve bir "Emanetçi" sorumluluğu ile gerekli tüm idari ve teknik tedbirleri alarak kişisel verilerinizi koruyoruz.</p>
                            
                            <p>İşbu Aydınlatma Metni, 6698 Sayılı Kişisel Verilerin Korunması Kanunu'nun 10. Maddesi kapsamında, <strong>http://hatayimar.com.tr/</strong> internet sitesinin İletişim bölümüne istinaden mesajınızı iletebilmek için bizimle paylaşabileceğiniz kişisel verileriniz ile ilgili olarak, veri sorumlusu sıfatıyla Hatay İmar tarafından, sizi aydınlatmak ve bilgilendirmek amacıyla hazırlanmıştır.</p>
                        </div>
                        
                        <div class="aydinlatma-amaci mb-4">
                            <p>İşbu Aydınlatma Metni ile Hatay İmar'ın kimliği (KVKK 10.a), bizimle paylaşabileceğiniz kişisel verilerinizin hangi amaçlarla işleneceği (KVKK 10.b), işlenen kişisel verilerinizin kimlere hangi amaçlarla aktarılabileceği (KVKK 10.c), veri toplama yöntemlerimiz ile hukuki sebepleri (KVKK 10.ç) ve sahip olduğunuz haklarınız (KVKK 10.d) konusunda sizleri bilgilendirmeyi amaçlamaktayız.</p>
                        </div>
                        
                        <div class="veri-sorumlusu mb-4">
                            <h3>Veri Sorumlusunun Kimliği (KVKK 10.a)</h3>
                            <p>İşbu internet sitesi, Hatay İmar Sanayi A.Ş.'ye ait olup, tarafımızla paylaşabileceğiniz kişisel verileriniz, veri sorumlusu sıfatı ile Hatay İmar Sanayi A.Ş. nezdinde muhafaza edilecek ve korunacaktır.</p>
                        </div>
                        
                        <div class="veri-isleme-amaci mb-4">
                            <h3>Kişisel Verilerinizin İşlenme Amacı (KVKK 10.b)</h3>
                            <p>İnternet sitesi kullanıcılarının bizimle iletişime geçmesine imkân tanımak ve bunu da mümkün olan en kolay şekilde sağlayabilmek amacıyla <strong>http://hatayimar.com.tr/</strong> alan adlı internet sitesinin İletişim bölümünde iletilerinizi bizimle paylaşabileceğiniz bir alan oluşturduk.</p>
                            
                            <p>İşbu alanda size hitap edebilmemiz ve iletinize konu hususu araştırabilmemiz için <strong>adınızı</strong>, sizinle irtibat kurabilmek ve/veya iletiniz hakkında size bilgi vermek ya da iletinize cevap verebilmek için <strong>e-posta adresinizi</strong> talep etmekte ve bizimle paylaştığınız kişisel verilerinizi iletinizde belirttiğiniz amaç doğrultusunda işlemekteyiz.</p>
                            
                            <p>Yine size daha iyi yardımcı olabilmek, iletinize en iyi cevabı verebilmek amacıyla iletinize konu hususu araştırabilir ve bu araştırmalarda elde ettiğimiz kişisel verilerinizi işleyebiliriz. Bu bölümde ayrıca iletinizin detaylarını bizimle paylaşabilmeniz amacıyla, <strong>mesajınız alanı</strong> bulunmaktadır. Burada da bizimle paylaştığınız kişisel verileriniz iletiniz doğrultusunda işlenecektir.</p>
                        </div>
                        
                        <div class="veri-aktarimi mb-4">
                            <h3>Kişisel Verilerinizin Aktarılması ve Aktarılma Amacı (KVKK 10.c)</h3>
                            <p>Bu bölümde bizimle paylaşabileceğiniz kişisel veriler, talebiniz hakkında işlem yapabilmek, şikayetinizi araştırabilmek, olası sorularınıza cevap verebilmek veya talebinize konu işlemi gerçekleştirebilmemiz için, gerekli olduğu ölçüde, aşağıdaki kişi/kuruluşlarla paylaşılabilecektir:</p>
                            
                            <ul>
                                <li>Şirketimiz bünyesinde görevli ve iletinize konu ilgili bölümden sorumlu çalışma arkadaşlarımız</li>
                                <li>Bizimle gizlilik sözleşmesi çerçevesinde çalışan bizden bağımsız ancak bize hizmet veren avukatlarımız, danışmanlarımız ve sair çözüm ortaklarımız</li>
                                <li>İletiniz kapsamında işlem yapabilmek amacıyla gerekli olması halinde ilgili 3. Kişiler</li>
                                <li>Resmi kurum ve kuruluşlar</li>
                            </ul>
                        </div>
                        
                        <div class="veri-toplama-yontemi mb-4">
                            <h3>Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi (KVKK 10.ç)</h3>
                            <p>Burada bizimle paylaştığınız kişisel verileriniz, Kanun'un 5. Maddesinde kaleme alınan aşağıdaki hukuki sebepler ile işlenmektedir:</p>
                            
                            <ul>
                                <li><strong>"İlgili kişi tarafından alenileştirilmiş olması"</strong> hukuki sebebi ile</li>
                                <li>Talebiniz mevcut ve/veya olası bir sözleşme ilişkisi ile ilgili ise <strong>"bir sözleşmenin kurulması veya ifasıyla doğrudan doğruya ilgili olması"</strong> hukuki sebebi ile</li>
                                <li>Talebiniz kapsamında yükümlülüklerimizin ifası ile ilgili ise <strong>"veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi"</strong> hukuki sebebi ile</li>
                                <li>Talebinize konu olabilecek <strong>"bir hakkın tesisi, kullanılması veya korunması"</strong> hukuki sebebi ile</li>
                            </ul>
                            
                            <p>Kişisel verileriniz, <strong>http://hatayimar.com.tr/</strong> alan adlı internet sitesinin İletişim bölümünden paylaşılmanız suretiyle tamamen veya kısmen otomatik yolla işlenmektedir.</p>
                        </div>
                        
                        <div class="kanuni-haklariniz mb-4">
                            <h3>Kanuni Haklarınız (KVKK 10.d)</h3>
                            <p>Kanun'un 11. Maddesinde haklarınız kaleme alınmış olup bu madde kapsamında aşağıdaki haklara sahip olduğunuzu belirtmek isteriz:</p>
                            
                            <ul>
                                <li><strong>a)</strong> kişisel verilerinizin işlenip işlenmediğini öğrenme;</li>
                                <li><strong>b)</strong> kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme;</li>
                                <li><strong>c)</strong> kişisel verilerinizin işlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme;</li>
                                <li><strong>ç)</strong> kişisel verilerinizin yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme;</li>
                                <li><strong>d)</strong> kişisel verilerinizin eksik veya yanlış işlenmiş ise düzeltilmesini isteme;</li>
                                <li><strong>e)</strong> Kanun'un 7. Maddesinde öngörülen şartlar çerçevesinde kişisel verilerinizin silinmesini veya yok edilmesini isteme;</li>
                                <li><strong>f)</strong> kişisel verilerinizin aktarıldığı üçüncü kişilere yukarıda sayılan (d) ve (e) bentleri uyarınca yapılan işlemlerin bildirilmesini isteme;</li>
                                <li><strong>g)</strong> kişisel verilerinizin münhasıran otomatik sistemler ile analiz edilmesi nedeniyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme;</li>
                                <li><strong>ğ)</strong> kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara uğranılması halinde zararın giderilmesini talep etme.</li>
                            </ul>
                        </div>
                        
                        <div class="basvuru-yontemi mb-4">
                            <h3>Haklarınızı Nasıl Kullanabilirsiniz?</h3>
                            <p>Burada yer alan haklarınız konusunda taleplerinizi <strong>Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ</strong>'e göre bize (Hatay İmar Sanayi A.Ş.) iletebilir ve sizin için hazırladığımız <strong>KVKK Talep Formu</strong>'muzu kullanabilirsiniz.</p>
                            
                            <div class="basvuru-kanali-bilgi">
                                <h4>Başvuru Kanalları:</h4>
                                <ul>
                                    <li><strong>Yazılı Başvuru:</strong> Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya/HATAY</li>
                                    <li><strong>E-posta:</strong> kvkk@hatayimar.com.tr</li>
                                    <li><strong>KEP:</strong> (Kayıtlı Elektronik Posta)</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="yayim-tarihi mb-4">
                            <p><strong>Yayım Tarihi:</strong> 20.12.2021</p>
                        </div>
                    </div>
                    
                    <div class="content-section">
                        <h2>İlgili Sayfalar</h2>
                        <div class="related-pages">
                            <ul>
                                <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                                <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
                                <li><a href="{{ route('cookies-policy') }}">Çerez Politikası</a></li>
                                <li><a href="{{ route('job-application-notice') }}">İlan Başvuru Formu Aydınlatma Metni</a></li>
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
                            <p><strong>KVKK E-posta:</strong> kvkk@hatayimar.com.tr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 