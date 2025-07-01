@extends('admin.layouts.app')

@section('title', 'Hizmet Düzenle')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hizmet Düzenle</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Geri Dön
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $service->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Kısa Açıklama <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                      id="short_description" name="short_description" rows="3" required>{{ old('short_description', $service->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Detaylı Açıklama <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="8" required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="features" class="form-label">Özellikler</label>
                            <textarea class="form-control @error('features') is-invalid @enderror" 
                                      id="features" name="features" rows="5" 
                                      placeholder="Her satıra bir özellik yazın">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
                            <small class="form-text text-muted">Her satıra bir özellik yazın.</small>
                            @error('features')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="benefits" class="form-label">Faydalar</label>
                            <textarea class="form-control @error('benefits') is-invalid @enderror" 
                                      id="benefits" name="benefits" rows="5" 
                                      placeholder="Her satıra bir fayda yazın">{{ old('benefits', is_array($service->benefits) ? implode("\n", $service->benefits) : '') }}</textarea>
                            <small class="form-text text-muted">Her satıra bir fayda yazın.</small>
                            @error('benefits')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="service_category" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('service_category') is-invalid @enderror" 
                                   id="service_category" name="service_category" value="{{ old('service_category', $service->service_category) }}" required>
                            @error('service_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="icon" class="form-label">İkon Sınıfı</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                   id="icon" name="icon" value="{{ old('icon', $service->icon) }}" 
                                   placeholder="Örn: flaticon-construction">
                            <small class="form-text text-muted">Flaticon veya FontAwesome ikon sınıfı</small>
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Pasif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sıralama</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0">
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_featured') is-invalid @enderror" 
                                       id="is_featured" name="is_featured" value="1" 
                                       {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Öne Çıkan Hizmet
                                </label>
                                @error('is_featured')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Kapak Görseli</label>
                            @if($service->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Mevcut Görsel" class="img-thumbnail" style="max-height: 200px;">
                                    <p class="small text-muted mt-1">Mevcut görsel</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">Yeni görsel yüklerseniz mevcut görsel değiştirilecektir.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Galeri Görselleri</label>
                            @if($service->gallery && count($service->gallery) > 0)
                                <div class="mb-2">
                                    <p class="small text-muted">Mevcut galeri görselleri:</p>
                                    <div class="row g-2">
                                        @foreach($service->gallery as $galleryImage)
                                            <div class="col-4">
                                                <img src="{{ asset('storage/' . $galleryImage) }}" alt="Galeri" class="img-thumbnail" style="max-height: 100px;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                                   id="gallery" name="gallery[]" accept="image/*" multiple>
                            <small class="form-text text-muted">Birden fazla görsel seçebilirsiniz. Yeni görseller mevcut galeriye eklenecektir.</small>
                            @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Güncelle
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> İptal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Features ve Benefits textarea'larını array'e çevir
    document.querySelector('form').addEventListener('submit', function(e) {
        // Features
        let featuresTextarea = document.getElementById('features');
        let featuresArray = featuresTextarea.value.split('\n').filter(item => item.trim() !== '');
        
        if (featuresArray.length > 0) {
            // Hidden inputs oluştur
            featuresArray.forEach(function(feature) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'features[]';
                input.value = feature.trim();
                e.target.appendChild(input);
            });
        }
        
        // Benefits
        let benefitsTextarea = document.getElementById('benefits');
        let benefitsArray = benefitsTextarea.value.split('\n').filter(item => item.trim() !== '');
        
        if (benefitsArray.length > 0) {
            // Hidden inputs oluştur
            benefitsArray.forEach(function(benefit) {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'benefits[]';
                input.value = benefit.trim();
                e.target.appendChild(input);
            });
        }
        
        // Original textarea'ları disable et
        featuresTextarea.disabled = true;
        benefitsTextarea.disabled = true;
    });
</script>
@endpush

@endsection 