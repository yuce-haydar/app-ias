@extends('layouts.app')

@section('title', 'İnsan Kaynakları - Hatay İmar')
@section('description', 'Hatay İmar kariyer fırsatları, açık pozisyonlar ve iş başvuruları.')

@section('content')

<section class="breadcrumb-section">
    <div class="bg bg-image" style="background-image: url({{ $getBreadcrumbImage() }})"></div>
    <div class="container">
        <div class="title-outer">
            <div class="page-title">
                <h2 class="title">İnsan Kaynakları</h2>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Ana Sayfa</a></li>
                    <li><a href="{{ route('hr') }}">İnsan Kaynakları</a></li>
                    <li>İnsan Kaynakları</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="hr-section space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center mb-50">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Kariyer</div>
                    <h2 class="sec-title">Hatay İmar'da <span class="bold">Kariyer</span> Fırsatları</h2>
                    <p class="sec-text">Şehrimizin gelişimine katkıda bulunmak isteyen yetenekli profesyonelleri aramaktayız.</p>
                </div>
            </div>
        </div>
        
        <div class="row gy-40">
            <!-- Sol Taraf - Genel Başvuru Formu -->
            <div class="col-lg-6">
                <div class="application-form-wrapper">
                    <div class="form-header">
                        <h3>Genel İş Başvuru Formu</h3>
                        <p>Aşağıdaki formu doldurarak genel başvurunuzu yapabilirsiniz.</p>
                    </div>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form action="{{ route('general-job-application.store') }}" method="POST" enctype="multipart/form-data" class="application-form">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Ad *</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" required value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Soyad *</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" required value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date">Doğum Tarihi *</label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control" required value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Cinsiyet *</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="">Seçiniz</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Erkek</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Kadın</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6" id="military-status-wrapper" style="display: none;">
                                <div class="form-group">
                                    <label for="military_status">Askerlik Durumu</label>
                                    <select id="military_status" name="military_status" class="form-control">
                                        <option value="">Seçiniz</option>
                                        <option value="completed" {{ old('military_status') == 'completed' ? 'selected' : '' }}>Yapıldı</option>
                                        <option value="exempt" {{ old('military_status') == 'exempt' ? 'selected' : '' }}>Muaf</option>
                                        <option value="deferred" {{ old('military_status') == 'deferred' ? 'selected' : '' }}>Tecilli</option>
                                    </select>
                                    @error('military_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profession">Meslek *</label>
                                    <input type="text" id="profession" name="profession" class="form-control" required value="{{ old('profession') }}">
                                    @error('profession')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="documents">Belgeler (CV, Diploma, Sertifika vb.)</label>
                                    <input type="file" id="documents" name="documents[]" class="form-control" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                    <small class="text-muted">PDF, DOC, DOCX, JPG, JPEG, PNG formatlarında dosyalar yükleyebilirsiniz. Maksimum 10MB.</small>
                                    @error('documents.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="notes">Ek Notlar</label>
                                    <textarea id="notes" name="notes" class="form-control" rows="4" placeholder="Kendiniz hakkında ek bilgiler paylaşabilirsiniz...">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="theme-btn w-100">
                                    <i class="fa-solid fa-paper-plane me-2"></i>
                                    Başvuru Gönder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Sağ Taraf - Hatay Kariyer İstihdam Merkezi -->
            <div class="col-lg-6">
                <div class="career-portal-wrapper">
                    <div class="portal-header text-center">
                        <h3>Hatay Kariyer İstihdam Merkezi</h3>
                        <p>Hatay Büyükşehir Belediyesi'ne bağlı kuruluşların iş ilanları ve kariyer fırsatları</p>
                    </div>
                    
                    <div class="portal-content">
                        <div class="portal-image text-center mb-4">
                            <a href="https://hakim.hatay.bel.tr/" target="_blank">
                                <img src="{{ asset('assets/images/logo/hakimlogo.png') }}" alt="Hakim Logo" class="img-fluid" style="max-width: 300px;">
                            </a>
                        </div>
                        
                        <div class="portal-features">
                            <div class="feature-item">
                                <i class="fa-solid fa-briefcase"></i>
                                <div class="feature-text">
                                    <h5>Güncel İş İlanları</h5>
                                    <p>Hatay Büyükşehir Belediyesi ve bağlı kuruluşların güncel iş ilanlarına ulaşın.</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <i class="fa-solid fa-users"></i>
                                <div class="feature-text">
                                    <h5>Kariyer Danışmanlığı</h5>
                                    <p>Uzman kariyer danışmanlarımızdan destek alın ve doğru pozisyonu bulun.</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <div class="feature-text">
                                    <h5>Eğitim ve Sertifikasyon</h5>
                                    <p>Mesleki gelişim için eğitim programları ve sertifikasyon imkanları.</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <i class="fa-solid fa-chart-line"></i>
                                <div class="feature-text">
                                    <h5>Kariyer Gelişimi</h5>
                                    <p>Kariyerinizi ilerletmek için gerekli destek ve rehberlik hizmetleri.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="portal-actions text-center">
                            <a href="https://hakim.hatay.bel.tr/" class="theme-btn bg-theme" target="_blank">
                                <i class="fa-solid fa-external-link me-2"></i>
                                Hatay Kariyer İstihdam Merkezi'ni Ziyaret Et
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Neden Hatay İmar -->
<section class="why-us-section space bg-theme3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Neden Hatay İmar?</div>
                    <h2 class="sec-title mb-60">Hatay İmar'da Çalışmanın <span class="bold">Avantajları</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h4 class="feature-title">Güçlü Ekip</h4>
                    <p class="feature-text">Deneyimli ve uyumlu bir ekiple birlikte çalışma fırsatı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h4 class="feature-title">Kariyer Gelişimi</h4>
                    <p class="feature-text">Sürekli eğitim ve kariyer gelişim imkanları.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h4 class="feature-title">Sosyal Haklar</h4>
                    <p class="feature-text">Kapsamlı sosyal haklar ve yan ödemeler.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <h4 class="feature-title">Modern Tesisler</h4>
                    <p class="feature-text">Güncel teknoloji ile donatılmış modern çalışma ortamı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h4 class="feature-title">İş Güvencesi</h4>
                    <p class="feature-text">Belediye kuruluşu olarak sunduğumuz istikrarlı iş imkanı.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <h4 class="feature-title">Şehre Hizmet</h4>
                    <p class="feature-text">Hatay'ın gelişimine katkıda bulunma fırsatı.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Başvuru Süreci -->
<section class="application-process space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <div class="sub-title"><span><i class="asterisk"></i></span>Başvuru Süreci</div>
                    <h2 class="sec-title mb-60">Nasıl <span class="bold">Başvuru</span> Yapabilirsiniz?</h2>
                </div>
            </div>
        </div>
        
        <div class="row gy-30">
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-search"></i>
                        <span class="process-number">01</span>
                    </div>
                    <h4 class="process-title">Pozisyon Seçimi</h4>
                    <p class="process-text">Size uygun pozisyonu bulun ve detaylarını inceleyin.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-file-upload"></i>
                        <span class="process-number">02</span>
                    </div>
                    <h4 class="process-title">Online Başvuru</h4>
                    <p class="process-text">CV'nizi ve gerekli belgeleri online olarak gönderin.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-comments"></i>
                        <span class="process-number">03</span>
                    </div>
                    <h4 class="process-title">Mülakat</h4>
                    <p class="process-text">Uygun adaylar mülakat için davet edilir.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-item text-center">
                    <div class="process-icon">
                        <i class="fa-solid fa-user-check"></i>
                        <span class="process-number">04</span>
                    </div>
                    <h4 class="process-title">İşe Başlama</h4>
                    <p class="process-text">Başarılı adaylar ile işe başlama süreci tamamlanır.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.application-form-wrapper {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.form-header {
    text-align: center;
    margin-bottom: 30px;
}

.form-header h3 {
    color: #333;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #cf9f38;
    box-shadow: 0 0 0 0.2rem rgba(207, 159, 56, 0.25);
}

.career-portal-wrapper {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
}

.portal-header {
    margin-bottom: 30px;
}

.portal-header h3 {
    color: #333;
    margin-bottom: 10px;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.feature-item i {
    color: #cf9f38;
    font-size: 24px;
    margin-right: 15px;
    margin-top: 5px;
}

.feature-text h5 {
    color: #333;
    margin-bottom: 5px;
}

.feature-text p {
    color: #666;
    margin: 0;
    font-size: 14px;
}

.portal-actions {
    margin-top: 30px;
}

/* Responsive */
@media (max-width: 768px) {
    .application-form-wrapper,
    .career-portal-wrapper {
        padding: 20px;
    }
    
    .row.gy-40 > .col-lg-6 {
        margin-bottom: 40px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const genderSelect = document.getElementById('gender');
    const militaryStatusWrapper = document.getElementById('military-status-wrapper');
    const militaryStatusSelect = document.getElementById('military_status');
    
    function toggleMilitaryStatus() {
        if (genderSelect.value === 'male') {
            militaryStatusWrapper.style.display = 'block';
            militaryStatusWrapper.parentElement.classList.remove('col-md-6');
            militaryStatusWrapper.parentElement.classList.add('col-md-6');
        } else {
            militaryStatusWrapper.style.display = 'none';
            militaryStatusSelect.value = '';
        }
    }
    
    genderSelect.addEventListener('change', toggleMilitaryStatus);
    
    // Sayfa yüklendiğinde kontrol et
    toggleMilitaryStatus();
});
</script>

@endsection 