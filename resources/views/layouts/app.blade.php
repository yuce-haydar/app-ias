<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <title>@yield('title', 'Hatay İmar')</title>
    <meta content="@yield('description', 'Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız.')" name="description">
    <meta content="@yield('keywords', 'hatay imar, belediye, sosyal tesis, parke taşı, büz üretim, katlı otopark, antakya')" name="keywords">
    <meta content="INDEX,FOLLOW" name="robots">

    <!-- Mobil Uyumlu Meta Taglar -->
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets/images/logo/imar-bg.png') }}" rel="icon" sizes="32x32" type="image/png">
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="#ffffff" name="theme-color">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Cache Control -->
    <meta http-equiv="Cache-Control" content="public, max-age=86400">
    <meta http-equiv="Expires" content="{{ gmdate('D, d M Y H:i:s', time() + 86400) }} GMT">
    
    <!-- CSS Dosyaları -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/fancybox.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/odometer.css') }}?v=1.0" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}?v=1.0" rel="stylesheet">

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.1);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .logo-loading img {
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
        }

        /* Lazy Loading Styles */
        .lazy-bg {
            background-image: none !important;
            transition: background-image 0.3s ease;
        }
        
        .lazy-bg.loaded {
            background-image: var(--lazy-bg) !important;
        }
        
        .lazy-img {
            opacity: 0;
            transition: opacity 0.3s ease;
            filter: blur(5px);
        }
        
        .lazy-img.loaded {
            opacity: 1;
            filter: blur(0);
        }
        
        /* Mobil Menü - Sadece turuncu accordion tuşu */
        .mobile-menu .mean-expand-class {
            color: #cf9f38 !important;
        }
        
        .lazy-img.loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading-shimmer 1.5s infinite;
        }
        
        @keyframes loading-shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        /* Loading Ekranı Yazı Rengi Düzeltmesi - Güçlü Override */
        .loading-screen .animation-preloader .txt-loading,
        .loading-screen .animation-preloader .txt-loading .letters-loading {
            color: #cf9f38 !important;
        }
        
        .loading-screen .animation-preloader .txt-loading .letters-loading::before,
        .loading-screen .animation-preloader .txt-loading .letters-loading::after {
            color: #cf9f38 !important;
        }
        
        .animation-preloader .txt-loading .letters-loading {
            color: #cf9f38 !important;
        }
        
        .txt-loading,
        .txt-loading .letters-loading {
            color: #cf9f38 !important;
        }

        /* Mobil Logo Düzeltmesi */
        @media (max-width: 991px) {
            .header-logo {
                padding: 0 !important;
            }
            .header-logo img[alt="HBB Logo"] {
                width: 120px !important;
                height: auto !important;
                max-width: 120px !important;
            }
        }
        
        @media (max-width: 767px) {
            .header-logo {
                padding: 0 !important;
            }
            .header-logo img[alt="HBB Logo"] {
                width: 120px !important;
                max-width: 120px !important;
            }
        }

        /* BUTON STİLLERİ DÜZELTMESİ - TÜM BUTONLAR SARI OLSUN */
        .theme-btn {
            background-color: var(--theme-color) !important; /* Altın sarısı */
            color: var(--white-color) !important; /* Beyaz yazı */
        }
        
        .theme-btn:hover {
            background-color: var(--dark-color) !important; /* Hover'da koyu */
            color: var(--white-color) !important; /* Beyaz yazı */
        }
        
        /* Tüm buton varyantlarını override et */
        .theme-btn.bg-dark,
        .theme-btn.bg-dark3,
        .theme-btn.bg-color10,
        .theme-btn.bg-color5,
        .theme-btn.bg-theme,
        .theme-btn.bg-theme3,
        .theme-btn.bg-border,
        .theme-btn.bg-white {
            background-color: var(--theme-color) !important;
            color: var(--white-color) !important;
            border-color: var(--theme-color) !important;
        }
        
        .theme-btn.bg-dark:hover,
        .theme-btn.bg-dark3:hover,
        .theme-btn.bg-color10:hover,
        .theme-btn.bg-color5:hover,
        .theme-btn.bg-theme:hover,
        .theme-btn.bg-theme3:hover,
        .theme-btn.bg-border:hover,
        .theme-btn.bg-white:hover {
            background-color: var(--dark-color) !important;
            color: var(--white-color) !important;
            border-color: var(--dark-color) !important;
        }
        
        /* Bootstrap butonları da sarı yap */
        .btn-primary {
            background-color: var(--theme-color) !important;
            border-color: var(--theme-color) !important;
            color: var(--white-color) !important;
        }
        
        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--dark-color) !important;
            border-color: var(--dark-color) !important;
            color: var(--white-color) !important;
        }
        
        /* Form butonları */
        button[type="submit"],
        input[type="submit"],
        .btn-submit {
            background-color: var(--theme-color) !important;
            color: var(--white-color) !important;
            border-color: var(--theme-color) !important;
        }
        
        button[type="submit"]:hover,
        input[type="submit"]:hover,
        .btn-submit:hover {
            background-color: var(--dark-color) !important;
            color: var(--white-color) !important;
            border-color: var(--dark-color) !important;
        }
    </style>

    @stack('styles')
