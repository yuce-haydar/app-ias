@extends('admin.layouts.app')

@section('title', 'Yeni İş Başvurusu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Yeni İş Başvurusu</h3>
                    <a href="{{ route('admin.job-applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.job-applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="job_posting_id" class="form-label">İş İlanı <span class="text-danger">*</span></label>
                                    <select name="job_posting_id" id="job_posting_id" class="form-control @error('job_posting_id') is-invalid @enderror" required>
                                        <option value="">İş ilanı seçin</option>
                                        @foreach($jobPostings as $jobPosting)
                                            <option value="{{ $jobPosting->id }}" {{ old('job_posting_id') == $jobPosting->id ? 'selected' : '' }}>
                                                {{ $jobPosting->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('job_posting_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Ad <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Soyad <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cv_file" class="form-label">CV Dosyası</label>
                                    <input type="file" name="cv_file" id="cv_file" class="form-control @error('cv_file') is-invalid @enderror" accept=".pdf,.doc,.docx">
                                    @error('cv_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">PDF, DOC veya DOCX formatında, maksimum 5MB</small>
                                </div>

                                <div class="mb-3">
                                    <label for="cover_letter" class="form-label">Ön Yazı</label>
                                    <textarea name="cover_letter" id="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror" rows="4">{{ old('cover_letter') }}</textarea>
                                    @error('cover_letter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label">Notlar</label>
                                    <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" rows="3">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Eğitim Bilgileri -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Eğitim Bilgileri</h5>
                                <div id="education-container">
                                    <div class="education-item border p-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="education[0][school]" class="form-control" placeholder="Okul/Üniversite">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="education[0][degree]" class="form-control" placeholder="Derece/Bölüm">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" name="education[0][year]" class="form-control" placeholder="Yıl">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="education[0][gpa]" class="form-control" placeholder="Not Ortalaması">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="addEducation()">+ Eğitim Ekle</button>
                            </div>
                        </div>

                        <hr>

                        <!-- İş Deneyimi -->
                        <div class="row">
                            <div class="col-12">
                                <h5>İş Deneyimi</h5>
                                <div id="experience-container">
                                    <div class="experience-item border p-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="experience[0][company]" class="form-control" placeholder="Şirket">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="experience[0][position]" class="form-control" placeholder="Pozisyon">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="experience[0][duration]" class="form-control" placeholder="Süre">
                                            </div>
                                            <div class="col-md-4">
                                                <textarea name="experience[0][description]" class="form-control" placeholder="Açıklama" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="addExperience()">+ Deneyim Ekle</button>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Kaydet
                                </button>
                                <a href="{{ route('admin.job-applications.index') }}" class="btn btn-secondary">
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

<script>
let educationIndex = 1;
let experienceIndex = 1;

function addEducation() {
    const container = document.getElementById('education-container');
    const html = `
        <div class="education-item border p-3 mb-2">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="education[${educationIndex}][school]" class="form-control" placeholder="Okul/Üniversite">
                </div>
                <div class="col-md-3">
                    <input type="text" name="education[${educationIndex}][degree]" class="form-control" placeholder="Derece/Bölüm">
                </div>
                <div class="col-md-2">
                    <input type="number" name="education[${educationIndex}][year]" class="form-control" placeholder="Yıl">
                </div>
                <div class="col-md-2">
                    <input type="text" name="education[${educationIndex}][gpa]" class="form-control" placeholder="Not Ortalaması">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.education-item').remove()">×</button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    educationIndex++;
}

function addExperience() {
    const container = document.getElementById('experience-container');
    const html = `
        <div class="experience-item border p-3 mb-2">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="experience[${experienceIndex}][company]" class="form-control" placeholder="Şirket">
                </div>
                <div class="col-md-3">
                    <input type="text" name="experience[${experienceIndex}][position]" class="form-control" placeholder="Pozisyon">
                </div>
                <div class="col-md-2">
                    <input type="text" name="experience[${experienceIndex}][duration]" class="form-control" placeholder="Süre">
                </div>
                <div class="col-md-3">
                    <textarea name="experience[${experienceIndex}][description]" class="form-control" placeholder="Açıklama" rows="2"></textarea>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.experience-item').remove()">×</button>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    experienceIndex++;
}
</script>
@endsection 