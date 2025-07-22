@extends('admin.layouts.app')

@section('title', 'Yeni Proje')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni Proje Ekle</h3>
                </div>
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Proje Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Kısa Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Detaylı Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="10" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- İframe Kodları -->
                                <div class="mb-3">
                                    <label class="form-label">Harita/İframe Kodları</label>
                                    <div class="iframe-codes-container">
                                        <div class="iframe-item" data-index="0">
                                            <div class="card border-info mb-3">
                                                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                                                    <span>İframe 1</span>
                                                    <button type="button" class="btn btn-sm btn-outline-light remove-iframe" disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Başlık</label>
                                                        <input type="text" class="form-control" 
                                                               name="iframe_codes[0][title]" 
                                                               value="{{ old('iframe_codes.0.title') }}" 
                                                               placeholder="Örn: Proje Haritası, 360° Görünüm">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">İframe Kodu</label>
                                                        <textarea class="form-control" 
                                                                  name="iframe_codes[0][code]" 
                                                                  rows="4" 
                                                                  placeholder="Örn: Google Maps embed kodu veya başka bir iframe kodu">{{ old('iframe_codes.0.code') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-info btn-sm add-iframe">
                                        <i class="fas fa-plus"></i> Yeni İframe Ekle
                                    </button>
                                    <small class="text-muted d-block mt-2">Projeye ait harita, 360° görünüm veya başka iframe kodlarını buraya ekleyebilirsiniz.</small>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="contractor" class="form-label">Yüklenici</label>
                                            <input type="text" class="form-control @error('contractor') is-invalid @enderror" 
                                                   id="contractor" name="contractor" value="{{ old('contractor') }}">
                                            @error('contractor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="budget" class="form-label">Bütçe</label>
                                            <input type="number" class="form-control @error('budget') is-invalid @enderror" 
                                                   id="budget" name="budget" value="{{ old('budget') }}" 
                                                   min="0" step="0.01" placeholder="TL">
                                            @error('budget')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="features" class="form-label">Özellikler</label>
                                    <textarea class="form-control @error('features') is-invalid @enderror" 
                                              id="features" name="features" rows="4">{{ old('features') }}</textarea>
                                    @error('features')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="technical_specs" class="form-label">Teknik Özellikler</label>
                                    <textarea class="form-control @error('technical_specs') is-invalid @enderror" 
                                              id="technical_specs" name="technical_specs" rows="4">{{ old('technical_specs') }}</textarea>
                                    @error('technical_specs')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Genel Konum</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location') }}" 
                                           placeholder="Örn: Antakya Merkez">
                                    <small class="text-muted">Projenin genel konumu (eski sistem uyumluluğu için)</small>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Proje Lokasyonları -->
                                <div class="mb-3">
                                    <label class="form-label">Proje Lokasyonları</label>
                                    <div class="locations-container">
                                        <div class="location-item" data-index="0">
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                                    <span>Lokasyon 1</span>
                                                    <button type="button" class="btn btn-sm btn-outline-light remove-location" disabled>
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Lokasyon Adı <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" 
                                                                   name="locations[0][name]" 
                                                                   value="{{ old('locations.0.name') }}" 
                                                                   placeholder="Örn: Ana Blok, Spor Sahası" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Enlem <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" 
                                                                   name="locations[0][latitude]" 
                                                                   value="{{ old('locations.0.latitude') }}" 
                                                                   step="any" min="-90" max="90" 
                                                                   placeholder="36.2027" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Boylam <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" 
                                                                   name="locations[0][longitude]" 
                                                                   value="{{ old('locations.0.longitude') }}" 
                                                                   step="any" min="-180" max="180" 
                                                                   placeholder="36.1621" required>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Açıklama</label>
                                                            <textarea class="form-control" 
                                                                      name="locations[0][description]" 
                                                                      rows="2" 
                                                                      placeholder="Bu lokasyon hakkında kısa açıklama">{{ old('locations.0.description') }}</textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Sıralama</label>
                                                            <input type="number" class="form-control" 
                                                                   name="locations[0][sort_order]" 
                                                                   value="{{ old('locations.0.sort_order', 0) }}" 
                                                                   min="0" placeholder="0">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Konum Gösterimi</label>
                                                            <div class="form-check form-switch mt-2">
                                                                <input type="hidden" name="locations[0][show_location]" value="0">
                                                                <input type="checkbox" class="form-check-input" 
                                                                       name="locations[0][show_location]" 
                                                                       value="1" 
                                                                       {{ old('locations.0.show_location', true) ? 'checked' : '' }}>
                                                                <label class="form-check-label">Bu lokasyonu göster</label>
                                                            </div>
                                                            <small class="text-muted">Kapatılırsa bu lokasyon haritada ve detaylarda gizlenir</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" id="addLocationBtn">
                                        <i class="fas fa-plus"></i> Yeni Lokasyon Ekle
                                    </button>
                                    <small class="d-block text-muted mt-2">En az bir lokasyon eklemeniz gerekir. Her lokasyon için enlem-boylam koordinatları gereklidir.</small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ana Görsel</label>
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
                                    <input type="file" class="form-control @error('gallery.*') is-invalid @enderror" 
                                           id="gallery" name="gallery[]" multiple accept="image/*">
                                    <small class="text-muted">Birden fazla görsel seçebilirsiniz</small>
                                    @error('gallery.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="galleryPreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="project_type" class="form-label">Proje Tipi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('project_type') is-invalid @enderror" 
                                           id="project_type" name="project_type" value="{{ old('project_type') }}" 
                                           placeholder="Örn: Konut, Altyapı, Kentsel Dönüşüm" required>
                                    @error('project_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Başlangıç Tarihi</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" name="start_date" value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="completion_date" class="form-label">Tamamlanma Tarihi</label>
                                    <input type="date" class="form-control @error('completion_date') is-invalid @enderror" 
                                           id="completion_date" name="completion_date" value="{{ old('completion_date') }}">
                                    @error('completion_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="progress_percentage" class="form-label">İlerleme Yüzdesi</label>
                                    <input type="number" class="form-control @error('progress_percentage') is-invalid @enderror" 
                                           id="progress_percentage" name="progress_percentage" value="{{ old('progress_percentage', 0) }}" 
                                           min="0" max="100">
                                    <small class="text-muted">0-100 arası bir değer girin</small>
                                    @error('progress_percentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="planning" {{ old('status') == 'planning' ? 'selected' : '' }}>Planlama</option>
                                        <option value="ongoing" {{ old('status', 'ongoing') == 'ongoing' ? 'selected' : '' }}>Devam Ediyor</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sıralama</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                    <small class="text-muted">Küçük sayılar önce gösterilir</small>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Öne Çıkan Proje
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Kaydet
                        </button>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
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
let descriptionEditor, featuresEditor, technicalSpecsEditor;

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

ClassicEditor.create(document.querySelector('#technical_specs'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    technicalSpecsEditor = editor;
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
    if (technicalSpecsEditor) {
        document.querySelector('#technical_specs').value = technicalSpecsEditor.getData();
    }
    
    // Description boş kontrolü
    const descriptionContent = descriptionEditor ? descriptionEditor.getData().trim() : '';
    if (!descriptionContent || descriptionContent === '<p>&nbsp;</p>' || descriptionContent === '<p></p>') {
        e.preventDefault();
        alert('Lütfen detaylı açıklama alanını doldurun.');
        return false;
    }
});

// Ana görsel önizleme
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = 
                '<div class="mt-2 p-2 border rounded bg-light position-relative">' +
                '<button type="button" class="btn btn-sm btn-danger position-absolute" style="top: 5px; right: 5px; z-index: 10;" onclick="clearImagePreview()">' +
                '<i class="fas fa-times"></i>' +
                '</button>' +
                '<img src="' + e.target.result + '" class="img-thumbnail d-block mb-2" style="max-width: 200px;">' +
                '<small class="text-success"><i class="fas fa-check"></i> Görsel seçildi: ' + file.name + '</small>' +
                '</div>';
        }
        reader.readAsDataURL(file);
    }
});

// Ana görsel önizleme temizleme
function clearImagePreview() {
    document.getElementById('imagePreview').innerHTML = '';
    document.getElementById('image').value = '';
}

// Galeri önizleme
document.getElementById('gallery').addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    const galleryPreview = document.getElementById('galleryPreview');
    
    if (files.length > 0) {
        galleryPreview.innerHTML = 
            '<div class="mt-2">' +
            '<div class="d-flex justify-content-between align-items-center mb-2">' +
            '<p class="text-success mb-0"><i class="fas fa-check"></i> ' + files.length + ' görsel seçildi:</p>' +
            '<button type="button" class="btn btn-sm btn-danger" onclick="clearGalleryPreview()">' +
            '<i class="fas fa-times"></i> Hepsini Kaldır' +
            '</button>' +
            '</div>' +
            '<div class="row g-2" id="galleryPreviews"></div>' +
            '</div>';
        
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('galleryPreviews').innerHTML += 
                    '<div class="col-md-3" id="gallery-preview-' + index + '">' +
                    '<div class="p-2 border rounded bg-light position-relative">' +
                    '<button type="button" class="btn btn-sm btn-danger position-absolute" style="top: 5px; right: 5px; z-index: 10;" onclick="removeGalleryPreview(' + index + ')">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '<img src="' + e.target.result + '" class="img-thumbnail w-100" style="height: 80px; object-fit: cover;">' +
                    '<small class="d-block text-center text-muted mt-1">' + file.name + '</small>' +
                    '</div>' +
                    '</div>';
            }
            reader.readAsDataURL(file);
        });
    } else {
        galleryPreview.innerHTML = '';
    }
});

