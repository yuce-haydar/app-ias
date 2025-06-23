@extends('admin.layouts.app')

@section('title', 'Yeni İş İlanı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yeni İş İlanı Ekle</h3>
                </div>
                <form action="{{ route('admin.job-postings.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Pozisyon Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Departman <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('department') is-invalid @enderror" 
                                                   id="department" name="department" value="{{ old('department') }}" required>
                                            @error('department')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Lokasyon <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                                   id="location" name="location" value="{{ old('location', 'Hatay') }}" required>
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="job_description" class="form-label">İş Tanımı <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('job_description') is-invalid @enderror" 
                                              id="job_description" name="job_description" rows="5" required>{{ old('job_description') }}</textarea>
                                    @error('job_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="requirements" class="form-label">Gereksinimler</label>
                                    <textarea class="form-control @error('requirements') is-invalid @enderror" 
                                              id="requirements" name="requirements" rows="5">{{ old('requirements') }}</textarea>
                                    @error('requirements')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="responsibilities" class="form-label">Sorumluluklar</label>
                                    <textarea class="form-control @error('responsibilities') is-invalid @enderror" 
                                              id="responsibilities" name="responsibilities" rows="5">{{ old('responsibilities') }}</textarea>
                                    @error('responsibilities')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="qualifications" class="form-label">Nitelikler</label>
                                    <textarea class="form-control @error('qualifications') is-invalid @enderror" 
                                              id="qualifications" name="qualifications" rows="5">{{ old('qualifications') }}</textarea>
                                    @error('qualifications')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="position_type" class="form-label">Çalışma Şekli <span class="text-danger">*</span></label>
                                    <select class="form-select @error('position_type') is-invalid @enderror" 
                                            id="position_type" name="position_type" required>
                                        <option value="">Seçiniz</option>
                                        <option value="full_time" {{ old('position_type') == 'full_time' ? 'selected' : '' }}>Tam Zamanlı</option>
                                        <option value="part_time" {{ old('position_type') == 'part_time' ? 'selected' : '' }}>Yarı Zamanlı</option>
                                        <option value="contract" {{ old('position_type') == 'contract' ? 'selected' : '' }}>Sözleşmeli</option>
                                        <option value="intern" {{ old('position_type') == 'intern' ? 'selected' : '' }}>Stajyer</option>
                                    </select>
                                    @error('position_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="education_level" class="form-label">Eğitim Seviyesi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('education_level') is-invalid @enderror" 
                                           id="education_level" name="education_level" value="{{ old('education_level') }}" 
                                           placeholder="Örn: Lisans, Ön Lisans, Lise" required>
                                    @error('education_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_required" class="form-label">Deneyim</label>
                                    <input type="text" class="form-control @error('experience_required') is-invalid @enderror" 
                                           id="experience_required" name="experience_required" value="{{ old('experience_required') }}"
                                           placeholder="Örn: 2-5 yıl">
                                    @error('experience_required')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="number_of_positions" class="form-label">Alınacak Kişi Sayısı <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('number_of_positions') is-invalid @enderror" 
                                           id="number_of_positions" name="number_of_positions" value="{{ old('number_of_positions', 1) }}" 
                                           min="1" required>
                                    @error('number_of_positions')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Maaş Aralığı</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control @error('salary_min') is-invalid @enderror" 
                                                   name="salary_min" value="{{ old('salary_min') }}" placeholder="Min" min="0">
                                            @error('salary_min')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control @error('salary_max') is-invalid @enderror" 
                                                   name="salary_max" value="{{ old('salary_max') }}" placeholder="Max" min="0">
                                            @error('salary_max')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input type="checkbox" class="form-check-input" id="show_salary" name="show_salary" 
                                               value="1" {{ old('show_salary') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="show_salary">
                                            Maaşı Göster
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="posting_date" class="form-label">İlan Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('posting_date') is-invalid @enderror" 
                                           id="posting_date" name="posting_date" value="{{ old('posting_date', date('Y-m-d')) }}" required>
                                    @error('posting_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deadline" class="form-label">Son Başvuru Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" 
                                           id="deadline" name="deadline" value="{{ old('deadline') }}" required>
                                    @error('deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Taslak</option>
                                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Kapalı</option>
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
                        <a href="{{ route('admin.job-postings.index') }}" class="btn btn-secondary">
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
ClassicEditor.create(document.querySelector('#job_description'), { language: 'tr' });
ClassicEditor.create(document.querySelector('#requirements'), { language: 'tr' });
ClassicEditor.create(document.querySelector('#responsibilities'), { language: 'tr' });
ClassicEditor.create(document.querySelector('#qualifications'), { language: 'tr' });
</script>
@endpush 