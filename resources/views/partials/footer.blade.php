<!--==============================
    Footer Bölümü
==============================-->
<footer class="footer-section bg-dark">
    <div class="footer-top space">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 footer-brand">
                    <div class="brand-header">
                        <a href="{{ url('/') }}" class="footer-logo d-flex align-items-center gap-3 mb-20">
                            <img src="{{ url('assets/images/logo/hbblogo.png') }}" alt="HBB Logo" class="img-fluid" style="height: 50px; width: auto; max-width: 100px;">
                            <img src="{{ url('assets/images/logo/imar-bg.png') }}" alt="İmar Logo" class="img-fluid" style="height: 50px; width: auto; min-width: 35px; max-width: 70px;">
                        </a>
                        <p class="text">Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı,<br>Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.</p>
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
                    <p class="mb-0">&copy;{{ date('Y') }} - Tüm Hakları Saklıdır <a href="https://hatayimar.com.tr">Hatay İmar</a></p>
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