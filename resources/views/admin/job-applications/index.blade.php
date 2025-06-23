@extends('admin.layouts.app')

@section('title', 'İş Başvuruları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">İş Başvuruları</h3>
                    <a href="{{ route('admin.job-applications.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Yeni Başvuru Ekle
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad Soyad</th>
                                    <th>İş İlanı</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Başvuru Tarihi</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->full_name }}</td>
                                        <td>{{ $application->jobPosting->title ?? 'N/A' }}</td>
                                        <td>{{ $application->email }}</td>
                                        <td>{{ $application->phone }}</td>
                                        <td>{{ $application->applied_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            @switch($application->status)
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
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.job-applications.show', $application) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.job-applications.edit', $application) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.job-applications.destroy', $application) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu başvuruyu silmek istediğinizden emin misiniz?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Henüz başvuru bulunmuyor.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $applications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 