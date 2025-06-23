@extends('layouts.app')

@section('title', 'Hakkımızda - Hatay İmar')
@section('description', 'Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                    <h2 class="title">Hakkımızda</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                    <li>Hakkımızda</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hakkımızda İçerik Bölümü
==============================-->
<section class="about-section style-7 space">
    <div class="container">
        <div class="row gy-50 align-items-center">
            <div class="col-lg-6">
                <div class="about-content-wrapper">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>Hatay İmar Hakkında</div>
                        <h2 class="sec-title mb-25">Şehrimize <span class="bold">Değer Katmak</span><br>İçin Çalışıyoruz</h2>
                        <p class="sec-text">Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız. Şehrimizin gelişimi ve kalkınması için sürekli olarak yeni projeler geliştirmekte ve hizmet kalitemizi artırmaktayız.</p>
                        <p class="sec-text">Hatay Büyükşehir Belediyesi'nin bir kuruluşu olarak, şehrimizin sosyal, kültürel ve ekonomik gelişimine katkıda bulunmayı misyon edinmiş bulunuyoruz.</p>
                    </div>
                    
                    <div class="about-feature-list">
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-building"></i></div>
                            <div class="content">
                                <h5>Sosyal Tesisler</h5>
                                <p>İşletmeciliği ve Yönetimi</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="icon"><i class="fa-solid fa-industry"></i></div>
                            <div class="content">
                                <h5>Üretim Tesisleri</h5>
                                <p>İnşaat Malzemeleri Üretimi</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-35 pb-25">
                        <div class="border"><span class="bar"></span></div>
                    </div>
                    
                    <ul class="features-list">
                        <li>Kaliteli hizmet anlayışı ile çalışma</li>
                        <li>Şehrimize değer katacak projeler geliştirme</li>
                        <li>Özverili ve profesyonel yaklaşım sergileme</li>
                        <li>Sürdürülebilir kalkınma ilkelerine bağlılık</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-thumb-area">
                    <div class="about-thumb">
                        <img src="{{ asset('assets/images/imageshatay/hatay10.jpeg') }}" alt="Hatay İmar" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="about-thumb-2">
                        <img src="{{ asset('assets/images/imageshatay/hatay11.jpeg') }}" alt="Hatay İmar Tesisleri" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                    </div>
                    <div class="experience-box">
                        <div class="icon"><i class="fa-solid fa-star"></i></div>
                        <div class="content">
                            <h4>70+</h4>
                            <p>Yıllık Hizmet<br>Deneyimi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Misyon & Vizyon Bölümü
==============================-->
<section class="mission-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Misyon & Vizyon</div>
                    <h2 class="sec-title mb-60">Geleceğe Yönelik <span class="bold">Hedeflerimiz</span></h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            <div class="col-lg-6">
                <div class="mission-box">
                    <div class="icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div class="content">
                        <h4>Misyonumuz</h4>
                        <p>Hatay İmar olarak, şehrimizin sosyal, kültürel ve ekonomik gelişimine katkıda bulunmak, kaliteli hizmet sunarak vatandaşlarımızın yaşam kalitesini artırmak ve sürdürülebilir kalkınma ilkelerine uygun projeler geliştirmektir.</p>
                        <p>Özverili çalışma anlayışımızla, şehrimize değer katacak tesisler inşa etmek ve işletmek, üretim faaliyetlerimizle yerel ekonomiye katkı sağlamaktır.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-box">
                    <div class="icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="content">
                        <h4>Vizyonumuz</h4>
                        <p>Hatay'ın tarihi ve kültürel mirasını koruyarak, modern yaşam standartlarını şehrimize kazandıran, örnek bir belediye kuruluşu olmaktır.</p>
                        <p>Teknolojik gelişmeleri takip ederek, çevre dostu ve sürdürülebilir projelerle Hatay'ı geleceğe taşıyan, bölgede lider konumda bir kuruluş olmayı hedefliyoruz.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Hatay Şehri Tarihi Bölümü
==============================-->
<section class="history-section space">
    <div class="container">
        <div class="row gy-50 align-items-center">
            <div class="col-lg-6">
                <div class="history-content">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>Hatay Şehrimiz</div>
                        <h2 class="sec-title mb-25">Türkiye'nin En Eski<br><span class="bold">Yerleşim</span> Yerlerinden</h2>
                        <p class="sec-text">Hatay, Türkiye'nin en eski yerleşim yerlerinden biridir. Araştırmacılar, eldeki bilgilere göre yörenin iskân tarihinin M.Ö. yüzbinli yıllara rastlayan orta paleolitik döneme kadar uzandığını ifade etmekte, bunun 2,5 milyon yıl öncesine kadar uzanabileceğini belirtmektedirler.</p>
                        
                        <p class="sec-text">1954-1966 yılları arasında Altınözü, Şenköy, Antakya ve Çevlik'te yapılan araştırmalarda elde edilen ve M.Ö. 100000-40000 yılları arasında tarihlenen bulgular orta paleolitik dönem özellikleri taşımaktadır.</p>
                        
                        <p class="sec-text">Bu köklü tarihsel mirasa sahip şehrimizde, geçmişin değerlerini koruyarak geleceğe taşımak için çalışmaktayız.</p>
                    </div>
                    
                    <div class="history-stats">
                        <div class="stat-item">
                            <h4>M.Ö. 100.000</h4>
                            <p>Yıllık Tarih</p>
                        </div>
                        <div class="stat-item">
                            <h4>1954-1966</h4>
                            <p>Araştırma Yılları</p>
                        </div>
                        <div class="stat-item">
                            <h4>2.5 Milyon</h4>
                            <p>Yıl Öncesine Uzanan Miras</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="history-images">
                    <div class="image-grid">
                        <div class="image-item">
                            <img src="{{ asset('assets/images/imageshatay/hatay13.jpeg') }}" alt="Hatay Tarihi" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <div class="image-item">
                            <img src="{{ asset('assets/images/imageshatay/hatay14.jpeg') }}" alt="Antakya" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <div class="image-item">
                            <img src="{{ asset('assets/images/imageshatay/hatay15.jpeg') }}" alt="Hatay Kültürü" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    İletişim Bilgileri Bölümü
==============================-->
<section class="contact-info-section space bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title text-white"><span><i class="asterisk"></i></span>İletişim Bilgilerimiz</div>
                    <h2 class="sec-title  mb-60" style="color: #cf9f38;">Bizimle <span class="bold">İletişime</span> Geçin</h2>
                </div>
            </div>
        </div>
        <div class="row gy-40">
            <div class="col-lg-4">
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="content">
                        <h5 style='color: #cf9f38;'>Adresimiz</h5>
                        <p class='text-white'>Haraparası Mah. 2. Küçük Sanayi Cad.<br>Katlı Otopark Sitesi No: 2 K-2<br>Antakya / HATAY</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="content">
                        <h5 style='color: #cf9f38;'>Telefon</h5>
                        <p class='text-white'><a class='text-white' href="tel:+903262132326">+90 326 213 23 26</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h5 style='color: #cf9f38;'>E-posta</h5>
                        <p class='text-white'><a class='text-white' href="mailto:info@hatayimar.com.tr">info@hatayimar.com.tr</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 