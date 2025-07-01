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
                                                   id="working_hours" name="working_hours" value="{{ old('working_hours', is_array($facility->working_hours) ? implode(', ', $facility->working_hours) : $facility->working_hours) }}" 
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
                                              id="features" name="features" rows="5">{{ old('features', is_array($facility->features) ? implode("\n", $facility->features) : '') }}</textarea>
                                    @error('features')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ana Görsel</label>
                                    
                                    @if($facility->image)
                                        <div class="current-image mb-3 p-3 border rounded bg-light" id="currentImageContainer">
                                            <img src="{{ asset('storage/' . $facility->image) }}" class="img-thumbnail d-block mb-2" style="max-width: 200px;">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeCurrentImage()">
                                                    <i class="fas fa-trash"></i> Görseli Kaldır
                                                </button>
                                                <a href="{{ asset('storage/' . $facility->image) }}" target="_blank" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Büyük Görüntüle
                                                </a>
                                            </div>
                                            <input type="hidden" name="remove_image" id="remove_image" value="0">
                                        </div>
                                    @endif
                                    
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <small class="text-muted">JPG, JPEG, PNG, WEBP formatlarında maksimum 15MB (Otomatik sıkıştırılır)</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="gallery" class="form-label">Galeri Görselleri</label>
                                    
                                    @if($facility->gallery && count($facility->gallery) > 0)
                                        <div class="current-gallery mb-3">
                                            <p class="text-muted mb-2">{{ count($facility->gallery) }} adet mevcut galeri görseli:</p>
                                            <div class="row g-2" id="galleryContainer">
                                                @foreach($facility->gallery as $index => $image)
                                                    <div class="col-md-4" id="gallery-item-{{ $index }}">
                                                        <div class="gallery-item p-2 border rounded bg-light">
                                                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail w-100 mb-2" style="height: 100px; object-fit: cover;">
                                                            <div class="btn-group btn-group-sm w-100">
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeGalleryImage({{ $index }})">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <a href="{{ asset('storage/' . $image) }}" target="_blank" class="btn btn-info btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <input type="hidden" name="removed_gallery_images" id="removed_gallery_images" value="">
                                        </div>
                                    @endif
                                    
                                    <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                                           id="gallery" name="gallery[]" multiple accept="image/*">
                                    <small class="text-muted">Birden fazla görsel seçebilirsiniz. Mevcut görseller korunacaktır.</small>
                                    @error('gallery.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="galleryPreview" class="mt-2"></div>
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
let descriptionEditor, featuresEditor;

// CKEditor'ları başlat  
ClassicEditor.create(document.querySelector('#description'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
}).then(editor => {
    descriptionEditor = editor;
    // Required attribute'unu kaldır çünkü CKEditor ile çakışıyor
    document.querySelector('#description').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#features'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    featuresEditor = editor;
}).catch(error => {
    console.error(error);
});

// Form submit öncesinde CKEditor verilerini textarea'lara aktar ve validation yap
document.querySelector('form').addEventListener('submit', function(e) {
    // CKEditor verilerini textarea'lara aktar
    if (descriptionEditor) {
        document.querySelector('#description').value = descriptionEditor.getData();
    }
    if (featuresEditor) {
        document.querySelector('#features').value = featuresEditor.getData();
    }
    
    // Description boş kontrolü
    const descriptionContent = descriptionEditor ? descriptionEditor.getData().trim() : '';
    if (!descriptionContent || descriptionContent === '<p>&nbsp;</p>' || descriptionContent === '<p></p>') {
        e.preventDefault();
        alert('Lütfen detaylı açıklama alanını doldurun.');
        return false;
    }
});

// Mevcut görseli kaldırma fonksiyonu
function removeCurrentImage() {
    if (confirm('Ana görseli kaldırmak istediğinize emin misiniz?')) {
        document.getElementById('currentImageContainer').style.display = 'none';
        document.getElementById('remove_image').value = '1';
    }
}

// Galeri görseli kaldırma fonksiyonu
let removedGalleryImages = [];
function removeGalleryImage(index) {
    if (confirm('Bu galeri görselini kaldırmak istediğinize emin misiniz?')) {
        document.getElementById('gallery-item-' + index).style.display = 'none';
        removedGalleryImages.push(index);
        document.getElementById('removed_gallery_images').value = JSON.stringify(removedGalleryImages);
    }
}

// Görsel önizleme
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = 
                '<div class="mt-2 p-2 border rounded bg-light">' +
                '<img src="' + e.target.result + '" class="img-thumbnail d-block mb-2" style="max-width: 200px;">' +
                '<small class="text-success"><i class="fas fa-check"></i> Yeni görsel seçildi</small>' +
                '</div>';
        }
        reader.readAsDataURL(file);
    }
});

// Galeri önizleme
document.getElementById('gallery').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    const previewContainer = document.getElementById('galleryPreview');
    
    if (files.length > 0) {
        previewContainer.innerHTML = '<div class="mt-2"><p class="text-success mb-2"><i class="fas fa-check"></i> ' + files.length + ' yeni görsel seçildi:</p><div class="row g-2" id="newGalleryPreviews"></div></div>';
        
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('newGalleryPreviews').innerHTML += 
                    '<div class="col-md-3">' +
                    '<div class="p-2 border rounded bg-light">' +
                    '<img src="' + e.target.result + '" class="img-thumbnail w-100" style="height: 80px; object-fit: cover;">' +
                    '<small class="d-block text-center text-muted mt-1">' + file.name + '</small>' +
                    '</div>' +
                    '</div>';
            }
            reader.readAsDataURL(file);
        });
    }
});
</script>
@endpush
