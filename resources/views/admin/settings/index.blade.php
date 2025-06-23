@extends('admin.layouts.app')

@section('title', 'Site Ayarları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Site Ayarları</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Site Ayarları -->
                        @if(isset($settings['site']) && $settings['site']->count() > 0)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4 class="border-bottom pb-2">Site Ayarları</h4>
                                </div>
                                @foreach($settings['site'] as $setting)
                                    <div class="col-md-6 mb-3">
                                        <label for="{{ $setting->key }}" class="form-label">{{ $setting->label }}</label>
                                        
                                        @if($setting->type === 'textarea')
                                            <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" rows="3">{{ $setting->value }}</textarea>
                                        @elseif($setting->type === 'file')
                                            <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control">
                                            @if($setting->value)
                                                <p class="mt-2">
                                                    <strong>Mevcut:</strong> 
                                                    <a href="{{ asset('storage/' . $setting->value) }}" target="_blank">Dosyayı Görüntüle</a>
                                                </p>
                                            @endif
                                        @else
                                            <input type="{{ $setting->type }}" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                        @endif
                                        
                                        @if($setting->description)
                                            <small class="form-text text-muted">{{ $setting->description }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- İletişim Bilgileri -->
                        @if(isset($settings['contact']) && $settings['contact']->count() > 0)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4 class="border-bottom pb-2">İletişim Bilgileri</h4>
                                </div>
                                @foreach($settings['contact'] as $setting)
                                    <div class="col-md-6 mb-3">
                                        <label for="{{ $setting->key }}" class="form-label">{{ $setting->label }}</label>
                                        
                                        @if($setting->type === 'textarea')
                                            <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" rows="3">{{ $setting->value }}</textarea>
                                        @else
                                            <input type="{{ $setting->type }}" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                        @endif
                                        
                                        @if($setting->description)
                                            <small class="form-text text-muted">{{ $setting->description }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Sosyal Medya -->
                        @if(isset($settings['social']) && $settings['social']->count() > 0)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4 class="border-bottom pb-2">Sosyal Medya</h4>
                                </div>
                                @foreach($settings['social'] as $setting)
                                    <div class="col-md-6 mb-3">
                                        <label for="{{ $setting->key }}" class="form-label">{{ $setting->label }}</label>
                                        <input type="{{ $setting->type }}" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                        
                                        @if($setting->description)
                                            <small class="form-text text-muted">{{ $setting->description }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- SEO Ayarları -->
                        @if(isset($settings['seo']) && $settings['seo']->count() > 0)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4 class="border-bottom pb-2">SEO Ayarları</h4>
                                </div>
                                @foreach($settings['seo'] as $setting)
                                    <div class="col-md-6 mb-3">
                                        <label for="{{ $setting->key }}" class="form-label">{{ $setting->label }}</label>
                                        <input type="{{ $setting->type }}" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                        
                                        @if($setting->description)
                                            <small class="form-text text-muted">{{ $setting->description }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Diğer Gruplar -->
                        @foreach($settings as $groupName => $groupSettings)
                            @if(!in_array($groupName, ['site', 'contact', 'social', 'seo']) && $groupSettings->count() > 0)
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h4 class="border-bottom pb-2">{{ ucfirst($groupName) }} Ayarları</h4>
                                    </div>
                                    @foreach($groupSettings as $setting)
                                        <div class="col-md-6 mb-3">
                                            <label for="{{ $setting->key }}" class="form-label">{{ $setting->label }}</label>
                                            
                                            @if($setting->type === 'textarea')
                                                <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" rows="3">{{ $setting->value }}</textarea>
                                            @elseif($setting->type === 'file')
                                                <input type="file" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control">
                                                @if($setting->value)
                                                    <p class="mt-2">
                                                        <strong>Mevcut:</strong> 
                                                        <a href="{{ asset('storage/' . $setting->value) }}" target="_blank">Dosyayı Görüntüle</a>
                                                    </p>
                                                @endif
                                            @else
                                                <input type="{{ $setting->type }}" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                            @endif
                                            
                                            @if($setting->description)
                                                <small class="form-text text-muted">{{ $setting->description }}</small>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Ayarları Kaydet
                                </button>
                            </div>
                        </div>
                    </form>

                    @if($settings->isEmpty())
                        <div class="text-center">
                            <p>Henüz ayar tanımlanmamış.</p>
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-primary">Varsayılan Ayarları Oluştur</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 