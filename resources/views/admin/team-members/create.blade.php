@extends('admin.layouts.app')

@section('title', 'Yeni Üye Ekle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni Yönetim Kurulu Üyesi Ekle</h3>
                </div>
                <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Ad Soyad <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Pozisyon <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                                   id="position" name="position" value="{{ old('position') }}" 
                                                   placeholder="Örn: Yönetim Kurulu Başkanı" required>
                                            @error('position')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="designation" class="form-label">Unvan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" 
                                           id="designation" name="designation" value="{{ old('designation') }}" 
                                           placeholder="Örn: Başkan" required>
                                    @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="bio" class="form-label">Biyografi</label>
                                    <textarea class="form-control @error('bio') is-invalid @enderror" 
                                              id="bio" name="bio" rows="5">{{ old('bio') }}</textarea>
                                    @error('bio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="education" class="form-label">Eğitim Bilgileri</label>
                                    <textarea class="form-control @error('education') is-invalid @enderror" 
                                              id="education" name="education" rows="4"
                                              placeholder="Her satıra bir eğitim bilgisi yazın">{{ old('education') }}</textarea>
                                    <small class="text-muted">Her satıra bir eğitim bilgisi yazın</small>
                                    @error('education')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="specialties" class="form-label">Uzmanlık Alanları</label>
                                    <textarea class="form-control @error('specialties') is-invalid @enderror" 
                                              id="specialties" name="specialties" rows="3"
                                              placeholder="Her satıra bir uzmanlık alanı yazın">{{ old('specialties') }}</textarea>
                                    <small class="text-muted">Her satıra bir uzmanlık alanı yazın</small>
                                    @error('specialties')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Fotoğraf</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <small class="text-muted">JPG, JPEG, PNG, WEBP formatlarında maksimum 2MB</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div id="imagePreview" class="mt-2"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_years" class="form-label">Deneyim (Yıl)</label>
                                    <input type="number" class="form-control @error('experience_years') is-invalid @enderror" 
                                           id="experience_years" name="experience_years" value="{{ old('experience_years') }}" min="0">
                                    @error('experience_years')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <h6>Sosyal Medya</h6>
                                <div class="mb-3">
                                    <label for="social_facebook" class="form-label">Facebook</label>
                                    <input type="url" class="form-control @error('social_facebook') is-invalid @enderror" 
                                           id="social_facebook" name="social_facebook" value="{{ old('social_facebook') }}"
                                           placeholder="https://facebook.com/kullanici">
                                    @error('social_facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="social_twitter" class="form-label">Twitter</label>
                                    <input type="url" class="form-control @error('social_twitter') is-invalid @enderror" 
                                           id="social_twitter" name="social_twitter" value="{{ old('social_twitter') }}"
                                           placeholder="https://twitter.com/kullanici">
                                    @error('social_twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="social_linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" class="form-control @error('social_linkedin') is-invalid @enderror" 
                                           id="social_linkedin" name="social_linkedin" value="{{ old('social_linkedin') }}"
                                           placeholder="https://linkedin.com/in/kullanici">
                                    @error('social_linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="social_instagram" class="form-label">Instagram</label>
                                    <input type="url" class="form-control @error('social_instagram') is-invalid @enderror" 
                                           id="social_instagram" name="social_instagram" value="{{ old('social_instagram') }}"
                                           placeholder="https://instagram.com/kullanici">
                                    @error('social_instagram')
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
                                        <input type="checkbox" class="form-check-input" id="status" name="status" 
                                               value="1" {{ old('status', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Aktif
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
                        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
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
let descriptionEditor, bioEditor, educationEditor, specialtiesEditor;

// CKEditor'ları başlat
ClassicEditor.create(document.querySelector('#description'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    descriptionEditor = editor;
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#bio'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    bioEditor = editor;
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#education'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    educationEditor = editor;
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#specialties'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    specialtiesEditor = editor;
}).catch(error => {
    console.error(error);
});

// Form submit öncesinde CKEditor verilerini textarea'lara aktar
document.querySelector('form').addEventListener('submit', function(e) {
    // CKEditor verilerini textarea'lara aktar
    if (descriptionEditor) {
        document.querySelector('#description').value = descriptionEditor.getData();
    }
    if (bioEditor) {
        document.querySelector('#bio').value = bioEditor.getData();
    }
    if (educationEditor) {
        document.querySelector('#education').value = educationEditor.getData();
    }
    if (specialtiesEditor) {
        document.querySelector('#specialties').value = specialtiesEditor.getData();
    }
});

// Fotoğraf önizleme
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