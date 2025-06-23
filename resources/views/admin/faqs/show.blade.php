@extends('admin.layouts.app')

@section('title', 'SSS Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">SSS Detayı</h3>
                    <div>
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri Dön
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Soru</h4>
                            <div class="border p-3 mb-4">
                                {{ $faq->question }}
                            </div>

                            <h4>Cevap</h4>
                            <div class="border p-3 mb-4">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Bilgiler</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>ID:</th>
                                            <td>{{ $faq->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori:</th>
                                            <td>{{ $faq->category ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sıra:</th>
                                            <td>{{ $faq->sort_order }}</td>
                                        </tr>
                                        <tr>
                                            <th>Durum:</th>
                                            <td>
                                                @if($faq->status)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Öne Çıkan:</th>
                                            <td>
                                                @if($faq->featured)
                                                    <span class="badge bg-primary">Evet</span>
                                                @else
                                                    <span class="badge bg-secondary">Hayır</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Oluşturulma:</th>
                                            <td>{{ $faq->created_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Güncelleme:</th>
                                            <td>{{ $faq->updated_at->format('d.m.Y H:i') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h5>İşlemler</h5>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning w-100 mb-2">
                                        <i class="fas fa-edit"></i> Düzenle
                                    </a>

                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Bu SSS\'yi silmek istediğinizden emin misiniz?')">
                                            <i class="fas fa-trash"></i> Sil
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