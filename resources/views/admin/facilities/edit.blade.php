@extends('admin.layouts.app')

@section('title', 'Tesis Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tesis Düzenle: {{ $facility->name }}</h3>
                </div>
                <form action="{{ route('admin.facilities.update', $facility) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Tesis Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $facility->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Kısa Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="3" required>{{ old('short_description', $facility->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Detaylı Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="10" required>{{ old('description', $facility->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Adres</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                                      id="address" name="address" rows="3">{{ old('address', $facility->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="google_maps_link" class="form-label">Google Maps Linki</label>
                                            <input type="url" class="form-control @error('google_maps_link') is-invalid @enderror" 
                                                   id="google_maps_link" name="google_maps_link" value="{{ old('google_maps_link', $facility->google_maps_link) }}">
                                            @error('google_maps_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Telefon</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $facility->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-posta</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', $facility->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="working_hours" class="form-label">Çalışma Saatleri</label>
                                            <input type="text" class="form-control @error('working_hours') is-invalid @enderror" 
                                                   id="working_hours" name="working_hours" value="{{ old('working_hours', $facility->working_hours) }}" 
                                                   placeholder="Örn: 08:00 - 17:00">
                                            @error('working_hours')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="features" class="form-label">Özellikler</label>
                                    <textarea class="form-control @error('features') is-invalid @enderror" 
                                              id="features" name="features" rows="5">{{ old('features', $facility->features) }}</textarea>
                                    @error('features')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ana Görsel</label>
                                    @if($facility->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $facility->image) }}" class="img-thumbnail" style="max-width: 200px;">
                                            <small class="d-block text-muted">Mevcut görsel</small>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <small class="text-muted">JPG, JPEG, PNG, WEBP formatlarında maksimum 5MB</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="gallery" class="form-label">Galeri Görselleri</label>
                                    @if($facility->gallery && count($facility->gallery) > 0)
                                        <div class="alert alert-info mb-2">
                                            <small>{{ count($facility->gallery) }} adet mevcut galeri görseli var. Yeni görsel yüklerseniz mevcut görseller değiştirilecektir.</small>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                                           id="gallery" name="gallery[]" multiple accept="image/*">
                                    <small class="text-muted">Birden fazla görsel seçebilirsiniz</small>
                                    @error('gallery.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="facility_type" class="form-label">Tesis Tipi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('facility_type') is-invalid @enderror" 
                                           id="facility_type" name="facility_type" value="{{ old('facility_type', $facility->facility_type) }}" required>
                                    @error('facility_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                           id="category" name="category" value="{{ old('category', $facility->category) }}" required>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="capacity" class="form-label">Kapasite</label>
                                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                                           id="capacity" name="capacity" value="{{ old('capacity', $facility->capacity) }}" min="0">
                                    @error('capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="opening_date" class="form-label">Açılış Tarihi</label>
                                    <input type="date" class="form-control @error('opening_date') is-invalid @enderror" 
                                           id="opening_date" name="opening_date" value="{{ old('opening_date', $facility->opening_date?->format('Y-m-d')) }}">
                                    @error('opening_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="latitude" class="form-label">Enlem</label>
                                            <input type="number" class="form-control @error('latitude') is-invalid @enderror" 
                                                   id="latitude" name="latitude" value="{{ old('latitude', $facility->latitude) }}" 
                                                   step="any" min="-90" max="90">
                                            @error('latitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="longitude" class="form-label">Boylam</label>
                                            <input type="number" class="form-control @error('longitude') is-invalid @enderror" 
                                                   id="longitude" name="longitude" value="{{ old('longitude', $facility->longitude) }}" 
                                                   step="any" min="-180" max="180">
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="active" {{ old('status', $facility->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status', $facility->status) == 'inactive' ? 'selected' : '' }}>Pasif</option>
                                        <option value="maintenance" {{ old('status', $facility->status) == 'maintenance' ? 'selected' : '' }}>Bakımda</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sıralama</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', $facility->sort_order) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured', $facility->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Öne Çıkan Tesis
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <small class="text-muted">
                                        <i class="fas fa-eye"></i> Görüntülenme: {{ $facility->view_count }}<br>
                                        <i class="fas fa-clock"></i> Oluşturulma: {{ $facility->created_at->format('d.m.Y H:i') }}<br>
                                        <i class="fas fa-edit"></i> Son Güncelleme: {{ $facility->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
                        </button>
                        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> İptal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor.create(document.querySelector('#description'), { language: 'tr' });
ClassicEditor.create(document.querySelector('#features'), { language: 'tr' });

// Görsel önizleme
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = 
                '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px;">';
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
