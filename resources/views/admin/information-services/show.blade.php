@extends('admin.layouts.app')

@section('title', 'Bilgi Detayları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Bilgi Detayları</h3>
                    <div>
                        <a href="{{ route('admin.information-services.edit', $informationService) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.information-services.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri Dön
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%">Başlık:</th>
                                    <td>{{ $informationService->title }}</td>
                                </tr>
                                <tr>
                                    <th>Sıra:</th>
                                    <td>{{ $informationService->order }}</td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        @if($informationService->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Pasif</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Oluşturulma Tarihi:</th>
                                    <td>{{ $informationService->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Güncellenme Tarihi:</th>
                                    <td>{{ $informationService->updated_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            @if($informationService->document)
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Belge</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <i class="fas fa-file-alt fa-3x text-info mb-3"></i>
                                        <br>
                                        <a href="{{ $informationService->document_url }}" target="_blank" class="btn btn-info">
                                            <i class="fas fa-download"></i> Belgeyi İndir
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Bu bilgi için belge yüklenmemiş.
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Değer:</h5>
                            <div class="border rounded p-3 bg-light">
                                {{ $informationService->value }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 