@extends('layouts.app')

@section('title', 'Ekip - Hatay İmar')
@section('description', 'Hatay İmar\'ın deneyimli ekip üyeleri. Şehrimize hizmet eden uzman kadromuz.')
@section('keywords', 'ekip, hatay imar, uzmanlar, belediye, şehir yönetimi')

@section('content')

<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Ekip</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li>Ekip</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
Ekip Bölümü
==============================-->
<section class="team-section space bg-theme3">
    <div class="container">
        <div class="title-area text-center">
            <div class="sub-title"><span><i class="asterisk"></i></span>EKİBİMİZ</div>
            <h2 class="sec-title mb-60">Hatay İmar <span class="bold">Uzman</span> Kadro</h2>
            <p class="sec-text">Şehrimizin gelişimi için çalışan deneyimli ekip üyelerimiz <br> ile Hatay'ın geleceğini birlikte inşa ediyoruz.</p>
        </div>
        
        <div class="row gy-30">
       
            @foreach($teamMembers as $member)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-single-box">
                        <div class="team-thumb">
                            <div class="team-overlay">
                                <div class="team-social">
                                    @if($member->social_facebook)
                                        <a href="{{ $member->social_facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if($member->social_twitter)
                                        <a href="{{ $member->social_twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    @endif
                                    @if($member->social_linkedin)
                                        <a href="{{ $member->social_linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    @endif
                                    @if($member->social_instagram)
                                        <a href="{{ $member->social_instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h4 class="name"><a href="{{ route('team.details', ['id' => $member->id]) }}">{{ $member->name }}</a></h4>
                            <p class="designation">{{ $member->position }}</p>
                            <p class="text">{{ $member->description ?? Str::limit($member->bio, 80) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($teamMembers->hasPages())
            <div class="row mt-50">
                <div class="col-12">
                    <div class="pagination-wrapper text-center">
                        {{ $teamMembers->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection 
 