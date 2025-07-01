@extends('layouts.app')

@section('title', $teamMember->name . ' - Hatay İmar')
@section('description', $teamMember->description ?? $teamMember->bio)
@section('keywords', 'ekip detayı, uzman, deneyim, biyografi')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Ekip Detayı</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('team') }}">Ekip</a></li>
                    <li>{{ $teamMember->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Ekip Detay Bölümü
==============================-->
<section class="team-details-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-details-thumb">
                    <img src="{{ asset($teamMember->image) }}" alt="{{ $teamMember->name }}">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="team-details-content">
                    <h2 class="name">{{ $teamMember->name }}</h2>
                    <p class="designation">{{ $teamMember->position }}</p>
                    
                    <div class="team-info">
                        <h4>İletişim Bilgileri</h4>
                        <ul class="team-contact">
                            <li><strong>E-posta:</strong> {{ $teamMember->email }}</li>
                            <li><strong>Telefon:</strong> {{ $teamMember->phone }}</li>
                            @if($teamMember->social_linkedin)
                                <li><strong>LinkedIn:</strong> <a href="{{ $teamMember->social_linkedin }}" target="_blank">{{ parse_url($teamMember->social_linkedin)['path'] ?? 'LinkedIn Profili' }}</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="team-bio">
                        <h4>Biyografi</h4>
                        <p>{{ $teamMember->bio }}</p>
                        
                        @if($teamMember->experience_years)
                            <p class="mt-3"><strong>Deneyim:</strong> {{ $teamMember->experience_years }} yıl</p>
                        @endif
                    </div>

                    @if($teamMember->specialties && count($teamMember->specialties) > 0)
                        <div class="team-skills">
                            <h4>Uzmanlık Alanları</h4>
                            <div class="skills-list">
                                @foreach($teamMember->specialties as $specialty)
                                    <span class="skill-tag">{{ $specialty }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($teamMember->education && count($teamMember->education) > 0)
                        <div class="team-education mt-4">
                            <h4>Eğitim</h4>
                            <ul>
                                @foreach($teamMember->education as $edu)
                                    <li>{{ $edu }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="team-social">
                        <h4>Sosyal Medya</h4>
                        <div class="social-links">
                            @if($teamMember->social_linkedin)
                                <a href="{{ $teamMember->social_linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if($teamMember->social_twitter)
                                <a href="{{ $teamMember->social_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if($teamMember->social_facebook)
                                <a href="{{ $teamMember->social_facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($teamMember->social_instagram)
                                <a href="{{ $teamMember->social_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($relatedMembers && $relatedMembers->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">İlgili Ekip Üyeleri</h3>
                </div>
                @foreach($relatedMembers as $related)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-box">
                            <div class="team-thumb">
                                <img src="{{ asset($related->image) }}" alt="{{ $related->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                            </div>
                            <div class="team-content">
                                <h4 class="name">
                                    <a href="{{ route('team.details', ['id' => $related->id]) }}">{{ $related->name }}</a>
                                </h4>
                                <p class="designation">{{ $related->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection 