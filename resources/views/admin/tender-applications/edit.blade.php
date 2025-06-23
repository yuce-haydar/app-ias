@extends('admin.layouts.app')

@section('title', 'İhale Başvurusu Düzenle')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İhale Başvurusu Düzenle</h3>
                    <a href="{{ route('admin.tender-applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tender-applications.update', $tenderApplication) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tender_id" class="form-label">İhale <span class="text-danger">*</span></label>
                                    <select name="tender_id" id="tender_id" class="form-control @error('tender_id') is-invalid @enderror" required>
                                        <option value="">İhale seçin</option>
                                        @foreach($tenders as $tender)
                                            <option value="{{ $tender->id }}" {{ old('tender_id', $tenderApplication->tender_id) == $tender->id ? 'selected' : '' }}>
                                                {{ $tender->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tender_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Şirket Adı <span class="text-danger">*</span></label>
                                    <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $tenderApplication->company_name) }}" required>
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="company_type" class="form-label">Şirket Türü <span class="text-danger">*</span></label>
                                    <select name="company_type" id="company_type" class="form-control @error('company_type') is-invalid @enderror" required>
                                        <option value="">Şirket türü seçin</option>
                                        <option value="limited" {{ old('company_type', $tenderApplication->company_type) == 'limited' ? 'selected' : '' }}>Limited Şirket</option>
                                        <option value="anonim" {{ old('company_type', $tenderApplication->company_type) == 'anonim' ? 'selected' : '' }}>Anonim Şirket</option>
                                        <option value="kollektif" {{ old('company_type', $tenderApplication->company_type) == 'kollektif' ? 'selected' : '' }}>Kollektif Şirket</option>
                                        <option value="komandit" {{ old('company_type', $tenderApplication->company_type) == 'komandit' ? 'selected' : '' }}>Komandit Şirket</option>
                                        <option value="kooperatif" {{ old('company_type', $tenderApplication->company_type) == 'kooperatif' ? 'selected' : '' }}>Kooperatif</option>
                                        <option value="sahis" {{ old('company_type', $tenderApplication->company_type) == 'sahis' ? 'selected' : '' }}>Şahıs İşletmesi</option>
                                    </select>
                                    @error('company_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tax_number" class="form-label">Vergi Numarası <span class="text-danger">*</span></label>
                                    <input type="text" name="tax_number" id="tax_number" class="form-control @error('tax_number') is-invalid @enderror" value="{{ old('tax_number', $tenderApplication->tax_number) }}" required>
                                    @error('tax_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">İletişim Kişisi <span class="text-danger">*</span></label>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control @error('contact_person') is-invalid @enderror" value="{{ old('contact_person', $tenderApplication->contact_person) }}" required>
                                    @error('contact_person')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $tenderApplication->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $tenderApplication->phone) }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres <span class="text-danger">*</span></label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address', $tenderApplication->address) }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_years" class="form-label">Deneyim Yılı <span class="text-danger">*</span></label>
                                    <input type="number" name="experience_years" id="experience_years" class="form-control @error('experience_years') is-invalid @enderror" value="{{ old('experience_years', $tenderApplication->experience_years) }}" min="0" required>
                                    @error('experience_years')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="financial_capacity" class="form-label">Mali Kapasite</label>
                                    <input type="number" step="0.01" name="financial_capacity" id="financial_capacity" class="form-control @error('financial_capacity') is-invalid @enderror" value="{{ old('financial_capacity', $tenderApplication->financial_capacity) }}" min="0">
                                    @error('financial_capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="technical_capacity" class="form-label">Teknik Kapasite</label>
                                    <textarea name="technical_capacity" id="technical_capacity" class="form-control @error('technical_capacity') is-invalid @enderror" rows="3">{{ old('technical_capacity', $tenderApplication->technical_capacity) }}</textarea>
                                    @error('technical_capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="bid_amount" class="form-label">Teklif Tutarı <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="bid_amount" id="bid_amount" class="form-control @error('bid_amount') is-invalid @enderror" value="{{ old('bid_amount', $tenderApplication->bid_amount) }}" min="0" required>
                                            @error('bid_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="currency" class="form-label">Para Birimi <span class="text-danger">*</span></label>
                                            <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" required>
                                                <option value="TRY" {{ old('currency', $tenderApplication->currency) == 'TRY' ? 'selected' : '' }}>TRY</option>
                                                <option value="USD" {{ old('currency', $tenderApplication->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                                                <option value="EUR" {{ old('currency', $tenderApplication->currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                                            </select>
                                            @error('currency')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Durum <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="pending" {{ old('status', $tenderApplication->status) == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                        <option value="approved" {{ old('status', $tenderApplication->status) == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                        <option value="rejected" {{ old('status', $tenderApplication->status) == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label">Notlar</label>
                                    <textarea name="notes" id="notes" class="form-control @error('notes') is-invalid @enderror" rows="3">{{ old('notes', $tenderApplication->notes) }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <small class="text-muted">
                                        Başvuru Tarihi: {{ $tenderApplication->applied_at ? $tenderApplication->applied_at->format('d.m.Y H:i') : '-' }}<br>
                                        Oluşturulma: {{ $tenderApplication->created_at->format('d.m.Y H:i') }}<br>
                                        Son Güncelleme: {{ $tenderApplication->updated_at->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Güncelle
                                </button>
                                <a href="{{ route('admin.tender-applications.index') }}" class="btn btn-secondary">
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