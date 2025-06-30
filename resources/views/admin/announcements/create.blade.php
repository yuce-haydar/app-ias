@extends('admin.layouts.app')

@section('title', 'Yeni Duyuru')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni Duyuru Ekle</h3>
                </div>
                <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="content" class="form-label">İçerik <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="attachments" class="form-label">Ekler</label>
                                    <input type="file" class="form-control @error('attachments.*') is-invalid @enderror" 
                                           id="attachments" name="attachments[]" multiple accept=".pdf,.doc,.docx,.xls,.xlsx">
                                    <small class="text-muted">PDF, DOC, DOCX, XLS, XLSX formatlarında maksimum 10MB dosya yükleyebilirsiniz.</small>
                                    @error('attachments.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="announcement_type" class="form-label">Duyuru Tipi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('announcement_type') is-invalid @enderror" 
                                            id="announcement_type" name="announcement_type" required>
                                        <option value="">Seçiniz</option>
                                        <option value="general" {{ old('announcement_type') == 'general' ? 'selected' : '' }}>Genel</option>
                                        <option value="urgent" {{ old('announcement_type') == 'urgent' ? 'selected' : '' }}>Acil</option>
                                        <option value="event" {{ old('announcement_type') == 'event' ? 'selected' : '' }}>Etkinlik</option>
                                        <option value="regulation" {{ old('announcement_type') == 'regulation' ? 'selected' : '' }}>Yönetmelik</option>
                                    </select>
                                    @error('announcement_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="importance" class="form-label">Önem Derecesi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('importance') is-invalid @enderror" 
                                            id="importance" name="importance" required>
                                        <option value="">Seçiniz</option>
                                        <option value="low" {{ old('importance') == 'low' ? 'selected' : '' }}>Düşük</option>
                                        <option value="normal" {{ old('importance', 'normal') == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="medium" {{ old('importance') == 'medium' ? 'selected' : '' }}>Orta</option>
                                        <option value="high" {{ old('importance') == 'high' ? 'selected' : '' }}>Yüksek</option>
                                    </select>
                                    @error('importance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Başlangıç Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" name="start_date" value="{{ old('start_date', date('Y-m-d')) }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Bitiş Tarihi</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                           id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    <small class="text-muted">Boş bırakılırsa süresiz olarak görünür</small>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Taslak</option>
                                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Yayında</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_pinned" name="is_pinned" 
                                               value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_pinned">
                                            <i class="fas fa-thumbtack text-danger"></i> Sabitlenmiş Duyuru
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
                        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">
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
let contentEditor;

// CKEditor'ı başlat
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

// Form submit öncesinde CKEditor verilerini textarea'ya aktar ve validation yap
document.querySelector('form').addEventListener('submit', function(e) {
    // CKEditor verilerini textarea'ya aktar
    if (contentEditor) {
        document.querySelector('#content').value = contentEditor.getData();
    }
    
    // Content boş kontrolü
    const contentData = contentEditor ? contentEditor.getData().trim() : '';
    if (!contentData || contentData === '<p>&nbsp;</p>' || contentData === '<p></p>') {
        e.preventDefault();
        alert('Lütfen içerik alanını doldurun.');
        return false;
    }
});
</script>
@endpush 