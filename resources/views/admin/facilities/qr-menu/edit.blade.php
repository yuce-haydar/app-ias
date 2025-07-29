@extends('admin.layouts.app')

@section('title', 'QR Menü Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ $facility->name }} - QR Menü Düzenle</h3>
                    <a href="{{ route('admin.facilities.show', $facility) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri
                    </a>
                </div>
                <form action="{{ route('admin.facilities.qr-menu.update', $facility) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Menü Adı <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $qrMenu->name) }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="url_slug" class="form-label">URL Slug <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('url_slug') is-invalid @enderror" 
                                           id="url_slug" 
                                           name="url_slug" 
                                           value="{{ old('url_slug', $qrMenu->url_slug) }}" 
                                           required>
                                    <div class="form-text">
                                        Menü URL'i: <strong>{{ url('/qr-menu/') }}/</strong><span id="slug-preview">{{ old('url_slug', $qrMenu->url_slug) }}</span>
                                    </div>
                                    @error('url_slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description', $qrMenu->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" 
                                           class="form-control @error('logo') is-invalid @enderror" 
                                           id="logo" 
                                           name="logo" 
                                           accept="image/*">
                                    <div class="form-text">PNG, JPG, JPEG formatlarında yükleyebilirsiniz. (Mevcut logoyu değiştirmek için yeni bir dosya seçin)</div>
                                    @if($qrMenu->logo)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $qrMenu->logo) }}" 
                                                 alt="Mevcut Logo" 
                                                 class="img-thumbnail" 
                                                 style="max-width: 100px;">
                                        </div>
                                    @endif
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Tema Renkleri</h5>
                            </div>
                            @php
                                $themeColors = $qrMenu->theme_colors ?? [];
                                $primaryColor = $themeColors['primary'] ?? '#007bff';
                                $secondaryColor = $themeColors['secondary'] ?? '#6c757d';
                                $accentColor = $themeColors['accent'] ?? '#28a745';
                                $backgroundColor = $themeColors['background'] ?? '#ffffff';
                            @endphp
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="primary_color" class="form-label">Ana Renk</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('primary_color') is-invalid @enderror" 
                                           id="primary_color" 
                                           name="primary_color" 
                                           value="{{ old('primary_color', $primaryColor) }}">
                                    @error('primary_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="secondary_color" class="form-label">İkincil Renk</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('secondary_color') is-invalid @enderror" 
                                           id="secondary_color" 
                                           name="secondary_color" 
                                           value="{{ old('secondary_color', $secondaryColor) }}">
                                    @error('secondary_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="accent_color" class="form-label">Vurgu Rengi</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('accent_color') is-invalid @enderror" 
                                           id="accent_color" 
                                           name="accent_color" 
                                           value="{{ old('accent_color', $accentColor) }}">
                                    @error('accent_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="background_color" class="form-label">Arka Plan Rengi</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('background_color') is-invalid @enderror" 
                                           id="background_color" 
                                           name="background_color" 
                                           value="{{ old('background_color', $backgroundColor) }}">
                                    @error('background_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mevcut QR Kod Bilgisi -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-info">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="fas fa-qrcode"></i> Mevcut QR Kod Bilgileri
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <td><strong>Menü URL:</strong></td>
                                                        <td>
                                                            <a href="{{ $qrMenu->qr_url }}" 
                                                               target="_blank" 
                                                               class="text-decoration-none">
                                                                {{ $qrMenu->qr_url }}
                                                                <i class="fas fa-external-link-alt ms-1"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Yönetici Paneli:</strong></td>
                                                        <td>
                                                            <a href="{{ url('/qr-menu/' . $qrMenu->url_slug . '/yonetici') }}" 
                                                               target="_blank" 
                                                               class="text-decoration-none">
                                                                {{ url('/qr-menu/' . $qrMenu->url_slug . '/yonetici') }}
                                                                <i class="fas fa-external-link-alt ms-1"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Kategori Sayısı:</strong></td>
                                                        <td>{{ $qrMenu->menuCategories->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Ürün Sayısı:</strong></td>
                                                        <td>{{ $qrMenu->menuCategories->sum(function($category) { return $category->menuItems->count(); }) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Kullanıcı Sayısı:</strong></td>
                                                        <td>{{ $qrMenu->qrMenuUsers->count() }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                @if($qrMenu->qr_code_path)
                                                    <div class="mb-2">
                                                        <strong>QR Kod:</strong>
                                                    </div>
                                                    <div class="qr-code-container">
                                                        <img src="{{ asset('storage/' . $qrMenu->qr_code_path) }}" 
                                                             class="img-fluid border rounded" 
                                                             style="max-width: 120px; background: white; padding: 10px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.facilities.show', $facility) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> İptal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .qr-code-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush

@push('scripts')
<script>
    // URL slug önizlemesini güncelle
    document.getElementById('url_slug').addEventListener('input', function() {
        document.getElementById('slug-preview').textContent = this.value;
    });
    
    // Menü adından otomatik slug oluştur
    document.getElementById('name').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/ğ/g, 'g')
            .replace(/ü/g, 'u')
            .replace(/ş/g, 's')
            .replace(/ı/g, 'i')
            .replace(/ö/g, 'o')
            .replace(/ç/g, 'c')
            .replace(/[^a-z0-9]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        
        document.getElementById('url_slug').value = slug;
        document.getElementById('slug-preview').textContent = slug;
    });
</script>
@endpush 