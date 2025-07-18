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
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Anasayfa</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'active' : '' }} submenu-item-has-children">
                    <a href="javascript:void(0)">Kurumsal</a>
                    <ul class="submenu-class">
                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                        <li><a href="{{ route('about') }}">Misyon & Vizyon</a></li>
                        <li><a href="{{ route('team') }}">Yönetim Kurulu</a></li>
                        <li><a href="{{ route('bilgi-toplumu-hizmetleri') }}">Bilgi Toplumu Hizmetleri</a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('projects*') || request()->routeIs('facilities*') ? 'active' : '' }} submenu-item-has-children">
                    <a href="javascript:void(0)">Tesisler/Projeler</a>
                    <ul class="submenu-class">
                        <li><a href="{{ route('facilities.index') }}">Tesislerimiz</a></li>
                        <li class="submenu-item-has-children">
                            <a href="javascript:void(0)">Projelerimiz</a>
                            <ul class="submenu-class">
                                <li><a href="{{ route('projects', ['status' => 'ongoing']) }}">Devam Eden Projeler</a></li>
                                <li><a href="{{ route('projects', ['status' => 'completed']) }}">Tamamlanan Projeler</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('tenders*') || request()->routeIs('announcements*') ? 'active' : '' }} submenu-item-has-children">
                    <a href="javascript:void(0)">Duyurular/İlanlar</a>
                    <ul class="submenu-class">
                        <li><a href="{{ route('blog.grid') }}">Haberler</a></li>
                        <li><a href="{{ route('announcements') }}">Duyurular</a></li>
                        <li><a href="{{ route('tenders') }}">İhale Bilgileri</a></li>
                        <li><a href="{{ route('tenders') }}">İlan Başvuru Formu</a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('hr*') ? 'active' : '' }} submenu-item-has-children">
                    <a href="javascript:void(0)">İnsan Kaynakları</a>
                    <ul class="submenu-class">
                        <li><a href="{{ route('hr') }}">Kariyer Fırsatları</a></li>
                        <li><a href="{{ route('careers') }}">Açık Pozisyonlar</a></li>
                    </ul>
                </li>
                <li class="submenu-item-has-children">
                    <a href="javascript:void(0)">KVKK</a>
                    <ul class="submenu-class">
                        <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                        <li><a href="{{ route('contact-notice') }}">İletişim Bölümü Aydınlatma Metni</a></li>
                        <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
                        <li><a href="{{ route('cookies-policy') }}">Çerez Politikası</a></li>
                        <li><a href="{{ route('job-application-notice') }}">İlan Başvuru Formu Aydınlatma Metni</a></li>
                        <li><a href="{{ route('privacy') }}">Gizlilik Politikası</a></li>
                        <li><a href="{{ route('terms') }}">İnternet Sitesi Kullanım Sözleşmesi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contact') }}">İletişim</a>
                </li>
            </ul>
        </div>
        <div class="sidebar-wrap">
            <h6>Haraparası Mah. 2. Küçük Sanayi Cad.</h6>
            <h6>Katlı Otopark Sitesi No: 2 K-2 Antakya</h6>
        </div>
        <div class="sidebar-wrap">
            <h6><a href="tel:+905331550090">+90 533 155 00 90</a></h6>
            <h6><a href="tel:+905338920090">+90 533 892 00 90</a></h6>
            <h6><a href="tel:+905338920090">+90 326 213 2326 90</a></h6>
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
            <a href="https://twitter.com/hatayimar">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                    <span class="effect-1"><i class="fab fa-twitter"></i></span>
                </span>
            </a>
            <a href="https://linkedin.com/hatayimar">
                <span class="link-effect">
                    <span class="effect-1"><i class="fab fa-linkedin"></i></span>
                    <span class="effect-1"><i class="fab fa-linkedin"></i></span>
                </span>
            </a>
        </div>
    </div>
</div>

<!-- Mobil Menü Stilleri ve JavaScript -->
<style>
/* Mobil menü ok ikonları düzeltme */
.mobile-menu .submenu-item-has-children > a::after {
    content: '\f107';
    font-family: 'Font Awesome 6 Free';
    font-weight: 900;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #ffffff !important;
    font-size: 14px;
    transition: all 0.3s ease;
}

.mobile-menu .submenu-item-has-children.active-class > a::after {
    content: '\f106';
    color: #cf9f38 !important;
    transform: translateY(-50%) rotate(180deg);
}

.mobile-menu .submenu-item-has-children > a .mean-expand-class {
    display: none !important;
}

/* Alt menü stilleri */
.mobile-menu .submenu-class {
    display: none;
    background-color: rgba(0,0,0,0.2);
    margin-left: 0;
    padding-left: 0;
}

.mobile-menu .submenu-class.menu-open {
    display: block !important;
}

.mobile-menu .submenu-class li {
    padding-left: 20px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.mobile-menu .submenu-class li a {
    color: #ffffff !important;
    font-size: 16px;
    font-weight: 400;
    padding: 10px 20px;
}

.mobile-menu .submenu-class li a:hover {
    color: #cf9f38 !important;
}

/* İç içe alt menüler */
.mobile-menu .submenu-class .submenu-item-has-children > a::after {
    font-size: 12px;
    right: 15px;
}

.mobile-menu .submenu-class .submenu-class {
    margin-left: 20px;
}

/* Mobil menü açık/kapalı durumları */
.mobile-menu-wrapper.body-visible {
    opacity: 1 !important;
    visibility: visible !important;
}

.mobile-menu-wrapper.body-visible .mobile-menu-area {
    transform: translateX(0) !important;
    opacity: 1 !important;
    visibility: visible !important;
}

/* Mobil menü hambürger butonu */
.menu-toggle {
    border: none !important;
    background: transparent !important;
}

.menu-toggle .line {
    width: 25px;
    height: 2px;
    background-color: #000;
    display: block;
    margin: 5px 0;
    transition: all 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobil menü toggle işlevi
    const menuToggleButtons = document.querySelectorAll('.menu-toggle');
    const mobileMenuWrapper = document.querySelector('.mobile-menu-wrapper');
    
    menuToggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            toggleMobileMenu();
        });
    });
    
    // Mobil menü aç/kapat
    function toggleMobileMenu() {
        if (mobileMenuWrapper.classList.contains('body-visible')) {
            mobileMenuWrapper.classList.remove('body-visible');
            document.body.style.overflow = '';
        } else {
            mobileMenuWrapper.classList.add('body-visible');
            document.body.style.overflow = 'hidden';
        }
    }
    
    // Mobil menü overlay tıklaması
    mobileMenuWrapper.addEventListener('click', function(e) {
        if (e.target === mobileMenuWrapper) {
            toggleMobileMenu();
        }
    });
    
    // Alt menü dropdown işlevi
    const submenuItems = document.querySelectorAll('.mobile-menu .submenu-item-has-children');
    
    submenuItems.forEach(item => {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.submenu-class');
        
        if (link && submenu) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Diğer açık menüleri kapat
                submenuItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active-class');
                        const otherSubmenu = otherItem.querySelector('.submenu-class');
                        if (otherSubmenu) {
                            otherSubmenu.classList.remove('menu-open');
                        }
                    }
                });
                
                // Mevcut menüyü aç/kapat
                item.classList.toggle('active-class');
                submenu.classList.toggle('menu-open');
            });
        }
    });
    
    // Esc tuşu ile menü kapatma
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenuWrapper.classList.contains('body-visible')) {
            toggleMobileMenu();
        }
    });
});
</script>
