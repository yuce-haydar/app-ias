@extends('admin.layouts.app')

@section('title', 'Tesis Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ $facility->name }}</h3>
                    <div>
                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Ana Bilgiler -->
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-3">Genel Bilgiler</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Tesis Adı:</strong></td>
                                            <td>{{ $facility->name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tesis Tipi:</strong></td>
                                            <td>{{ $facility->facility_type }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kategori:</strong></td>
                                            <td>{{ $facility->category ?: 'Belirtilmemiş' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kapasite:</strong></td>
                                            <td>{{ $facility->capacity ?: 'Belirtilmemiş' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Açılış Tarihi:</strong></td>
                                            <td>{{ $facility->opening_date ? date('d.m.Y', strtotime($facility->opening_date)) : 'Belirtilmemiş' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Durum:</strong></td>
                                            <td>
                                                @if($facility->status == 'active')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Öne Çıkan:</strong></td>
                                            <td>
                                                @if($facility->is_featured)
                                                    <span class="badge bg-warning">Evet</span>
                                                @else
                                                    <span class="badge bg-secondary">Hayır</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <div class="col-md-6">
                                    <h5 class="text-primary mb-3">İletişim Bilgileri</h5>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Telefon:</strong></td>
                                            <td>{{ $facility->phone ?: 'Belirtilmemiş' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>E-posta:</strong></td>
                                            <td>{{ $facility->email ?: 'Belirtilmemiş' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Çalışma Saatleri:</strong></td>
                                            <td>
                                                @if($facility->working_hours)
                                                    @if(is_array($facility->working_hours))
                                                        @foreach($facility->working_hours as $hour)
                                                            <span class="badge bg-info me-1">{{ $hour }}</span>
                                                        @endforeach
                                                    @else
                                                        {{ $facility->working_hours }}
                                                    @endif
                                                @else
                                                    Belirtilmemiş
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Açıklamalar -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">Açıklamalar</h5>
                                    <div class="mb-3">
                                        <h6>Kısa Açıklama</h6>
                                        <p class="text-muted">{{ $facility->short_description }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <h6>Detaylı Açıklama</h6>
                                        <div class="border rounded p-3 bg-light">
                                            {!! nl2br(e($facility->description)) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Özellikler -->
                            @if($facility->features)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">Özellikler</h5>
                                    <div class="row">
                                        @if(is_array($facility->features))
                                            @foreach($facility->features as $feature)
                                                <div class="col-md-6 mb-2">
                                                    <i class="fas fa-check text-success me-2"></i>{{ $feature }}
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-12">
                                                <p>{{ $facility->features }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Konum Bilgileri -->
                            @if($facility->address || $facility->google_maps_link)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="text-primary mb-3">Konum Bilgileri</h5>
                                    @if($facility->address)
                                        <div class="mb-3">
                                            <h6>Adres</h6>
                                            <p class="text-muted">{{ $facility->address }}</p>
                                        </div>
                                    @endif
                                    @if($facility->google_maps_link)
                                        <div class="mb-3">
                                            <h6>Google Maps</h6>
                                            <a href="{{ $facility->google_maps_link }}" target="_blank" class="btn btn-outline-primary">
                                                <i class="fas fa-map-marker-alt"></i> Haritada Görüntüle
                                            </a>
                                        </div>
                                    @endif
                                    @if($facility->latitude && $facility->longitude)
                                        <div class="mb-3">
                                            <h6>Koordinatlar</h6>
                                            <p class="text-muted">
                                                <strong>Enlem:</strong> {{ $facility->latitude }}<br>
                                                <strong>Boylam:</strong> {{ $facility->longitude }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Görseller -->
                        <div class="col-md-4">
                            <!-- Ana Görsel -->
                            @if($facility->image)
                            <div class="mb-4">
                                <h5 class="text-primary mb-3">Ana Görsel</h5>
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $facility->image) }}" 
                                         class="img-fluid rounded shadow-sm" 
                                         style="max-height: 250px; object-fit: cover;">
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $facility->image) }}" 
                                           target="_blank" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-expand"></i> Büyük Görüntüle
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Galeri -->
                            @if($facility->gallery && count($facility->gallery) > 0)
                            <div class="mb-4">
                                <h5 class="text-primary mb-3">Galeri ({{ count($facility->gallery) }} Görsel)</h5>
                                <div class="row g-2">
                                    @foreach($facility->gallery as $index => $image)
                                        <div class="col-6">
                                            <div class="gallery-item">
                                                <img src="{{ asset('storage/' . $image) }}" 
                                                     class="img-fluid rounded shadow-sm" 
                                                     style="height: 100px; width: 100%; object-fit: cover;">
                                                <div class="mt-1 text-center">
                                                    <a href="{{ asset('storage/' . $image) }}" 
                                                       target="_blank" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            <!-- Teknik Bilgiler -->
                            <div class="mb-4">
                                <h5 class="text-primary mb-3">Teknik Bilgiler</h5>
                                <div class="border rounded p-3 bg-light">
                                    <table class="table table-sm table-borderless mb-0">
                                        <tr>
                                            <td><strong>Sıralama:</strong></td>
                                            <td>{{ $facility->sort_order ?: 'Otomatik' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Oluşturma:</strong></td>
                                            <td>{{ $facility->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Güncelleme:</strong></td>
                                            <td>{{ $facility->updated_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Hızlı İşlemler -->
                            <div class="mb-4">
                                <h5 class="text-primary mb-3">Hızlı İşlemler</h5>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Düzenle
                                    </a>
                                    @if($facility->status == 'active')
                                        <button type="button" class="btn btn-outline-secondary" disabled>
                                            <i class="fas fa-eye"></i> Aktif
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-outline-danger" disabled>
                                            <i class="fas fa-eye-slash"></i> Pasif
                                        </button>
                                    @endif
                                    <a href="{{ route('facilities.details', $facility->id) }}" 
                                       target="_blank" 
                                       class="btn btn-outline-info">
                                        <i class="fas fa-external-link-alt"></i> Önizle
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .gallery-item {
        transition: transform 0.2s;
    }
    
    .gallery-item:hover {
        transform: scale(1.05);
    }
    
    .table-borderless td {
        padding: 0.5rem 0.75rem;
    }
    
    .badge {
        font-size: 0.75em;
    }
</style>
@endpush 