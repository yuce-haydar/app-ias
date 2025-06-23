@extends('layouts.app')

@section('title', 'Şartlar ve Koşullar - Nexta Danışmanlık')

@section('content')
<!--==============================
    Breadcrumb Bölümü
==============================-->
<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İnternet Sitesi Kullanım Sözleşmesi</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('legal') }}">KVKK</a></li>
                    <li>İnternet Sitesi Kullanım Sözleşmesi</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--==============================
    İçerik Bölümü
==============================-->
<section class="space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="content-section">
                        <h2>1. Genel Şartlar</h2>
                        <p>Bu şartlar ve koşullar, Nexta Danışmanlık'ın sunduğu hizmetler için geçerlidir. Hizmetlerimizi kullanarak bu şartlara uymayı kabul etmiş olursunuz.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>2. Hizmet Kapsamı</h2>
                        <p>Nexta Danışmanlık, işletmelere yönelik danışmanlık hizmetleri sunar. Bu hizmetler profesyonel standartlarda sunulur ve müşteri memnuniyeti önceliğimizdir.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>3. Ücretlendirme</h2>
                        <p>Hizmet ücretleri önceden belirlenir ve müşteri ile yazılı anlaşma yapılır. Ücret değişiklikleri müşteriye önceden bildirilir.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>4. Gizlilik</h2>
                        <p>Müşteri bilgileri kesinlikle gizli tutulur ve üçüncü şahıslarla paylaşılmaz. Bu gizlilik yükümlülüğü sözleşme sona erdikten sonra da devam eder.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>5. Sorumluluk</h2>
                        <p>Nexta Danışmanlık, verdiği tavsiyelerin sonuçlarından doğacak zararlardan sorumlu değildir. Danışmanlık hizmetleri tavsiye niteliğindedir.</p>
                    </div>
                    
                    <div class="content-section">
                        <h2>6. İletişim</h2>
                        <p>Bu şartlar ve koşullar hakkında sorularınız için bizimle iletişime geçebilirsiniz.</p>
                        <div class="contact-info mt-4">
                            <p><strong>E-posta:</strong> info@nexta.com.tr</p>
                            <p><strong>Telefon:</strong> +90 (212) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 