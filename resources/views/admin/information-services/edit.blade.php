@extends('admin.layouts.app')

@section('title', 'Bilgi Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Bilgi Düzenle</h3>
                    <a href="{{ route('admin.information-services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.information-services.update', $informationService) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Başlık *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $informationService->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                           id="order" name="order" value="{{ old('order', $informationService->order) }}" min="0">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="value" class="form-label">Değer</label>
                            <textarea class="form-control @error('value') is-invalid @enderror" 
                                      id="value" name="value" rows="3">{{ old('value', $informationService->value) }}</textarea>
                            <small class="form-text text-muted">Eğer değer yoksa bu sadece belge olarak görünür</small>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="document" class="form-label">Belge</label>
                            @if($informationService->document)
                                <div class="mb-2">
                                    <a href="{{ $informationService->document_url }}" target="_blank" class="btn btn-sm btn-info">
                                        <i class="fas fa-download"></i> Mevcut Belgeyi İndir
                                    </a>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('document') is-invalid @enderror" 
                                   id="document" name="document" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <small class="form-text text-muted">
                                Desteklenen formatlar: PDF, DOC, DOCX, JPG, JPEG, PNG (Maksimum 5MB)
                                @if($informationService->document)
                                    <br>Yeni belge seçerseniz mevcut belge değiştirilecektir.
                                @endif
                            </small>
                            @error('document')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $informationService->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktif
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Güncelle
                            </button>
                            <a href="{{ route('admin.information-services.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> İptal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 