@extends('layouts.app')

@section('title', 'İhale Başvuru - ' . $tender->title . ' - Hatay İmar')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İhale Başvuru</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('tenders') }}">İhaleler</a></li>
                    <li><a href="{{ route('tender.details', $tender->id) }}">{{ Str::limit($tender->title, 20) }}</a></li>
                    <li>Başvuru</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="contact-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-form-wrapper">
                    <div class="title-area mb-50">
                        <h2 class="sec-title">İhale Başvuru Formu</h2>
                        <h4 class="tender-title">{{ $tender->title }}</h4>
                        <p class="sec-text">Lütfen tüm alanları eksiksiz doldurunuz. Başvuru sonrası size dönüş yapılacaktır.</p>
                    </div>
                    
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
                    
                    <form class="contact-form" method="POST" action="{{ route('tender.application.store', $tender->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Firma Adı <span class="required">*</span></label>
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yetkili Kişi <span class="required">*</span></label>
                                    <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-posta <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefon <span class="required">*</span></label>
                                    <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Adres <span class="required">*</span></label>
                                    <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vergi Numarası</label>
                                    <input type="text" name="tax_number" class="form-control" value="{{ old('tax_number') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Belgeler (PDF, DOC - Maks 10MB)</label>
                                    <input type="file" name="documents[]" class="form-control" multiple accept=".pdf,.doc,.docx">
                                    <small class="form-text text-muted">Şirket belgelerinizi, referans mektuplarınızı ekleyebilirsiniz.</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Ek Açıklama</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="İhale ile ilgili ek bilgilerinizi, tecrübelerinizi buraya yazabilirsiniz...">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            <a href="{{ route('terms') }}" target="_blank">Şartlar ve koşulları</a> okudum ve kabul ediyorum.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="theme-btn">
                                    <i class="fa-regular fa-paper-plane"></i> Başvuru Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <!-- İhale Özeti -->
                    <div class="widget project-info-widget">
                        <h3 class="widget-title">İhale Özeti</h3>
                        <ul class="project-info-list">
                            <li><strong>İhale:</strong><span>{{ Str::limit($tender->title, 30) }}</span></li>
                            <li><strong>Son Başvuru:</strong><span>{{ $tender->application_deadline ? $tender->application_deadline->format('d.m.Y H:i') : 'TBD' }}</span></li>
                            @if($tender->estimated_cost)
                            <li><strong>Yaklaşık Maliyet:</strong><span>{{ number_format($tender->estimated_cost) }} TL</span></li>
                            @endif
                            @if($tender->guarantee_amount)
                            <li><strong>Geçici Teminat:</strong><span>{{ number_format($tender->guarantee_amount) }} TL</span></li>
                            @endif
                        </ul>
                        <a href="{{ route('tender.details', $tender->id) }}" class="theme-btn style-2 mt-3">
                            İhale Detayları
                        </a>
                    </div>

                    <!-- Başvuru Bilgileri -->
                    <div class="widget">
                        <h3 class="widget-title">Başvuru Bilgileri</h3>
                        <div class="widget-content">
                            <ul class="info-list">
                                <li><i class="fa-regular fa-clock"></i> Başvuru süresi: {{ $tender->application_deadline ? $tender->application_deadline->format('d.m.Y H:i') . "'e kadar" : 'Belirtilmemiş' }}</li>
                                <li><i class="fa-regular fa-file-pdf"></i> Belgeler PDF/DOC formatında olmalı</li>
                                <li><i class="fa-regular fa-envelope"></i> Başvuru sonrası e-posta ile bilgilendirme</li>
                                <li><i class="fa-regular fa-shield-check"></i> Tüm bilgiler gizli tutulur</li>
                            </ul>
                        </div>
                    </div>

                    <!-- İletişim -->
                    <div class="widget contact-widget">
                        <h3 class="widget-title">Sorularınız mı var?</h3>
                        <p>İhale hakkında detaylı bilgi almak için bizimle iletişime geçebilirsiniz.</p>
                        <a href="{{ route('contact') }}" class="theme-btn style-2">İletişime Geç</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 