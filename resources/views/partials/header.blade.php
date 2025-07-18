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
                <li class="{{ request()->routeIs('about') ? 'active' : '' }} menu-item-has-children">
                    <a href="javascript:void(0)">Kurumsal</a>
                    <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                        <li><a href="{{ route('about') }}">Misyon & Vizyon</a></li>
                        <li><a href="{{ route('team') }}">Yönetim Kurulu</a></li>
                        <li><a href="{{ route('bilgi-toplumu-hizmetleri') }}">Bilgi Toplumu Hizmetleri</a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('projects*') || request()->routeIs('facilities*') ? 'active' : '' }} menu-item-has-children">
                    <a href="javascript:void(0)">Tesisler/Projeler</a>
                    <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('facilities.index') }}">Tesislerimiz</a></li>
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">Projelerimiz</a>
                            <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="{{ route('projects', ['status' => 'ongoing']) }}">Devam Eden Projeler</a></li>
                                <li><a href="{{ route('projects', ['status' => 'completed']) }}">Tamamlanan Projeler</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('tenders*') || request()->routeIs('announcements*') ? 'active' : '' }} menu-item-has-children">
                    <a href="javascript:void(0)">Duyurular/İlanlar</a>
                    <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('blog.grid') }}">Haberler</a></li>
                        <li><a href="{{ route('announcements') }}">Duyurular</a></li>
                        <li><a href="{{ route('tenders') }}">İhale Bilgileri</a></li>
                        <li><a href="{{ route('tenders') }}">İlan Başvuru Formu</a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('hr*') ? 'active' : '' }} menu-item-has-children">
                    <a href="javascript:void(0)">İnsan Kaynakları</a>
                    <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('hr') }}">Kariyer Fırsatları</a></li>
                        <li><a href="{{ route('careers') }}">Açık Pozisyonlar</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">KVKK</a>
                    <span class="mobile-menu-toggle" style="color: #cf9f38;"><i class="fas fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('legal') }}">KVKK Başvuru Formu</a></li>
                        <li><a href="{{ route('contact-notice') }}">İletişim Bölümü Aydınlatma Metni</a></li>
                        <li><a href="{{ route('cookies-notice') }}">Çerez Aydınlatma Metni</a></li>
                        <li><a href="{{ route('cookies-policy') }}">Çerez Politikası</a></li>
                        <li><a href="{{ route('job-application-notice') }}">İlan Başvuru Formu Aydınlatma Metni</a></li>
                        <li><a href="{{ route('privacy') }}">Gizlilik Politikası</a></li>
                        <li><a href="{{ route('terms') }}">İnternet Sitesi Kullanım Sözleşmesi</a></li>
                    </ul>
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

<style>
/* Mobil Menü Accordion Stilleri */
.mobile-menu .menu-item-has-children {
    position: relative;
}

.mobile-menu-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    padding: 5px;
    transition: all 0.3s ease;
}

.mobile-menu-toggle:hover {
    color: #cf9f38 !important;
    transform: translateY(-50%) scale(1.1);
}

.mobile-menu-toggle.active {
    transform: translateY(-50%) rotate(180deg);
}

.mobile-menu .sub-menu {
    display: none;
    padding-left: 20px;
    background: rgba(0,0,0,0.05);
    border-radius: 5px;
    margin-top: 5px;
}

.mobile-menu .sub-menu.active {
    display: block;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        max-height: 0;
    }
    to {
        opacity: 1;
        max-height: 500px;
    }
}

.mobile-menu .sub-menu .menu-item-has-children .sub-menu {
    padding-left: 15px;
    background: rgba(0,0,0,0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobil menü accordion işlevselliği
    const mobileMenuToggles = document.querySelectorAll('.mobile-menu-toggle');
    
    mobileMenuToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const parentLi = this.closest('li');
            const subMenu = parentLi.querySelector('.sub-menu');
            
            if (subMenu) {
                // Diğer açık menüleri kapat
                const allSubMenus = document.querySelectorAll('.mobile-menu .sub-menu');
                const allToggles = document.querySelectorAll('.mobile-menu-toggle');
                
                allSubMenus.forEach(function(menu) {
                    if (menu !== subMenu) {
                        menu.classList.remove('active');
                    }
                });
                
                allToggles.forEach(function(tog) {
                    if (tog !== toggle) {
                        tog.classList.remove('active');
                    }
                });
                
                // Mevcut menüyü aç/kapat
                subMenu.classList.toggle('active');
                this.classList.toggle('active');
            }
        });
    });
    
    // Menü item'ına tıklandığında da çalışır
    const menuItemsWithChildren = document.querySelectorAll('.mobile-menu .menu-item-has-children > a');
    
    menuItemsWithChildren.forEach(function(item) {
        item.addEventListener('click', function(e) {
            const parentLi = this.closest('li');
            const toggle = parentLi.querySelector('.mobile-menu-toggle');
            
            if (toggle) {
                e.preventDefault();
                toggle.click();
            }
        });
    });
});
</script>
