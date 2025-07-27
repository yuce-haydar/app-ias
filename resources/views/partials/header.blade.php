<!--==============================
    Header Alanı
==============================-->
<header class="nav-header header-style7" style="position: fixed; width: 100%; top: 0; z-index: 1000;">
    <div class="sticky-wrapper">
        <div class="main-wrapper p-0">
            <!-- Ana Menü Alanı -->
            <div class="menu-area" style="background-color: #fff;">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto logo" style="border-radius: 0px 0px 15px 15px;">
                        <div class="header-logo" style="background-color: #fff;">
                            <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center" style="display: flex !important; align-items: center !important; background-color: #fff;border-radius: 0px 0px 15px 15px;">
                                <img alt="HBB Logo" src="{{ url('assets/images/logo/combined-logo.png') }}" style="width:175px; display: block; background-color: #fff;border-radius: 0px 0px 15px 15px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-auto nav-menu" style="background-color: #fff;">
                        <nav class="main-menu d-none d-lg-inline-block lh-1 lh-1" style="background-color: #fff;">
                            <ul class="navigation" style="background-color: #fff;">
                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}" style="background-color: #fff;">
                                    <a href="{{ route('home') }}" style="background-color: #fff; color: {{ request()->routeIs('home') ? '#cf9f38' : '#000000' }};">Anasayfa</a>
                                </li>
                                <li class="{{ request()->routeIs('about') ? 'active' : '' }} menu-item-has-children" style="background-color: #fff;">
                                    <a href="javascript:void(0)" style="background-color: #fff; color: {{ request()->routeIs('about') ? '#cf9f38' : '#000000' }};">Kurumsal</a>
                                    <ul class="sub-menu" style="background-color: #fff;">
                                        <li style="background-color: #fff;"><a href="{{ route('about') }}" style="background-color: #fff; color: #000000;">Hakkımızda</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('about') }}" style="background-color: #fff; color: #000000;">Misyon & Vizyon</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('team') }}" style="background-color: #fff; color: #000000;">Yönetim Kurulu</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('bilgi-toplumu-hizmetleri') }}" style="background-color: #fff; color: #000000;">Bilgi Toplumu Hizmetleri</a></li>
                                    </ul>
                                </li>
                               
                                <li class="{{ request()->routeIs('projects*') || request()->routeIs('facilities*') ? 'active' : '' }} menu-item-has-children" style="background-color: #fff;">
                                    <a href="javascript:void(0)" style="background-color: #fff; color: {{ request()->routeIs('projects*') || request()->routeIs('facilities*') ? '#cf9f38' : '#000000' }};">Tesisler/Projeler</a>
                                    <ul class="sub-menu" style="background-color: #fff;">
                                        <li style="background-color: #fff;"><a href="{{ route('facilities.index') }}" style="background-color: #fff; color: #000000;">Tesislerimiz</a></li>
                                        <li class="menu-item-has-children" style="background-color: #fff;">
                                            <a href="javascript:void(0)" style="background-color: #fff; color: #000000;">Projelerimiz</a>
                                            <ul class="sub-menu" style="background-color: #fff;">
                                                <li style="background-color: #fff;"><a href="{{ route('projects', ['status' => 'ongoing']) }}" style="background-color: #fff; color: #000000;">Devam Eden Projeler</a></li>
                                                <li style="background-color: #fff;"><a href="{{ route('projects', ['status' => 'completed']) }}" style="background-color: #fff; color: #000000;">Tamamlanan Projeler</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ request()->routeIs('tenders*') || request()->routeIs('announcements*') ? 'active' : '' }} menu-item-has-children" style="background-color: #fff;">
                                    <a href="javascript:void(0)" style="background-color: #fff; color: {{ request()->routeIs('tenders*') || request()->routeIs('announcements*') ? '#cf9f38' : '#000000' }};">Duyurular/İlanlar</a>
                                    <ul class="sub-menu" style="background-color: #fff;">
                                        <li style="background-color: #fff;"><a href="{{ route('blog.grid') }}" style="background-color: #fff; color: #000000;">Haberler</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('announcements') }}" style="background-color: #fff; color: #000000;">Duyurular</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('tenders') }}" style="background-color: #fff; color: #000000;">İhale Bilgileri</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('tenders') }}" style="background-color: #fff; color: #000000;">İlan Başvuru Formu</a></li>
                                    </ul>
                                </li>
                                
                                <li class="{{ request()->routeIs('hr*') ? 'active' : '' }} menu-item-has-children" style="background-color: #fff;">
                                    <a href="javascript:void(0)" style="background-color: #fff; color: {{ request()->routeIs('hr*') ? '#cf9f38' : '#000000' }};">İnsan Kaynakları</a>
                                    <ul class="sub-menu" style="background-color: #fff;">
                                        <li style="background-color: #fff;"><a href="{{ route('hr') }}" style="background-color: #fff; color: #000000;">Kariyer Fırsatları</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('careers') }}" style="background-color: #fff; color: #000000;">Açık Pozisyonlar</a></li>
                                    </ul>
                                </li>
                                 <li class="menu-item-has-children" style="background-color: #fff;">
                                    <a href="javascript:void(0)" style="background-color: #fff; color: {{ request()->routeIs('legal') ? '#cf9f38' : '#000000' }};">KVKK</a>
                                    <ul class="sub-menu" style="background-color: #fff;">
                                        <li style="background-color: #fff;"><a href="{{ route('legal') }}" style="background-color: #fff; color: #000000;">KVKK Başvuru Formu</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('contact-notice') }}" style="background-color: #fff; color: #000000;">İletişim Bölümü Aydınlatma Metni</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('cookies-notice') }}" style="background-color: #fff; color: #000000;">Çerez Aydınlatma Metni</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('cookies-policy') }}" style="background-color: #fff; color: #000000;">Çerez Politikası</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('job-application-notice') }}" style="background-color: #fff; color: #000000;">İlan Başvuru Formu Aydınlatma Metni</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('privacy') }}" style="background-color: #fff; color: #000000;">Gizlilik Politikası</a></li>
                                        <li style="background-color: #fff;"><a href="{{ route('terms') }}" style="background-color: #fff; color: #000000;">İnternet Sitesi Kullanım Sözleşmesi</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <div class="navbar-right d-inline-flex d-lg-none" style="background-color: #fff;">
                            <button class="menu-toggle sidebar-btn" type="button" style="background-color: #fff;">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-auto header-right-wrapper"">
                        <div class="header-right" style="background-color: #fff;">

                            <a href="{{ route('contact') }}" class="theme-btn bg-theme" style="background-color: #fff; ">
                                <span class="link-effect">
                                    <span class="effect-1" ">Bize </span>
                                    <span class="effect-1" ">Ulaşın</span>
                                </span><i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                            <div class="sidebar-icon" style="background-color: #fff;">
                                <button class="sidebar-tab open" style="background-color: #fff;">
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
            <h6><a href="tel:+905331550093">+90 533 155 00 93</a></h6>
            <h6><a href="tel:+905331550093">+90 533 155 00 93</a></h6>
            <h6><a href="tel:+903262132326">+90 326 213 2326</a></h6>
            <h6><a href="mailto:info@hatayimar.com.tr">info@hatayimar.com.tr</a></h6>
        </div>
        <div class="social-btn style3">
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
            <a href="https://x.com/hbbimarr">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                </span>
            </a>
            <a href="https://www.youtube.com/channel/UCn-OKyOCxCk5BV5MgDR8S5w">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                </span>
            </a>
        </div>
    </div>
</div>
