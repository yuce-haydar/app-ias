@extends('layouts.app')

@section('title', 'Bilgi Toplumu Hizmetleri')

@section('content')
<!--==============================
    Breadcrumb
============================== -->
<div class="breadcrumb-section" style="background-image: url({{ asset('assets/images/hh.png') }});">
    <div class="container" style="margin-top: 100px; position: relative;">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content text-center" style="margin-top: 100px; position: relative;">
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
                                    <td>
                                        @if(!empty($service->value))
                                            {!! $service->value !!}
                                        @elseif($service->document)
                                            <button type="button" class="btn btn-info btn-sm table-view-btn" onclick="scrollToDocument('document-{{ $service->id }}')">
                                                <i class="fas fa-eye"></i> Görüntüle
                                            </button>
                                        @else
                                            <span class="text-muted">Bilgi girilmemiş</span>
                                        @endif
                                    </td>
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
<section class="section-padding bg-light" id="documents-section" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="documents-section">
                    <h2 class="text-center mb-4">Belgeler</h2>
                    <div class="documents-content">
                        @php 
                            $documentsWithFiles = $informationServices->where('document', '!=', null);
                            $hasDocuments = $documentsWithFiles->count() > 0; 
                        @endphp
                        
                        @if($hasDocuments)
                            @foreach($documentsWithFiles as $index => $service)
                                <div class="document-viewer-section mb-5" id="document-{{ $service->id }}">
                                    <div class="document-header">
                                        <h4 class="document-title">{{ $service->title }}</h4>
                                        <div class="document-actions">
                                            <a href="{{ $service->document_url }}" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="fas fa-download"></i> İndir
                                            </a>
                                            <a href="{{ $service->document_url }}" target="_blank" class="btn btn-info btn-sm">
                                                <i class="fas fa-external-link-alt"></i> Yeni Sekmede Aç
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="document-viewer">
                                        @php
                                            $fileExtension = pathinfo($service->document_url, PATHINFO_EXTENSION);
                                            $fileName = pathinfo($service->document_url, PATHINFO_FILENAME);
                                        @endphp
                                        
                                        @if(in_array(strtolower($fileExtension), ['pdf']))
                                            <!-- PDF Viewer -->
                                            <div class="pdf-viewer-container">
                                                <iframe src="{{ $service->document_url }}" 
                                                        class="document-iframe" 
                                                        title="{{ $service->title }}"
                                                        loading="lazy">
                                                    <p>PDF görüntülenemiyor. <a href="{{ $service->document_url }}" target="_blank">Buraya tıklayarak açabilirsiniz.</a></p>
                                                </iframe>
                                            </div>
                                        @elseif(in_array(strtolower($fileExtension), ['xlsx', 'xls', 'csv']))
                                            <!-- Excel/CSV Viewer -->
                                            <div class="excel-viewer-container">
                                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode($service->document_url) }}" 
                                                        class="document-iframe" 
                                                        title="{{ $service->title }}"
                                                        loading="lazy">
                                                    <p>Excel dosyası görüntülenemiyor. <a href="{{ $service->document_url }}" target="_blank">Buraya tıklayarak açabilirsiniz.</a></p>
                                                </iframe>
                                            </div>
                                        @elseif(in_array(strtolower($fileExtension), ['docx', 'doc']))
                                            <!-- Word Viewer -->
                                            <div class="word-viewer-container">
                                                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ urlencode($service->document_url) }}" 
                                                        class="document-iframe" 
                                                        title="{{ $service->title }}"
                                                        loading="lazy">
                                                    <p>Word dosyası görüntülenemiyor. <a href="{{ $service->document_url }}" target="_blank">Buraya tıklayarak açabilirsiniz.</a></p>
                                                </iframe>
                                            </div>
                                        @else
                                            <!-- Genel Dosya Görüntüleyici -->
                                            <div class="generic-file-viewer">
                                                <div class="file-preview">
                                                    <div class="file-icon">
                                                        <i class="fas fa-file-alt"></i>
                                                    </div>
                                                    <div class="file-info">
                                                        <h5>{{ $service->title }}</h5>
                                                        <p class="file-type">{{ strtoupper($fileExtension) }} Dosyası</p>
                                                        <p class="text-muted">Bu dosya türü direkt görüntülenemiyor.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                @if(!$loop->last)
                                    <hr class="document-separator">
                                @endif
                            @endforeach
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
    padding: 18px;
    vertical-align: middle;
    border: 1px solid #dee2e6;
    line-height: 1.6;
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
    width: 70%;
}

.table td:last-child .table-view-btn {
    margin-top: 2px;
}

.table a {
    color: #cf9f38;
    text-decoration: none;
}

.table a:hover {
    text-decoration: underline;
}

.text-muted {
    color: #6c757d !important;
}

.table-view-btn {
    background-color: #cf9f38 !important;
    border-color: #cf9f38 !important;
    color: white !important;
    padding: 8px 16px !important;
    border-radius: 5px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    border: none !important;
    box-shadow: 0 2px 4px rgba(207, 159, 56, 0.2) !important;
}

.table-view-btn:hover {
    background-color: #b8902f !important;
    border-color: #b8902f !important;
    color: white !important;
    box-shadow: 0 4px 8px rgba(207, 159, 56, 0.3) !important;
    transform: translateY(-1px) !important;
}

.table-view-btn:focus {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(207, 159, 56, 0.2) !important;
}