</head>

<body id="body" class="bg-theme3">

    <div class="page-wrapper bg-theme3 overflow-visible">

        <!-- Yükleme Ekranı -->
        <div class="loading-screen" id="loading-screen">
            <div class="preloader-close">x</div>
            <div class="animation-preloader">
                <div class="logo-loading d-flex align-items-center justify-content-center gap-4" style="animation: fadeInUp 1s ease-in-out;">
                    <img alt="HBB Logo" src="{{ asset('assets/images/logo/hbblogo.png') }}" style="height: 120px; width: auto; max-width: 200px; animation: bounceIn 1.5s ease-in-out;">
                    <img alt="İmar Logo" src="{{ asset('assets/images/logo/imar-bg.png') }}" style="height: 120px; width: auto; max-width: 150px; animation: bounceIn 1.5s ease-in-out 0.3s both;">
                </div>
                <div class="txt-loading mt-4" style="color: #cf9f38 !important;">
                    <span data-text-preloader="H" class="letters-loading" style="color: #cf9f38 !important;">H</span>
                    <span data-text-preloader="A" class="letters-loading" style="color: #cf9f38 !important;">A</span>
                    <span data-text-preloader="T" class="letters-loading" style="color: #cf9f38 !important;">T</span>
                    <span data-text-preloader="A" class="letters-loading" style="color: #cf9f38 !important;">A</span>
                    <span data-text-preloader="Y" class="letters-loading" style="color: #cf9f38 !important;">Y</span>
                    <span data-text-preloader=" " class="letters-loading" style="margin: 0 20px; color: #cf9f38 !important;">-</span>
                    <span data-text-preloader="İ" class="letters-loading" style="color: #cf9f38 !important;">İ</span>
                    <span data-text-preloader="M" class="letters-loading" style="color: #cf9f38 !important;">M</span>
                    <span data-text-preloader="A" class="letters-loading" style="color: #cf9f38 !important;">A</span>
                    <span data-text-preloader="R" class="letters-loading" style="color: #cf9f38 !important;">R</span>
                    <span data-text-preloader=" " class="letters-loading" style="margin: 0 20px; color: #cf9f38 !important;">-</span>
                    <span data-text-preloader="A" class="letters-loading" style="color: #cf9f38 !important;">A</span>
                    <span data-text-preloader="." class="letters-loading" style="color: #cf9f38 !important;">.</span>
                    <span data-text-preloader="Ş" class="letters-loading" style="color: #cf9f38 !important;">Ş</span>
                </div>
            </div>
        </div>

        <!-- Header Bölümü -->
        @include('partials.header')

        <!-- Ana İçerik -->
        <main>
            @yield('content')
        </main>

        <!-- İletişim Wrapper -->
        @include('partials.contact-wrapper')

        <!-- Bülten Bölümü -->
        @include('partials.newsletter')

        <!-- Footer Bölümü -->
        @include('partials.footer')

    </div><!-- Sayfa Wrapper Sonu -->

    <!-- Yukarı Kaydır -->
    @include('partials.scroll-to-top')

    <!-- JavaScript Dosyaları -->
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/marquee.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/splite-type.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/vanilla-tilt.min.js') }}?v=1.0"></script>
    <script src="{{ asset('assets/js/main.js') }}?v=1.0"></script>

    <!-- Loading Ekranı Renk Düzeltmesi -->
    <script>
    // Loading ekranı yazılarını anında altın sarısı yapmak için
    (function() {
        // Hemen renkleri ayarla
        function setLoadingColors() {
            const loadingLetters = document.querySelectorAll('.letters-loading');
            const txtLoading = document.querySelector('.txt-loading');
            
            loadingLetters.forEach(function(letter) {
                letter.style.color = '#cf9f38';
                letter.style.setProperty('color', '#cf9f38', 'important');
            });
            
            if (txtLoading) {
                txtLoading.style.color = '#cf9f38';
                txtLoading.style.setProperty('color', '#cf9f38', 'important');
            }
        }
        
        // Anında çalıştır
        setLoadingColors();
        
        // Kısa aralıklarla kontrol et
        setTimeout(setLoadingColors, 100);
        setTimeout(setLoadingColors, 300);
        setTimeout(setLoadingColors, 500);
        
        // DOM yüklendiğinde
        document.addEventListener('DOMContentLoaded', setLoadingColors);
        
        // Sayfa yüklendiğinde
        window.addEventListener('load', setLoadingColors);
    })();
    
    // Lazy Loading Script
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer API destekleyip desteklemediğini kontrol et
        if ('IntersectionObserver' in window) {
            
            // Lazy loading için observer oluştur
            const lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyElement = entry.target;
                        
                        if (lazyElement.classList.contains('lazy-img')) {
                            // Resim elementleri için
                            const src = lazyElement.dataset.src;
                            if (src) {
                                lazyElement.src = src;
                                lazyElement.classList.add('loading');
                                
                                lazyElement.onload = function() {
                                    lazyElement.classList.remove('loading');
                                    lazyElement.classList.add('loaded');
                                    lazyElement.removeAttribute('data-src');
                                };
                            }
                        } else if (lazyElement.classList.contains('lazy-bg')) {
                            // Background image elementleri için
                            const bgImage = lazyElement.dataset.bg;
                            if (bgImage) {
                                lazyElement.style.setProperty('--lazy-bg', `url('${bgImage}')`);
                                lazyElement.classList.add('loaded');
                                lazyElement.removeAttribute('data-bg');
                            }
                        }
                        
                        lazyImageObserver.unobserve(lazyElement);
                    }
                });
            }, {
                rootMargin: '50px 0px', // 50px önceden yükle
                threshold: 0.01
            });

            // Lazy loading elementlerini bul ve observe et
            const lazyImages = document.querySelectorAll('.lazy-img');
            const lazyBackgrounds = document.querySelectorAll('.lazy-bg');
            
            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
            
            lazyBackgrounds.forEach(function(lazyBg) {
                lazyImageObserver.observe(lazyBg);
            });
            
        } else {
            // Eski tarayıcılar için fallback
            const lazyImages = document.querySelectorAll('.lazy-img[data-src]');
            const lazyBackgrounds = document.querySelectorAll('.lazy-bg[data-bg]');
            
            lazyImages.forEach(function(lazyImage) {
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.add('loaded');
            });
            
            lazyBackgrounds.forEach(function(lazyBg) {
                const bgImage = lazyBg.dataset.bg;
                lazyBg.style.backgroundImage = `url('${bgImage}')`;
                lazyBg.classList.add('loaded');
            });
        }
    });
    
    // Mobil menü li elementine tıklayınca accordion açılsın
    $(document).ready(function() {
        $(document).on('click', '.mobile-menu .submenu-item-has-children > a', function(e) {
            var $parentLi = $(this).parent();
            var $expandButton = $parentLi.find('.mean-expand-class');
            
            if ($expandButton.length > 0) {
                e.preventDefault();
                $expandButton.trigger('click');
            }
        });
    });
    </script>

    @stack('scripts')

</body>
</html> 