@extends('admin.layouts.app')

@section('title', $tender->title . ' - Başvurular')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title">{{ $tender->title }} - Başvurular</h3>
                        <p class="text-muted mb-0">İhale No: {{ $tender->tender_number }}</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.tender-applications.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Yeni Başvuru
                        </a>
                        <a href="{{ route('admin.tenders.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> İhalelere Dön
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

                    <!-- İhale Bilgileri -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">İhale Bilgileri</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>İhale Türü:</strong> 
                                        @switch($tender->tender_type)
                                            @case('goods') Mal Alımı @break
                                            @case('services') Hizmet Alımı @break
                                            @case('construction') Yapım İşi @break
                                            @case('consulting') Danışmanlık @break
                                            @default {{ $tender->tender_type }}
                                        @endswitch
                                    </p>
                                    <p><strong>İhale Usulü:</strong> 
                                        @switch($tender->procurement_method)
                                            @case('open') Açık İhale @break
                                            @case('restricted') Belli İstekliler Arası @break
                                            @case('negotiated') Pazarlık Usulü @break
                                            @case('direct') Doğrudan Temin @break
                                            @default {{ $tender->procurement_method }}
                                        @endswitch
                                    </p>
                                    <p><strong>İlan Tarihi:</strong> {{ $tender->announcement_date->format('d.m.Y') }}</p>
                                    <p><strong>Son Başvuru:</strong> {{ $tender->deadline->format('d.m.Y') }}</p>
                                    @if($tender->estimated_cost)
                                        <p><strong>Tahmini Maliyet:</strong> {{ number_format($tender->estimated_cost, 2) }} TL</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Başvuru İstatistikleri</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h3 class="text-primary">{{ $applications->where('status', 'pending')->count() }}</h3>
                                            <p class="mb-0">Beklemede</p>
                                        </div>
                                        <div class="col-4">
                                            <h3 class="text-success">{{ $applications->where('status', 'approved')->count() }}</h3>
                                            <p class="mb-0">Onaylı</p>
                                        </div>
                                        <div class="col-4">
                                            <h3 class="text-danger">{{ $applications->where('status', 'rejected')->count() }}</h3>
                                            <p class="mb-0">Red</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <h4 class="text-info">{{ $applications->total() }}</h4>
                                        <p class="mb-0">Toplam Başvuru</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Başvurular Tablosu -->
                    <div class="table-responsive">
                        <table id="applicationsTable" class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Şirket Adı</th>
                                    <th>Yetkili Kişi</th>
                                    <th>E-posta</th>
                                    <th>Telefon</th>
                                    <th>Teklif Tutarı</th>
                                    <th>Başvuru Tarihi</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>
                                            <strong>{{ $application->company_name }}</strong>
                                            @if($application->company_type)
                                                <br><small class="text-muted">{{ $application->company_type }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $application->contact_person ?? $application->authorized_person }}</td>
                                        <td>
                                            <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                                        </td>
                                        <td>
                                            <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                        </td>
                                        <td>
                                            @if($application->bid_amount)
                                                <strong>{{ number_format($application->bid_amount, 2) }} {{ $application->currency ?? 'TL' }}</strong>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $application->applied_at ? $application->applied_at->format('d.m.Y H:i') : $application->created_at->format('d.m.Y H:i') }}
                                        </td>
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
                                                @case('reviewed')
                                                    <span class="badge bg-info">İncelendi</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">{{ $application->status }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.tender-applications.show', $application) }}" 
                                                   class="btn btn-sm btn-info" title="Detay">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.tender-applications.edit', $application) }}" 
                                                   class="btn btn-sm btn-warning" title="Düzenle">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.tender-applications.destroy', $application) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            title="Sil" 
                                                            onclick="return confirm('Bu başvuruyu silmek istediğinize emin misiniz?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-inbox fa-3x mb-3"></i>
                                                <p>Bu ihale için henüz başvuru bulunmuyor.</p>
                                                <a href="{{ route('admin.tender-applications.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus"></i> İlk Başvuruyu Ekle
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($applications->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    try {
        console.log('Applications DataTable initialization starting...');
        
        if ($('#applicationsTable').length === 0) {
            console.error('applicationsTable element not found!');
            return;
        }
        
        // Applications tablosu için DataTable
        $('#applicationsTable').DataTable({
            "pageLength": 25,
            "order": [[ 6, "desc" ]], // Başvuru tarihine göre sırala (0-indexed)
            "columnDefs": [
                { 
                    "targets": [8], // İşlemler sütunu (0-indexed)
                    "orderable": false,
                    "searchable": false
                }
            ],
            "columns": [
                null, // #
                null, // Şirket Adı
                null, // Yetkili Kişi
                null, // E-posta
                null, // Telefon
                null, // Teklif Tutarı
                null, // Başvuru Tarihi
                null, // Durum
                null  // İşlemler
            ],
            "responsive": true
        });

        console.log('Applications DataTable initialized successfully');
    } catch (error) {
        console.error('Applications DataTable initialization error:', error);
        alert('Applications DataTable hatası: ' + error.message);
    }

    // Status badge'ler için tooltip
    $('[data-bs-toggle="tooltip"]').tooltip();
});
</script>
@endpush 