.table-view-btn i {
    font-size: 12px !important;
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

#documents-section {
    transition: all 0.3s ease-in-out;
}

.document-viewer-section {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
    scroll-margin-top: 120px; /* Scroll offset için */
}

.document-header {
    background: linear-gradient(135deg, #cf9f38, #b8902f);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.document-title {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
}

.document-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.document-actions .btn {
    min-width: 100px;
    transition: all 0.3s ease;
}

.document-actions .btn-primary {
    background-color: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.3);
    color: white;
}

.document-actions .btn-primary:hover {
    background-color: rgba(255,255,255,0.3);
    border-color: rgba(255,255,255,0.5);
    color: white;
}

.document-actions .btn-info {
    background-color: rgba(255,255,255,0.1);
    border-color: rgba(255,255,255,0.2);
    color: white;
}

.document-actions .btn-info:hover {
    background-color: rgba(255,255,255,0.2);
    border-color: rgba(255,255,255,0.4);
    color: white;
}

.document-viewer {
    padding: 0;
    background: #f8f9fa;
}

.document-iframe {
    width: 100%;
    height: 600px;
    border: none;
    display: block;
}

.pdf-viewer-container,
.excel-viewer-container,
.word-viewer-container {
    position: relative;
    background: #fff;
}

.generic-file-viewer {
    padding: 40px;
    text-align: center;
}

.file-preview {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.file-icon {
    font-size: 4rem;
    color: #cf9f38;
}

.file-info h5 {
    margin: 0 0 10px 0;
    color: #333;
}

.file-type {
    font-weight: 600;
    color: #cf9f38;
    margin-bottom: 5px;
}

.document-separator {
    border: none;
    height: 2px;
    background: linear-gradient(to right, transparent, #cf9f38, transparent);
    margin: 3rem 0;
}

/* Loading State */
.document-iframe[loading="lazy"] {
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="20" fill="none" stroke="%23cf9f38" stroke-width="2" stroke-dasharray="31.416" stroke-dashoffset="31.416"><animate attributeName="stroke-dasharray" dur="2s" values="0 31.416;15.708 15.708;0 31.416" repeatCount="indefinite"/><animate attributeName="stroke-dashoffset" dur="2s" values="0;-15.708;-31.416" repeatCount="indefinite"/></circle></svg>') center center no-repeat;
    background-size: 50px 50px;
}

@media (max-width: 768px) {
    .document-header {
        flex-direction: column;
        text-align: center;
    }
    
    .document-actions {
        width: 100%;
        justify-content: center;
    }
    
    .document-actions .btn {
        min-width: 120px;
    }
    
    .document-iframe {
        height: 400px;
    }
    
    .file-icon {
        font-size: 3rem;
    }
    
    .table td:first-child {
        width: 40%;
    }
    
    .table td:last-child {
        width: 60%;
    }
}

@media (max-width: 576px) {
    .document-actions {
        flex-direction: column;
        width: 100%;
    }
    
    .document-actions .btn {
        width: 100%;
    }
    
    .document-iframe {
        height: 300px;
    }
    
    .table td {
        display: block;
        width: 100% !important;
        text-align: left !important;
    }
}
</style>

<script>
// Document loading feedback
document.addEventListener('DOMContentLoaded', function() {
    const iframes = document.querySelectorAll('.document-iframe');
    
    iframes.forEach(function(iframe) {
        const container = iframe.closest('.document-viewer');
        
        // Loading başlangıcı
        iframe.addEventListener('load', function() {
            // İframe yüklendiğinde loading state'i kaldır
            iframe.style.background = 'none';
            
            // Başarılı yükleme bildirimi (isteğe bağlı)
            console.log('Belge yüklendi:', iframe.title);
        });
        
        // Hata durumu
        iframe.addEventListener('error', function() {
            // Iframe yüklenemediğinde hata mesajı göster
            const errorDiv = document.createElement('div');
            errorDiv.className = 'document-error';
            errorDiv.innerHTML = `
                <div class="text-center p-5">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Belge yüklenemedi</h5>
                    <p class="text-muted">Belge görüntülenemiyor. Lütfen indirme seçeneğini kullanın.</p>
                </div>
            `;
            
            // Iframe'i gizle ve hata mesajını göster
            iframe.style.display = 'none';
            container.appendChild(errorDiv);
        });
    });
    
    // Lazy loading için intersection observer
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const iframe = entry.target;
                    if (iframe.dataset.src) {
                        iframe.src = iframe.dataset.src;
                        iframe.removeAttribute('data-src');
                        observer.unobserve(iframe);
                    }
                }
            });
        });
        
        // Lazy loading için hazırla
        document.querySelectorAll('iframe[data-src]').forEach(function(iframe) {
            imageObserver.observe(iframe);
        });
    }
});

// Smooth scroll to document sections
function scrollToDocument(documentId) {
    // Önce belgeler bölümünü göster
    const documentsSection = document.getElementById('documents-section');
    if (documentsSection) {
        documentsSection.style.display = 'block';
    }
    
    // Kısa bir gecikme ile scroll yap (DOM güncellemesi için)
    setTimeout(function() {
        const element = document.getElementById(documentId);
        if (element) {
            element.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }, 100);
}

// Print specific document
function printDocument(documentUrl) {
    const printWindow = window.open(documentUrl, '_blank');
    printWindow.addEventListener('load', function() {
        printWindow.print();
    });
}
</script>
@endsection 