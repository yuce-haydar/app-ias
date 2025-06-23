@extends('layouts.app')

@section('title', 'Sık Sorulan Sorular - Hatay İmar')
@section('description', 'Hatay İmar hizmetleri hakkında sık sorulan sorular ve yanıtları.')
@section('keywords', 'hatay imar, SSS, sık sorulan sorular, sosyal tesis, parke taşı, otopark, büz üretim')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Sık Sorulan Sorular</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('faq') }}">Sık Sorulan Sorular</a></li>
                    <li>Sık Sorulan Sorular</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
SSS Bölümü
==============================-->
<section class="faq-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-thumb">
                    <img src="{{ asset('assets/images/imageshatay/hatay8.jpeg') }}" alt="Hatay İmar SSS">
                    <div class="faq-shape">
                        <img src="{{ asset('assets/images/faq/circle-shape.png') }}" alt="Shape">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-content">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>SIK SORULAN SORULAR</div>
                        <h2 class="sec-title">Merak ettiğiniz <span class="bold">soruların</span> yanıtları</h2>
                        <p class="sec-text">Hatay İmar hizmetlerimiz hakkında sıkça sorulan soruları ve detaylı yanıtlarını aşağıda bulabilirsiniz.</p>
                    </div>
                    
                    <div class="faq-accordion">
                        <div class="accordion" id="faqAccordion">
                            <!-- Soru 1 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Hatay İmar hangi hizmetleri sunmaktadır?
                                    </button>
                                </h3>
                                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Hatay İmar olarak sosyal tesis işletmeciliği, büz (beton boru) üretimi, parke taşı üretimi ve katlı otopark hizmetleri sunmaktayız. Şehrimizin altyapı ve sosyal ihtiyaçlarını karşılamak için kaliteli hizmet vermeyi ilke edinmişiz.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 2 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Büz (beton boru) ürünlerinizin özellikleri nelerdir?
                                    </button>
                                </h3>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Büz ürünlerimiz 30-120 cm çap aralığında üretilmekte olup, TSE standartlarına uygun kalitededir. Günlük 500 adet üretim kapasitemiz ile sipariş sonrası 48 saat içinde teslimat yapabiliyoruz. Çevre dostu üretim teknolojisi kullanıyoruz.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 3 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        Katlı Otopark hizmetiniz nasıl çalışır?
                                    </button>
                                </h3>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        2005 yılından beri hizmet veren 4 katlı otoparkımız, şehir merkezinde 300 araç kapasitesi ile hizmet vermektedir. 24/7 güvenlik hizmeti, modern kamera sistemleri ve otomatik giriş-çıkış sistemleri ile güvenli park imkanı sunuyoruz.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 4 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Habib-i Neccar Sosyal Tesis'te hangi aktiviteler yapılabilir?
                                    </button>
                                </h3>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Habib-i Neccar Dağı eteklerindeki sosyal tesisimizde aile piknik alanları, çocuk oyun parkları, restoran ve kafeterya hizmetleri mevcuttur. Doğal ortamda ailece vakit geçirmek için ideal bir mekandır. 7 gün açığız.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 5 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        Parke taşı çeşitleriniz nelerdir?
                                    </button>
                                </h3>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        50'den fazla model ve çeşitte parke taşı üretimi yapmaktayız. Kilitli parke taşı, renkli seçenekler, farklı desen ve boyutlarda üretim yapabiliyoruz. Tüm ürünlerimiz TSE belgeli ve %100 yerli üretimdir.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 6 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        Yeni projeleriniz hakkında nasıl bilgi alabilirim?
                                    </button>
                                </h3>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="faq6" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Devam eden ve planlanan projelerimiz hakkında güncel bilgileri web sitemizin haberler bölümünden takip edebilirsiniz. Ayrıca iletişim formumuz aracılığıyla bizimle doğrudan iletişime geçerek detaylı bilgi alabilirsiniz.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 7 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        Kalite standartlarınız nelerdir?
                                    </button>
                                </h3>
                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="faq7" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Tüm üretim süreçlerimizde TSE standartlarına uygunluk sağlamaktayız. Kalite kontrol birimlerimiz her aşamada titiz denetimler yapmaktadır. Çevre dostu üretim teknolojileri kullanarak sürdürülebilir kalite anlayışını benimseriz.
                                    </div>
                                </div>
                            </div>

                            <!-- Soru 8 -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="faq8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        Teslimat ve nakliye hizmetiniz var mı?
                                    </button>
                                </h3>
                                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="faq8" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Evet, büz ve parke taşı ürünlerimiz için teslimat hizmeti sunmaktayız. Sipariş sonrası 48 saat içinde teslimat yapabiliyoruz. Nakliye ücretleri mesafe ve sipariş miktarına göre belirlenmektedir.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim CTA Bölümü
==============================-->
<section class="cta-section bg-dark">
    <div class="container">
        <div class="cta-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content">
                        <h3 class="title">Sorunuz yanıtlanmadı mı?</h3>
                        <p class="text">Merak ettiğiniz konular hakkında detaylı bilgi almak için bizimle iletişime geçin. Hatay İmar ekibimiz size yardımcı olmaktan memnuniyet duyacaktır.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">Bize Ulaşın</span>
                            <span class="effect-1">Bize Ulaşın</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 