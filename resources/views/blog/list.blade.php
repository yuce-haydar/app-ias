@extends('layouts.app')

@section('title', 'Blog Liste - Nexta İş Danışmanlığı')
@section('description', 'İş dünyası hakkında güncel makaleler ve uzman analizleri liste formatında.')
@section('keywords', 'blog liste, makaleler, iş dünyası, danışmanlık haberleri')

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
Blog Liste Bölümü
==============================-->
<section class="blog-section style-list space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Yazısı 1 -->
                <article class="blog-list-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb01.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">15</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Ahmet Yılmaz</a></span>
                            <span class="category">İş Stratejisi</span>
                        </div>
                        <h3 class="title">
                            <a href="{{ route('blog.details', ['id' => 1]) }}">Başarılı İş Stratejisi Geliştirme Yöntemleri</a>
                        </h3>
                        <p class="text">İşletmenizin uzun vadeli başarısı için etkili strateji geliştirme teknikleri ve uygulamaları. Günümüz rekabet ortamında öne çıkmak için doğru stratejileri belirlemek ve uygulamak kritik önem taşıyor.</p>
                        <a href="{{ route('blog.details', ['id' => 1]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>

                <!-- Blog Yazısı 2 -->
                <article class="blog-list-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb02.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">12</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Ayşe Demir</a></span>
                            <span class="category">Finans</span>
                        </div>
                        <h3 class="title">
                            <a href="{{ route('blog.details', ['id' => 2]) }}">Finansal Risk Yönetimi ve Değerlendirme</a>
                        </h3>
                        <p class="text">Şirketlerin karşılaştığı finansal riskleri analiz etme ve yönetme konusunda uzman önerileri. Risk yönetimi stratejileri ile şirketinizi finansal dalgalanmalardan koruyun.</p>
                        <a href="{{ route('blog.details', ['id' => 2]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>

                <!-- Blog Yazısı 3 -->
                <article class="blog-list-item">
                    <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog/blog-thumb03.jpg') }}" alt="Blog Yazısı">
                        <div class="date">
                            <span class="day">10</span>
                            <span class="month">Oca</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">Mehmet Kaya</a></span>
                            <span class="category">Pazarlama</span>
                        </div>
                        <h3 class="title">
                            <a href="{{ route('blog.details', ['id' => 3]) }}">Dijital Pazarlama Trendleri ve Geleceği</a>
                        </h3>
                        <p class="text">2025 yılında dikkat edilmesi gereken dijital pazarlama stratejileri ve yeni teknolojiler. Yapay zeka, sosyal medya ve e-ticaret alanındaki son gelişmeler.</p>
                        <a href="{{ route('blog.details', ['id' => 3]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>

                <!-- Sayfalama -->
                <div class="pagination-wrapper mt-50">
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

            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- Arama Widget -->
                    <div class="widget search-widget">
                        <h3 class="widget-title">Arama</h3>
                        <form class="search-form">
                            <input type="search" placeholder="Aradığınızı yazın...">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <!-- Kategoriler Widget -->
                    <div class="widget category-widget">
                        <h3 class="widget-title">Kategoriler</h3>
                        <ul class="category-list">
                            <li><a href="#">İş Stratejisi <span>(5)</span></a></li>
                            <li><a href="#">Finans <span>(3)</span></a></li>
                            <li><a href="#">Pazarlama <span>(7)</span></a></li>
                            <li><a href="#">İnsan Kaynakları <span>(4)</span></a></li>
                            <li><a href="#">Teknoloji <span>(6)</span></a></li>
                        </ul>
                    </div>

                    <!-- Son Yazılar Widget -->
                    <div class="widget recent-posts-widget">
                        <h3 class="widget-title">Son Yazılar</h3>
                        <div class="recent-post-item">
                            <div class="post-thumb">
                                <img src="{{ asset('assets/images/blog/recent-01.jpg') }}" alt="Son Yazı">
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog.details', ['id' => 1]) }}">Etkili Liderlik Stratejileri</a></h6>
                                <span class="date">15 Ocak 2025</span>
                            </div>
                        </div>
                        <div class="recent-post-item">
                            <div class="post-thumb">
                                <img src="{{ asset('assets/images/blog/recent-02.jpg') }}" alt="Son Yazı">
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog.details', ['id' => 2]) }}">Dijital Dönüşüm Rehberi</a></h6>
                                <span class="date">12 Ocak 2025</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 