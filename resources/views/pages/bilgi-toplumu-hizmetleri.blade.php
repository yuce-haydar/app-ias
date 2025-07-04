@extends('layouts.app')

@section('title', 'Bilgi Toplumu Hizmetleri')

@section('content')
<!--==============================
    Breadcrumb
============================== -->
<div class="breadcrumb-section" style="background-image: url({{ asset('assets/images/imageshatay/hatay6.jpeg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="breadcrumb-title">Bilgi Toplumu Hizmetleri</h2>
                    <ul class="breadcrumb-link">
                        <li><a href="{{ route('home') }}">Anasayfa</a></li>
                        <li class="active">Bilgi Toplumu Hizmetleri</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
    Firma Bilgileri Tablosu
============================== -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="company-info-table">
                    <h2 class="text-center mb-4">Firma Bilgileri</h2>
                    <table class="table table-bordered">
                        <tbody>
                            @foreach($informationServices as $service)
                                <tr>
                                    <td><strong>{{ $service->title }}</strong></td>
                                    <td>{!! $service->value !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==============================
    Belgeler Alanı
============================== -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="documents-section">
                    <h2 class="text-center mb-4">Belgeler</h2>
                    <div class="documents-content">
                        @php $hasDocuments = $informationServices->where('document', '!=', null)->count() > 0; @endphp
                        
                        @if($hasDocuments)
                            <div class="row">
                                @foreach($informationServices->where('document', '!=', null) as $service)
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="document-card">
                                            <div class="document-icon">
                                                <i class="fas fa-file-alt"></i>
                                            </div>
                                            <div class="document-info">
                                                <h5>{{ $service->title }}</h5>
                                                <a href="{{ $service->document_url }}" target="_blank" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-download"></i> İndir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center text-muted">Henüz belge eklenmemiş.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.section-padding {
    padding: 80px 0;
}

.company-info-table {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.company-info-table h2 {
    color: #333;
    margin-bottom: 30px;
}

.table {
    margin-bottom: 0;
}

.table td {
    padding: 15px;
    vertical-align: middle;
    border: 1px solid #dee2e6;
}

.table td:first-child {
    background-color: #f8f9fa;
    width: 30%;
    font-weight: bold;
    color: #495057;
}

.table td:last-child {
    background-color: #fff;
    color: #333;
}

.table a {
    color: #cf9f38;
    text-decoration: none;
}

.table a:hover {
    text-decoration: underline;
}

.documents-section {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.documents-section h2 {
    color: #333;
    margin-bottom: 30px;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.document-card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.document-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.document-icon {
    font-size: 3rem;
    color: #cf9f38;
    margin-bottom: 15px;
}

.document-info h5 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.1rem;
}

.document-info .btn {
    background-color: #cf9f38;
    border-color: #cf9f38;
}

.document-info .btn:hover {
    background-color: #b8902f;
    border-color: #b8902f;
}
</style>
@endsection 