@extends('layouts.app')

@section('title', $job->title . ' - Hatay İmar')
@section('description', $job->description)

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">{{ $job->title }}</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li><a href="{{ route('careers') }}">Açık Pozisyonlar</a></li>
                    <li>{{ Str::limit($job->title, 20) }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="job-details-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job-details-content">
                    <div class="job-header mb-40">
                        <h1 class="job-title">{{ $job->title }}</h1>
                        <div class="job-meta">
                            <span class="job-type">{{ $job->employment_type ?? 'Tam Zamanlı' }}</span>
                            <span class="job-location"><i class="fa-solid fa-location-dot"></i> {{ $job->location ?? 'Antakya' }}</span>
                            <span class="job-deadline"><i class="fa-solid fa-calendar"></i> 
                                Son Başvuru: {{ $job->deadline ? $job->deadline->format('d.m.Y') : 'Belirtilmemiş' }}
                            </span>
                            <span class="job-department"><i class="fa-solid fa-building"></i> {{ $job->department ?? 'Genel' }}</span>
                        </div>
                    </div>

                    <div class="job-description mb-40">
                        <h3>İş Tanımı</h3>
                        <div class="job-content">
                            {!! nl2br(e($job->description)) !!}
                        </div>
                        
                        @if($job->requirements)
                        <h3>Aranan Nitelikler</h3>
                        <ul class="job-requirements-list">
                            @foreach(explode("\n", $job->requirements) as $requirement)
                                @if(trim($requirement))
                                <li>{{ trim($requirement) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        @endif

                        @if($job->responsibilities)
                        <h3>İş Kapsamı</h3>
                        <ul class="job-scope-list">
                            @foreach(explode("\n", $job->responsibilities) as $responsibility)
                                @if(trim($responsibility))
                                <li>{{ trim($responsibility) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        @endif

                        @if($job->benefits)
                        <h3>Sunduğumuz İmkanlar</h3>
                        <ul class="job-benefits-list">
                            @foreach(explode("\n", $job->benefits) as $benefit)
                                @if(trim($benefit))
                                <li>{{ trim($benefit) }}</li>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <!-- Başvuru Formu -->
                    @if(!$job->deadline || !$job->deadline->isPast())
                    <div class="application-form mt-50">
                        <h3>Başvuru Formu</h3>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="contact-form" action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">Ad *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Soyad *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-posta *</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefon *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birth_date">Doğum Tarihi *</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="education_level">Eğitim Seviyesi *</label>
                                        <select class="form-control" id="education_level" name="education_level" required>
                                            <option value="">Seçiniz</option>
                                            <option value="İlkokul" {{ old('education_level') == 'İlkokul' ? 'selected' : '' }}>İlkokul</option>
                                            <option value="Ortaokul" {{ old('education_level') == 'Ortaokul' ? 'selected' : '' }}>Ortaokul</option>
                                            <option value="Lise" {{ old('education_level') == 'Lise' ? 'selected' : '' }}>Lise</option>
                                            <option value="Ön Lisans" {{ old('education_level') == 'Ön Lisans' ? 'selected' : '' }}>Ön Lisans</option>
                                            <option value="Lisans" {{ old('education_level') == 'Lisans' ? 'selected' : '' }}>Lisans</option>
                                            <option value="Yüksek Lisans" {{ old('education_level') == 'Yüksek Lisans' ? 'selected' : '' }}>Yüksek Lisans</option>
                                            <option value="Doktora" {{ old('education_level') == 'Doktora' ? 'selected' : '' }}>Doktora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="experience_years">Deneyim (Yıl) *</label>
                                        <input type="number" class="form-control" id="experience_years" name="experience_years" min="0" value="{{ old('experience_years') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cv_file">CV Dosyası (PDF, DOC - Maks 5MB) *</label>
                                        <input type="file" class="form-control" id="cv_file" name="cv_file" accept=".pdf,.doc,.docx" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Adres *</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="portfolio_url">Portfolyo/LinkedIn URL</label>
                                        <input type="url" class="form-control" id="portfolio_url" name="portfolio_url" value="{{ old('portfolio_url') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cover_letter">Ön Yazı</label>
                                        <textarea class="form-control" id="cover_letter" name="cover_letter" rows="5" placeholder="Kendinizi tanıtın ve neden bu pozisyon için uygun olduğunuzu belirtin...">{{ old('cover_letter') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="theme-btn bg-color10">
                                    <span class="link-effect">
                                        <span class="effect-1">Başvuru Gönder</span>
                                        <span class="effect-1">Başvuru Gönder</span>
                                    </span><i class="fa-regular fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="application-closed mt-50">
                        <div class="alert alert-warning">
                            <h4>Başvuru Süresi Dolmuştur</h4>
                            <p>Bu pozisyon için başvuru süresi {{ $job->application_deadline->format('d.m.Y') }} tarihinde sona ermiştir.</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="job-sidebar">
                    <div class="widget job-info-widget">
                        <h3 class="widget-title">İş Bilgileri</h3>
                        <ul class="job-info-list">
                            <li><strong>Pozisyon:</strong><span>{{ $job->title }}</span></li>
                            <li><strong>Departman:</strong><span>{{ $job->department ?? 'Genel' }}</span></li>
                            <li><strong>Çalışma Şekli:</strong><span>{{ $job->employment_type ?? 'Tam Zamanlı' }}</span></li>
                            <li><strong>Lokasyon:</strong><span>{{ $job->location ?? 'Antakya' }}</span></li>
                            @if($job->experience_required)
                            <li><strong>Deneyim:</strong><span>{{ $job->experience_required }}</span></li>
                            @endif
                            @if($job->salary_range)
                            <li><strong>Maaş:</strong><span>{{ $job->salary_range }}</span></li>
                            @endif
                            <li><strong>Görüntülenme:</strong><span>{{ $job->view_count ?? 0 }}</span></li>
                        </ul>
                    </div>
                    
                    <div class="widget contact-widget">
                        <h3 class="widget-title">İletişim</h3>
                        <div class="contact-info">
                            <p><i class="fa-solid fa-envelope"></i> ik@hatayimar.com.tr</p>
                            <p><i class="fa-solid fa-phone"></i> +90 326 213 23 26</p>
                            <p><i class="fa-solid fa-location-dot"></i> Antakya, Hatay</p>
                        </div>
                    </div>
                    
                    <!-- İlgili İş İlanları -->
                    @if($relatedJobs->count() > 0)
                    <div class="widget related-jobs-widget">
                        <h3 class="widget-title">İlgili İş İlanları</h3>
                        <ul class="related-jobs-list">
                            @foreach($relatedJobs as $related)
                            <li><a href="{{ route('job.details', $related->id) }}">{{ $related->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Başvuru Bilgileri -->
                    <div class="widget">
                        <h3 class="widget-title">Başvuru Bilgileri</h3>
                        <div class="widget-content">
                            <ul class="info-list">
                                <li><i class="fa-regular fa-clock"></i> Son başvuru: {{ $job->application_deadline ? $job->application_deadline->format('d.m.Y') : 'Belirtilmemiş' }}</li>
                                <li><i class="fa-regular fa-file-pdf"></i> CV PDF formatında olmalı</li>
                                <li><i class="fa-regular fa-envelope"></i> Başvuru sonrası e-posta ile bilgilendirme</li>
                                <li><i class="fa-regular fa-shield-check"></i> Tüm bilgiler gizli tutulur</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 