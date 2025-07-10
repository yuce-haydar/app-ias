@extends('layouts.app')

@section('title', 'Çerez Politikası - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Çerez Politikası</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                    <li>Çerez Politikası</li>
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
                        <h2>Çerez (Cookies) Uygulamaları Politikası</h2>
                        <p><strong>Son güncelleme tarihi:</strong> 20.12.2021</p>
                        
                        <div class="cerez-genel-bilgi mb-4">
                            <p>İşbu Çerez Uygulamaları Politikası, Hatay İmar Sanayi A.Ş. ("Hatay İmar") tarafından yürütülen <strong>http://hatayimar.com.tr/</strong> internet sitesi ("Hatay İmar İnternet Sitesi") için geçerlidir.</p>
                            
                            <p>Hatay İmar, deneyimlerinizi geliştirmek için internet sitesinde çerezler kullanabilir. Kullanılan çerezler sisteminizden ve/veya sabit diskinizden herhangi bir bilgi toplamaz.</p>
                            
                            <p>Hatay İmar internet sitesinde isim ve e-posta adresi ile tanımlanmazsınız; bununla beraber ilk girişinizde sayı ve dizinler atanır.</p>
                        </div>
                        
                        <div class="cerez-tanim mb-4">
                            <h3>Çerezler nedir?</h3>
                            <p>Çerezler, bilgisayarınızda veya mobil cihazınızda ziyaret ettiğiniz internet sitesi tarafından tarayıcınıza gönderilen küçük bir metin parçasıdır ve ziyaretinizle ilgili bilgileri (örneğin, tercih ettiğiniz dil ve diğer ayarlar) hatırlamasına yardımcı olur. Çerezler sayesinde bir sonraki ziyaretinizde daha iyi ve kişiselleştirilmiş müşteri deneyimi yaşarsınız. Çerezlerin kullanılma amacı, internet sitesini ziyaret eden kullanıcıya kolaylık sağlamaktır.</p>
                        </div>
                        
                        <div class="cerez-turleri mb-4">
                            <h3>Çerez Türleri ve Özellikleri</h3>
                            
                            <h4>A. Geçici çerezler:</h4>
                            <p>Geçici çerezler, sadece oturum sırasında geçici olarak depolanır ve en kısa sürede tarayıcınızı kapattıktan sonra kaldırılır.</p>
                            
                            <h4>B. Kalıcı çerezler:</h4>
                            <p>Kalıcı çerezler tarayıcı veya uygulamayı kapattıktan sonra bilgisayar/ mobil cihazda kalır ve internet sitesine döndüğümüzde sizi tanımak için kullanılır. Kalıcı çerezlerin süreleri dolana kadar yeni bir çerez yüklenir, bilgisayarınızda veya mobil cihazınızda kalır.</p>
                            
                            <h4>C. Hedef/Reklam Çerezleri:</h4>
                            <p>Reklam çerezleri, bir uygulama/internet sitesine veya kullanım ziyareti sırasında üçüncü bir şahıs tarafından yüklenen çerezlerdir. Reklam çerezleri, üçüncü bir şahsa sitemize ziyaretinizle ilgili bazı bilgileri iletmek için kullanılır. Bu çerezlerin kullanım amaçları; ilgili ve kişiselleştirilmiş reklamları göstermek; gösterilen reklam sayısını sınırlamak; reklam kampanyasının etkinliğini ölçmek; ziyaret tercihlerinizi hatırlamak.</p>
                            
                            <h4>D. Zorunlu Çerezler:</h4>
                            <p>Gerekli ve önemli çerezlerdir. Kullanıcı hesabı oluşturmanıza, giriş yapmanıza ve internet sitemizde gezinti yapmanıza olanak sağlar. Kalıcı çerezler tarayıcı veya uygulamayı kapattıktan sonra bilgisayarınızda veya mobil cihazınızda kalır ve internet sitemize döndüğünüzde sizi tanımak için kullanılır.</p>
                            
                            <h4>E. Performans ve analiz çerezleri:</h4>
                            <p>Ziyaretçilere daha iyi, hızlı ve güvenli bir kullanım sağlamak amacıyla internet siteleri ve uygulamalar için kullanılan çerezlerdir. Bu çerez türü ile müşteri deneyimini iyileştirme ve kişiselleştirme yapmak mümkündür. Elde edilen veriler arasında giriş yapılan sayfalar, yönlendirmeler, erişim yapan kişinin platform tipi, tarih/saat bilgileri, arama terimleri ve kullanırken girilen diğer metinler gibi ayrıntıları içerir.</p>
                            
                            <h4>F. İşlevsellik çerezleri:</h4>
                            <p>İşlevsellik çerezleri, internet sitesinde ziyareti kolaylaştırmak ve tarama deneyiminizi geliştirmek için kullanılan çerezlerdir. Tercih ettiğiniz dil, düzen veya renk şeması gibi belirli ayarları, hatırlamak için izin verir.</p>
                            
                            <h4>H. İzleme çerezleri:</h4>
                            <p>İzleme çerezleri ziyaretçilerin Internet tarama davranışlarını izlemek ve ziyaret ettikleri çeşitli internet sitelerinden kendi tarama davranışına veri ve bilgi toplamak için kullanılır.</p>
                        </div>
                        
                        <div class="cerez-kullanim-amaci mb-4">
                            <h3>Kullanım Amaçlarına Göre Çerez Türleri</h3>
                            <p>Kullanım amaçlarına göre dört çeşit çerez bulunmaktadır: Oturum Çerezleri, Performans Çerezleri, Fonksiyonel Çerezler ve Reklam ve Üçüncü Taraf Çerezleri.</p>
                            
                            <h4>Oturum Çerezleri:</h4>
                            <p>Bu tür çerezler internet sitelerinin düzgün bir şekilde çalışabilmesi için gereklidir. İnternet sitesinin ziyaret edilebilmesini ve özelliklerinden faydalanılmasını bu çerezler sağlar. Oturum çerezleri, internet sitesinde sayfalar arasında bilgileri taşıyabilmek ve bilgileri tekrardan girmek zorunluluğunu ortadan kaldırmak için kullanılmaktadır.</p>
                            
                            <h4>Performans Çerezleri:</h4>
                            <p>Bu çerezler aracılığıyla, sayfaların ziyaret sıklığı, varsa ilgili hata iletileri, sayfalarda geçirilen zaman ve kullanıcının internet sitesini kullanma şekliyle ilgili bilgileri toplanır. Bu bilgiler aracılığıyla, internet sitesinin performansının arttırılması sağlanır.</p>
                            
                            <h4>Fonksiyonel Çerezler:</h4>
                            <p>Bu çerezler ile kullanıcının site içinde yapmış olduğu seçeneklerin hatırlanması sağlanır ve böylelikle kullanıcıya kolaylık sağlanmış olur. Bu çerezler ile kullanıcılara gelişmiş internet özellikleri sağlanır.</p>
                            
                            <h4>Reklam Ve Üçüncü Taraf Çerezleri:</h4>
                            <p>İnternet sitelerinde bazı fonksiyonların kullanımı amacıyla üçüncü taraf tedarikçilerine ait çerezler kullanılır.</p>
                        </div>
                        
                        <div class="cerez-tablosu mb-4">
                            <h3>Ne Tür Çerezler Kullanıyoruz?</h3>
                            <p>Hatay İmar, kendi Sitelerinde Zorunlu Çerezler, Performans Çerezleri kullanmaktadır.</p>
                            <p>Hatay İmar internet sitesinde kullanılan çerezler:</p>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Çerez Türü</th>
                                            <th>Ne işe yarar?</th>
                                            <th>Bu çerezler kişisel bilgilerinizi toplar mı / kimliğinizi tanımlayabilir mi?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Zorunlu</strong></td>
                                            <td>Bu çerezler, Hatay İmar internet sitesinin düzgün bir şekilde çalışabilmesi için gereklidir, sitelerimizde gezinmenizi ve site özelliklerinden faydalanmanızı sağlarlar. Aynı oturum içerisinde bir sayfaya geri dönüldüğünde önceki eylemleri hatırlama (ör. metin girişi) buna örnek verilebilir.</td>
                                            <td>Bu çerezler kimliğinizi tanımlamaz.<br><br>Eğer bu çerezleri kabul etmezseniz, internet sitesindeki veya sitenin bazı bölümlerindeki performans etkilenebilir.</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Performans</strong></td>
                                            <td>Bu çerezler; ziyaret edilen alanlar, sitede geçirilen zaman ve karşılaşılan hata mesajları gibi sorunlar hakkında bilgiler sağlayarak ziyaretçilerin internet sitemizle nasıl bir etkileşime girdiğini anlamamıza yardımcı olur. Bu da internet sitemizin performansını iyileştirebilmemizi sağlar.</td>
                                            <td>Bu çerezler kimliğinizi tanımlamaz. Tüm veriler isimsiz bir şekilde alınır ve bir araya getirilir.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="cerez-veri-kullanimi mb-4">
                            <p>Hatay İmar, çerezler aracılığıyla topladığı bilgileri Hatay İmar Gizlilik Politikası'na uygun olarak kullanmaktadır.</p>
                            
                            <p>Hatay İmar internet sitesini ziyaret etmeye devam ederek çerezlerin cihazınıza yerleştirilmesine izin vermiş oluyorsunuz. Cihazınıza çerezler yerleştirilmesini istemiyorsanız tarayıcınızın ayarları veya seçeneklerinden çerezlerin kullanımını reddedebilirsiniz veya Hatay İmar internet sitesini kullanmamalısınız. İnternet sitesi ziyaretinizde en iyi deneyimi yaşayabilmek için çerezlerin kullanımını reddetmemenizi öneririz.</p>
                        </div>
                        
                        <div class="cerez-amac mb-4">
                            <h3>Çerezleri ne amaçla kullanırız?</h3>
                            <p>Çerezleri, Hatay İmar internet sitesinin kullanımını kolaylaştırmak, Hatay İmar internet sitesi ve ürünlerimizi ilgi ve ihtiyaçlarınız doğrultusunda daha iyi bir şekilde özelleştirmek amacıyla kullanırız.</p>
                            
                            <p>Çerezler aynı zamanda gelecekte sitelerimiz üzerinde gerçekleştireceğiniz faaliyet ve deneyimleri hızlandırmak amacıyla da kullanılır. Ayrıca çerezleri, kullanıcıların sitelerimizi nasıl kullandıklarını anlamamızı sağlayan isimsiz ve toplu istatistiki verileri bir araya getirmemize ve sitelerimizin yapılarını ve içeriklerini geliştirmemize yardımcı olmaları amacıyla kullanmaktayız.</p>
                        </div>
                        
                        <div class="cerez-kontrol mb-4">
                            <h3>Çerezleri nasıl kontrol edebilir veya silebilirsiniz?</h3>
                            <p>Genel olarak internet tarayıcıları, çerezleri otomatik olarak kabul edecek şekilde ön tanımlıdır. Tarayıcılar, çerezleri engelleyecek veya cihaza çerez gönderildiğinde kullanıcıya uyarı verecek şekilde ayarlanabilir.</p>
                            
                            <p>Çerezleri yönetmek tarayıcıdan tarayıcıya farklılık gösterdiğinden ayrıntılı bilgi almak için tarayıcının yardım menüsüne bakılabilir. Çerezlerin silinmesi veya engellenmesi ile ilgili ayrıntılar ve çerezlerle ilgili genel bilgi için <strong>www.allaboutcookies.org</strong> adresinden bilgi alabilirsiniz.</p>
                            
                            <p>Kalıcı çerezleri veya oturum çerezlerini reddetmeniz durumunda, internet sitesini kullanmaya devam edebilirsiniz, fakat internet sitesinin tüm işlevlerine erişemeyebilir veya erişiminiz sınırlı olabilir.</p>
                        </div>
                        
                        <div class="cerez-kapatma mb-4">
                            <h3>Çerezleri kapatmak için;</h3>
                            <ul>
                                <li><strong>Chrome'da:</strong> tarayıcı ayarlarınızda "Ayarlar/Gizlilik/İçerik Ayarları/Çerez kullanımını kapat" seçeneğini kullanabilirsiniz.</li>
                                <li><strong>Internet Explorer kullanıcıları için:</strong> "Seçenekler/İnternet Ayarları/Gizlilik/Ayarlar" seçeneklerini kullanabilirsiniz.</li>
                                <li><strong>Firefox kullanıcıları için:</strong> "Araçlar/ Seçenekler'/ Gizlilik/ Çerez kabul yöntemi/Firefox kapatılana kadar" seçeneklerini kullanabilirsiniz.</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="content-section">
                        <h2>İlgili Sayfalar</h2>
                        <div class="related-pages">
                            <ul>
                                <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                                <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
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
                            <p><strong>KVKK E-posta:</strong> kvkk@hatayimar.com.tr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 