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

    <!-- CSS Dosyaları -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fancybox.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/odometer.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}?v={{ time() }}" rel="stylesheet">

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
                <div class="txt-loading mt-4">
                    <span data-text-preloader="H" class="letters-loading">H</span>
                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="T" class="letters-loading">T</span>
                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="Y" class="letters-loading">Y</span>
                    <span data-text-preloader="-" class="letters-loading" style="margin: 0 20px;">-</span>
                    <div data-text-preloader=" " class="letters-loading" style="margin: 0 20px;"> </div>

                    <span data-text-preloader="İ" class="letters-loading">İ</span>
                    <span data-text-preloader="M" class="letters-loading">M</span>
                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="R" class="letters-loading">R</span>
                    <span data-text-preloader="-" class="letters-loading" style="margin: 0 20px;">-</span>
                    <div data-text-preloader=" " class="letters-loading" style="margin: 0 20px;"> </div>

                    <span data-text-preloader="A" class="letters-loading">A</span>
                    <span data-text-preloader="." class="letters-loading">.</span>
                    <span data-text-preloader="Ş" class="letters-loading">Ş</span>
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
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/marquee.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/splite-type.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/vanilla-tilt.min.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>

    @stack('scripts')

</body>
</html> 