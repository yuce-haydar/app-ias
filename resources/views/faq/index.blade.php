@extends('layouts.app')

@section('title', 'Sık Sorulan Sorular - Hatay İmar')
@section('description', 'Hatay İmar hizmetleri hakkında sık sorulan sorular ve yanıtları.')
@section('keywords', 'hatay imar, SSS, sık sorulan sorular, sosyal tesis, parke taşı, otopark, büz üretim')

@section('content')

<!-- Breadcrumb Bölümü -->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">Sık Sorulan Sorular</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li>Sık Sorulan Sorular</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--==============================
SSS Bölümü
==============================-->
<section class="faq-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-thumb">
                    <img src="{{ asset('assets/images/imageshatay/hatay8.jpeg') }}" alt="Hatay İmar SSS">
                    <div class="faq-shape">
                        <img src="{{ asset('assets/images/faq/circle-shape.png') }}" alt="Shape">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-content">
                    <div class="title-area">
                        <div class="sub-title"><span><i class="asterisk"></i></span>SIK SORULAN SORULAR</div>
                        <h2 class="sec-title">Merak ettiğiniz <span class="bold">soruların</span> yanıtları</h2>
                        <p class="sec-text">Hatay İmar hizmetlerimiz hakkında sıkça sorulan soruları ve detaylı yanıtlarını aşağıda bulabilirsiniz.</p>
                    </div>
                    
                    <div class="faq-accordion">
                        @foreach($faqs as $category => $categoryFaqs)
                            <h4 class="category-title mt-4 mb-3">{{ $category }}</h4>
                            <div class="accordion" id="faqAccordion{{ str_replace(' ', '', $category) }}">
                                @foreach($categoryFaqs as $index => $faq)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="faq{{ $category }}{{ $index }}">
                                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                                    type="button" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#collapse{{ $category }}{{ $index }}" 
                                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" 
                                                    aria-controls="collapse{{ $category }}{{ $index }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h3>
                                        <div id="collapse{{ $category }}{{ $index }}" 
                                             class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                             aria-labelledby="faq{{ $category }}{{ $index }}" 
                                             data-bs-parent="#faqAccordion{{ str_replace(' ', '', $category) }}">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
İletişim CTA Bölümü
==============================-->
<section class="cta-section bg-dark">
    <div class="container">
        <div class="cta-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content">
                        <h3 class="title">Sorunuz yanıtlanmadı mı?</h3>
                        <p class="text">Merak ettiğiniz konular hakkında detaylı bilgi almak için bizimle iletişime geçin. Hatay İmar ekibimiz size yardımcı olmaktan memnuniyet duyacaktır.</p>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="theme-btn bg-white text-dark">
                        <span class="link-effect">
                            <span class="effect-1">Bize Ulaşın</span>
                            <span class="effect-1">Bize Ulaşın</span>
                        </span><i class="fa-regular fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 