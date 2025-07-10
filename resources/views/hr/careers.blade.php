@extends('layouts.app')

@section('title', 'Açık Pozisyonlar - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Açık Pozisyonlar</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li>Açık Pozisyonlar</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="career-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Açık Pozisyonlar</div>
                    <h2 class="sec-title mb-60">Mevcut <span class="bold">İş</span> Fırsatları</h2>
                </div>
            </div>
        </div>
        
        @if($jobs->count() > 0)
            <div class="row gy-40">
                @foreach($jobs as $job)
                <div class="col-lg-6">
                    <div class="job-item">
                        <div class="job-header">
                            <div class="job-title">
                                <h4><a href="{{ route('job.details', $job->id) }}">{{ $job->title }}</a></h4>
                                <span class="job-type">{{ $job->employment_type ?? 'Tam Zamanlı' }}</span>
                            </div>
                            <div class="job-meta">
                                <span><i class="fa-solid fa-location-dot"></i> {{ $job->location ?? 'Antakya' }}</span>
                                <span><i class="fa-solid fa-calendar"></i> 
                                    Son Başvuru: {{ $job->deadline ? $job->deadline->format('d.m.Y') : 'Belirtilmemiş' }}
                                </span>
                            </div>
                        </div>
                        <div class="job-content">
                                                            <p>{!! Str::limit($job->description, 120) !!}</p>
                            @if($job->requirements)
                            <div class="job-requirements">
                                @foreach(array_slice(explode(',', $job->requirements), 0, 3) as $requirement)
                                <span class="requirement">{{ trim($requirement) }}</span>
                                @endforeach
                            </div>
                            @endif
                            <a href="{{ route('job.details', $job->id) }}" class="job-apply-btn">
                                Başvur <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper mt-50">
                {{ $jobs->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="empty-state">
                    <i class="fa-solid fa-briefcase fa-4x text-muted mb-3"></i>
                    <h4>Şu Anda Açık Pozisyon Bulunmuyor</h4>
                    <p class="text-muted">Yakında yeni iş fırsatları duyurulacaktır. Güncel ilanlar için sayfamızı takip edin.</p>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection 