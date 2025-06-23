@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- İstatistik Kartları -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-4">
        <div class="stat-card primary">
            <div class="icon">
                <i class="fas fa-building"></i>
            </div>
            <h3 class="mb-2">{{ $stats['facilities'] }}</h3>
            <p class="text-muted mb-0">Toplam Tesis</p>
            <a href="{{ route('admin.facilities.index') }}" class="stretched-link"></a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card info">
            <div class="icon">
                <i class="fas fa-project-diagram"></i>
            </div>
            <h3 class="mb-2">{{ $stats['projects'] }}</h3>
            <p class="text-muted mb-0">Toplam Proje</p>
            <a href="{{ route('admin.projects.index') }}" class="stretched-link"></a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card warning">
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3 class="mb-2">{{ $stats['news'] }}</h3>
            <p class="text-muted mb-0">Yayınlanan Haber</p>
            <a href="{{ route('admin.news.index') }}" class="stretched-link"></a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card danger">
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3 class="mb-2">{{ $stats['contact_submissions'] }}</h3>
            <p class="text-muted mb-0">Okunmamış Mesaj</p>
            <a href="{{ route('admin.contact-submissions.index') }}" class="stretched-link"></a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card primary">
            <div class="icon">
                <i class="fas fa-file-contract"></i>
            </div>
            <h3 class="mb-2">{{ $stats['tender_applications'] }}</h3>
            <p class="text-muted mb-0">Bekleyen İhale Başvurusu</p>
            <a href="{{ route('admin.tender-applications.index') }}" class="stretched-link"></a>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="stat-card info">
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <h3 class="mb-2">{{ $stats['job_applications'] }}</h3>
            <p class="text-muted mb-0">Bekleyen İş Başvurusu</p>
            <a href="{{ route('admin.job-applications.index') }}" class="stretched-link"></a>
        </div>
    </div>
</div>

<div class="row">
    <!-- Son İletişim Formları -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Son İletişim Formları</h5>
                <a href="{{ route('admin.contact-submissions.index') }}" class="btn btn-sm btn-primary">
                    Tümünü Gör
                </a>
            </div>
            <div class="card-body">
                @if($recentContacts->isEmpty())
                    <p class="text-muted text-center py-3">Henüz iletişim formu bulunmuyor.</p>
                @else
                    <div class="list-group">
                        @foreach($recentContacts as $contact)
                            <a href="{{ route('admin.contact-submissions.show', $contact->id) }}" 
                               class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $contact->name }}</h6>
                                    <small>{{ $contact->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-muted">{{ Str::limit($contact->subject, 50) }}</p>
                                <small>{{ $contact->email }}</small>
                                @if(!$contact->is_read)
                                    <span class="badge bg-danger ms-2">Yeni</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Son Haberler -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Son Haberler</h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">
                    Tümünü Gör
                </a>
            </div>
            <div class="card-body">
                @if($recentNews->isEmpty())
                    <p class="text-muted text-center py-3">Henüz haber bulunmuyor.</p>
                @else
                    <div class="list-group">
                        @foreach($recentNews as $news)
                            <a href="{{ route('admin.news.edit', $news->id) }}" 
                               class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $news->title }}</h6>
                                    <small>{{ $news->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1 text-muted">{{ Str::limit($news->summary, 80) }}</p>
                                <div>
                                    <span class="badge bg-{{ $news->status == 'published' ? 'success' : 'warning' }}">
                                        {{ $news->status == 'published' ? 'Yayında' : 'Taslak' }}
                                    </span>
                                    <span class="badge bg-secondary">{{ $news->category }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 