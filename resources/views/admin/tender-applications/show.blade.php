@extends('admin.layouts.app')

@section('title', 'İhale Başvurusu Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İhale Başvurusu Detayı</h3>
                    <div>
                        <a href="{{ route('admin.tender-applications.edit', $tenderApplication) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.tender-applications.index') }}" class="btn btn-secondary">
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
                                    <th width="200">Şirket Adı:</th>
                                    <td>{{ $tenderApplication->company_name }}</td>
                                </tr>
                                <tr>
                                    <th>İhale:</th>
                                    <td>{{ $tenderApplication->tender->title ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Şirket Türü:</th>
                                    <td>{{ $tenderApplication->company_type }}</td>
                                </tr>
                                <tr>
                                    <th>Vergi Numarası:</th>
                                    <td>{{ $tenderApplication->tax_number }}</td>
                                </tr>
                                <tr>
                                    <th>Yetkili Kişi:</th>
                                    <td>{{ $tenderApplication->contact_person }}</td>
                                </tr>
                                <tr>
                                    <th>E-posta:</th>
                                    <td>{{ $tenderApplication->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefon:</th>
                                    <td>{{ $tenderApplication->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Adres:</th>
                                    <td>{{ $tenderApplication->address }}</td>
                                </tr>
                                <tr>
                                    <th>Deneyim Yılı:</th>
                                    <td>{{ $tenderApplication->experience_years }} yıl</td>
                                </tr>
                                <tr>
                                    <th>Teklif Tutarı:</th>
                                    <td>{{ number_format($tenderApplication->bid_amount, 2) }} {{ $tenderApplication->currency }}</td>
                                </tr>
                                <tr>
                                    <th>Başvuru Tarihi:</th>
                                    <td>{{ $tenderApplication->applied_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        @switch($tenderApplication->status)
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

                            @if($tenderApplication->financial_capacity)
                                <h5>Mali Kapasite</h5>
                                <div class="border p-3 mb-3">
                                    {{ number_format($tenderApplication->financial_capacity, 2) }} TL
                                </div>
                            @endif

                            @if($tenderApplication->technical_capacity)
                                <h5>Teknik Kapasite</h5>
                                <div class="border p-3 mb-3">
                                    {!! nl2br(e($tenderApplication->technical_capacity)) !!}
                                </div>
                            @endif

                            @if($tenderApplication->notes)
                                <h5 class="mt-4">Notlar</h5>
                                <div class="border p-3">
                                    {!! nl2br(e($tenderApplication->notes)) !!}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Durum Güncelle</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.tender-applications.status', $tenderApplication) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Durum</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="pending" {{ $tenderApplication->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                                <option value="approved" {{ $tenderApplication->status == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                                <option value="rejected" {{ $tenderApplication->status == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="notes" class="form-label">Notlar</label>
                                            <textarea name="notes" id="notes" class="form-control" rows="4">{{ $tenderApplication->notes }}</textarea>
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