@extends('admin.layouts.app')

@section('title', 'Genel İş Başvuru Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Başvuru Detayları</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.general-job-applications.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Geri
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 40%;">Ad Soyad:</th>
                                    <td>{{ $application->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Doğum Tarihi:</th>
                                    <td>{{ $application->birth_date->format('d.m.Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Cinsiyet:</th>
                                    <td>{{ $application->gender_text }}</td>
                                </tr>
                                <tr>
                                    <th>Meslek:</th>
                                    <td>{{ $application->profession }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 40%;">Askerlik Durumu:</th>
                                    <td>
                                        @if($application->military_status)
                                            <span class="badge badge-info">{{ $application->military_status_text }}</span>
                                        @else
                                            <span class="text-muted">Belirtilmemiş</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        <span class="badge badge-{{ $application->status_color }}">
                                            {{ $application->status_text }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Başvuru Tarihi:</th>
                                    <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    @if($application->notes)
                    <div class="row">
                        <div class="col-12">
                            <h5>Ek Notlar:</h5>
                            <div class="alert alert-info">
                                {{ $application->notes }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Belgeler -->
                    @if($application->documents && count($application->documents) > 0)
                    <div class="row">
                        <div class="col-12">
                            <h5>Yüklenen Belgeler:</h5>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Dosya Adı</th>
                                            <th>Boyut</th>
                                            <th>Tür</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($application->documents as $index => $document)
                                        <tr>
                                            <td>{{ $document['original_name'] }}</td>
                                            <td>{{ number_format($document['size'] / 1024, 2) }} KB</td>
                                            <td>{{ $document['mime_type'] }}</td>
                                            <td>
                                                <a href="{{ route('admin.general-job-applications.download-document', [$application, $index]) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-download"></i> İndir
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <!-- Durum Güncelleme -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Durum Güncelle</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.general-job-applications.update-status', $application) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="status">Durum:</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                <option value="reviewing" {{ $application->status == 'reviewing' ? 'selected' : '' }}>İnceleniyor</option>
                                <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="notes">Admin Notları:</label>
                            <textarea name="notes" id="notes" class="form-control" rows="4" placeholder="Başvuru hakkında notlar...">{{ $application->notes }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Güncelle
                        </button>
                    </form>
                </div>
            </div>

            <!-- İstatistikler -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İstatistikler</h3>
                </div>
                <div class="card-body">
                    <div class="info-box">
                        <span class="info-box-icon bg-info">
                            <i class="fas fa-id-card"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Başvuru ID</span>
                            <span class="info-box-number">#{{ $application->id }}</span>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Yaş</span>
                            <span class="info-box-number">{{ $application->birth_date->diffInYears(now()) }}</span>
                        </div>
                    </div>
                    
                    @if($application->documents)
                    <div class="info-box">
                        <span class="info-box-icon bg-warning">
                            <i class="fas fa-file"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Belgeler</span>
                            <span class="info-box-number">{{ count($application->documents) }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 