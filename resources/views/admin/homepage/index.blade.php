@extends('admin.layouts.app')

@section('title', 'Anasayfa Yönetimi')
@section('page-title', 'Anasayfa Yönetimi')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.homepage.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Hero Slider Ayarları (JSON) -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-images me-2"></i>
                    Hero Slider Ayarları
                </h5>
                <button type="button" class="btn btn-success btn-sm" onclick="addHeroSlide()">
                    <i class="fas fa-plus me-1"></i> Slide Ekle
                </button>
            </div>
            <div class="card-body">
                <div id="hero-slides-container">
                    @if($settings->hero_slides && count($settings->hero_slides) > 0)
                        @foreach($settings->hero_slides as $index => $slide)
                        <div class="hero-slide-item card mb-3" data-index="{{ $index }}">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">{{ $index + 1 }}. Slide</h6>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeHeroSlide(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Başlık</label>
                                            <input type="text" name="hero_slides[{{ $index }}][title]" class="form-control" 
                                                   value="{{ old('hero_slides.' . $index . '.title', $slide['title'] ?? '') }}"
                                                   placeholder="Slide başlığı">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Açıklama</label>
                                            <textarea name="hero_slides[{{ $index }}][description]" class="form-control" rows="3"
                                                      placeholder="Slide açıklaması">{{ old('hero_slides.' . $index . '.description', $slide['description'] ?? '') }}</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Buton Metni</label>
                                            <input type="text" name="hero_slides[{{ $index }}][button_text]" class="form-control" 
                                                   value="{{ old('hero_slides.' . $index . '.button_text', $slide['button_text'] ?? 'Projelerimizi İncele') }}"
                                                   placeholder="Buton metni">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Buton Linki</label>
                                            <input type="text" name="hero_slides[{{ $index }}][button_link]" class="form-control" 
                                                   value="{{ old('hero_slides.' . $index . '.button_link', $slide['button_link'] ?? '/projects') }}"
                                                   placeholder="/projects">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Arkaplan Görseli</label>
                                            <input type="file" name="hero_slides[{{ $index }}][image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Önerilen boyut: 1920x1080px (maksimum 15MB - Otomatik sıkıştırılır)</small>
                                            
                                            @if(isset($slide['image']) && $slide['image'])
                                                <div class="mt-2 position-relative d-inline-block">
                                                    <img src="{{ asset('storage/' . $slide['image']) }}" 
                                                         alt="Hero Slide {{ $index + 1 }}" 
                                                         class="img-thumbnail" style="max-width: 200px;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                                            onclick="deleteSlideImage('hero_slides', {{ $index }}, this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="hero_slides[{{ $index }}][existing_image]" value="{{ $slide['image'] }}">
                                            @endif
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Küçük Görsel (Sağ)</label>
                                            <input type="file" name="hero_slides[{{ $index }}][small_image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Önerilen boyut: 600x400px</small>
                                            
                                            @if(isset($slide['small_image']) && $slide['small_image'])
                                                <div class="mt-2 position-relative d-inline-block">
                                                    <img src="{{ asset('storage/' . $slide['small_image']) }}" 
                                                         alt="Hero Small {{ $index + 1 }}" 
                                                         class="img-thumbnail" style="max-width: 150px;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                                            onclick="deleteSlideImage('hero_slides', {{ $index }}, this, 'small_image')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="hero_slides[{{ $index }}][existing_small_image]" value="{{ $slide['small_image'] }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Varsayılan ilk slide -->
                        <div class="hero-slide-item card mb-3" data-index="0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">1. Slide</h6>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeHeroSlide(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Başlık</label>
                                            <input type="text" name="hero_slides[0][title]" class="form-control" 
                                                   value="Modern İnşaat Çözümleri"
                                                   placeholder="Slide başlığı">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Açıklama</label>
                                            <textarea name="hero_slides[0][description]" class="form-control" rows="3"
                                                      placeholder="Slide açıklaması">Hatay'ın geleceğini şekillendiren projelerle şehrimize değer katıyoruz. Kaliteli ve sürdürülebilir inşaat hizmetleri sunuyoruz.</textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Buton Metni</label>
                                            <input type="text" name="hero_slides[0][button_text]" class="form-control" 
                                                   value="Projelerimizi İncele"
                                                   placeholder="Buton metni">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Buton Linki</label>
                                            <input type="text" name="hero_slides[0][button_link]" class="form-control" 
                                                   value="/projects"
                                                   placeholder="/projects">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Arkaplan Görseli</label>
                                            <input type="file" name="hero_slides[0][image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Önerilen boyut: 1920x1080px (maksimum 15MB - Otomatik sıkıştırılır)</small>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Küçük Görsel (Sağ)</label>
                                            <input type="file" name="hero_slides[0][small_image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Önerilen boyut: 600x400px</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Hakkımızda Bölümü -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Hakkımızda Bölümü
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="about_subtitle" class="form-control" 
                                   value="{{ old('about_subtitle', $settings->about_subtitle) }}"
                                   placeholder="Hayata Geçirdiğimiz Projeler">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="about_title" class="form-control" 
                                   value="{{ old('about_title', $settings->about_title) }}"
                                   placeholder="Hatay'ın Geleceğini İnşa Ediyoruz!">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Açıklama</label>
                            <textarea name="about_description" class="form-control" rows="4"
                                      placeholder="Hakkımızda açıklama metni">{{ old('about_description', $settings->about_description) }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">1. İstatistik Sayı</label>
                                <input type="text" name="about_stat_1_number" class="form-control" 
                                       value="{{ old('about_stat_1_number', $settings->about_stat_1_number) }}"
                                       placeholder="16+">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">1. İstatistik Metin</label>
                                <input type="text" name="about_stat_1_text" class="form-control" 
                                       value="{{ old('about_stat_1_text', $settings->about_stat_1_text) }}"
                                       placeholder="Proje">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">2. İstatistik Sayı</label>
                                <input type="text" name="about_stat_2_number" class="form-control" 
                                       value="{{ old('about_stat_2_number', $settings->about_stat_2_number) }}"
                                       placeholder="15+">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">2. İstatistik Metin</label>
                                <input type="text" name="about_stat_2_text" class="form-control" 
                                       value="{{ old('about_stat_2_text', $settings->about_stat_2_text) }}"
                                       placeholder="Yıl Tecrübe">
                            </div>
                        </div>

                        <!-- Hakkımızda Slider Görselleri (JSON) -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span>Hakkımızda Slider Görselleri</span>
                                <button type="button" class="btn btn-success btn-sm" onclick="addAboutImage()">
                                    <i class="fas fa-plus me-1"></i> Görsel Ekle
                                </button>
                            </label>
                            
                            <div id="about-images-container">
                                @if($settings->about_images && count($settings->about_images) > 0)
                                    @foreach($settings->about_images as $index => $image)
                                    <div class="about-image-item card mb-2" data-index="{{ $index }}">
                                        <div class="card-body p-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <input type="file" name="about_images[{{ $index }}][image]" class="form-control" accept="image/*">
                                                    @if(isset($image['image']) && $image['image'])
                                                        <input type="hidden" name="about_images[{{ $index }}][existing_image]" value="{{ $image['image'] }}">
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="about_images[{{ $index }}][caption]" class="form-control" 
                                                           value="{{ old('about_images.' . $index . '.caption', $image['caption'] ?? '') }}"
                                                           placeholder="Görsel açıklaması (opsiyonel)">
                                                </div>
                                                <div class="col-md-2 text-end">
                                                    @if(isset($image['image']) && $image['image'])
                                                        <img src="{{ asset('storage/' . $image['image']) }}" 
                                                             alt="About Image {{ $index + 1 }}" 
                                                             class="img-thumbnail me-2" style="max-width: 60px;">
                                                    @endif
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeAboutImage(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <!-- Varsayılan ilk görsel -->
                                    <div class="about-image-item card mb-2" data-index="0">
                                        <div class="card-body p-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <input type="file" name="about_images[0][image]" class="form-control" accept="image/*">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="about_images[0][caption]" class="form-control" 
                                                           placeholder="Görsel açıklaması (opsiyonel)">
                                                </div>
                                                <div class="col-md-2 text-end">
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeAboutImage(this)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <small class="text-muted">Bu görseller hakkımızda bölümündeki slider'da gösterilecektir. Önerilen boyut: 800x600px</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- İnşaat Uzmanlığı Görselleri -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-tools me-2"></i>
                    İnşaat Uzmanlığı Bölümü Görselleri
                </h5>
                <button type="button" class="btn btn-success btn-sm" onclick="addExpertiseImage()">
                    <i class="fas fa-plus me-1"></i> Görsel Ekle
                </button>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Görsel Türleri:</strong><br>
                    • <strong>Ana Görsel:</strong> Büyük ana resim (800x600px önerilir)<br>
                    • <strong>İkinci Ana Görsel:</strong> Orta boyut resim (600x400px önerilir)<br>
                    • <strong>Galeri Görseli:</strong> Küçük galeri resimleri (400x300px önerilir)
                </div>
                
                <div id="expertise-images-container">
                    @if($settings->expertise_images && count($settings->expertise_images) > 0)
                        @foreach($settings->expertise_images as $index => $image)
                        <div class="expertise-image-item card mb-3" data-index="{{ $index }}">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">{{ $index + 1 }}. Görsel - {{ ucfirst($image['type'] ?? 'gallery') }}</h6>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeExpertiseImage(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Dosyası</label>
                                            <input type="file" name="expertise_images[{{ $index }}][image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Maksimum 15MB - Otomatik sıkıştırılır</small>
                                            
                                            @if(isset($image['image']) && $image['image'])
                                                <div class="mt-2 position-relative d-inline-block">
                                                    <img src="{{ asset('storage/' . $image['image']) }}" 
                                                         alt="Expertise Image {{ $index + 1 }}" 
                                                         class="img-thumbnail" style="max-width: 150px;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                                            onclick="deleteSlideImage('expertise_images', {{ $index }}, this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="expertise_images[{{ $index }}][existing_image]" value="{{ $image['image'] }}">
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Türü</label>
                                            <select name="expertise_images[{{ $index }}][type]" class="form-control" onchange="updateExpertiseImageTitle(this)">
                                                <option value="main" {{ (isset($image['type']) && $image['type'] === 'main') ? 'selected' : '' }}>Ana Görsel</option>
                                                <option value="main2" {{ (isset($image['type']) && $image['type'] === 'main2') ? 'selected' : '' }}>İkinci Ana Görsel</option>
                                                <option value="gallery" {{ (isset($image['type']) && $image['type'] === 'gallery') || !isset($image['type']) ? 'selected' : '' }}>Galeri Görseli</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Açıklaması</label>
                                            <input type="text" name="expertise_images[{{ $index }}][caption]" class="form-control" 
                                                   value="{{ old('expertise_images.' . $index . '.caption', $image['caption'] ?? '') }}"
                                                   placeholder="Görsel açıklaması (opsiyonel)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Varsayılan ilk görsel -->
                        <div class="expertise-image-item card mb-3" data-index="0">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">1. Görsel - Ana Görsel</h6>
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeExpertiseImage(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Dosyası</label>
                                            <input type="file" name="expertise_images[0][image]" class="form-control" accept="image/*">
                                            <small class="text-muted">Maksimum 15MB - Otomatik sıkıştırılır</small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Türü</label>
                                            <select name="expertise_images[0][type]" class="form-control">
                                                <option value="main" selected>Ana Görsel</option>
                                                <option value="main2">İkinci Ana Görsel</option>
                                                <option value="gallery">Galeri Görseli</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Görsel Açıklaması</label>
                                            <input type="text" name="expertise_images[0][caption]" class="form-control" 
                                                   placeholder="Görsel açıklaması (opsiyonel)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Bölüm Ayarları -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cogs me-2"></i>
                    Bölüm Başlıkları ve Ayarları
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Tesisler Bölümü -->
                    <div class="col-lg-6 mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Tesisler Bölümü</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="facilities_subtitle" class="form-control" 
                                   value="{{ old('facilities_subtitle', $settings->facilities_subtitle) }}"
                                   placeholder="Tamamlanan Tesisler">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="facilities_title" class="form-control" 
                                   value="{{ old('facilities_title', $settings->facilities_title) }}"
                                   placeholder="Şehrimize Kazandırdığımız Tesisler">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="facilities_show" class="form-check-input" id="facilities_show" 
                                   value="1" {{ $settings->facilities_show ? 'checked' : '' }}>
                            <label class="form-check-label" for="facilities_show">
                                Tesisler bölümünü göster
                            </label>
                        </div>
                    </div>

                    <!-- İnşaat Uzmanlığı Bölümü -->
                    <div class="col-lg-6 mb-4">
                        <h6 class="border-bottom pb-2 mb-3">İnşaat Uzmanlığı Bölümü</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="expertise_subtitle" class="form-control" 
                                   value="{{ old('expertise_subtitle', $settings->expertise_subtitle) }}"
                                   placeholder="İnşaat ve Yapı Uzmanlığımız">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="expertise_title" class="form-control" 
                                   value="{{ old('expertise_title', $settings->expertise_title) }}"
                                   placeholder="Modern İnşaat Teknolojileri ile">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Açıklama</label>
                            <textarea name="expertise_description" class="form-control" rows="3"
                                      placeholder="İnşaat uzmanlığı açıklaması">{{ old('expertise_description', $settings->expertise_description) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="form-label">İstatistik 1</label>
                                    <input type="text" name="expertise_stat_1_number" class="form-control" 
                                           value="{{ old('expertise_stat_1_number', $settings->expertise_stat_1_number) }}"
                                           placeholder="16+ Proje">
                                </div>
                                <input type="text" name="expertise_stat_1_text" class="form-control" 
                                       value="{{ old('expertise_stat_1_text', $settings->expertise_stat_1_text) }}"
                                       placeholder="Aktif İnşaat Projesi">
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label class="form-label">İstatistik 2</label>
                                    <input type="text" name="expertise_stat_2_number" class="form-control" 
                                           value="{{ old('expertise_stat_2_number', $settings->expertise_stat_2_number) }}"
                                           placeholder="15+ Yıl">
                                </div>
                                <input type="text" name="expertise_stat_2_text" class="form-control" 
                                       value="{{ old('expertise_stat_2_text', $settings->expertise_stat_2_text) }}"
                                       placeholder="İnşaat Tecrübesi">
                            </div>
                        </div>
                    </div>

                    <!-- Haberler Bölümü -->
                    <div class="col-lg-6 mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Haberler Bölümü</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="news_subtitle" class="form-control" 
                                   value="{{ old('news_subtitle', $settings->news_subtitle) }}"
                                   placeholder="Haberler & Duyurular">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="news_title" class="form-control" 
                                   value="{{ old('news_title', $settings->news_title) }}"
                                   placeholder="Son Haberlerimiz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gösterilecek Haber Sayısı</label>
                            <input type="number" name="news_count" class="form-control" min="1" max="10" 
                                   value="{{ old('news_count', $settings->news_count ?? 3) }}">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="news_show" class="form-check-input" id="news_show" 
                                   value="1" {{ $settings->news_show ? 'checked' : '' }}>
                            <label class="form-check-label" for="news_show">
                                Haberler bölümünü göster
                            </label>
                        </div>
                    </div>

                    <!-- Projeler Bölümü -->
                    <div class="col-lg-6 mb-4">
                        <h6 class="border-bottom pb-2 mb-3">Projeler Bölümü</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="projects_subtitle" class="form-control" 
                                   value="{{ old('projects_subtitle', $settings->projects_subtitle) }}"
                                   placeholder="Projelerimiz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="projects_title" class="form-control" 
                                   value="{{ old('projects_title', $settings->projects_title) }}"
                                   placeholder="Devam Eden Projeler">
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="projects_show" class="form-check-input" id="projects_show" 
                                   value="1" {{ $settings->projects_show ? 'checked' : '' }}>
                            <label class="form-check-label" for="projects_show">
                                Projeler bölümünü göster
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="projects_map_show" class="form-check-input" id="projects_map_show" 
                                   value="1" {{ $settings->projects_map_show ? 'checked' : '' }}>
                            <label class="form-check-label" for="projects_map_show">
                                Proje haritasını göster
                            </label>
                        </div>
                    </div>

                    <!-- İletişim CTA Bölümü -->
                    <div class="col-lg-6 mb-4">
                        <h6 class="border-bottom pb-2 mb-3">İletişim CTA Bölümü</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Alt Başlık</label>
                            <input type="text" name="contact_subtitle" class="form-control" 
                                   value="{{ old('contact_subtitle', $settings->contact_subtitle) }}"
                                   placeholder="Soru ve Görüşleriniz">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ana Başlık</label>
                            <input type="text" name="contact_title" class="form-control" 
                                   value="{{ old('contact_title', $settings->contact_title) }}"
                                   placeholder="Bizimle İletişime Geçmek İçin">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="contact_show" class="form-check-input" id="contact_show" 
                                   value="1" {{ $settings->contact_show ? 'checked' : '' }}>
                            <label class="form-check-label" for="contact_show">
                                İletişim CTA bölümünü göster
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Resim Yönetimi -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-image me-2"></i>
                    Breadcrumb Arkaplan Resmi
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Breadcrumb Arkaplan Görseli</label>
                            <input type="file" name="breadcrumb_image" class="form-control" accept="image/*">
                            <small class="text-muted">Tüm sayfaların breadcrumb bölümünde kullanılacak arkaplan resmi. Önerilen boyut: 1920x400px (maksimum 15MB - Otomatik sıkıştırılır)</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($settings->breadcrumb_image)
                            <div class="mb-3">
                                <label class="form-label">Mevcut Görsel</label>
                                <div class="position-relative d-inline-block">
                                    <img src="{{ asset('storage/' . $settings->breadcrumb_image) }}" 
                                         alt="Breadcrumb Background" 
                                         class="img-thumbnail" style="max-width: 300px; max-height: 150px;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 rounded-circle" 
                                            onclick="deleteImage('breadcrumb_image', this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="text-center p-4 border rounded bg-light">
                                <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-2 mb-0">Henüz breadcrumb arkaplan görseli yüklenmemiş</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Bilgi:</strong> Bu görsel tüm sayfaların üst kısmındaki breadcrumb (sayfa yolu) bölümünde arkaplan olarak kullanılacaktır. 
                    Görsel yüklenmezse varsayılan arkaplan kullanılır.
                </div>
            </div>
        </div>

        <!-- Footer İframe Ayarları -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-code me-2"></i>
                    Footer İframe Ayarları
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="footer_iframe_code" class="form-label">Footer İframe Kodu</label>
                    <textarea class="form-control @error('footer_iframe_code') is-invalid @enderror" 
                              id="footer_iframe_code" name="footer_iframe_code" rows="6" 
                              placeholder="Örn: Google Maps embed kodu, YouTube iframe veya başka bir iframe kodu">{{ old('footer_iframe_code', $settings->footer_iframe_code) }}</textarea>
                    <small class="text-muted">Bu iframe kodu SADECE ana sayfanın footer bölümünde gösterilecektir. Diğer sayfalarda footer statik kalacaktır.</small>
                    @error('footer_iframe_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Bilgi:</strong> Bu iframe sadece ana sayfada gösterilir. Boş bırakılırsa normal footer görüntülenir.
                </div>
            </div>
        </div>

        <!-- Kaydet Butonu -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i>
                Ayarları Kaydet
            </button>
        </div>
    </form>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border-radius: 0.375rem;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.form-label {
    font-weight: 500;
    color: #495057;
    margin-bottom: 0.5rem;
}

.form-control {
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
}

.form-control:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

.btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.img-thumbnail {
    border-radius: 0.375rem;
}

.position-relative .btn-danger {
    transform: translate(50%, -50%);
}
</style>

<script>
let heroSlideIndex = {{ $settings->hero_slides ? count($settings->hero_slides) : 1 }};
let aboutImageIndex = {{ $settings->about_images ? count($settings->about_images) : 1 }};
let expertiseImageIndex = {{ $settings->expertise_images ? count($settings->expertise_images) : 1 }};

// Hero Slide ekleme
function addHeroSlide() {
    const container = document.getElementById('hero-slides-container');
    const newSlide = `
        <div class="hero-slide-item card mb-3" data-index="${heroSlideIndex}">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">${heroSlideIndex + 1}. Slide</h6>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeHeroSlide(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Başlık</label>
                            <input type="text" name="hero_slides[${heroSlideIndex}][title]" class="form-control" 
                                   placeholder="Slide başlığı">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Açıklama</label>
                            <textarea name="hero_slides[${heroSlideIndex}][description]" class="form-control" rows="3"
                                      placeholder="Slide açıklaması"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Buton Metni</label>
                            <input type="text" name="hero_slides[${heroSlideIndex}][button_text]" class="form-control" 
                                   value="Projelerimizi İncele"
                                   placeholder="Buton metni">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Buton Linki</label>
                            <input type="text" name="hero_slides[${heroSlideIndex}][button_link]" class="form-control" 
                                   value="/projects"
                                   placeholder="/projects">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Arkaplan Görseli</label>
                            <input type="file" name="hero_slides[${heroSlideIndex}][image]" class="form-control" accept="image/*">
                            <small class="text-muted">Önerilen boyut: 1920x1080px (maksimum 15MB - Otomatik sıkıştırılır)</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Küçük Görsel (Sağ)</label>
                            <input type="file" name="hero_slides[${heroSlideIndex}][small_image]" class="form-control" accept="image/*">
                            <small class="text-muted">Önerilen boyut: 600x400px</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newSlide);
    heroSlideIndex++;
    updateSlideNumbers();
}

// Hero Slide silme
function removeHeroSlide(button) {
    if (!confirm('Bu slide\'ı silmek istediğinizden emin misiniz?')) {
        return;
    }
    
    const slideItem = button.closest('.hero-slide-item');
    slideItem.remove();
    updateSlideNumbers();
}

// About Image ekleme
function addAboutImage() {
    const container = document.getElementById('about-images-container');
    const newImage = `
        <div class="about-image-item card mb-2" data-index="${aboutImageIndex}">
            <div class="card-body p-3">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <input type="file" name="about_images[${aboutImageIndex}][image]" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="about_images[${aboutImageIndex}][caption]" class="form-control" 
                               placeholder="Görsel açıklaması (opsiyonel)">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeAboutImage(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newImage);
    aboutImageIndex++;
}

// About Image silme
function removeAboutImage(button) {
    if (!confirm('Bu görseli silmek istediğinizden emin misiniz?')) {
        return;
    }
    
    const imageItem = button.closest('.about-image-item');
    imageItem.remove();
}

// Expertise Image ekleme
function addExpertiseImage() {
    const container = document.getElementById('expertise-images-container');
    const newImage = `
        <div class="expertise-image-item card mb-3" data-index="${expertiseImageIndex}">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">${expertiseImageIndex + 1}. Görsel - Galeri</h6>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeExpertiseImage(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Görsel Dosyası</label>
                            <input type="file" name="expertise_images[${expertiseImageIndex}][image]" class="form-control" accept="image/*">
                            <small class="text-muted">Maksimum 15MB - Otomatik sıkıştırılır</small>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Görsel Türü</label>
                            <select name="expertise_images[${expertiseImageIndex}][type]" class="form-control" onchange="updateExpertiseImageTitle(this)">
                                <option value="main">Ana Görsel</option>
                                <option value="main2">İkinci Ana Görsel</option>
                                <option value="gallery" selected>Galeri Görseli</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Görsel Açıklaması</label>
                            <input type="text" name="expertise_images[${expertiseImageIndex}][caption]" class="form-control" 
                                   placeholder="Görsel açıklaması (opsiyonel)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newImage);
    expertiseImageIndex++;
}

// Expertise Image silme
function removeExpertiseImage(button) {
    if (!confirm('Bu görseli silmek istediğinizden emin misiniz?')) {
        return;
    }
    
    const imageItem = button.closest('.expertise-image-item');
    imageItem.remove();
}

// Expertise Image başlığını güncelle
function updateExpertiseImageTitle(selectElement) {
    const card = selectElement.closest('.expertise-image-item');
    const header = card.querySelector('h6');
    const index = card.getAttribute('data-index');
    const type = selectElement.value;
    
    let typeText = '';
    switch(type) {
        case 'main': typeText = 'Ana Görsel'; break;
        case 'main2': typeText = 'İkinci Ana Görsel'; break;
        case 'gallery': typeText = 'Galeri Görseli'; break;
        default: typeText = 'Galeri Görseli';
    }
    
    header.textContent = `${parseInt(index) + 1}. Görsel - ${typeText}`;
}

// Slide numaralarını güncelle
function updateSlideNumbers() {
    const slides = document.querySelectorAll('.hero-slide-item');
    slides.forEach((slide, index) => {
        const header = slide.querySelector('h6');
        header.textContent = `${index + 1}. Slide`;
        slide.setAttribute('data-index', index);
    });
}

// Slide görseli silme
function deleteSlideImage(type, index, button, imageType = 'image') {
    if (!confirm('Bu görseli silmek istediğinizden emin misiniz?')) {
        return;
    }

    const field = `${type}_${index}_${imageType}`;

    fetch('{{ route("admin.homepage.delete-image") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            field: field,
            type: type,
            index: index,
            imageType: imageType
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.parentElement.remove();
        } else {
            alert('Görsel silinirken bir hata oluştu.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu.');
    });
}

// Eski görsel silme fonksiyonu (legacy)
function deleteImage(field, button) {
    if (!confirm('Bu görseli silmek istediğinizden emin misiniz?')) {
        return;
    }

    fetch('{{ route("admin.homepage.delete-image") }}', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            field: field
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.parentElement.remove();
        } else {
            alert('Görsel silinirken bir hata oluştu.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Bir hata oluştu.');
    });
}
</script>
@endsection 