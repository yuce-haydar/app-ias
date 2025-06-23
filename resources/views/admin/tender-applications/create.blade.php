@extends('admin.layouts.app')

@section('title', 'Yeni İhale Başvurusu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Yeni İhale Başvurusu</h3>
                    <a href="{{ route('admin.tender-applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tender-applications.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tender_id" class="form-label">İhale <span class="text-danger">*</span></label>
                                    <select name="tender_id" id="tender_id" class="form-control @error('tender_id') is-invalid @enderror" required>
                                        <option value="">İhale seçin</option>
                                        @foreach($tenders as $tender)
                                            <option value="{{ $tender->id }}" {{ old('tender_id') == $tender->id ? 'selected' : '' }}>
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
                                    <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="company_type" class="form-label">Şirket Türü <span class="text-danger">*</span></label>
                                    <select name="company_type" id="company_type" class="form-control @error('company_type') is-invalid @enderror" required>
                                        <option value="">Şirket türü seçin</option>
                                        <option value="limited" {{ old('company_type') == 'limited' ? 'selected' : '' }}>Limited Şirket</option>
                                        <option value="anonim" {{ old('company_type') == 'anonim' ? 'selected' : '' }}>Anonim Şirket</option>
                                        <option value="kollektif" {{ old('company_type') == 'kollektif' ? 'selected' : '' }}>Kollektif Şirket</option>
                                        <option value="komandit" {{ old('company_type') == 'komandit' ? 'selected' : '' }}>Komandit Şirket</option>
                                        <option value="kooperatif" {{ old('company_type') == 'kooperatif' ? 'selected' : '' }}>Kooperatif</option>
                                        <option value="sahis" {{ old('company_type') == 'sahis' ? 'selected' : '' }}>Şahıs İşletmesi</option>
                                    </select>
                                    @error('company_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tax_number" class="form-label">Vergi Numarası <span class="text-danger">*</span></label>
                                    <input type="text" name="tax_number" id="tax_number" class="form-control @error('tax_number') is-invalid @enderror" value="{{ old('tax_number') }}" required>
                                    @error('tax_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">İletişim Kişisi <span class="text-danger">*</span></label>
                                    <input type="text" name="contact_person" id="contact_person" class="form-control @error('contact_person') is-invalid @enderror" value="{{ old('contact_person') }}" required>
                                    @error('contact_person')
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
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres <span class="text-danger">*</span></label>
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="experience_years" class="form-label">Deneyim Yılı <span class="text-danger">*</span></label>
                                    <input type="number" name="experience_years" id="experience_years" class="form-control @error('experience_years') is-invalid @enderror" value="{{ old('experience_years') }}" min="0" required>
                                    @error('experience_years')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="financial_capacity" class="form-label">Mali Kapasite</label>
                                    <input type="number" step="0.01" name="financial_capacity" id="financial_capacity" class="form-control @error('financial_capacity') is-invalid @enderror" value="{{ old('financial_capacity') }}" min="0">
                                    @error('financial_capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="technical_capacity" class="form-label">Teknik Kapasite</label>
                                    <textarea name="technical_capacity" id="technical_capacity" class="form-control @error('technical_capacity') is-invalid @enderror" rows="3">{{ old('technical_capacity') }}</textarea>
                                    @error('technical_capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="bid_amount" class="form-label">Teklif Tutarı <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="bid_amount" id="bid_amount" class="form-control @error('bid_amount') is-invalid @enderror" value="{{ old('bid_amount') }}" min="0" required>
                                            @error('bid_amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="currency" class="form-label">Para Birimi <span class="text-danger">*</span></label>
                                            <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" required>
                                                <option value="TRY" {{ old('currency') == 'TRY' ? 'selected' : '' }}>TRY</option>
                                                <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                                <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
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

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Kaydet
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