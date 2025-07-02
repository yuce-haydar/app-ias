@extends('admin.layouts.app')

@section('title', 'Haber Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Haber Düzenle</h3>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Listeye Dön
                    </a>
                </div>
                <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $news->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="summary" class="form-label">Özet <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('summary') is-invalid @enderror" 
                                              id="summary" name="summary" rows="3" required>{{ old('summary', $news->summary) }}</textarea>
                                    @error('summary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">İçerik <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Etiketler</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" 
                                           id="tags" name="tags" value="{{ old('tags', is_array($news->tags) ? implode(', ', $news->tags) : $news->tags) }}" 
                                           placeholder="Virgülle ayırarak yazın: teknoloji, inovasyon, haber">
                                    @error('tags')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Öne Çıkan Görsel</label>
                                    
                                    @if($news->featured_image)
                                        <div class="current-image mb-3 p-3 border rounded bg-light" id="currentImageContainer">
                                            <img src="{{ asset('storage/' . $news->featured_image) }}" class="img-thumbnail d-block mb-2" style="max-width: 200px;">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeCurrentImage()">
                                                    <i class="fas fa-trash"></i> Görseli Kaldır
                                                </button>
                                                <a href="{{ asset('storage/' . $news->featured_image) }}" target="_blank" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i> Büyük Görüntüle
                                                </a>
                                            </div>
                                            <input type="hidden" name="remove_featured_image" id="remove_featured_image" value="0">
                                        </div>
                                    @endif
                                    
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                           id="featured_image" name="featured_image" accept="image/*">
                                    <small class="text-muted">JPG, JPEG, PNG, WEBP formatlarında maksimum 15MB (Otomatik sıkıştırılır)</small>
                                    @error('featured_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="gallery" class="form-label">Galeri Görselleri</label>
                                    
                                    @if($news->gallery && count($news->gallery) > 0)
                                        <div class="current-gallery mb-3">
                                            <p class="text-muted mb-2">{{ count($news->gallery) }} adet mevcut galeri görseli:</p>
                                            <div class="row g-2" id="galleryContainer">
                                                @foreach($news->gallery as $index => $image)
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
                                    <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                           id="category" name="category" value="{{ old('category', $news->category) }}" 
                                           placeholder="Örn: Kurumsal, Etkinlik, Duyuru" required>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Yazar</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                                           id="author" name="author" value="{{ old('author', $news->author) }}">
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Yayın Tarihi</label>
                                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                           id="published_at" name="published_at" value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Yayında Değil</option>
                                        <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Yayında</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">
                                            Öne Çıkan Haber
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="allow_comments" name="allow_comments" 
                                               value="1" {{ old('allow_comments', $news->allow_comments) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="allow_comments">
                                            Yorumlara İzin Ver
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <small class="text-muted">
                                        <i class="fas fa-eye"></i> Görüntülenme: {{ $news->view_count ?? 0 }}<br>
                                        <i class="fas fa-clock"></i> Oluşturulma: {{ $news->created_at->format('d.m.Y H:i') }}<br>
                                        <i class="fas fa-edit"></i> Son Güncelleme: {{ $news->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
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

ClassicEditor.create(document.querySelector('#content'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
}).then(editor => {
    contentEditor = editor;
    document.querySelector('#content').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#summary'), { 
    language: 'tr',
    toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
}).then(editor => {
    summaryEditor = editor;
    document.querySelector('#summary').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

document.querySelector('form').addEventListener('submit', function(e) {
    if (contentEditor) {
        document.querySelector('#content').value = contentEditor.getData();
    }
    if (summaryEditor) {
        document.querySelector('#summary').value = summaryEditor.getData();
    }
    
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

function removeCurrentImage() {
    if (confirm('Öne çıkan görseli kaldırmak istediğinize emin misiniz?')) {
        document.getElementById('currentImageContainer').style.display = 'none';
        document.getElementById('remove_featured_image').value = '1';
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

document.getElementById('featured_image').addEventListener('change', function(e) {
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
