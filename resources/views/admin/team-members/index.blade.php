@extends('admin.layouts.app')

@section('title', 'Yönetim Kurulu')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Yönetim Kurulu Üyeleri</h3>
                    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Yeni Üye Ekle
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
                                    <th>Sıra</th>
                                    <th>Fotoğraf</th>
                                    <th>Ad Soyad</th>
                                    <th>Pozisyon</th>
                                    <th>Unvan</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teamMembers as $teamMember)
                                <tr>
                                    <td>{{ $teamMember->sort_order ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($teamMember->image)
                                            <img src="{{ Storage::url($teamMember->image) }}" alt="{{ $teamMember->name }}" 
                                                 class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                {{ strtoupper(substr($teamMember->name, 0, 2)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $teamMember->name }}</strong>
                                        @if($teamMember->social_linkedin)
                                            <a href="{{ $teamMember->social_linkedin }}" target="_blank" class="ms-2">
                                                <i class="fab fa-linkedin text-primary"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $teamMember->position }}</td>
                                    <td>{{ $teamMember->designation }}</td>
                                    <td>
                                        @if($teamMember->email)
                                            <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $teamMember->phone ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($teamMember->status)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Pasif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.team-members.show', $teamMember) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.team-members.edit', $teamMember) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.team-members.destroy', $teamMember) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bu üyeyi silmek istediğinize emin misiniz?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">Henüz ekip üyesi bulunmuyor.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $teamMembers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 