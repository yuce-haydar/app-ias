@extends('admin.layouts.app')

@section('title', 'Proje Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Proje Düzenle</h3>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Listeye Dön
                    </a>
                </div>
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h6><i class="fas fa-exclamation-triangle"></i> Lütfen aşağıdaki hataları düzeltin:</h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Proje Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Kısa Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="3" required>{{ old('short_description', $project->short_description) }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="8" required>{{ old('description', $project->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="features" class="form-label">Özellikler</label>
                                    <textarea class="form-control @error('features') is-invalid @enderror" 
                                              id="features" name="features" rows="5" 
                                              placeholder="Her satıra bir özellik yazın&#10;Örnek:&#10;960 m² toplam alan&#10;240 kişi kapasiteli&#10;Taziye salonu">{{ old('features', is_array($project->features) ? implode("\n", $project->features) : '') }}</textarea>
                                    <small class="text-muted">Her satıra bir özellik yazın</small>
                                    @error('features')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="technical_specs" class="form-label">Teknik Özellikler</label>
                                    <textarea class="form-control @error('technical_specs') is-invalid @enderror" 
                                              id="technical_specs" name="technical_specs" rows="4"
                                              placeholder="Her satıra bir teknik özellik yazın&#10;Örnek:&#10;Çelik konstrüksiyon&#10;Betonarme temel&#10;İzolasyon sistemi">{{ old('technical_specs', is_array($project->technical_specs) ? implode("\n", $project->technical_specs) : '') }}</textarea>
                                    <small class="text-muted">Her satıra bir teknik özellik yazın</small>
                                    @error('technical_specs')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">Konum</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location', $project->location) }}">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="latitude" class="form-label">Enlem</label>
                                            <input type="number" class="form-control @error('latitude') is-invalid @enderror" 
                                                   id="latitude" name="latitude" value="{{ old('latitude', $project->latitude) }}" 
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
                                                   id="longitude" name="longitude" value="{{ old('longitude', $project->longitude) }}" 
                                                   step="any" min="-180" max="180">
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Ana Görsel</label>
                                    
                                    @if($project->image)
                                        <div class="current-image mb-3 p-3 border rounded bg-light" id="currentImageContainer">
                                            <img src="{{ asset('storage/' . $project->image) }}" class="img-thumbnail d-block mb-2" style="max-width: 200px;">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeCurrentImage()">
                                                    <i class="fas fa-trash"></i> Görseli Kaldır
                                                </button>
                                                <a href="{{ asset('storage/' . $project->image) }}" target="_blank" class="btn btn-info btn-sm">
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
                                    
                                    @if($project->gallery && count($project->gallery) > 0)
                                        <div class="current-gallery mb-3">
                                            <p class="text-muted mb-2">{{ count($project->gallery) }} adet mevcut galeri görseli:</p>
                                            <div class="row g-2" id="galleryContainer">
                                                @foreach($project->gallery as $index => $image)
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
                                    <label for="project_type" class="form-label">Proje Tipi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('project_type') is-invalid @enderror" 
                                           id="project_type" name="project_type" value="{{ old('project_type', $project->project_type) }}" 
                                           placeholder="Örn: Konut, Altyapı, Kentsel Dönüşüm" required>
                                    @error('project_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Başlangıç Tarihi</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" name="start_date" value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="completion_date" class="form-label">Tamamlanma Tarihi</label>
                                    <input type="date" class="form-control @error('completion_date') is-invalid @enderror" 
                                           id="completion_date" name="completion_date" value="{{ old('completion_date', $project->completion_date?->format('Y-m-d')) }}">
                                    @error('completion_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="budget" class="form-label">Bütçe</label>
                                    <input type="number" class="form-control @error('budget') is-invalid @enderror" 
                                           id="budget" name="budget" value="{{ old('budget', $project->budget) }}" 
                                           step="0.01" min="0">
                                    <small class="text-muted">TL cinsinden</small>
                                    @error('budget')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contractor" class="form-label">Müteahhit</label>
                                    <input type="text" class="form-control @error('contractor') is-invalid @enderror" 
                                           id="contractor" name="contractor" value="{{ old('contractor', $project->contractor) }}">
                                    @error('contractor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="progress_percentage" class="form-label">İlerleme Yüzdesi</label>
                                    <input type="number" class="form-control @error('progress_percentage') is-invalid @enderror" 
                                           id="progress_percentage" name="progress_percentage" value="{{ old('progress_percentage', $project->progress_percentage) }}" 
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
                                        <option value="planning" {{ old('status', $project->status) == 'planning' ? 'selected' : '' }}>Planlama</option>
                                        <option value="ongoing" {{ old('status', $project->status) == 'ongoing' ? 'selected' : '' }}>Devam Ediyor</option>
                                        <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                                        <option value="cancelled" {{ old('status', $project->status) == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sıralama</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0">
                                    <small class="text-muted">Küçük sayılar önce gösterilir</small>
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Öne Çıkan Proje
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <small class="text-muted">
                                        <i class="fas fa-eye"></i> Görüntülenme: {{ $project->view_count ?? 0 }}<br>
                                        <i class="fas fa-clock"></i> Oluşturulma: {{ $project->created_at->format('d.m.Y H:i') }}<br>
                                        <i class="fas fa-edit"></i> Son Güncelleme: {{ $project->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
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

ClassicEditor.create(document.querySelector('#description'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
}).then(editor => {
    descriptionEditor = editor;
    document.querySelector('#description').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

// Features ve technical_specs alanları basit textarea olarak kalacak

document.querySelector('form').addEventListener('submit', function(e) {
    if (descriptionEditor) {
        document.querySelector('#description').value = descriptionEditor.getData();
    }
    
    const descriptionContent = descriptionEditor ? descriptionEditor.getData().trim() : '';
    if (!descriptionContent || descriptionContent === '<p>&nbsp;</p>' || descriptionContent === '<p></p>') {
        e.preventDefault();
        alert('Lütfen açıklama alanını doldurun.');
        return false;
    }
});

function removeCurrentImage() {
    if (confirm('Ana görseli kaldırmak istediğinize emin misiniz?')) {
        document.getElementById('currentImageContainer').style.display = 'none';
        document.getElementById('remove_image').value = '1';
    }
}

let removedGalleryImages = [];
function removeGalleryImage(index) {
    if (confirm('Bu galeri görselini kaldırmak istediğinize emin misiniz?')) {
        document.getElementById('gallery-item-' + index).style.display = 'none';
        removedGalleryImages.push(index);
        document.getElementById('removed_gallery_images').value = JSON.stringify(removedGalleryImages);
    }
}

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
