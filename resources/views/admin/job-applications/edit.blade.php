@extends('admin.layouts.app')

@section('title', 'İş Başvurusu Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İş Başvurusu Düzenle</h3>
                    <a href="{{ route('admin.job-applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.job-applications.update', $jobApplication) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="job_posting_id" class="form-label">İş İlanı <span class="text-danger">*</span></label>
                                    <select name="job_posting_id" id="job_posting_id" class="form-control @error('job_posting_id') is-invalid @enderror" required>
                                        <option value="">İş ilanı seçin</option>
                                        @foreach($jobPostings as $jobPosting)
                                            <option value="{{ $jobPosting->id }}" {{ old('job_posting_id', $jobApplication->job_posting_id) == $jobPosting->id ? 'selected' : '' }}>
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
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $jobApplication->first_name) }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Soyad <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $jobApplication->last_name) }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $jobApplication->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $jobApplication->phone) }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres</label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $jobApplication->address) }}</textarea>
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
                                    @if($jobApplication->cv_file)
                                        <p class="mt-2">
                                            <strong>Mevcut dosya:</strong> 
                                            <a href="{{ asset('storage/' . $jobApplication->cv_file) }}" target="_blank">CV'yi Görüntüle</a>
                                        </p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="cover_letter" class="form-label">Ön Yazı</label>
                                    <textarea name="cover_letter" id="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror" rows="4">{{ old('cover_letter', $jobApplication->cover_letter) }}</textarea>
                                    @error('cover_letter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="pending" {{ old('status', $jobApplication->status) == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                        <option value="approved" {{ old('status', $jobApplication->status) == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                        <option value="rejected" {{ old('status', $jobApplication->status) == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label">Notlar</label>
                                    <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" rows="3">{{ old('notes', $jobApplication->notes) }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Başvuru Tarihi: {{ $jobApplication->applied_at ? $jobApplication->applied_at->format('d.m.Y H:i') : '-' }}<br>
                                        Oluşturulma: {{ $jobApplication->created_at->format('d.m.Y H:i') }}<br>
                                        Son Güncelleme: {{ $jobApplication->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Güncelle
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
@endsection 