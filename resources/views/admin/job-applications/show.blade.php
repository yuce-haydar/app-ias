@extends('admin.layouts.app')

@section('title', 'İş Başvurusu Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İş Başvurusu Detayı</h3>
                    <div>
                        <a href="{{ route('admin.job-applications.edit', $jobApplication) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.job-applications.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri Dön
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <h4>Başvuru Bilgileri</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Ad Soyad:</th>
                                    <td>{{ $jobApplication->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>İş İlanı:</th>
                                    <td>{{ $jobApplication->jobPosting->title ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>E-posta:</th>
                                    <td>{{ $jobApplication->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefon:</th>
                                    <td>{{ $jobApplication->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Adres:</th>
                                    <td>{{ $jobApplication->address ?? 'Belirtilmemiş' }}</td>
                                </tr>
                                <tr>
                                    <th>Başvuru Tarihi:</th>
                                    <td>{{ $jobApplication->applied_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        @switch($jobApplication->status)
                                            @case('pending')
                                                <span class="badge bg-warning">Beklemede</span>
                                                @break
                                            @case('approved')
                                                <span class="badge bg-success">Onaylandı</span>
                                                @break
                                            @case('rejected')
                                                <span class="badge bg-danger">Reddedildi</span>
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                            </table>

                            @if($jobApplication->cover_letter)
                                <h5>Ön Yazı</h5>
                                <div class="border p-3 mb-3">
                                    {!! nl2br(e($jobApplication->cover_letter)) !!}
                                </div>
                            @endif

                            @if($jobApplication->cv_file)
                                <h5>CV Dosyası</h5>
                                <a href="{{ Storage::url($jobApplication->cv_file) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-download"></i> CV'yi İndir
                                </a>
                            @endif

                            @if($jobApplication->notes)
                                <h5 class="mt-4">Notlar</h5>
                                <div class="border p-3">
                                    {!! nl2br(e($jobApplication->notes)) !!}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Durum Güncelle</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.job-applications.status', $jobApplication) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Durum</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="pending" {{ $jobApplication->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                                <option value="approved" {{ $jobApplication->status == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                                <option value="rejected" {{ $jobApplication->status == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="notes" class="form-label">Notlar</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="4">{{ $jobApplication->notes }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Güncelle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 