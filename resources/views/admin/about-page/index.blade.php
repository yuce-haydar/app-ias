@extends('admin.layouts.app')

@section('title', 'Hakkımızda Sayfası Yönetimi')
@section('page-title', 'Hakkımızda Sayfası Yönetimi')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about-page.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Ana Hakkımızda Bölümü -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Ana Hakkımızda Bölümü
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="main_title" class="form-control" 
                                   value="{{ old('main_title', $settings->main_title) }}"
                                   placeholder="Şehrimize Değer Katmak İçin Çalışıyoruz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İlk Paragraf</label>
                            <textarea name="main_description_1" class="form-control" rows="4" 
                                      placeholder="İlk paragraf açıklaması">{{ old('main_description_1', $settings->main_description_1) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">İkinci Paragraf</label>
                            <textarea name="main_description_2" class="form-control" rows="4" 
                                      placeholder="İkinci paragraf açıklaması">{{ old('main_description_2', $settings->main_description_2) }}</textarea>
                        </div>

                        <!-- Özellik Listesi -->
                        <div class="mb-3">
                            <label class="form-label">Özellik Listesi</label>
                            <div id="features-container">
                                @if($settings->features && count($settings->features) > 0)
                                    @foreach($settings->features as $index => $feature)
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control" 
                                               value="{{ old('features.' . $index, $feature) }}"
                                               placeholder="Özellik {{ $index + 1 }}">
                                        <button type="button" class="btn btn-danger" onclick="removeFeature(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control" 
                                               value="Kaliteli hizmet anlayışı ile çalışma"
                                               placeholder="Özellik 1">
                                        <button type="button" class="btn btn-danger" onclick="removeFeature(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control" 
                                               value="Şehrimize değer katacak projeler geliştirme"
                                               placeholder="Özellik 2">
                                        <button type="button" class="btn btn-danger" onclick="removeFeature(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-success btn-sm" onclick="addFeature()">
                                <i class="fas fa-plus me-1"></i> Özellik Ekle
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <!-- Ana Resim 1 -->
                        <div class="mb-3">
                            <label class="form-label">Ana Resim 1 (Büyük)</label>
                            <input type="file" name="main_image_1" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                            <small class="text-muted">Önerilen boyut: 600x400px | Desteklenen formatlar: JPEG, PNG, GIF, SVG, WebP (maksimum 10MB)</small>
                            
                            @if($settings->main_image_1)
                                <div class="mt-2 position-relative d-inline-block">
                                    <img src="{{ asset('storage/' . $settings->main_image_1) }}" 
                                         alt="Ana Resim 1" 
                                         class="img-thumbnail" style="max-width: 200px;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                            onclick="deleteImage('main_image_1')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <!-- Ana Resim 2 -->
                        <div class="mb-3">
                            <label class="form-label">Ana Resim 2 (Küçük)</label>
                            <input type="file" name="main_image_2" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                            <small class="text-muted">Önerilen boyut: 400x300px | Desteklenen formatlar: JPEG, PNG, GIF, SVG, WebP (maksimum 10MB)</small>
                            
                            @if($settings->main_image_2)
                                <div class="mt-2 position-relative d-inline-block">
                                    <img src="{{ asset('storage/' . $settings->main_image_2) }}" 
                                         alt="Ana Resim 2" 
                                         class="img-thumbnail" style="max-width: 200px;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                            onclick="deleteImage('main_image_2')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Misyon & Vizyon Bölümü -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-bullseye me-2"></i>
                    Misyon & Vizyon Bölümü
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Misyon Metni</label>
                            <textarea name="mission_text" class="form-control" rows="8" 
                                      placeholder="Misyon açıklaması">{{ old('mission_text', $settings->mission_text) }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Vizyon Metni</label>
                            <textarea name="vision_text" class="form-control" rows="8" 
                                      placeholder="Vizyon açıklaması">{{ old('vision_text', $settings->vision_text) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kaydet Butonu -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>
                        Kaydet
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
        <input type="text" name="features[]" class="form-control" placeholder="Yeni özellik">
        <button type="button" class="btn btn-danger" onclick="removeFeature(this)">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeFeature(button) {
    button.closest('.input-group').remove();
}

function deleteImage(fieldName) {
    if (confirm('Bu resmi silmek istediğinizden emin misiniz?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("admin.about-page.delete-image") }}';
        form.innerHTML = `
            @csrf
            @method('DELETE')
            <input type="hidden" name="image_field" value="${fieldName}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection 