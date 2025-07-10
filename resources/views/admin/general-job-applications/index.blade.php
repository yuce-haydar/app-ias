@extends('admin.layouts.app')

@section('title', 'Genel İş Başvuruları')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Genel İş Başvuruları</h3>
                </div>
                <div class="card-body">
                    <!-- Filtreleme -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <form method="GET" action="{{ route('admin.general-job-applications.index') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Ad, soyad, meslek ara..." value="{{ request('search') }}">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i> Ara
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="GET" action="{{ route('admin.general-job-applications.index') }}">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="">Tüm Durumlar</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Beklemede</option>
                                    <option value="reviewing" {{ request('status') == 'reviewing' ? 'selected' : '' }}>İnceleniyor</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Onaylandı</option>
                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Reddedildi</option>
                                </select>
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="gender" value="{{ request('gender') }}">
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="GET" action="{{ route('admin.general-job-applications.index') }}">
                                <select name="gender" class="form-control" onchange="this.form.submit()">
                                    <option value="">Tüm Cinsiyetler</option>
                                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Erkek</option>
                                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Kadın</option>
                                </select>
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            </form>
                        </div>
                    </div>

                    <!-- Başvuru Listesi -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad Soyad</th>
                                    <th>Doğum Tarihi</th>
                                    <th>Cinsiyet</th>
                                    <th>Meslek</th>
                                    <th>Askerlik Durumu</th>
                                    <th>Durum</th>
                                    <th>Başvuru Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>
                                        <strong>{{ $application->full_name }}</strong>
                                    </td>
                                    <td>{{ $application->birth_date->format('d.m.Y') }}</td>
                                    <td>{{ $application->gender_text }}</td>
                                    <td>{{ $application->profession }}</td>
                                    <td>
                                        @if($application->military_status)
                                            <span class="badge badge-info">{{ $application->military_status_text }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $application->status_color }}">
                                            {{ $application->status_text }}
                                        </span>
                                    </td>
                                    <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.general-job-applications.show', $application) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> Detay
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteApplication({{ $application->id }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <p class="text-muted">Henüz başvuru bulunmuyor.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Sayfalama -->
                    <div class="d-flex justify-content-center">
                        {{ $applications->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Başvuru Sil</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bu başvuruyu silmek istediğinizden emin misiniz?</p>
                <p class="text-danger"><strong>Bu işlem geri alınamaz!</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function deleteApplication(id) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `/admin/general-job-applications/${id}`;
    $('#deleteModal').modal('show');
}
</script>
@endsection 