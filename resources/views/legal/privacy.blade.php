@extends('layouts.app')

@section('title', 'Gizlilik Politikası - Hatay İmar')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
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
                        <h2>GİZLİLİK POLİTİKASI</h2>
                        <p><strong>Güncelleme Tarihi: 20.12.2021</strong></p>
                        
                        <p>Size ait verilerin güvenliğinin sizin için ne kadar önemli olduğunun bilincindeyiz. Bu bakımdan verilerinizin güvenle korunması ve gizliliğinin sağlanması bizim için de çok önemlidir. Türk Kanunlarına göre Anonim Şirket olarak kurulmuş olan ve Veri Sorumlusu sıfatıyla hareket eden Hatay İmar Sanayi A.Ş. (bundan sonra "Hatay İmar" ya da "biz" olarak anılacaktır) olarak kişisel verilerinize ve diğer gizli bilgilerinize saygı göstermeyi ve bu bilgilerin güvenliğini sağlamak için tüm makul önlemleri almayı ve yasaların gerektirdiği güvenlik tedbirlerini sunmayı taahhüt etmekteyiz.</p>
                        
                        <p>Hatay İmar Gizlilik Politikası, bu nedenle size ait verilerin Hatay İmar tarafından hangi amaçlarla, ne şekilde kullanılacağı ve kimlerle paylaşılabileceği konularında gerekli bilgiyi sağlamayı amaçlamaktadır.</p>
                        
                        <p>İşbu Gizlilik Politikası yalnızca http://www.hatayimar.com.tr/ (Bundan sonra "Site" ya da "İnternet Sitesi" olarak anılacaktır) alan adı üzerinden verilen hizmetleri kapsar. İnternet sitemiz aracılığı ile Hatay İmar tarafından kişisel verilerinizin işlenmesi halinde bu veriler Gizlilik Politikamıza uygun olarak kullanılacaktır.</p>
                        
                        <p><strong>SİTEYİ KULLANMANIZ, GİZLİLİK POLİTİKASI VE İLGİLİ KULLANIM KOŞULLARINI KABUL ETTİĞİNİZ ANLAMINA GELECEKTİR.</strong></p>
                    </div>

                    <div class="content-section">
                        <h3>Verilerinizin ve Kişisel Verilerinizin İşlenmesi</h3>
                        <p>Veri, yorumlamak ve sunmak amacı ile toplanmış, çözümlenmiş yaş, boy, ağırlık gibi sayısal ve marka, kanal adı, ülke, şehir gibi kategorik tüm gerçeklere ilişkin bilgilerdir. Veriler, kişisel verilerinizi de kapsamaktadır.</p>
                        
                        <p>Kişisel veri, isim, adres, e-posta adresi, telefon numarası, doğum tarihi, IP adresi gibi kimliği belirli veya belirlenebilir gerçek kişiye ilişkin her türlü bilgidir. Bu tür verileriniz, işbu Gizlilik Politikası'na ilaveten, Kişisel Verilerin Korunması Kanunu'na tam anlamıyla uyumlu bir biçimde işlenecektir.</p>
                        
                        <p>Hatay İmar ve anlaşmalı hizmet sağlayıcılarımız; verilerinizi, iş başvurularınızı değerlendirebilmek, iletilerinize konu şikayet, soru ve görüşlerinizi araştırabilmek ve cevaplayabilmek, ihtiyaçlarınıza yönelik en uygun çalışmaları yapmak, teklif talepleriniz doğrultusunda tekliflerimizi iletebilmek, size daha iyi hizmet sunabilmek, internet sayfamızın kullanımını kolaylaştırabilmek, tarafınızla reklam ve pazarlama çalışmaları paylaşmak, fikirlerinize başvurmak, tarafınıza özel kampanya, ürün veya teklif geliştirmek gibi amaçlarla kullanmaktadır.</p>
                    </div>

                    <div class="content-section">
                        <h3>Kişisel Verilerinizin İşlenme Amacı</h3>
                        <p>Hatay İmar, kişisel verilerinizi:</p>
                        <ul>
                            <li>İletilerinize konu şikâyet, soru ve görüşlerinizi araştırabilmek ve cevaplayabilmek</li>
                            <li>Sipariş gereksinimlerinizi daha iyi karşılayabilmek</li>
                            <li>Sipariş alımlarınızı gerçekleştirmek ve sipariş hesabınızı yönetebilmek</li>
                            <li>Kurumumuzun yayınlamış olduğu ilanlara başvurularınızı alabilmek ve takibini sağlayabilmek</li>
                            <li>Hizmetlerimizin ifasına ilişkin yükümlülüklerimizi yerine getirebilmek</li>
                            <li>Veritabanı oluşturarak, listeleme, raporlama, doğrulama, analiz ve değerlendirmeler yapabilmek</li>
                            <li>İnternet sitemizi ve diğer iletişim kanallarımızı ne şekilde kullandığınıza dair analiz yapabilmek</li>
                            <li>Site'de gördüğünüz reklamları ve içeriğini özelleştirebilmek</li>
                            <li>Ürünlerimizi ve hizmetlerimizi ve bunlara ilişkin kişisel seçim olanaklarınızı araştırabilmek</li>
                            <li>Site'nin kötüye kullanımını ve hileli işlemleri tespit edebilmek</li>
                            <li>Pazar araştırması amacıyla iletişim kanalları üzerinden sizinle irtibat kurabilmek</li>
                            <li>İhtiyaçlarınıza yönelik en uygun ürün ve hizmetleri belirleyerek size daha iyi hizmet sunabilmek</li>
                        </ul>
                    </div>

                    <div class="content-section">
                        <h3>Kişisel Verilerinizin Paylaşılması</h3>
                        <p>Onay alınmaksızın ve/veya kişisel verilerin korunmasına ilişkin mevzuatta belirtilen istisnalar dışında kişisel verilerinizin üçüncü kişilerle paylaşılamayacağının yasal bir yükümlülük olduğunun farkındayız.</p>
                        
                        <p>Hatay İmar; yürürlükteki mevzuatın gerektirdiği hallerde, uygulanan kanunlar, yargı kararları ve işlemleri, celpler ve sair yasal işlemlere riayet etmek suretiyle ve ayrıca kendi menfaatlerinin haleldar olmasını önlemek, kendisinin ve çalışanlarının, temsilcilerinin ve Site kullanıcılarının güvenliğini, haklarını ve meşru menfaatlerini korumak amacıyla, Site'de derlenmiş olan kullanıcılara ait kişisel bilgileri üçüncü kişilerle paylaşma hakkını saklı tutar.</p>
                        
                        <p>Hatay İmar, yurtiçinde bulunan çalışanlarımız, anlaşmalı hizmet sağlayıcılarımız, iş ortaklarımız, ürün ve hizmetlerin üretiminde görev alan 3. Kişi firmalar, yetkili satıcılarımız, faaliyetlerimizi sürdürmekte bize yardımcı olan tedarikçiler ve iştirakçiler, yetkili idari kuruluşlar ve yasal zorunluluklar doğrultusunda diğer ilgili kişi ve kuruluşlarla kişisel verilerinizi paylaşabilir.</p>
                    </div>

                    <div class="content-section">
                        <h3>Çerezler (Cookies)</h3>
                        <p>Hatay İmar, deneyimlerinizi geliştirmek için internet sitesinde çerezler kullanabilir. Kullanılan çerezler vasıtasıyla sisteminizden ve/veya sabit diskinizden herhangi bir bilgi toplanmaz. Sitemizde isim ve e-posta adresi ile tanımlanmazsınız bununla beraber ilk girişinizde sayı ve dizinler atanır.</p>
                        
                        <p>Çerezler, internet ağ sunucusu tarafından tarayıcınız aracılığı ile bilgisayarınıza yerleştirilen küçük veri dosyalarıdır. Tarayıcınız ve sunucu arasında bir bağlantı sağlandığında site, çerezler aracılığıyla sizi tanır.</p>
                        
                        <p>Kullanım amaçlarına göre dört çeşit çerez bulunmaktadır: Oturum Çerezleri, Performans Çerezleri, Fonksiyonel Çerezler ve Reklam ve Üçüncü Taraf Çerezleri.</p>
                        
                        <p>İnternet tarayıcınızdaki ayarları değiştirerek çerezleri kabul veya reddetme imkanına sahipsiniz. Lütfen çerezler devre dışı bırakıldığında sitenin bazı özelliklerinin mevcut olmayacağını dikkate alın.</p>
                    </div>

                    <div class="content-section">
                        <h3>Kişisel Verileriniz Üzerindeki Haklarınız</h3>
                        <p>Hatay İmar tarafından işlenen kişisel verileriniz ile ilgili olarak, Hatay İmar'a başvurarak aşağıdaki haklara sahipsiniz:</p>
                        <ul>
                            <li>Kişisel verilerinizin işlenip işlenmediğini öğrenme</li>
                            <li>Kişisel verileriniz işlenmişse buna ilişkin bilgi talep etme</li>
                            <li>Kişisel verilerinizin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme</li>
                            <li>Yurt içinde veya yurt dışında kişisel verilerinizin aktarıldığı üçüncü kişileri bilme</li>
                            <li>Kişisel verilerinizin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme</li>
                            <li>Kişisel Verilerin Korunması Kanunu'nun 7 nci maddesinde öngörülen şartlar çerçevesinde kişisel verilerinizin silinmesini veya yok edilmesini isteme</li>
                            <li>Yapılan işlemlerin, kişisel verilerinizin aktarıldığı üçüncü kişilere bildirilmesini isteme</li>
                            <li>İşlenen verilerinizin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle sizin aleyhine bir sonucun ortaya çıkmasına itiraz etme</li>
                            <li>Kişisel verilerinizin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme</li>
                        </ul>
                    </div>

                    <div class="content-section">
                        <h3>Seçenekler / Vazgeçme</h3>
                        <p>Kullanıcıların aşağıdaki yöntemleri izleyerek tercih yapma ve/veya tercihlerini değiştirme hakları mevcuttur:</p>
                        <ul>
                            <li>Site üzerinden sunduğumuz hizmetleri ve faaliyetleri kullanabilmek için seçimlik olan kişisel verilerinizi paylaşmayı reddedebilirsiniz</li>
                            <li>Bazı hizmetlere erişiminizin mümkün olmayacağını bilerek, kişisel bilgilerinizi paylaşmamayı tercih edebilirsiniz</li>
                            <li>Site'de yer alan bölümlerde paylaşmış olduğunuz kişisel verilerinizin güncellenmesini veya silinmesini talep edebilirsiniz</li>
                            <li>Site'yle ilgili bültenleri ve promosyon nitelikli e-postaları almak istememeniz halinde, gönderilen e-postaların en altında yer alan "Aboneliği İptal Et" linkine tıklayabilirsiniz</li>
                            <li>SMS İletişim izni ile ilgili bir değişiklik yapmak istediğinizde, size gönderdiğimiz SMS'lerde yer alan yönergeyi takip ederek bu değişikliği gerçekleştirebilirsiniz</li>
                            <li>Tarayıcı ayarlarınızı çerezleri silmeye ve/veya reddetmeye ayarlayabilirsiniz</li>
                        </ul>
                    </div>

                    <div class="content-section">
                        <h3>Kişisel Verilerinizin Güncellenmesi ve Düzeltilmesi</h3>
                        <p>Eğer Hatay İmar ile paylaşmış olduğunuz bilgilerin bir nüshasını almak isterseniz ya da hakkınızda yayımlanan bir bilginin yanlış olduğunu fark eder ve düzeltilmesini ya da silinmesini isterseniz, kvkk@hatayimar.com e-posta adresi üzerinden bizimle iletişime geçiniz.</p>
                        
                        <p>Bu talebinizin yerine getirilmesi amacıyla, eklenecek ve/veya silinecek bilgilerle ilgili bir işlem yapmadan önce IT Birimi çalışanlarımız, sizden kişisel tanımlayıcı bilgileriniz de dâhil olmak üzere kimlik bilgilerinizi ve diğer ayrıntıları doğrulamanızı isteyebilir.</p>
                        
                        <p>Talebinizin, orantılılık, veri kalitesi ve makullük ilkeleri çerçevesindeki değerlendirilmesini müteakiben işbu bilgiler üzerinde değiştirme, düzeltme ya da hatalı verilerin silinmesi gibi işlemler gerçekleştirilecektir.</p>
                    </div>

                    <div class="content-section">
                        <h3>Kişisel Verilerinizin Güvenliği</h3>
                        <p>Hatay İmar, verilerinizin gizliliğini korumaya önem vermektedir. Hatay İmar, kontrolü altındaki verilerin kaybı, değiştirilmesi ve farklı amaçlarla kullanımını engellemek amacı ile uygun güvenlik sistemleri kullanmaktadır. Söz konusu veriler Hatay İmar'a ulaştığında, bu veriler güvenlik ve gizlilik standartlarımıza uygun olarak korunmaktadır.</p>
                        
                        <p>Ayrıca, kişisel verilerinizi korumak ve muhafaza etmek için gerekli olduğuna inandığımız tüm idari tedbirleri de almaktayız. Kişisel verilerinize sadece yetkili çalışanların hizmetlerimizle ilgili görevlerini yerine getirmek için erişimlerine izin verilmektedir.</p>
                        
                        <p>Ancak her çevrimiçi veri aktarımında olduğu gibi bilgi teknolojileri sektörünün doğası gereği; Hatay İmar'ın standartları karşılayan seviyede bir güvenlik düzeyi kurması yetkisiz erişimlerin önüne geçemeyebilecektir.</p>
                    </div>

                    <div class="content-section">
                        <h3>Yurtdışına Veri Transferi</h3>
                        <p>İzin alınmak suretiyle Hatay İmar'a ve/veya üçüncü şahıslara yapılan bilgi aktarımı, ki bu bilgilerin içinde kişisel bilgiler de bulunabilir, bu verilerin bir yargı alanından diğerine aktarılmasını da kapsayabilir.</p>
                        
                        <p>Kişisel verileriniz, ancak verilerin aktarılacağı ülkede yeterli korumanın bulunması; yeterli korumanın bulunmaması durumunda Türkiye'deki ve/veya ilgili yabancı ülkedeki veri sorumlularının yeterli bir korumayı yazılı olarak taahhüt etmeleri ve Kurulun izninin bulunması ile aktarılacaktır.</p>
                    </div>

                    <div class="content-section">
                        <h3>Uyuşmazlık Çözümleri</h3>
                        <p>Site kullanıcıları ile Hatay İmar arasında doğması muhtemel her türlü uyuşmazlık ile ilgili olarak şirket politikamız, bu uyuşmazlıkların tarafların anlaşması ve kullanıcının memnuniyeti ile çözülmesini temin etmektir. Her türlü konuyla ilgili olarak bizlere internet sitesinde yer alan ilgili bölümden şikâyet ve taleplerinizi iletebilirsiniz.</p>
                        
                        <p>Ayrıca dilerseniz uyuşmazlık konusundaki başvurularınızı, arabuluculuk yoluyla çözümlemek hususunda başvuruda bulunabilirsiniz. Arabuluculuk hakkınız, hiçbir şekilde diğer hukuki çözüm yollarına başvurma hakkına engel teşkil etmez.</p>
                        
                        <p>Bu kapsamda hukuki müracaatlarınızı başvuru konusuna göre bulunduğunuz il veya ilçedeki Asliye Ticaret Mahkemelerine, bulunduğunu il veya ilçede Asliye Ticaret Mahkemesi'nin bulunmaması halinde Asliye Hukuk Mahkemesi'ne yapabilirsiniz.</p>
                    </div>

                    <div class="content-section">
                        <h3>İletişim</h3>
                        <p>İşbu Gizlilik Politikası ve/veya Hatay İmar'ın genel gizlilik uygulamaları hakkındaki her türlü görüşünüzü ve sorunuzu aşağıdaki yöntemlerle bizimle paylaşabilirsiniz:</p>
                        <div class="contact-info mt-4">
                            <p><strong>E-posta:</strong> kvkk@hatayimar.com</p>
                            <p><strong>Posta:</strong> Haraparası Mah. 2. Küçük Sanayi Cad. Katlı Otopark Sitesi No: 2 K-2 Antakya</p>
                            <p><strong>MERSIS:</strong> 0070032758800011</p>
                            <p><strong>İlgi:</strong> Gizlilik Politikaları</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Sözleşme Bütünlüğü</h3>
                        <p>Site kullanıcıları, işbu Gizlilik Politikası'nın herhangi bir hükmünün yetkili bir mahkeme tarafından geçersiz addedilmesi halinde, bahsi geçen hükümde yer alan düzenlemeye en uygun ve tarafların gerçek niyetine en yakın etkiyi yaratan yürürlükteki hükmün geçerli olacağını ve bu durumun işbu Gizlilik Politikası kapsamındaki diğer hükümlerin yürürlüğünü ve etkisinin bertaraf etmeyeceğini kabul ve taahhüt etmişlerdir.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>İlgili Sayfalar</h2>
                        <div class="related-pages">
                            <ul>
                                <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                                <li><a href="{{ route('contact-notice') }}">İletişim Bölümü Aydınlatma Metni</a></li>
                                <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
                                <li><a href="{{ route('cookies-policy') }}">Çerez Politikası</a></li>
                                <li><a href="{{ route('job-application-notice') }}">İlan Başvuru Formu Aydınlatma Metni</a></li>
                                <li><a href="{{ route('terms') }}">Şartlar ve Koşullar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection