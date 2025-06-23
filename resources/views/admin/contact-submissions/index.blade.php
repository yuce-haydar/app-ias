@extends('admin.layouts.app')

@section('title', 'İletişim Formları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">İletişim Formları</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>Toplam</h5>
                                    <h3>{{ $submissions->total() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5>Okunmamış</h5>
                                    <h3>{{ $submissions->where('status', 'unread')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5>Okundu</h5>
                                    <h3>{{ $submissions->where('status', 'read')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>Yanıtlandı</h5>
                                    <h3>{{ $submissions->where('status', 'replied')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad Soyad</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Konu</th>
                                    <th>Tarih</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($submissions as $submission)
                                    <tr class="{{ $submission->status === 'unread' ? 'table-warning' : '' }}">
                                        <td>{{ $submission->id }}</td>
                                        <td>{{ $submission->name }}</td>
                                        <td>{{ $submission->email }}</td>
                                        <td>{{ $submission->phone ?? '-' }}</td>
                                        <td>{{ Str::limit($submission->subject, 30) }}</td>
                                        <td>{{ $submission->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            @switch($submission->status)
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
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.contact-submissions.show', $submission) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu formu silmek istediğinizden emin misiniz?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Henüz iletişim formu bulunmuyor.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $submissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 