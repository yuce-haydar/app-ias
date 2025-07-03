@extends('layouts.app')

@section('title', $announcement->title . ' - Hatay İmar')
@section('description', $announcement->summary)

@section('content')

<!--==============================
Breadcrumb
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Duyuru Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('announcements') }}">Duyurular</a></li>
                    <li>{{ Str::limit($announcement->title, 30) }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Duyuru Detay
==============================-->
<section class="blog-details space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-single">
                    @if($announcement->image)
                    <div class="blog-thumb">
                        <img src="{{ asset('storage/' . $announcement->image) }}" 
                             alt="{{ $announcement->title }}" style="width: 100%; height: 400px; object-fit: cover;">
                    </div>
                    @endif
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="category">{{ $announcement->category }}</span>
                            <span class="author">{{ $announcement->author }}</span>
                            <span class="date">{{ $announcement->published_at->format('d.m.Y') }}</span>
                            <span class="views"><i class="fa-regular fa-eye"></i> {{ $announcement->view_count ?? 0 }}</span>
                        </div>
                        <h2 class="blog-title">{{ $announcement->title }}</h2>
                        <div class="blog-text">
                            {!! nl2br(e($announcement->content)) !!}
                        </div>

                        @if($announcement->tags)
                        <div class="blog-tags mt-4">
                            <h6>Etiketler:</h6>
                            <div class="tagcloud">
                                @foreach(explode(',', $announcement->tags) as $tag)
                                <a href="{{ route('announcements') }}?tag={{ trim($tag) }}">{{ trim($tag) }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Sosyal Medya Paylaşım -->
                        <div class="blog-share mt-4">
                            <h6>Paylaş:</h6>
                            <div class="social-links">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($announcement->title) }}" target="_blank" class="twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($announcement->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode($announcement->title) }}&body={{ urlencode(request()->fullUrl()) }}" class="email">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- İlgili Duyurular -->
                @if($relatedAnnouncements->count() > 0)
                <div class="related-posts mt-5">
                    <h3 class="related-title">İlgili Duyurular</h3>
                    <div class="row gy-30">
                        @foreach($relatedAnnouncements as $related)
                        <div class="col-md-4">
                            <div class="blog-item">
                                @if($related->image)
                                <div class="blog-thumb">
                                    <img src="{{ asset('storage/' . $related->image) }}" 
                                         alt="{{ $related->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="blog-date">
                                        <span class="day">{{ $related->published_at->format('d') }}</span>
                                        <span class="month">{{ $related->published_at->format('M') }}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="blog-content">
                                    <h4 class="blog-title">
                                        <a href="{{ route('announcement.details', $related->id) }}">{{ Str::limit($related->title, 50) }}</a>
                                    </h4>
                                    <p class="blog-text">{{ Str::limit($related->summary, 100) }}</p>
                                    <a href="{{ route('announcement.details', $related->id) }}" class="link-btn">
                                        Devamını Oku <i class="fa-regular fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                        @if($relatedAnnouncements->count() > 0)
                            @foreach($relatedAnnouncements->take(5) as $recent)
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

<style>
.social-links {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links .facebook { background: #3b5998; }
.social-links .twitter { background: #1da1f2; }
.social-links .whatsapp { background: #25d366; }
.social-links .email { background: #ea4335; }

.social-links a:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.tagcloud a {
    display: inline-block;
    background: #f8f9fa;
    color: #333;
    padding: 5px 12px;
    margin: 2px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 12px;
    transition: all 0.3s ease;
}

.tagcloud a:hover {
    background: #007bff;
    color: white;
}
</style> 