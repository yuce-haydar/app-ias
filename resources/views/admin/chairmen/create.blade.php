@extends('admin.layouts.app')

@section('title', 'Yeni Başkan Ekle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Yeni Başkan Ekle</h3>
                    <a href="{{ route('admin.chairmen.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri
                    </a>
                </div>
                <form action="{{ route('admin.chairmen.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Sol Kolon -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Ad Soyad <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Unvan <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                           value="{{ old('title') }}" placeholder="örn: Yönetim Kurulu Başkanı" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Ana Resim (HBB)</label>
                                    <div class="image-upload-wrapper">
                                        <input type="file" name="main_image" class="form-control @error('main_image') is-invalid @enderror" 
                                               accept="image/*" onchange="previewSingleImage(this, 'main-preview')" id="main_image">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle"></i> 
                                            Desteklenen formatlar: JPG, PNG, GIF, WEBP (Maks: 10MB)
                                        </small>
                                        @error('main_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div id="main-preview" class="image-preview-container mt-2"></div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Galeri Resimleri</label>
                                    <div class="image-upload-wrapper">
                                        <input type="file" name="gallery[]" class="form-control @error('gallery.*') is-invalid @enderror" 
                                               accept="image/*" multiple onchange="previewMultipleImages(this, 'gallery-preview')" id="gallery">
                                        <small class="text-muted">
                                            <i class="fas fa-images"></i> 
                                            Birden fazla resim seçebilirsiniz (Her biri maks: 10MB)
                                        </small>
                                        @error('gallery.*')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div id="gallery-preview" class="gallery-preview-container mt-2"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sağ Kolon -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Başkanın Mesajı <span class="text-danger">*</span></label>
                                    <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" 
                                              rows="6">{{ old('message') }}</textarea>
                                    <div class="invalid-feedback" id="message-error" style="display: none;"></div>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Eğitim Bilgisi</label>
                                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror" 
                                           value="{{ old('education') }}" placeholder="örn: İstanbul Üniversitesi - İşletme">
                                    @error('education')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">İş Deneyimi</label>
                                    <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror" 
                                           value="{{ old('experience') }}" placeholder="örn: 20+ yıl deneyim">
                                    @error('experience')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Sıra</label>
                                            <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                                   value="{{ old('sort_order', 0) }}" min="0">
                                            @error('sort_order')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Durum</label>
                                            <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Pasif</option>
                                            </select>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Özgeçmiş -->
                        <div class="form-group mb-3">
                            <label class="form-label">Özgeçmiş <span class="text-danger">*</span></label>
                            <textarea name="biography" id="biography" class="form-control @error('biography') is-invalid @enderror" 
                                      rows="8">{{ old('biography') }}</textarea>
                            <div class="invalid-feedback" id="biography-error" style="display: none;"></div>
                            <small class="text-muted">Başkanın detaylı özgeçmişini yazın</small>
                            @error('biography')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Başarılar -->
                        <div class="form-group mb-3">
                            <label class="form-label">Başarılar</label>
                            <textarea name="achievements" class="form-control @error('achievements') is-invalid @enderror" 
                                      rows="4" placeholder="Her satıra bir başarı yazın">{{ old('achievements') }}</textarea>
                            <small class="text-muted">Her satıra bir başarı yazın</small>
                            @error('achievements')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="submit-btn">
                            <i class="fas fa-save"></i> Kaydet
                        </button>
                        <a href="{{ route('admin.chairmen.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> İptal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.image-upload-wrapper {
    border: 2px dashed #ddd;
    border-radius: 8px;
    padding: 15px;
    transition: border-color 0.3s ease;
}

.image-upload-wrapper:hover {
    border-color: #007bff;
}

.image-preview-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.preview-image-wrapper {
    position: relative;
    display: inline-block;
}

.preview-image {
    max-width: 150px;
    max-height: 150px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #ddd;
    transition: transform 0.3s ease;
}

.preview-image:hover {
    transform: scale(1.05);
}

.remove-image {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    font-size: 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gallery-preview-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 10px;
}

.gallery-item-preview {
    position: relative;
    background: #f8f9fa;
    border-radius: 8px;
    overflow: hidden;
}

.gallery-item-preview img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.form-label {
    font-weight: 600;
    color: #333;
}

.card {
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.text-danger {
    color: #dc3545 !important;
}

/* CKEditor özelleştirmeleri */
.ck-editor__editable {
    min-height: 200px;
}

.ck-content {
    font-size: 14px;
}
</style>

<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
// CKEditor instances
let messageEditor, biographyEditor;

// CKEditor Başlatma
document.addEventListener('DOMContentLoaded', function() {
    // Mesaj editörü
    ClassicEditor
        .create(document.querySelector('#message'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo'
                ]
            },
            language: 'tr',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            }
        })
        .then(editor => {
            messageEditor = editor;
            
            // Real-time validation
            editor.model.document.on('change:data', () => {
                validateCKEditor('message', messageEditor, 'message-error');
            });
        })
        .catch(error => {
            console.error(error);
        });

    // Özgeçmiş editörü
    ClassicEditor
        .create(document.querySelector('#biography'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'horizontalLine', '|',
                    'undo', 'redo'
                ]
            },
            language: 'tr',
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            }
        })
        .then(editor => {
            biographyEditor = editor;
            
            // Real-time validation
            editor.model.document.on('change:data', () => {
                validateCKEditor('biography', biographyEditor, 'biography-error');
            });
        })
        .catch(error => {
            console.error(error);
        });

    // Form submit handler
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (validateForm()) {
            // Update hidden textareas with CKEditor content
            updateHiddenTextareas();
            
            // Submit form
            this.submit();
        }
    });
});

