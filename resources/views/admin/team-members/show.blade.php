@extends('admin.layouts.app')

@section('title', 'Ekip Üyesi Detayı')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Ekip Üyesi Detayı</h3>
                    <div>
                        <a href="{{ route('admin.team-members.edit', $teamMember) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Düzenle
                        </a>
                        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Geri Dön
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                @if($teamMember->image)
                                    <img src="{{ Storage::url($teamMember->image) }}" alt="{{ $teamMember->name }}" 
                                         class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto mb-3" 
                                         style="width: 200px; height: 200px; font-size: 48px;">
                                        {{ strtoupper(substr($teamMember->name, 0, 2)) }}
                                    </div>
                                @endif
                                
                                <h4>{{ $teamMember->name }}</h4>
                                <p class="text-muted">{{ $teamMember->position }}</p>
                                <p class="text-muted">{{ $teamMember->designation }}</p>
                                
                                <div class="social-links mt-3">
                                    @if($teamMember->social_facebook)
                                        <a href="{{ $teamMember->social_facebook }}" target="_blank" class="btn btn-sm btn-primary me-2">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    @endif
                                    @if($teamMember->social_twitter)
                                        <a href="{{ $teamMember->social_twitter }}" target="_blank" class="btn btn-sm btn-info me-2">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    @endif
                                    @if($teamMember->social_linkedin)
                                        <a href="{{ $teamMember->social_linkedin }}" target="_blank" class="btn btn-sm btn-primary me-2">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    @endif
                                    @if($teamMember->social_instagram)
                                        <a href="{{ $teamMember->social_instagram }}" target="_blank" class="btn btn-sm btn-danger">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Ad Soyad:</th>
                                    <td>{{ $teamMember->name }}</td>
                                </tr>
                                <tr>
                                    <th>Pozisyon:</th>
                                    <td>{{ $teamMember->position }}</td>
                                </tr>
                                <tr>
                                    <th>Unvan:</th>
                                    <td>{{ $teamMember->designation }}</td>
                                </tr>
                                @if($teamMember->email)
                                <tr>
                                    <th>E-posta:</th>
                                    <td><a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a></td>
                                </tr>
                                @endif
                                @if($teamMember->phone)
                                <tr>
                                    <th>Telefon:</th>
                                    <td>{{ $teamMember->phone }}</td>
                                </tr>
                                @endif
                                @if($teamMember->experience_years)
                                <tr>
                                    <th>Deneyim:</th>
                                    <td>{{ $teamMember->experience_years }} yıl</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Sıra:</th>
                                    <td>{{ $teamMember->sort_order ?? 'Belirtilmemiş' }}</td>
                                </tr>
                                <tr>
                                    <th>Durum:</th>
                                    <td>
                                        @if($teamMember->status)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Pasif</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Oluşturma Tarihi:</th>
                                    <td>{{ $teamMember->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Güncelleme Tarihi:</th>
                                    <td>{{ $teamMember->updated_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            </table>
                            
                            @if($teamMember->description)
                                <h5>Açıklama</h5>
                                <div class="border p-3 mb-3">
                                    {!! nl2br(e($teamMember->description)) !!}
                                </div>
                            @endif
                            
                            @if($teamMember->bio)
                                <h5>Biyografi</h5>
                                <div class="border p-3 mb-3">
                                    {!! nl2br(e($teamMember->bio)) !!}
                                </div>
                            @endif
                            
                            @if($teamMember->specialties && count($teamMember->specialties))
                                <h5>Uzmanlık Alanları</h5>
                                <div class="mb-3">
                                    @foreach($teamMember->specialties as $specialty)
                                        <span class="badge bg-info me-1">{{ $specialty }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            @if($teamMember->education && count($teamMember->education))
                                <h5>Eğitim</h5>
                                <ul class="list-unstyled">
                                    @foreach($teamMember->education as $edu)
                                        <li class="mb-2">
                                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                                            {{ $edu }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 