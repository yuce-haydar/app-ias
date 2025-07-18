<!--==============================
    Footer Bölümü
==============================-->
<style>
.footer-brand .brand-header {
    min-height: 320px !important;
}

.footer-brand .social-btn {
    margin-top: auto !important;
}

/* Footer padding düzeltmesi */
.footer-section .footer-top.space {
    padding-top: 80px !important;
    padding-bottom: 30px !important;
}

.footer-section .footer-bottom {
    padding-top: 40px !important;
    padding-bottom: 40px !important;
}

@media (max-width: 768px) {
    .footer-brand .brand-header {
        min-height: auto !important;
    }
    
    .footer-brand .social-btn {
        margin-top: 30px !important;
    }
    
    .footer-section .footer-top.space {
        padding-top: 60px !important;
    }
    
    .footer-logo img {
        height: 75px !important;
    }
    
    .footer-logo img:first-child {
        max-width: 140px !important;
    }
    
    .footer-logo img:last-child {
        max-width: 110px !important;
        min-width: 55px !important;
    }
}
</style>

<footer class="footer-section bg-dark">
    <div class="footer-top space">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 footer-brand">
                    <div class="brand-header" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <a href="{{ url('/') }}" class="footer-logo d-flex align-items-center gap-4 mb-20">
                                <img src="{{ url('assets/images/logo/hbblogo.png') }}" alt="HBB Logo" class="img-fluid" style="height: 110px; width: auto; max-width: 200px;">
                                <img src="{{ url('assets/images/logo/imar-bg.png') }}" alt="İmar Logo" class="img-fluid" style="height: 110px; width: auto; min-width: 80px; max-width: 160px;">
                            </a>
                            <p class="text mb-30">Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı,<br>Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.</p>
                        </div>
                        <div class="social-btn style3" style="margin-top: auto; padding-top: 20px;">
                        <a href="https://www.facebook.com/hbbimar/">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                <span class="effect-1"><i class="fab fa-facebook"></i></span>
                            </span>
                        </a>
                        <a href="https://instagram.com/hatayimar">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                <span class="effect-1"><i class="fab fa-instagram"></i></span>
                            </span>
                        </a>
                        <a href="https://x.com/hatayimarr">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-twitter"></i></span>
                                <span class="effect-1"><i class="fab fa-twitter"></i></span>
                            </span>
                        </a>
                        <a href="https://www.youtube.com/@hbbimar">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-youtube"></i></span>
                                <span class="effect-1"><i class="fab fa-youtube"></i></span>
                            </span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 p-0 sm-pl-15">
                            <div class="footer-widget">
                                <h4 class="title">Kurumsal</h4>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                                    <li><a href="{{ route('about') }}">Misyon & Vizyon</a></li>
                                    <li><a href="{{ route('team') }}">Yönetim Kurulu</a></li>
                                    <li><a href="{{ route('privacy') }}">KVKK</a></li>
                                    <li><a href="{{ route('contact') }}">İletişim</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 p-0 sm-pl-15">
                            <div class="footer-widget">
                                <h4 class="title">Tesislerimiz</h4>
                                <ul class="list-unstyled">
                                    @foreach($footerFacilities as $facility)
                                        <li><a href="{{ route('facilities.details', $facility->id) }}">{{ $facility->name }}</a></li>
                                    @endforeach
                                    <li><a href="{{ route('facilities.index') }}">Tüm Tesisler</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-1 md-d-none"></div>
                <div class="col-lg-3 col-md-6">
                    @php
                        $homeSettings = \App\Models\HomePageSetting::first();
                        $isHomePage = request()->route() && request()->route()->getName() === 'home';
                    @endphp
                    
                    @if($isHomePage && $homeSettings && $homeSettings->footer_iframe_code)
                        <!-- Ana sayfa için dinamik iframe -->
                        <div class="iframe-container" style="border-radius: 10px; overflow: hidden;">
                            {!! $homeSettings->footer_iframe_code !!}
                        </div>
                    @else
                        <!-- Diğer sayfalar için statik YouTube iframe -->
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/T-F_GtcXw6U?si=g5niksZcD0xvZhHQ&amp;start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy;{{ date('Y') }} - Tüm Hakları Saklıdır <a href="https://hatayimar.com.tr" style="color: #cf9f38 !important;">Hatay İmar Sanayi Anonim Şirketi</a></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-policy">
                        <a href="{{ route('terms') }}">Şartlar ve Koşullar</a>
                        <a href="{{ route('privacy') }}">Gizlilik Politikası</a>
                        <a href="{{ route('legal') }}">Yasal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> 