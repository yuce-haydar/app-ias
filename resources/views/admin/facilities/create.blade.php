@extends("admin.layouts.app")

@section('title', 'Yeni Tesis Ekle')
@section('page-title', 'Yeni Tesis Ekle')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tesis Bilgileri</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <!-- Temel Bilgiler -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tesis Adı <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Kısa Açıklama <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                  id="short_description" name="short_description" rows="2" required>{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Detaylı Açıklama <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="facility_type" class="form-label">Tesis Türü <span class="text-danger">*</span></label>
                            <select class="form-select @error('facility_type') is-invalid @enderror" 
                                    id="facility_type" name="facility_type" required>
                                <option value="">Seçiniz</option>
                                <option value="Üretim Tesisi" {{ old('facility_type') == 'Üretim Tesisi' ? 'selected' : '' }}>Üretim Tesisi</option>
                                <option value="Sosyal Tesis" {{ old('facility_type') == 'Sosyal Tesis' ? 'selected' : '' }}>Sosyal Tesis</option>
                                <option value="Otopark" {{ old('facility_type') == 'Otopark' ? 'selected' : '' }}>Otopark</option>
                            </select>
                            @error('facility_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                   id="category" name="category" value="{{ old('category') }}" 
                                   placeholder="Örn: Beton Ürünleri, Rekreasyon">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Pasif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="opening_date" class="form-label">Açılış Tarihi</label>
                            <input type="date" class="form-control @error('opening_date') is-invalid @enderror" 
                                   id="opening_date" name="opening_date" value="{{ old('opening_date') }}">
                            @error('opening_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="capacity" class="form-label">Kapasite</label>
                            <input type="text" class="form-control @error('capacity') is-invalid @enderror" 
                                   id="capacity" name="capacity" value="{{ old('capacity') }}" 
                                   placeholder="Örn: 300 araç, 500 kişi">
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- İletişim Bilgileri -->
                    <h6 class="mb-3 text-muted">İletişim Bilgileri</h6>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Adres</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" 
                                  id="address" name="address" rows="2">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="google_maps_link" class="form-label">Google Maps Linki</label>
                        <input type="url" class="form-control @error('google_maps_link') is-invalid @enderror" 
                               id="google_maps_link" name="google_maps_link" value="{{ old('google_maps_link') }}">
                        @error('google_maps_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Enlem (Latitude)</label>
                            <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror" 
                                   id="latitude" name="latitude" value="{{ old('latitude') }}">
                            @error('latitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Boylam (Longitude)</label>
                            <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror" 
                                   id="longitude" name="longitude" value="{{ old('longitude') }}">
                            @error('longitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Görsel ve Diğer Ayarlar -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Ana Görsel</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="gallery" class="form-label">Galeri Görselleri</label>
                        <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                               id="gallery" name="gallery[]" accept="image/*" multiple>
                        <small class="text-muted">Birden fazla görsel seçebilirsiniz</small>
                        @error('gallery.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sıralama</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_featured" 
                                   name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                Öne Çıkan Tesis
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Geri
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Kaydet
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
