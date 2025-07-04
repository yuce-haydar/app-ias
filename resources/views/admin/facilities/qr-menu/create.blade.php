@extends('admin.layouts.app')

@section('title', 'QR Menü Oluştur')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ $facility->name }} - QR Menü Oluştur</h3>
                    <a href="{{ route('admin.facilities.show', $facility) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri
                    </a>
                </div>
                <form action="{{ route('admin.facilities.qr-menu.store', $facility) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Menü Adı <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name', $facility->name . ' Menü') }}" 
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="url_slug" class="form-label">URL Slug <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('url_slug') is-invalid @enderror" 
                                           id="url_slug" 
                                           name="url_slug" 
                                           value="{{ old('url_slug', Str::slug($facility->name)) }}" 
                                           required>
                                    <div class="form-text">
                                        Menü URL'i: <strong>{{ url('/qr-menu/') }}/</strong><span id="slug-preview">{{ old('url_slug', Str::slug($facility->name)) }}</span>
                                    </div>
                                    @error('url_slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" 
                                           class="form-control @error('logo') is-invalid @enderror" 
                                           id="logo" 
                                           name="logo" 
                                           accept="image/*">
                                    <div class="form-text">PNG, JPG, JPEG formatlarında yükleyebilirsiniz.</div>
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Tema Renkleri</h5>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="primary_color" class="form-label">Ana Renk</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('primary_color') is-invalid @enderror" 
                                           id="primary_color" 
                                           name="primary_color" 
                                           value="{{ old('primary_color', '#007bff') }}">
                                    @error('primary_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="secondary_color" class="form-label">İkincil Renk</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('secondary_color') is-invalid @enderror" 
                                           id="secondary_color" 
                                           name="secondary_color" 
                                           value="{{ old('secondary_color', '#6c757d') }}">
                                    @error('secondary_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="accent_color" class="form-label">Vurgu Rengi</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('accent_color') is-invalid @enderror" 
                                           id="accent_color" 
                                           name="accent_color" 
                                           value="{{ old('accent_color', '#28a745') }}">
                                    @error('accent_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="background_color" class="form-label">Arka Plan Rengi</label>
                                    <input type="color" 
                                           class="form-control form-control-color @error('background_color') is-invalid @enderror" 
                                           id="background_color" 
                                           name="background_color" 
                                           value="{{ old('background_color', '#ffffff') }}">
                                    @error('background_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Yönetici Kullanıcı Oluştur</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="admin_name" class="form-label">Yönetici Adı <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('admin_name') is-invalid @enderror" 
                                           id="admin_name" 
                                           name="admin_name" 
                                           value="{{ old('admin_name') }}" 
                                           required>
                                    @error('admin_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="admin_email" class="form-label">Yönetici E-posta <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control @error('admin_email') is-invalid @enderror" 
                                           id="admin_email" 
                                           name="admin_email" 
                                           value="{{ old('admin_email') }}" 
                                           required>
                                    @error('admin_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="admin_phone" class="form-label">Yönetici Telefon</label>
                                    <input type="tel" 
                                           class="form-control @error('admin_phone') is-invalid @enderror" 
                                           id="admin_phone" 
                                           name="admin_phone" 
                                           value="{{ old('admin_phone') }}">
                                    @error('admin_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="admin_password" class="form-label">Yönetici Şifre <span class="text-danger">*</span></label>
                                    <input type="password" 
                                           class="form-control @error('admin_password') is-invalid @enderror" 
                                           id="admin_password" 
                                           name="admin_password" 
                                           required>
                                    <div class="form-text">En az 8 karakter olmalıdır.</div>
                                    @error('admin_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Bilgi:</strong> QR menü oluşturulduktan sonra otomatik olarak QR kod oluşturulacak ve demo veriler eklenecektir.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.facilities.show', $facility) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> İptal
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> QR Menü Oluştur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // URL slug önizlemesini güncelle
    document.getElementById('url_slug').addEventListener('input', function() {
        document.getElementById('slug-preview').textContent = this.value;
    });
    
    // Menü adından otomatik slug oluştur
    document.getElementById('name').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/ğ/g, 'g')
            .replace(/ü/g, 'u')
            .replace(/ş/g, 's')
            .replace(/ı/g, 'i')
            .replace(/ö/g, 'o')
            .replace(/ç/g, 'c')
            .replace(/[^a-z0-9]/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-|-$/g, '');
        
        document.getElementById('url_slug').value = slug;
        document.getElementById('slug-preview').textContent = slug;
    });
</script>
@endpush 