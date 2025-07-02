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
            @forelse($paginator as $article)
            <div class="col-lg-4 col-md-6">
                <article class="blog-single-box">
                    <div class="blog-thumb">
                        <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}">
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
                            <a href="{{ route('blog.details', ['id' => $article->id]) }}">{{ $article->title }}</a>
                        </h4>
                        <p class="text">{{ Str::limit($article->summary, 150) }}</p>
                        <a href="{{ route('blog.details', ['id' => $article->id]) }}" class="read-more">
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
        @if($paginator->hasPages())
        <div class="pagination-wrapper text-center mt-50">
            {{ $paginator->links() }}
        </div>
        @endif
    </div>
</section>

@endsection 