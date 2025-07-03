@extends('admin.layouts.app')

@section('title', 'Haberler')
@section('page-title', 'Haberler')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Haber Listesi</h5>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Haber Ekle
        </a>
    </div>
    <div class="card-body">
        @if($news->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <p class="text-muted">Henüz haber eklenmemiş.</p>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> İlk Haberi Ekle
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover" id="newsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Resim</th>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Yazar</th>
                            <th>Durum</th>
                            <th>Öne Çıkan</th>
                            <th>Görüntülenme</th>
                            <th>Yayın Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if($item->featured_image)
                                        <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 5px; 
                                                    display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ Str::limit($item->title, 40) }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($item->summary, 50) }}</small>
                                </td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->author ?? 'Hatay İmar' }}</td>
                                <td>
                                    @if($item->status == 'published')
                                        <span class="badge bg-success">Yayında</span>
                                    @else
                                        <span class="badge bg-warning">Taslak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->is_featured)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-muted"></i>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $item->view_count }}</span>
                                </td>
                                <td>
                                    @if($item->published_at)
                                        {{ $item->published_at->format('d.m.Y H:i') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                       
                                        <a href="{{ route('admin.news.edit', $item->id) }}" 
                                           class="btn btn-sm btn-warning" title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                              method="POST" class="d-inline" 
                                              onsubmit="return confirm('Bu haberi silmek istediğinize emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Sil">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#newsTable').DataTable({
        "paging": false,
        "info": false,
        "order": [[0, "desc"]]
    });
});
</script>
@endpush 