@extends('layouts.app')

@section('title', 'Blog Liste - Hatay İmar')
@section('description', 'İş dünyası hakkında güncel makaleler ve uzman analizleri liste formatında.')
@section('keywords', 'blog liste, makaleler, iş dünyası, danışmanlık haberleri')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
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
                @forelse($news as $article)
                <article class="blog-list-item">
                    <div class="blog-thumb">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->featured_image) }}" alt="{{ $article->title }}">
                        <div class="date">
                            <span class="day">{{ $article->published_at->format('d') }}</span>
                            <span class="month">{{ $article->published_at->format('M') }}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">{{ $article->author ?? 'Hatay İmar A.Ş.' }}</a></span>
                            <span class="category">{{ $article->category }}</span>
                        </div>
                        <h3 class="title">
                            <a href="{{ route('blog.details', ['id' => $article->id]) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text">{!! Str::limit($article->summary, 200) !!}</p>
                        <a href="{{ route('blog.details', ['id' => $article->id]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Henüz haber bulunmamaktadır.</p>
                </div>
                @endforelse

                <!-- Pagination -->
                @if($news->hasPages())
                <div class="pagination-wrapper mt-50">
                    @include('partials.pagination', ['paginator' => $news])
                </div>
                @endif
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