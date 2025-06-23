@extends('admin.layouts.app')

@section('title', 'Yeni İhale')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni İhale Ekle</h3>
                </div>
                <form action="{{ route('admin.tenders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">İhale Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tender_number" class="form-label">İhale Numarası <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tender_number') is-invalid @enderror" 
                                           id="tender_number" name="tender_number" value="{{ old('tender_number') }}" required>
                                    @error('tender_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Açıklama <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="8" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="requirements" class="form-label">Katılım Şartları</label>
                                    <textarea class="form-control @error('requirements') is-invalid @enderror" 
                                              id="requirements" name="requirements" rows="6">{{ old('requirements') }}</textarea>
                                    @error('requirements')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="documents" class="form-label">İhale Dokümanları</label>
                                    <input type="file" class="form-control @error('documents.*') is-invalid @enderror" 
                                           id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.xls,.xlsx">
                                    <small class="text-muted">PDF, DOC, DOCX, XLS, XLSX formatlarında maksimum 20MB dosya yükleyebilirsiniz.</small>
                                    @error('documents.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tender_location" class="form-label">İhale Yeri</label>
                                            <input type="text" class="form-control @error('tender_location') is-invalid @enderror" 
                                                   id="tender_location" name="tender_location" value="{{ old('tender_location') }}">
                                            @error('tender_location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="tender_date" class="form-label">İhale Tarihi</label>
                                            <input type="date" class="form-control @error('tender_date') is-invalid @enderror" 
                                                   id="tender_date" name="tender_date" value="{{ old('tender_date') }}">
                                            @error('tender_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="tender_time" class="form-label">İhale Saati</label>
                                            <input type="time" class="form-control @error('tender_time') is-invalid @enderror" 
                                                   id="tender_time" name="tender_time" value="{{ old('tender_time') }}">
                                            @error('tender_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tender_type" class="form-label">İhale Türü <span class="text-danger">*</span></label>
                                    <select class="form-select @error('tender_type') is-invalid @enderror" 
                                            id="tender_type" name="tender_type" required>
                                        <option value="">Seçiniz</option>
                                        <option value="goods" {{ old('tender_type') == 'goods' ? 'selected' : '' }}>Mal Alımı</option>
                                        <option value="services" {{ old('tender_type') == 'services' ? 'selected' : '' }}>Hizmet Alımı</option>
                                        <option value="construction" {{ old('tender_type') == 'construction' ? 'selected' : '' }}>Yapım İşi</option>
                                        <option value="consulting" {{ old('tender_type') == 'consulting' ? 'selected' : '' }}>Danışmanlık</option>
                                    </select>
                                    @error('tender_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="procurement_method" class="form-label">İhale Usulü <span class="text-danger">*</span></label>
                                    <select class="form-select @error('procurement_method') is-invalid @enderror" 
                                            id="procurement_method" name="procurement_method" required>
                                        <option value="">Seçiniz</option>
                                        <option value="open" {{ old('procurement_method') == 'open' ? 'selected' : '' }}>Açık İhale</option>
                                        <option value="restricted" {{ old('procurement_method') == 'restricted' ? 'selected' : '' }}>Belli İstekliler Arası</option>
                                        <option value="negotiated" {{ old('procurement_method') == 'negotiated' ? 'selected' : '' }}>Pazarlık Usulü</option>
                                        <option value="direct" {{ old('procurement_method') == 'direct' ? 'selected' : '' }}>Doğrudan Temin</option>
                                    </select>
                                    @error('procurement_method')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="estimated_cost" class="form-label">Yaklaşık Maliyet</label>
                                    <input type="number" class="form-control @error('estimated_cost') is-invalid @enderror" 
                                           id="estimated_cost" name="estimated_cost" value="{{ old('estimated_cost') }}" 
                                           min="0" step="0.01" placeholder="TL">
                                    @error('estimated_cost')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="announcement_date" class="form-label">İlan Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('announcement_date') is-invalid @enderror" 
                                           id="announcement_date" name="announcement_date" value="{{ old('announcement_date', date('Y-m-d')) }}" required>
                                    @error('announcement_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Son Teklif Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" 
                                           id="deadline" name="deadline" value="{{ old('deadline') }}" required>
                                    @error('deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr>
                                <h6>İletişim Bilgileri</h6>

                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">İlgili Kişi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('contact_person') is-invalid @enderror" 
                                           id="contact_person" name="contact_person" value="{{ old('contact_person') }}" required>
                                    @error('contact_person')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" 
                                           id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" required>
                                    @error('contact_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('contact_email') is-invalid @enderror" 
                                           id="contact_email" name="contact_email" value="{{ old('contact_email') }}" required>
                                    @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Taslak</option>
                                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>Yayında</option>
                                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Kapalı</option>
                                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>İptal</option>
                                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Kaydet
                        </button>
                        <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary">
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
ClassicEditor.create(document.querySelector('#description'), { language: 'tr' });
ClassicEditor.create(document.querySelector('#requirements'), { language: 'tr' });
</script>
@endpush