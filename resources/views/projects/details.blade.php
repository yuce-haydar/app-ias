@extends('layouts.app')

@section('title', $project->title . ' - Hatay İmar')
@section('description', $project->short_description)
@section('keywords', 'hatay imar, proje detayı, ' . $project->project_type)

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $project->title }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('projects') }}">Projeler</a></li>
                    <li>{{ $project->title }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Proje Detay Bölümü
==============================-->
<section class="project-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="project-details-content">
                    <!-- Ana Resim -->
                    <div class="project-details-thumb">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px;">
                    </div>
                    
                    <div class="project-details-wrapper">
                        <h1 class="title">{{ $project->title }}</h1>
                        
                        <!-- Proje Meta Bilgileri -->
                        <div class="project-meta">
                            <div class="meta-item">
                                <h6>Proje Türü:</h6>
                                <p>{{ $project->project_type }}</p>
                            </div>
                            @if($project->category)
                            <div class="meta-item">
                                <h6>Kategori:</h6>
                                <p>{{ $project->category }}</p>
                            </div>
                            @endif
                            <div class="meta-item">
                                <h6>Durum:</h6>
                                <p><span class="badge badge-{{ strtolower(str_replace(' ', '-', $project->display_status)) }}">{{ $project->display_status }}</span></p>
                            </div>
                            <div class="meta-item">
                                <h6>Lokasyon:</h6>
                                <p>{{ $project->location }}</p>
                            </div>
                            @if($project->area)
                            <div class="meta-item">
                                <h6>Alan:</h6>
                                <p>{{ $project->area }}</p>
                            </div>
                            @endif
                            @if($project->capacity)
                            <div class="meta-item">
                                <h6>Kapasite:</h6>
                                <p>{{ $project->capacity }}</p>
                            </div>
                            @endif
                        </div>

                        <!-- Proje Açıklaması -->
                        <h3>Proje Hakkında</h3>
                        <p>{!! $project['description'] ?? 'Bu proje hakkında detaylı bilgi yakında eklenecektir.' !!}</p>

                        <!-- Proje Özellikleri -->
                        @if(isset($project['features']) && count($project['features']) > 0)
                        <h3>Tesis Özellikleri</h3>
                        <ul class="project-objectives">
                            @foreach($project['features'] as $feature)
                            <li>{!! $feature !!}</li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- Proje Timeline -->
                        @if(isset($project['timeline']) && count($project['timeline']) > 0)
                        <h3>Proje Süreci</h3>
                        <div class="timeline-section">
                            @foreach($project['timeline'] as $timeline)
                            <div class="timeline-item">
                                <div class="timeline-content">
                                    <p>{!! $timeline !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <!-- Proje Resimleri Galerisi -->
                        @if($project->gallery_urls && count($project->gallery_urls) > 0)
                        <h3>Proje Galerisi</h3>
                        <div class="project-gallery">
                            <div class="row g-3">
                                @foreach($project->gallery_urls as $image)
                                <div class="col-md-6">
                                    <div class="gallery-item">
                                        <img src="{{ $image }}" alt="{{ $project->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Proje Özeti -->
                    <div class="widget">
                        <h4 class="widget-title">Proje Özeti</h4>
                        <div class="project-summary">
                            <div class="summary-item">
                                <span class="label">Proje Türü:</span>
                                <span class="value">{{ $project['type'] }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Durum:</span>
                                <span class="value">{{ $project['status'] }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="label">Lokasyon:</span>
                                <span class="value">{{ $project['location'] }}</span>
                            </div>
                            @if(isset($project['area']))
                            <div class="summary-item">
                                <span class="label">Alan:</span>
                                <span class="value">{{ strip_tags($project['area']) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- İlgili Projeler -->
                    @if($relatedProjects->count() > 0)
                    <div class="widget">
                        <h4 class="widget-title">Diğer Projelerimiz</h4>
                        <div class="related-projects">
                            @foreach($relatedProjects as $relatedProject)
                            <div class="related-project-item">
                                <div class="project-thumb">
                                    <img src="{{ $relatedProject->image_url }}" alt="{{ $relatedProject->title }}" style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px;">
                                </div>
                                <div class="project-content">
                                    <h6><a href="{{ route('project.details', $relatedProject->id) }}">{{ Str::limit($relatedProject->title, 30) }}</a></h6>
                                    <p>{{ $relatedProject->location }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- İletişim -->
                    <div class="widget">
                        <h4 class="widget-title">Proje Hakkında Bilgi</h4>
                        <div class="contact-info">
                            <p>Bu proje hakkında detaylı bilgi almak için bizimle iletişime geçebilirsiniz.</p>
                            <a href="{{ route('contact') }}" class="theme-btn">
                                <span class="link-effect">
                                    <span class="effect-1">İletişime Geç</span>
                                    <span class="effect-1">İletişime Geç</span>
                                </span>
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.project-meta {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 30px 0;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
}

.meta-item h6 {
    color: #1f4788;
    font-weight: 600;
    margin-bottom: 5px;
}

.meta-item p {
    margin: 0;
    font-weight: 500;
}

.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.badge-tamamlandı {
    background: #28a745;
    color: white;
}

.badge-devam-ediyor {
    background: #007bff;
    color: white;
}

.badge-tasarım {
    background: #ffc107;
    color: #333;
}

.badge-planlanan {
    background: #6c757d;
    color: white;
}

.badge-temel-atıldı {
    background: #17a2b8;
    color: white;
}

.project-objectives {
    padding: 0;
    list-style: none;
}

.project-objectives li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 25px;
}

.project-objectives li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #1f4788;
    font-weight: bold;
}

.timeline-section {
    margin: 20px 0;
}

.timeline-item {
    padding: 15px;
    margin: 10px 0;
    background: #f8f9fa;
    border-left: 4px solid #1f4788;
    border-radius: 5px;
}

.project-summary {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #ddd;
}

.summary-item:last-child {
    border-bottom: none;
}

.label {
    font-weight: 600;
    color: #666;
}

.value {
    font-weight: 500;
    color: #333;
}

.related-project-item {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.project-thumb {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    overflow: hidden;
    flex-shrink: 0;
}

.project-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.project-content h6 {
    margin-bottom: 5px;
    font-size: 14px;
}

.project-content h6 a {
    color: #333;
    text-decoration: none;
}

.project-content h6 a:hover {
    color: #1f4788;
}

.project-content p {
    margin: 0;
    font-size: 12px;
    color: #666;
}

.widget {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.widget-title {
    color: #1f4788;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #1f4788;
}
</style>

@endsection 