// Galeri önizleme temizleme
function clearGalleryPreview() {
    document.getElementById('galleryPreview').innerHTML = '';
    document.getElementById('gallery').value = '';
}

// Tekil galeri görseli kaldırma
function removeGalleryPreview(index) {
    document.getElementById('gallery-preview-' + index).remove();
    // Dosya inputunu sıfırla (bireysel dosya kaldırma karmaşık olduğu için)
    const remainingPreviews = document.querySelectorAll('#galleryPreviews > div');
    if (remainingPreviews.length === 0) {
        document.getElementById('gallery').value = '';
        document.getElementById('galleryPreview').innerHTML = '';
    }
}

// Lokasyon Yönetimi
let locationIndex = 1;

document.getElementById('addLocationBtn').addEventListener('click', function() {
    const locationsContainer = document.querySelector('.locations-container');
    const newLocationHtml = `
        <div class="location-item" data-index="${locationIndex}">
            <div class="card border-secondary mb-3">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <span>Lokasyon ${locationIndex + 1}</span>
                    <button type="button" class="btn btn-sm btn-outline-light remove-location">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Lokasyon Adı <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" 
                                   name="locations[${locationIndex}][name]" 
                                   placeholder="Örn: Ana Blok, Spor Sahası" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Enlem <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" 
                                   name="locations[${locationIndex}][latitude]" 
                                   step="any" min="-90" max="90" 
                                   placeholder="36.2027" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Boylam <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" 
                                   name="locations[${locationIndex}][longitude]" 
                                   step="any" min="-180" max="180" 
                                   placeholder="36.1621" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Açıklama</label>
                            <textarea class="form-control" 
                                      name="locations[${locationIndex}][description]" 
                                      rows="2" 
                                      placeholder="Bu lokasyon hakkında kısa açıklama"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sıralama</label>
                            <input type="number" class="form-control" 
                                   name="locations[${locationIndex}][sort_order]" 
                                   value="${locationIndex}" 
                                   min="0" placeholder="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konum Gösterimi</label>
                            <div class="form-check form-switch mt-2">
                                <input type="hidden" name="locations[${locationIndex}][show_location]" value="0">
                                <input type="checkbox" class="form-check-input" 
                                       name="locations[${locationIndex}][show_location]" 
                                       value="1" checked>
                                <label class="form-check-label">Bu lokasyonu göster</label>
                            </div>
                            <small class="text-muted">Kapatılırsa bu lokasyon haritada ve detaylarda gizlenir</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    locationsContainer.insertAdjacentHTML('beforeend', newLocationHtml);
    locationIndex++;
    updateRemoveButtons();
});

// Lokasyon kaldırma
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-location')) {
        const locationItem = e.target.closest('.location-item');
        locationItem.remove();
        updateRemoveButtons();
        updateLocationNumbers();
    }
});

function updateRemoveButtons() {
    const locationItems = document.querySelectorAll('.location-item');
    const removeButtons = document.querySelectorAll('.remove-location');
    
    // İlk lokasyonu silme butonu her zaman devre dışı
    removeButtons.forEach((btn, index) => {
        if (index === 0) {
            btn.disabled = locationItems.length <= 1;
        } else {
            btn.disabled = false;
        }
    });
}

function updateLocationNumbers() {
    const locationItems = document.querySelectorAll('.location-item');
    locationItems.forEach((item, index) => {
        const header = item.querySelector('.card-header span');
        header.textContent = `Lokasyon ${index + 1}`;
    });
}

// İframe Kodları Yönetimi
let iframeIndex = 1;
const iframeCodesContainer = document.querySelector('.iframe-codes-container');
const addIframeBtn = document.querySelector('.add-iframe');

// Yeni iframe ekleme
addIframeBtn.addEventListener('click', function() {
    const newIframeHtml = `
        <div class="iframe-item" data-index="${iframeIndex}">
            <div class="card border-info mb-3">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <span>İframe ${iframeIndex + 1}</span>
                    <button type="button" class="btn btn-sm btn-outline-light remove-iframe">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Başlık</label>
                        <input type="text" class="form-control" 
                               name="iframe_codes[${iframeIndex}][title]" 
                               placeholder="Örn: Proje Haritası, 360° Görünüm">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">İframe Kodu</label>
                        <textarea class="form-control" 
                                  name="iframe_codes[${iframeIndex}][code]" 
                                  rows="4" 
                                  placeholder="Örn: Google Maps embed kodu veya başka bir iframe kodu"></textarea>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    iframeCodesContainer.insertAdjacentHTML('beforeend', newIframeHtml);
    iframeIndex++;
    updateIframeRemoveButtons();
});

// İframe kaldırma
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-iframe')) {
        const iframeItem = e.target.closest('.iframe-item');
        iframeItem.remove();
        updateIframeRemoveButtons();
        updateIframeNumbers();
    }
});

function updateIframeRemoveButtons() {
    const iframeItems = document.querySelectorAll('.iframe-item');
    const removeButtons = document.querySelectorAll('.remove-iframe');
    
    // İlk iframe'i silme butonu her zaman devre dışı
    removeButtons.forEach((btn, index) => {
        if (index === 0) {
            btn.disabled = iframeItems.length <= 1;
        } else {
            btn.disabled = false;
        }
    });
}

function updateIframeNumbers() {
    const iframeItems = document.querySelectorAll('.iframe-item');
    iframeItems.forEach((item, index) => {
        const header = item.querySelector('.card-header span');
        header.textContent = `İframe ${index + 1}`;
    });
}
</script>
@endpush 