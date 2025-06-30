@extends('admin.layouts.app')

@section('title', 'SSS Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">SSS Düzenle</h3>
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Soru <span class="text-danger">*</span></label>
                                    <textarea name="question" id="question" class="form-control @error('question') is-invalid @enderror" rows="3" required>{{ old('question', $faq->question) }}</textarea>
                                    @error('question')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="answer" class="form-label">Cevap <span class="text-danger">*</span></label>
                                    <textarea name="answer" id="answer" class="form-control @error('answer') is-invalid @enderror" rows="6" required>{{ old('answer', $faq->answer) }}</textarea>
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $faq->category) }}">
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">SSS kategorisini belirtin (örn: Genel, Hizmetler, Ödemeler)</small>
                                </div>

                                <div class="mb-3">
                                    <label for="sort_order" class="form-label">Sıra Numarası</label>
                                    <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $faq->sort_order) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Sıralaması için numarası</small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="status" id="status" class="form-check-input" value="1" {{ old('status', $faq->status) ? 'checked' : '' }}>
                                        <label for="status" class="form-check-label">Aktif</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="featured" id="featured" class="form-check-input" value="1" {{ old('featured', $faq->featured) ? 'checked' : '' }}>
                                        <label for="featured" class="form-check-label">Öne Çıkan</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Oluşturulma: {{ $faq->created_at->format('d.m.Y H:i') }}<br>
                                        Son Güncelleme: {{ $faq->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Güncelle
                                </button>
                                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> İptal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
let questionEditor, answerEditor;

// CKEditor'ları başlat
ClassicEditor.create(document.querySelector('#question'), { 
    language: 'tr',
    toolbar: ['bold', 'italic', 'link', '|', 'undo', 'redo']
}).then(editor => {
    questionEditor = editor;
    // Required attribute'unu kaldır çünkü CKEditor ile çakışıyor
    document.querySelector('#question').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

ClassicEditor.create(document.querySelector('#answer'), { 
    language: 'tr',
    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo']
}).then(editor => {
    answerEditor = editor;
    // Required attribute'unu kaldır çünkü CKEditor ile çakışıyor
    document.querySelector('#answer').removeAttribute('required');
}).catch(error => {
    console.error(error);
});

// Form submit öncesinde CKEditor verilerini textarea'lara aktar ve validation yap
document.querySelector('form').addEventListener('submit', function(e) {
    // CKEditor verilerini textarea'lara aktar
    if (questionEditor) {
        document.querySelector('#question').value = questionEditor.getData();
    }
    if (answerEditor) {
        document.querySelector('#answer').value = answerEditor.getData();
    }
    
    // Validation kontrolü
    const questionData = questionEditor ? questionEditor.getData().trim() : '';
    const answerData = answerEditor ? answerEditor.getData().trim() : '';
    
    if (!questionData || questionData === '<p>&nbsp;</p>' || questionData === '<p></p>') {
        e.preventDefault();
        alert('Lütfen soru alanını doldurun.');
        return false;
    }
    
    if (!answerData || answerData === '<p>&nbsp;</p>' || answerData === '<p></p>') {
        e.preventDefault();
        alert('Lütfen cevap alanını doldurun.');
        return false;
    }
});
</script>
@endpush 