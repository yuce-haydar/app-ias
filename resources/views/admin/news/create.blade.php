@extends('admin.layouts.app')

@section('title', 'Yeni Haber')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni Haber Ekle</h3>
                </div>
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="summary" class="form-label">Özet <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('summary') is-invalid @enderror" 
                                              id="summary" name="summary" rows="3" required>{{ old('summary') }}</textarea>
                                    @error('summary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">İçerik <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Etiketler</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                                           id="tags" name="tags" value="{{ old('tags') }}" 
                                           placeholder="Virgülle ayırarak yazın: teknoloji, inovasyon, haber">
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Öne Çıkan Görsel</label>
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                           id="featured_image" name="featured_image" accept="image/*">
                                    <small class="text-muted">JPG, JPEG, PNG, WEBP formatlarında maksimum 5MB</small>
                                    @error('featured_image')
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
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                           id="category" name="category" value="{{ old('category') }}" 
                                           placeholder="Örn: Kurumsal, Etkinlik, Duyuru" required>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Yazar</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                                           id="author" name="author" value="{{ old('author', auth()->user()->name) }}">
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Yayın Tarihi</label>
                                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                           id="published_at" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Taslak</option>
                                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Yayında</option>
                                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Arşivlenmiş</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Öne Çıkan Haber
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="allow_comments" name="allow_comments" 
                                               value="1" {{ old('allow_comments', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="allow_comments">
                                            Yorumlara İzin Ver
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
                        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
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
let contentEditor, summaryEditor;

// CKEditor'ları başlat
ClassicEditor.create(document.querySelector('#content'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
}).then(editor => {
    contentEditor = editor;
    // Required attribute'unu kaldır çünkü CKEditor ile çakışıyor
    document.querySelector('#content').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#summary'), { 
    language: 'tr',
    toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
}).then(editor => {
    summaryEditor = editor;
    // Required attribute'unu kaldır çünkü CKEditor ile çakışıyor
    document.querySelector('#summary').removeAttribute('required');
}).catch(error => {
        console.error(error);
    });

// Form submit öncesinde CKEditor verilerini textarea'lara aktar ve validation yap
document.querySelector('form').addEventListener('submit', function(e) {
    // CKEditor verilerini textarea'lara aktar
    if (contentEditor) {
        document.querySelector('#content').value = contentEditor.getData();
    }
    if (summaryEditor) {
        document.querySelector('#summary').value = summaryEditor.getData();
    }
    
    // Content boş kontrolü
    const contentData = contentEditor ? contentEditor.getData().trim() : '';
    const summaryData = summaryEditor ? summaryEditor.getData().trim() : '';
    
    if (!contentData || contentData === '<p>&nbsp;</p>' || contentData === '<p></p>') {
        e.preventDefault();
        alert('Lütfen içerik alanını doldurun.');
        return false;
    }
    
    if (!summaryData || summaryData === '<p>&nbsp;</p>' || summaryData === '<p></p>') {
        e.preventDefault();
        alert('Lütfen özet alanını doldurun.');
        return false;
    }
});

// Ana görsel önizleme
document.getElementById('featured_image').addEventListener('change', function(e) {
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
    document.getElementById('featured_image').value = '';
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
</script>
@endpush 