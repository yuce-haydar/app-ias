<!--==============================
    Header Alanı
==============================-->
<header class="nav-header header-style7">
    <div class="sticky-wrapper">
        <div class="main-wrapper">
            <!-- Ana Menü Alanı -->
            <div class="menu-area">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto logo">
                        <div class="header-logo">
                            <a href="{{ url('/') }}" class="d-flex align-items-center " style="display: flex !important; align-items: center !important;">
                                <img alt="HBB Logo" src="{{ url('assets/images/logo/hbblogo.png') }}" style="height: 100px; width: auto; max-width: 120px; display: block; background-color: #fff;">
                                <img alt="İmar Logo" src="{{ url('assets/images/logo/imar-bg.png') }}" style="height: 100px; width: auto; object-fit: contain; display: block; background-color: #fff;">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto nav-menu">
                        <nav class="main-menu d-none d-lg-inline-block lh-1 lh-1">
                            <ul class="navigation">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Anasayfa</a>
                                </li>
                                <li class="{{ request()->routeIs('about') ? 'active' : '' }} menu-item-has-children">
                                    <a href="{{ route('about') }}">Kurumsal</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                                        <li><a href="{{ route('about') }}">Misyon & Vizyon</a></li>
                                        <li><a href="{{ route('team') }}">Yönetim Kurulu</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('legal') }}">KVKK</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('privacy') }}">Gizlilik Politikası</a></li>
                                        <li><a href="{{ route('terms') }}">İnternet Sitesi Kullanım Sözleşmesi</a></li>
                                        <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                                        <li><a href="{{ route('contact') }}">İletişim Bölümü Aydınlatma Metni</a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('projects*') || request()->routeIs('facilities*') ? 'active' : '' }} menu-item-has-children">
                                    <a href="{{ route('projects') }}">Neler Yaptık</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('facilities.index') }}">Tesislerimiz</a></li>
                                        <li><a href="{{ route('projects') }}">Projelerimiz</a></li>
                                        <li><a href="{{ route('project.details', ['id' => 3]) }}">Habib-i Neccar Sosyal Tesis</a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('tenders*') ? 'active' : '' }} menu-item-has-children">
                                    <a href="{{ route('tenders') }}">İhale Bilgileri ve İlanlar</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('tenders') }}">İhale Bilgileri</a></li>
                                        <li><a href="{{ route('announcements') }}">İlanlar</a></li>
                                        <li><a href="{{ route('tender.application') }}">İlan Başvuru Formu</a></li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('hr*') ? 'active' : '' }} menu-item-has-children">
                                    <a href="{{ route('hr') }}">İnsan Kaynakları</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('hr') }}">Kariyer Fırsatları</a></li>
                                        <li><a href="{{ route('careers') }}">Açık Pozisyonlar</a></li>
                                    </ul>
                                </li>
                              
                            </ul>
                        </nav>
                        <div class="navbar-right d-inline-flex d-lg-none">
                            <button class="menu-toggle sidebar-btn" type="button">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-auto header-right-wrapper">
                        <div class="header-right">
                          
                            <a href="{{ route('contact') }}" class="theme-btn bg-theme">
                                <span class="link-effect">
                                    <span class="effect-1">Bize </span>
                                    <span class="effect-1">Ulaşın</span>
                                </span><i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <div class="sidebar-icon">
                                <button class="sidebar-tab open">
                                    <img src="{{ asset('assets/images/icons/hm6-dot_icon.png') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--==============================
Mobil Menü
============================== -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area">
        <button class="menu-toggle"><i class="fas fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ url('/') }}" class="d-flex align-items-center gap-2" style="display: flex !important; align-items: center !important;">
                <img alt="HBB Logo" src="{{ url('assets/images/logo/hbblogo.png') }}" style="height: 40px; width: 150px; max-width: 80px; display: block;">
                <img alt="İmar Logo" src="{{ url('assets/images/logo/imar-bg.png') }}" style="height: 40px; width: 150px; object-fit: contain; display: block;">
            </a>
        </div>
        <div class="mobile-menu">
            <ul class="navigation clearfix">
                <!--Menü Javascript ile gelecek-->
            </ul>
        </div>
        <div class="sidebar-wrap">
            <h6>Haraparası Mah. 2. Küçük Sanayi Cad.</h6>
            <h6>Katlı Otopark Sitesi No: 2 K-2 Antakya</h6>
        </div>
        <div class="sidebar-wrap">
            <h6><a href="tel:+903262132326">+90 326 213 23 26</a></h6>
            <h6><a href="mailto:info@hatayimar.com.tr">info@hatayimar.com.tr</a></h6>
        </div>
        <div class="social-btn style3">
            <a href="https://www.facebook.com/">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                </span>
            </a>
            <a href="https://instagram.com/">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                </span>
            </a>
            <a href="https://twitter.com/">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                </span>
            </a>
            <a href="https://linkedin.com/">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-linkedin"></i></span>
                    <span class="effect-1"><i class="fab fa-linkedin"></i></span>
                </span>
            </a>
        </div>
    </div>
</div> 