// CKEditor validation function
function validateCKEditor(fieldName, editor, errorElementId) {
    const content = editor.getData().trim();
    const errorElement = document.getElementById(errorElementId);
    const fieldElement = document.getElementById(fieldName);
    
    if (content === '' || content === '<p>&nbsp;</p>' || content === '<p></p>') {
        fieldElement.classList.add('is-invalid');
        errorElement.style.display = 'block';
        errorElement.textContent = `${fieldName === 'message' ? 'Başkanın mesajı' : 'Özgeçmiş'} alanı zorunludur.`;
        return false;
    } else {
        fieldElement.classList.remove('is-invalid');
        errorElement.style.display = 'none';
        return true;
    }
}

// Full form validation
function validateForm() {
    let isValid = true;
    
    // Validate required text inputs
    const requiredFields = ['name', 'title'];
    requiredFields.forEach(fieldName => {
        const field = document.querySelector(`[name="${fieldName}"]`);
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Validate CKEditor fields
    if (messageEditor) {
        const messageValid = validateCKEditor('message', messageEditor, 'message-error');
        isValid = isValid && messageValid;
    }
    
    if (biographyEditor) {
        const biographyValid = validateCKEditor('biography', biographyEditor, 'biography-error');
        isValid = isValid && biographyValid;
    }
    
    if (!isValid) {
        // Show error message
        showToast('Lütfen zorunlu alanları doldurun!', 'error');
        
        // Focus first invalid field
        const firstInvalid = document.querySelector('.is-invalid');
        if (firstInvalid) {
            firstInvalid.focus();
        }
    }
    
    return isValid;
}

// Update hidden textareas with CKEditor content
function updateHiddenTextareas() {
    if (messageEditor) {
        document.getElementById('message').value = messageEditor.getData();
    }
    if (biographyEditor) {
        document.getElementById('biography').value = biographyEditor.getData();
    }
}

// Show toast notification
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px; opacity: 0; transition: opacity 0.3s ease;';
    toast.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'}"></i>
        ${message}
        <button type="button" class="btn-close ms-2" onclick="this.parentElement.remove()"></button>
    `;
    
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => toast.style.opacity = '1', 100);
    
    // Auto remove
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

// Gelişmiş tek resim preview
function previewSingleImage(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'preview-image-wrapper';
            
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'preview-image';
            img.title = `${file.name} (${formatFileSize(file.size)})`;
            
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'remove-image';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.onclick = function() {
                preview.innerHTML = '';
                input.value = '';
            };
            
            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            preview.appendChild(wrapper);
        };
        
        reader.readAsDataURL(file);
    }
}

// Gelişmiş çoklu resim preview
function previewMultipleImages(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.className = 'gallery-item-preview';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.title = `${file.name} (${formatFileSize(file.size)})`;
                
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'remove-image';
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.onclick = function() {
                    wrapper.remove();
                };
                
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };
            
            reader.readAsDataURL(file);
        });
    }
}

// Dosya boyutunu formatla
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}
</script>
@endsection 