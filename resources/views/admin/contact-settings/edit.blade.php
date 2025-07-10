@extends('admin.layouts.app')

@section('title', 'İletişim Ayarları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İletişim Ayarları</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.contact-settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Genel Bilgiler</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle">Alt Başlık</label>
                                    <input type="text" 
                                           class="form-control @error('subtitle') is-invalid @enderror" 
                                           id="subtitle" 
                                           name="subtitle" 
                                           value="{{ old('subtitle', $settings->subtitle) }}">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Ana Başlık</label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $settings->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description', $settings->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Merkez Ofis Bilgileri</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="office_title">Ofis Başlığı</label>
                                    <input type="text" 
                                           class="form-control @error('office_title') is-invalid @enderror" 
                                           id="office_title" 
                                           name="office_title" 
                                           value="{{ old('office_title', $settings->office_title) }}">
                                    @error('office_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="office_address">Ofis Adresi</label>
                                    <textarea class="form-control @error('office_address') is-invalid @enderror" 
                                              id="office_address" 
                                              name="office_address" 
                                              rows="3">{{ old('office_address', $settings->office_address) }}</textarea>
                                    @error('office_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Telefon Bilgileri</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_title">Telefon Başlığı</label>
                                    <input type="text" 
                                           class="form-control @error('phone_title') is-invalid @enderror" 
                                           id="phone_title" 
                                           name="phone_title" 
                                           value="{{ old('phone_title', $settings->phone_title) }}">
                                    @error('phone_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_general">Genel Telefon</label>
                                    <input type="text" 
                                           class="form-control @error('phone_general') is-invalid @enderror" 
                                           id="phone_general" 
                                           name="phone_general" 
                                           value="{{ old('phone_general', $settings->phone_general) }}">
                                    @error('phone_general')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_fax">Faks Numarası</label>
                                    <input type="text" 
                                           class="form-control @error('phone_fax') is-invalid @enderror" 
                                           id="phone_fax" 
                                           name="phone_fax" 
                                           value="{{ old('phone_fax', $settings->phone_fax) }}">
                                    @error('phone_fax')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>E-posta Bilgileri</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_title">E-posta Başlığı</label>
                                    <input type="text" 
                                           class="form-control @error('email_title') is-invalid @enderror" 
                                           id="email_title" 
                                           name="email_title" 
                                           value="{{ old('email_title', $settings->email_title) }}">
                                    @error('email_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_info">Bilgi E-postası</label>
                                    <input type="email" 
                                           class="form-control @error('email_info') is-invalid @enderror" 
                                           id="email_info" 
                                           name="email_info" 
                                           value="{{ old('email_info', $settings->email_info) }}">
                                    @error('email_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email_contact">İletişim E-postası</label>
                                    <input type="email" 
                                           class="form-control @error('email_contact') is-invalid @enderror" 
                                           id="email_contact" 
                                           name="email_contact" 
                                           value="{{ old('email_contact', $settings->email_contact) }}">
                                    @error('email_contact')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Çalışma Saatleri</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="working_hours_title">Çalışma Saatleri Başlığı</label>
                                    <input type="text" 
                                           class="form-control @error('working_hours_title') is-invalid @enderror" 
                                           id="working_hours_title" 
                                           name="working_hours_title" 
                                           value="{{ old('working_hours_title', $settings->working_hours_title) }}">
                                    @error('working_hours_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="working_hours_weekday">Hafta İçi Saatleri</label>
                                    <input type="text" 
                                           class="form-control @error('working_hours_weekday') is-invalid @enderror" 
                                           id="working_hours_weekday" 
                                           name="working_hours_weekday" 
                                           value="{{ old('working_hours_weekday', $settings->working_hours_weekday) }}">
                                    @error('working_hours_weekday')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="working_hours_weekend">Hafta Sonu Saatleri</label>
                                    <input type="text" 
                                           class="form-control @error('working_hours_weekend') is-invalid @enderror" 
                                           id="working_hours_weekend" 
                                           name="working_hours_weekend" 
                                           value="{{ old('working_hours_weekend', $settings->working_hours_weekend) }}">
                                    @error('working_hours_weekend')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Sosyal Medya</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_url">Facebook URL</label>
                                    <input type="url" 
                                           class="form-control @error('facebook_url') is-invalid @enderror" 
                                           id="facebook_url" 
                                           name="facebook_url" 
                                           value="{{ old('facebook_url', $settings->facebook_url) }}">
                                    @error('facebook_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_url">Twitter URL</label>
                                    <input type="url" 
                                           class="form-control @error('twitter_url') is-invalid @enderror" 
                                           id="twitter_url" 
                                           name="twitter_url" 
                                           value="{{ old('twitter_url', $settings->twitter_url) }}">
                                    @error('twitter_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram_url">Instagram URL</label>
                                    <input type="url" 
                                           class="form-control @error('instagram_url') is-invalid @enderror" 
                                           id="instagram_url" 
                                           name="instagram_url" 
                                           value="{{ old('instagram_url', $settings->instagram_url) }}">
                                    @error('instagram_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube_url">YouTube URL</label>
                                    <input type="url" 
                                           class="form-control @error('youtube_url') is-invalid @enderror" 
                                           id="youtube_url" 
                                           name="youtube_url" 
                                           value="{{ old('youtube_url', $settings->youtube_url) }}">
                                    @error('youtube_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Harita</h4>
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="map_embed_code">Harita Embed Kodu</label>
                                    <textarea class="form-control @error('map_embed_code') is-invalid @enderror" 
                                              id="map_embed_code" 
                                              name="map_embed_code" 
                                              rows="4" 
                                              placeholder="Google Maps iframe embed kodunu buraya yapıştırın">{{ old('map_embed_code', $settings->map_embed_code) }}</textarea>
                                    @error('map_embed_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 