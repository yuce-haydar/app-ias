@extends('admin.layouts.app')

@section('title', 'İletişim Formu Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İletişim Formu Detayı</h3>
                    <a href="{{ route('admin.contact-submissions.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Geri Dön
                    </a>
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
                            <h4>Form Bilgileri</h4>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Ad Soyad:</th>
                                    <td>{{ $contactSubmission->name }}</td>
                                </tr>
                                <tr>
                                    <th>E-posta:</th>
                                    <td><a href="mailto:{{ $contactSubmission->email }}">{{ $contactSubmission->email }}</a></td>
                                </tr>
                                @if($contactSubmission->phone)
                                <tr>
                                    <th>Telefon:</th>
                                    <td>{{ $contactSubmission->phone }}</td>
                                </tr>
                                @endif
                                @if($contactSubmission->company)
                                <tr>
                                    <th>Şirket:</th>
                                    <td>{{ $contactSubmission->company }}</td>
                                </tr>
                                @endif
                                @if($contactSubmission->department)
                                <tr>
                                    <th>Departman:</th>
                                    <td>{{ $contactSubmission->department }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Konu:</th>
                                    <td>{{ $contactSubmission->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Gönderim Tarihi:</th>
                                    <td>{{ $contactSubmission->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        @switch($contactSubmission->status)
                                            @case('unread')
                                                <span class="badge bg-warning">Okunmadı</span>
                                                @break
                                            @case('read')
                                                <span class="badge bg-info">Okundu</span>
                                                @break
                                            @case('replied')
                                                <span class="badge bg-success">Yanıtlandı</span>
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                                @if($contactSubmission->replied_at)
                                <tr>
                                    <th>Yanıtlanma Tarihi:</th>
                                    <td>{{ $contactSubmission->replied_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                @endif
                                @if($contactSubmission->ip_address)
                                <tr>
                                    <th>IP Adresi:</th>
                                    <td>{{ $contactSubmission->ip_address }}</td>
                                </tr>
                                @endif
                            </table>

                            <h5>Mesaj</h5>
                            <div class="border p-3 mb-3">
                                {!! nl2br(e($contactSubmission->message)) !!}
                            </div>

                            @if($contactSubmission->admin_notes)
                                <h5>Admin Notları</h5>
                                <div class="border p-3 mb-3">
                                    {!! nl2br(e($contactSubmission->admin_notes)) !!}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>İşlemler</h5>
                                </div>
                                <div class="card-body">
                                    @if($contactSubmission->status !== 'replied')
                                        <form action="{{ route('admin.contact-submissions.mark-replied', $contactSubmission) }}" method="POST" class="mb-3">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="fas fa-check"></i> Yanıtlandı Olarak İşaretle
                                            </button>
                                        </form>
                                    @endif

                                    <a href="mailto:{{ $contactSubmission->email }}?subject=Re: {{ $contactSubmission->subject }}" class="btn btn-primary w-100 mb-3">
                                        <i class="fas fa-envelope"></i> E-posta Gönder
                                    </a>

                                    <form action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Bu formu silmek istediğinizden emin misiniz?')">
                                            <i class="fas fa-trash"></i> Sil
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5>Admin Notları</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.contact-submissions.update-notes', $contactSubmission) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <div class="mb-3">
                                            <textarea name="admin_notes" class="form-control" rows="4" placeholder="Admin notları...">{{ $contactSubmission->admin_notes }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-save"></i> Notları Kaydet
                                        </button>
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