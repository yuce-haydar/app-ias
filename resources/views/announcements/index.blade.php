@extends('layouts.app')

@section('title', 'Duyurular - Hatay İmar')
@section('description', 'Hatay İmar\'ın güncel duyuru ve haberlerini takip edin.')

@section('content')

<!--==============================
Breadcrumb
==============================-->
<div class="breadcrumb-wrapper bg-theme" data-bg-src="{{ asset('assets/images/bg-img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="page-title">
            <h1 class="title text-white">Duyurular</h1>
        </div>
        <div class="breadcrumb-menu">
            <ul>
                <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                <li>Duyurular</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Duyurular Bölümü
==============================-->
<section class="blog-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($announcements->count() > 0)
                    <div class="row gy-40">
                        @foreach($announcements as $announcement)
                        <div class="col-12">
                            <div class="blog-item style-2">
                                @if($announcement->image)
                                <div class="blog-thumb">
                                    <img src="{{ asset('storage/' . $announcement->image) }}" 
                                         alt="{{ $announcement->title }}" style="width: 100%; height: 250px; object-fit: cover;">
                                    <div class="blog-date">
                                        <span class="day">{{ $announcement->published_at->format('d') }}</span>
                                        <span class="month">{{ $announcement->published_at->format('M') }}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="category">{{ $announcement->category }}</span>
                                        <span class="author">{{ $announcement->author }}</span>
                                    </div>
                                    <h3 class="blog-title">
                                        <a href="{{ route('announcement.details', $announcement->id) }}">{{ $announcement->title }}</a>
                                    </h3>
                                    <p class="blog-text">{{ Str::limit($announcement->summary, 200) }}</p>
                                    <div class="blog-bottom">
                                        <a href="{{ route('announcement.details', $announcement->id) }}" class="link-btn">
                                            Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                                        </a>
                                        <div class="blog-meta-right">
                                            <span><i class="fa-regular fa-eye"></i> {{ $announcement->view_count ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper mt-50">
                        {{ $announcements->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="fa-solid fa-bullhorn fa-4x text-muted mb-3"></i>
                            <h4>Henüz Duyuru Bulunmuyor</h4>
                            <p class="text-muted">Şu anda yayınlanmış bir duyuru bulunmamaktadır.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <!-- Son Duyurular -->
                    <div class="widget widget_recent_post">
                        <h3 class="widget_title">Son Duyurular</h3>
                        @if($announcements->count() > 0)
                            @foreach($announcements->take(5) as $recent)
                            <div class="recent-post">
                                @if($recent->image)
                                <div class="media-img">
                                    <a href="{{ route('announcement.details', $recent->id) }}">
                                        <img src="{{ asset('storage/' . $recent->image) }}" 
                                             alt="{{ $recent->title }}" style="width: 80px; height: 80px; object-fit: cover;">
                                    </a>
                                </div>
                                @endif
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a href="{{ route('announcement.details', $recent->id) }}">{{ Str::limit($recent->title, 60) }}</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="#"><i class="fa-light fa-calendar-days"></i>{{ $recent->published_at->format('d.m.Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted">Henüz duyuru bulunmamaktadır.</p>
                        @endif
                    </div>

                    <!-- İletişim CTA -->
                    <div class="widget widget_banner">
                        <div class="widget-banner" data-bg-src="{{ asset('assets/images/bg-img/widget-banner.jpg') }}">
                            <div class="banner-content">
                                <h4 class="title">Bizimle İletişime Geçin</h4>
                                <p>Sorularınız için bize ulaşabilirsiniz.</p>
                                <a href="{{ route('contact') }}" class="theme-btn">İletişim</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 