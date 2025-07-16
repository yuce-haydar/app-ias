@extends('layouts.app')

@section('title', 'Haberler - Hatay İmar')
@section('description', 'Hatay İmar projelerinden son haberler, duyurular ve gelişmeler.')
@section('keywords', 'hatay imar, haberler, duyurular, projeler, sosyal tesis, parke taşı')

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
Blog Grid Bölümü
==============================-->
<section class="blog-section style-grid space bg-theme3">
    <div class="container">
        <div class="row gy-30">
            @forelse($news as $article)
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ \App\Helpers\ImageHelper::getImageUrl($article->featured_image) }}" alt="{{ $article->title }}">
                        <div class="date">
                            <span class="day">{{ $article->published_at->format('d') }}</span>
                            <span class="month">{{ $article->published_at->format('M') }}</span>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="author">Yazar: <a href="#">{{ $article->author }}</a></span>
                            <span class="category">{{ $article->category }}</span>
                        </div>
                        <h4 class="title">
                            <a href="{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a>
                        </h4>
                        <p class="text">{!! Str::limit($article->summary, 150) !!}</p>
                        <a href="{{ route('blog.details', ['id' => $article->id, 'slug' => $article->slug]) }}" class="read-more">
                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                        </a>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Henüz haber bulunmamaktadır.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
        <div class="pagination-wrapper text-center mt-50">
            @include('partials.pagination', ['paginator' => $news])
        </div>
        @endif
    </div>
</section>

@endsection 

@push('styles')
<style>
/* Blog Grid Card Eşit Yükseklik */
.blog-section.style-grid .row {
    display: flex;
    flex-wrap: wrap;
}

.blog-section.style-grid .row > [class*="col-"] {
    display: flex;
    margin-bottom: 30px;
}

.blog-single-box {
    display: flex;
    flex-direction: column;
    height: 100%;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.blog-single-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.blog-thumb {
    position: relative;
    height: 250px;
    overflow: hidden;
    flex-shrink: 0;
}

.blog-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-single-box:hover .blog-thumb img {
    transform: scale(1.05);
}

.blog-content {
    padding: 25px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.blog-content .title {
    height: 60px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    margin-bottom: 15px;
    line-height: 1.4;
}

.blog-content .text {
    height: 75px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    margin-bottom: 20px;
    line-height: 1.5;
    flex-grow: 1;
}

.blog-meta {
    margin-bottom: 15px;
}

.read-more {
    margin-top: auto;
    align-self: flex-start;
}

/* Date Badge */
.blog-thumb .date {
    position: absolute;
    top: 20px;
    left: 20px;
    background: #cf9f38;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    text-align: center;
    z-index: 2;
    box-shadow: 0 3px 10px rgba(207, 159, 56, 0.3);
}

.blog-thumb .date .day {
    display: block;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
}

.blog-thumb .date .month {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    margin-top: 2px;
}

/* Meta Styling */
.blog-meta span {
    font-size: 13px;
    color: #666;
    margin-right: 15px;
}

.blog-meta .author a {
    color: #cf9f38;
    text-decoration: none;
}

.blog-meta .category {
    background: #f8f9fa;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Title Styling */
.blog-content .title a {
    color: #333;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.blog-content .title a:hover {
    color: #cf9f38;
}

/* Read More Button */
.read-more {
    color: #cf9f38;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.read-more:hover {
    color: #b8892f;
    transform: translateX(5px);
}

.read-more i {
    transition: transform 0.3s ease;
}

.read-more:hover i {
    transform: translateX(3px);
}

/* Responsive */
@media (max-width: 768px) {
    .blog-thumb {
        height: 200px;
    }
    
    .blog-content {
        padding: 20px;
    }
    
    .blog-content .title {
        height: auto;
        -webkit-line-clamp: unset;
    }
    
    .blog-content .text {
        height: auto;
        -webkit-line-clamp: unset;
    }
}
</style>
@endpush 