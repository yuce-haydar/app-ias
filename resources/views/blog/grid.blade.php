@extends('layouts.app')

@section('title', 'Haberler - Hatay İmar')
@section('description', 'Hatay İmar projelerinden son haberler, duyurular ve gelişmeler.')
@section('keywords', 'hatay imar, haberler, duyurular, projeler, sosyal tesis, parke taşı')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Haberler</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('blog.grid') }}">Haberler</a></li>
                    <li>Haberler</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--==============================
Blog Grid Bölümü
==============================-->
<section class="blog-section style-grid space bg-theme3">
    <div class="container">
        <div class="row gy-30">
            <!-- Haber 1 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje8.jpeg') }}" alt="Yeni Sosyal Tesis Projesi">
                        <div class="date">
                            <span class="day">15</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Hatay İmar</a></span>
                            <span class="category">Sosyal Tesisler</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 1]) }}">Yeni Sosyal Tesis Projesi Başlıyor</a>
                        </h4>
                        <p class="text">Hatay İmar olarak şehrimize yeni bir sosyal tesis kazandırma projemiz başlıyor. Vatandaşlarımızın daha kaliteli hizmet alması için...</p>
                        <a href="{{ route('blog.details', ['id' => 1]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Haber 2 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje9.jpeg') }}" alt="Parke Taşı Üretimi">
                        <div class="date">
                            <span class="day">12</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Hatay İmar</a></span>
                            <span class="category">Üretim</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 2]) }}">Parke Taşı Üretiminde Yeni Teknoloji</a>
                        </h4>
                        <p class="text">Üretim tesisimizde kullanmaya başladığımız yeni teknoloji ile daha kaliteli ve dayanıklı parke taşları üretiyoruz...</p>
                        <a href="{{ route('blog.details', ['id' => 2]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Haber 3 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/imageshatay/proje10.jpeg') }}" alt="Katlı Otopark Yenileme">
                        <div class="date">
                            <span class="day">08</span>
                            <span class="month">Ara</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Hatay İmar</a></span>
                            <span class="category">Altyapı</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 3]) }}">Katlı Otopark Yenileme Çalışmaları</a>
                        </h4>
                        <p class="text">2005 yılından bu yana hizmet veren Katlı Otopark tesisimizde modernizasyon çalışmaları devam ediyor...</p>
                        <a href="{{ route('blog.details', ['id' => 3]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog Yazısı 4 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb04.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">08</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Fatma Öztürk</a></span>
                            <span class="category">İnsan Kaynakları</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 4]) }}">Etkili Takım Yönetimi ve Liderlik</a>
                        </h4>
                        <p class="text">Başarılı takım oluşturma ve liderlik becerilerini geliştirme konusunda pratik yaklaşımlar...</p>
                        <a href="{{ route('blog.details', ['id' => 4]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog Yazısı 5 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb05.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">05</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Can Çelik</a></span>
                            <span class="category">Teknoloji</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 5]) }}">Yapay Zeka ve İş Dünyası Dönüşümü</a>
                        </h4>
                        <p class="text">Yapay zeka teknolojilerinin işletmelere etkisi ve adapte olma stratejileri...</p>
                        <a href="{{ route('blog.details', ['id' => 5]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Blog Yazısı 6 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb06.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">03</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Zeynep Acar</a></span>
                            <span class="category">Sürdürülebilirlik</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => 6]) }}">Sürdürülebilir İş Modelleri ve Yeşil Dönüşüm</a>
                        </h4>
                        <p class="text">Çevre dostu iş uygulamaları ve sürdürülebilir büyüme stratejileri geliştirme rehberi...</p>
                        <a href="{{ route('blog.details', ['id' => 6]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>

        <!-- Sayfalama -->
        <div class="pagination-wrapper text-center mt-50">
            <nav class="page-pagination">
                <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Sonraki">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection 