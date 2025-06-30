@extends('admin.layouts.app')

@section('title', 'Site Ayarları')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Site Ayarları</h4>
                    <p class="text-muted">Header, footer ve genel site ayarlarını yönetin</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Form -->
    <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <!-- Site Genel Ayarları -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>🌐 Site Genel Ayarları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Site Başlığı</label>
                                    <input type="text" class="form-control" name="site_title" value="{{ $settings->site_title }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kuruluş Yılı</label>
                                    <input type="number" class="form-control" name="founded_year" value="{{ $settings->founded_year }}" min="1900" max="{{ date('Y') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site Açıklaması</label>
                                    <textarea class="form-control" name="site_description" rows="3">{{ $settings->site_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Anahtar Kelimeler (SEO)</label>
                                    <input type="text" class="form-control" name="site_keywords" value="{{ $settings->site_keywords }}" placeholder="kelime1, kelime2, kelime3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Site Logosu</label>
                                    <input type="file" class="form-control" name="site_logo" accept="image/*">
                                    @if($settings->site_logo)
                                        <img src="{{ Storage::url($settings->site_logo) }}" alt="Logo" class="img-thumbnail mt-2" style="max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Site Favicon</label>
                                    <input type="file" class="form-control" name="site_favicon" accept="image/*">
                                    @if($settings->site_favicon)
                                        <img src="{{ Storage::url($settings->site_favicon) }}" alt="Favicon" class="img-thumbnail mt-2" style="max-height: 50px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Ayarları -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📱 Header Ayarları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Header Telefon</label>
                                    <input type="text" class="form-control" name="header_phone" value="{{ $settings->header_phone }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Header E-posta</label>
                                    <input type="email" class="form-control" name="header_email" value="{{ $settings->header_email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Header Adres</label>
                                    <input type="text" class="form-control" name="header_address" value="{{ $settings->header_address }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Header Duyuru Metni</label>
                                    <textarea class="form-control" name="header_announcement" rows="2">{{ $settings->header_announcement }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="header_announcement_show" id="header_announcement_show" {{ $settings->header_announcement_show ? 'checked' : '' }}>
                                    <label class="form-check-label" for="header_announcement_show">
                                        Header Duyurusunu Göster
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Ayarları -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📄 Footer Ayarları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Footer Açıklaması</label>
                                    <textarea class="form-control" name="footer_description" rows="4">{{ $settings->footer_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Footer Telefon</label>
                                    <input type="text" class="form-control" name="footer_phone" value="{{ $settings->footer_phone }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Footer E-posta</label>
                                    <input type="email" class="form-control" name="footer_email" value="{{ $settings->footer_email }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Footer Adres</label>
                                    <input type="text" class="form-control" name="footer_address" value="{{ $settings->footer_address }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Çalışma Saatleri</label>
                                    <input type="text" class="form-control" name="footer_working_hours" value="{{ $settings->footer_working_hours }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sosyal Medya Ayarları -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📱 Sosyal Medya Hesapları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input type="url" class="form-control" name="social_facebook" value="{{ $settings->social_facebook }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Instagram URL</label>
                                    <input type="url" class="form-control" name="social_instagram" value="{{ $settings->social_instagram }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Twitter URL</label>
                                    <input type="url" class="form-control" name="social_twitter" value="{{ $settings->social_twitter }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>LinkedIn URL</label>
                                    <input type="url" class="form-control" name="social_linkedin" value="{{ $settings->social_linkedin }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>YouTube URL</label>
                                    <input type="url" class="form-control" name="social_youtube" value="{{ $settings->social_youtube }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>WhatsApp Numarası</label>
                                    <input type="text" class="form-control" name="social_whatsapp" value="{{ $settings->social_whatsapp }}" placeholder="905551234567">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- İletişim Bilgileri -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📞 İletişim Bilgileri</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Telefon 1</label>
                                    <input type="text" class="form-control" name="contact_phone_1" value="{{ $settings->contact_phone_1 }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Telefon 2</label>
                                    <input type="text" class="form-control" name="contact_phone_2" value="{{ $settings->contact_phone_2 }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>E-posta 1</label>
                                    <input type="email" class="form-control" name="contact_email_1" value="{{ $settings->contact_email_1 }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>E-posta 2</label>
                                    <input type="email" class="form-control" name="contact_email_2" value="{{ $settings->contact_email_2 }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Adres</label>
                                    <textarea class="form-control" name="contact_address" rows="3">{{ $settings->contact_address }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Google Maps Embed URL</label>
                                    <textarea class="form-control" name="contact_google_maps" rows="3">{{ $settings->contact_google_maps }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright ve Yasal -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>⚖️ Copyright ve Yasal Bilgiler</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Copyright Metni</label>
                                    <input type="text" class="form-control" name="copyright_text" value="{{ $settings->copyright_text }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gizlilik Politikası</label>
                                    <textarea class="form-control" name="privacy_policy" rows="4">{{ $settings->privacy_policy }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kullanım Şartları</label>
                                    <textarea class="form-control" name="terms_conditions" rows="4">{{ $settings->terms_conditions }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO ve Analitik -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📊 SEO ve Analitik Ayarları</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Google Analytics Kodu</label>
                                    <textarea class="form-control" name="google_analytics" rows="4" placeholder="GA tracking kodu...">{{ $settings->google_analytics }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook Pixel Kodu</label>
                                    <textarea class="form-control" name="facebook_pixel" rows="4" placeholder="Facebook pixel kodu...">{{ $settings->facebook_pixel }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Özel CSS</label>
                                    <textarea class="form-control" name="custom_css" rows="6" placeholder="/* Özel CSS kodları */">{{ $settings->custom_css }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Özel JavaScript</label>
                                    <textarea class="form-control" name="custom_js" rows="6" placeholder="// Özel JavaScript kodları">{{ $settings->custom_js }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-success btn-lg px-5">
                            <i class="fas fa-save"></i> Site Ayarlarını Kaydet
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
.card {
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.form-group {
    margin-bottom: 1rem;
}
</style>
@endpush
@endsection 