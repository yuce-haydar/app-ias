@extends('layouts.app')

@section('title', 'İletişim - Hatay İmar')
@section('description', 'Hatay İmar ile iletişime geçin. Sorularınız ve önerileriniz için bizimle iletişim kurun.')
@section('keywords', 'hatay imar, iletişim, telefon, e-posta, adres, antakya')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İletişim</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('contact') }}">İletişim</a></li>
                    <li>İletişim</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim Bölümü
==============================-->
<section class="contact-section space bg-theme3">
    <div class="container">
        <div class="row gy-40">
            <div class="col-lg-5">
                <div class="contact-content-wrap">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>{{ $contactSettings->subtitle }}</div>
                        <h2 class="sec-title">{{ $contactSettings->title }}</h2>
                        <p class="sec-text">{!! $contactSettings->description !!}</p>
                    </div>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">{{ $contactSettings->office_title }}</h4>
                                <p>{!! nl2br(e($contactSettings->office_address)) !!}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">{{ $contactSettings->phone_title }}</h4>
                                <div class="content">
                                    Genel: <a href="tel:{{ str_replace([' ', '-', '(', ')'], '', $contactSettings->phone_general) }}">{{ $contactSettings->phone_general }}</a><br>
                                    @if($contactSettings->phone_fax)
                                    Faks: <a href="tel:{{ str_replace([' ', '-', '(', ')'], '', $contactSettings->phone_fax) }}">{{ $contactSettings->phone_fax }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">{{ $contactSettings->email_title }}</h4>
                                <div class="content">
                                    <a href="mailto:{{ $contactSettings->email_info }}">{{ $contactSettings->email_info }}</a><br>
                                    @if($contactSettings->email_contact)
                                    <a href="mailto:{{ $contactSettings->email_contact }}">{{ $contactSettings->email_contact }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="info">
                                <h4 class="title">{{ $contactSettings->working_hours_title }}</h4>
                                <div class="content">
                                    {{ $contactSettings->working_hours_weekday }}<br>
                                    {{ $contactSettings->working_hours_weekend }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-links">
                        @if($contactSettings->facebook_url)
                        <a href="{{ $contactSettings->facebook_url }}" target="_blank" rel="noopener">
                            <span class="link-effect">
                                <span class="effect-1">Facebook</span>
                                <span class="effect-1">Facebook</span>
                            </span>
                        </a>
                        @endif
                        @if($contactSettings->twitter_url)
                        <a href="{{ $contactSettings->twitter_url }}" target="_blank" rel="noopener">
                            <span class="link-effect">
                                <span class="effect-1">Twitter</span>
                                <span class="effect-1">Twitter</span>
                            </span>
                        </a>
                        @endif
                        @if($contactSettings->instagram_url)
                        <a href="{{ $contactSettings->instagram_url }}" target="_blank" rel="noopener">
                            <span class="link-effect">
                                <span class="effect-1">Instagram</span>
                                <span class="effect-1">Instagram</span>
                            </span>
                        </a>
                        @endif
                        @if($contactSettings->youtube_url)
                        <a href="{{ $contactSettings->youtube_url }}" target="_blank" rel="noopener">
                            <span class="link-effect">
                                <span class="effect-1">YouTube</span>
                                <span class="effect-1">YouTube</span>
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact-form">
                    <h2 class="title mb-35">Bize Yazın</h2>
                    <p class="mb-30">Sorularınızı, önerilerinizi ve taleplerinizi aşağıdaki formu kullanarak bize iletebilirsiniz. En kısa sürede size geri dönüş yapacağız.</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="contact_form" class="contact_form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-grid">
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                                <input type="text" id="name" name="name" placeholder="Ad Soyad *" required autocomplete="on" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" id="email" name="email" placeholder="E-posta Adresiniz *" required autocomplete="on" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" id="phone" name="phone" placeholder="Telefon Numarası" autocomplete="off" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <span class="icon"><i class="fa-solid fa-building"></i></span>
                                <select id="department" name="department" class="form-control">
                                    <option value="">Hangi Departman?</option>
                                    <option value="genel">Genel Bilgi</option>
                                    <option value="tesisler">Tesisler</option>
                                    <option value="projeler">Projeler</option>
                                    <option value="ihale">İhale Bilgileri</option>
                                    <option value="insan-kaynaklari">İnsan Kaynakları</option>
                                    <option value="muhasebe">Mali İşler</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                           
                            <input type="text" id="subject" name="subject" placeholder="Konu *" required autocomplete="off" value="{{ old('subject') }}">
                            @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" placeholder="Mesajınızı detaylı olarak yazın *" required rows="6">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group terms">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">Kişisel verilerimin işlenmesine ve KVKK kapsamında değerlendirilmesine onay veriyorum.</label>
                        </div>
                        <button type="submit" class="theme-btn bg-dark mt-35" data-loading-text="Gönderiliyor...">
                            <span class="link-effect">
                                <span class="btn-title">Mesajı Gönder</span>
                            </span><i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim Haritası
==============================-->
<div class="contact-map">
    <div class="container-fluid p-0">
        <div class="row">
            <!--Harita-->
            <div class="map-box">
                @if($contactSettings->map_embed_code)
                    {!! $contactSettings->map_embed_code !!}
                @else
                    <iframe class="map-canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.5!2d36.1611!3d36.2019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152f7b6b8b1c2345%3A0x1234567890abcdef!2sAntakya%2C%20Hatay%2C%20Turkey!5e0!3m2!1str!2str!4v1737096357024!5m2!1str!2str" allowfullscreen="" loading="lazy"></iframe>
                @endif
            </div>
        </div>
    </div>
</div>

<!--==============================
Tesislerimiz Bölümü
==============================-->
<section class="facilities-section space bg-white">
    <div class="container">
        <div class="title-area three text-center">
            <div class="sub-title"><span><i class="asterisk"></i></span>TESİSLERİMİZ</div>
            <h2 class="sec-title">Hatay İmar <span class="bold">tesislerini</span> keşfedin</h2>
            <p class="sec-text text-gray">Şehrimize hizmet eden modern tesislerimiz ile kaliteli hizmet sunuyoruz. <br> Sosyal tesislerden üretim tesislerine kadar geniş bir yelpazede faaliyet gösteriyoruz.</p>
        </div>
        <div class="row gy-30">
            @forelse($facilities as $facility)
                <div class="col-lg-3 col-md-6">
                    <div class="facility-card">
                        <div class="facility-image">
                            <img src="{{ $facility->image ? asset('storage/' . $facility->image) : asset('assets/images/imageshatay/hatay1.jpeg') }}" alt="{{ $facility->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                        </div>
                        <div class="facility-content" style="padding: 20px; text-align: center;">
                            <h4 style="color: #333; margin-bottom: 10px;">{{ $facility->name }}</h4>
                                                            <p style="color: #666; font-size: 14px; margin-bottom: 15px;">{!! $facility->short_description ?: 'Tesisimiz hakkında detaylı bilgi için tıklayın.' !!}</p>
                            <a href="{{ route('facilities.details', $facility->id) }}" class="theme-btn btn-sm">Detayları Gör</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Henüz öne çıkan tesis bulunmamaktadır.</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-40">
            <a href="{{ route('facilities.index') }}" class="theme-btn">
                <span class="link-effect">
                    <span class="btn-title">Tüm Tesisleri Gör</span>
                </span><i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!--==============================
Projelerimiz Bölümü
==============================-->
<section class="projects-section space bg-light">
    <div class="container">
        <div class="title-area three text-center">
            <div class="sub-title"><span><i class="asterisk"></i></span>PROJELERİMİZ</div>
            <h2 class="sec-title">Hatay İmar <span class="bold">projelerini</span> keşfedin</h2>
            <p class="sec-text text-gray">Şehrimizin gelişimi için yürüttüğümüz projeler ile modern yaşam alanları oluşturuyoruz. <br> Planlama aşamasından tamamlanan projelere kadar geniş bir yelpazede hizmet veriyoruz.</p>
        </div>
        <div class="row gy-30">
            @forelse($projects as $project)
                <div class="col-lg-3 col-md-6">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('assets/images/imageshatay/hatay5.jpeg') }}" alt="{{ $project->title }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                        </div>
                        <div class="project-content" style="padding: 20px; text-align: center;">
                            <h4 style="color: #333; margin-bottom: 10px;">{{ $project->title }}</h4>
                                                            <p style="color: #666; font-size: 14px; margin-bottom: 15px;">{!! $project->short_description ?: 'Projemiz hakkında detaylı bilgi için tıklayın.' !!}</p>
                            <a href="{{ route('project.details', $project->id) }}" class="theme-btn btn-sm">Detayları Gör</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Henüz öne çıkan proje bulunmamaktadır.</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-40">
            <a href="{{ route('projects') }}" class="theme-btn">
                <span class="link-effect">
                    <span class="btn-title">Tüm Projeleri Gör</span>
                </span><i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

@endsection 