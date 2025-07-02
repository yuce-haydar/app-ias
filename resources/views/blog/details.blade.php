@extends('layouts.app')

@section('title', $article->title . ' - Hatay İmar')
@section('description', $article->summary)
@section('keywords', 'hatay imar, haber, proje, ' . $article->category)

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Haber Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('blog.grid') }}">Haberler</a></li>
                    <li>Haber Detayı</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Haber Detay Bölümü
==============================-->
<section class="blog-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details-content">
                    <div class="blog-details-thumb">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->featured_image) }}" alt="{{ $article->title }}">
                        <div class="date">
                            <span class="day">{{ $article->published_at->format('d') }}</span>
                            <span class="month">{{ $article->published_at->format('M') }}</span>
                            <span class="year">{{ $article->published_at->format('Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="blog-details-wrapper">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">{{ $article->author }}</a></span>
                            <span class="category">{{ $article->category }}</span>
                            <span class="date">{{ $article->published_at->format('d M Y') }}</span>
                        </div>
                        
                        <h1 class="title">{{ $article->title }}</h1>
                        
                        <div class="blog-summary">
                            <p><strong>{{ $article->summary }}</strong></p>
                        </div>
                        
                        <div class="blog-content">
                            {!! $article->content !!}
                        </div>
                    </div>
                    
                    <!-- Sosyal Paylaşım -->
                    <div class="blog-share">
                        <h6>Paylaş:</h6>
                        <a href="#" class="social-link facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4">
                <div class="blog-sidebar">
                    <!-- İlgili Haberler Widget -->
                    <div class="widget recent-posts-widget">
                        <h3 class="widget-title">İlgili Haberler</h3>
                        @forelse($relatedNews as $relatedArticle)
                        <div class="recent-post-item">
                            <div class="post-thumb">
                                <img src="{{ \App\Helpers\ImageHelper::getImageUrl($relatedArticle->featured_image) }}" alt="{{ $relatedArticle->title }}">
                            </div>
                            <div class="post-content">
                                <h6><a href="{{ route('blog.details', ['id' => $relatedArticle->id]) }}">{{ Str::limit($relatedArticle->title, 50) }}</a></h6>
                                <span class="date">{{ $relatedArticle->published_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted">İlgili haber bulunmamaktadır.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 