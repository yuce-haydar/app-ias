@extends('admin.layouts.app')

@section('title', 'Hata Oluştu')
@section('page-title', 'Hata Oluştu')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body text-center py-5">
                <div class="error-icon mb-4">
                    <i class="fas fa-exclamation-triangle text-danger" style="font-size: 4rem;"></i>
                </div>
                
                <h4 class="text-danger mb-3">Bir Hata Oluştu</h4>
                
                <div class="alert alert-danger text-left">
                    <strong>Hata Detayı:</strong><br>
                    {{ $error }}
                </div>
                
                <div class="mt-4">
                    <a href="{{ $back_url ?? route('admin.dashboard') }}" class="btn btn-primary me-2">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
                    
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-home"></i> Ana Sayfa
                    </a>
                </div>
                
                <div class="mt-4">
                    <small class="text-muted">
                        Bu hata sistem yöneticisine bildirilmiştir. Sorun devam ederse lütfen teknik destek ile iletişime geçin.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.error-icon {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}
</style>
@endsection 