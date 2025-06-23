@extends('admin.layouts.app')

@section('title', 'Duyuru Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Duyuru Düzenle: {{ $announcement->title }}</h3>
                </div>
                <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $announcement->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">İçerik <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" name="content" rows="10" required>{{ old('content', $announcement->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="attachments" class="form-label">Ekler</label>
                                    @if($announcement->attachments && count($announcement->attachments) > 0)
                                        <div class="alert alert-info mb-2">
                                            <strong>Mevcut Dosyalar:</strong>
                                            <ul class="mb-0">
                                                @foreach($announcement->attachments as $attachment)
                                                    <li>{{ $attachment['name'] ?? 'Dosya' }} ({{ number_format(($attachment['size'] ?? 0) / 1024, 2) }} KB)</li>
                                                @endforeach
                                            </ul>
                                            <small>Yeni dosya yüklerseniz mevcut dosyalar değiştirilecektir.</small>
                                        </div>
                                    @endif
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
                                        <option value="general" {{ old('announcement_type', $announcement->announcement_type) == 'general' ? 'selected' : '' }}>Genel</option>
                                        <option value="urgent" {{ old('announcement_type', $announcement->announcement_type) == 'urgent' ? 'selected' : '' }}>Acil</option>
                                        <option value="event" {{ old('announcement_type', $announcement->announcement_type) == 'event' ? 'selected' : '' }}>Etkinlik</option>
                                        <option value="regulation" {{ old('announcement_type', $announcement->announcement_type) == 'regulation' ? 'selected' : '' }}>Yönetmelik</option>
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
                                        <option value="low" {{ old('importance', $announcement->importance) == 'low' ? 'selected' : '' }}>Düşük</option>
                                        <option value="medium" {{ old('importance', $announcement->importance) == 'medium' ? 'selected' : '' }}>Orta</option>
                                        <option value="high" {{ old('importance', $announcement->importance) == 'high' ? 'selected' : '' }}>Yüksek</option>
                                    </select>
                                    @error('importance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Başlangıç Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                           id="start_date" name="start_date" value="{{ old('start_date', $announcement->start_date->format('Y-m-d')) }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Bitiş Tarihi</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                           id="end_date" name="end_date" value="{{ old('end_date', $announcement->end_date?->format('Y-m-d')) }}">
                                    <small class="text-muted">Boş bırakılırsa süresiz olarak görünür</small>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status', $announcement->status) == 'draft' ? 'selected' : '' }}>Taslak</option>
                                        <option value="published" {{ old('status', $announcement->status) == 'published' ? 'selected' : '' }}>Yayında</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_pinned" name="is_pinned" 
                                               value="1" {{ old('is_pinned', $announcement->is_pinned) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_pinned">
                                            <i class="fas fa-thumbtack text-danger"></i> Sabitlenmiş Duyuru
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <small class="text-muted">
                                        <i class="fas fa-eye"></i> Görüntülenme: {{ $announcement->view_count }}<br>
                                        <i class="fas fa-clock"></i> Oluşturulma: {{ $announcement->created_at->format('d.m.Y H:i') }}<br>
                                        <i class="fas fa-edit"></i> Son Güncelleme: {{ $announcement->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
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
ClassicEditor
    .create(document.querySelector('#content'), {
        language: 'tr'
    })
    .catch(error => {
        console.error(error);
    });
</script>
@endpush 