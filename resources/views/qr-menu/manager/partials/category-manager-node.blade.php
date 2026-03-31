@php
    $isRoot = ($depth ?? 0) === 0;
    $d = (int) ($depth ?? 0);
    $ancestors = $ancestorIds ?? [];
    $cycleHere = in_array($category->id, $ancestors, true);
    $scale = max(0.86, 1 - $d * 0.035);
@endphp
@if($cycleHere || $d > 40)
    <div class="category-card" style="margin-left: {{ 12 + $d * 18 }}px; border: 2px dashed #e74c3c; background: #fdecea;">
        <p style="margin: 0; color: #c0392b; font-size: 0.9rem;">
            <strong>Döngü veya derinlik sınırı:</strong> #{{ $category->id }} {{ $category->name }} — parent_id zincirini düzeltin.
        </p>
    </div>
@else
<div class="category-card" style="@unless($isRoot)margin-left: {{ 12 + $d * 18 }}px; border-left: 4px solid var(--primary-color); opacity: 0.95; transform: scale({{ $scale }});@endunless">
    <div class="category-icon" @unless($isRoot) style="background: var(--secondary-color);" @endunless>
        <i class="{{ $category->icon ?: ($isRoot ? 'fas fa-utensils' : 'fas fa-folder') }}"></i>
    </div>
    <h3 class="category-title" @unless($isRoot) style="font-size: 1.1rem;" @endunless>
        {{ $isRoot ? '📂' : '📁' }} {{ $category->name }}
        @if($category->children->count() > 0)
            <small style="color: #cf9f38; font-size: 0.8rem;">({{ $category->children->count() }} alt kategori)</small>
        @endif
        @if(!empty($orphan))
            <small style="color: #856404; font-size: 0.75rem; display: block;">Üst kategori kaydı yok (parent_id: {{ $category->parent_id }})</small>
        @elseif(!$isRoot && $category->parent)
            <small style="color: #666; font-size: 0.7rem; display: block;">{{ $category->parent->name }} altında</small>
        @endif
    </h3>
    @if($category->description)
        <p class="category-description">{!! $category->description !!}</p>
    @endif
    <div class="category-stats">
        <div class="stat-item">
            <i class="fas fa-utensils"></i>
            {{ $category->menuItems->count() }} Ürün
        </div>
        <div class="stat-item">
            <i class="fas fa-sort-numeric-up"></i>
            Sıra: {{ $category->order }}
        </div>
    </div>
    <div class="category-actions">
        <button type="button" class="btn btn-warning btn-sm" onclick="editCategory({{ $category->id }})">
            <i class="fas fa-edit"></i>
            Düzenle
        </button>
        <a href="{{ route('qr-menu.items', $qrMenu->url_slug) }}?category={{ $category->id }}" class="btn btn-success btn-sm">
            <i class="fas fa-eye"></i>
            Ürünleri Gör
        </a>
        <button type="button" class="btn btn-danger btn-sm" onclick="deleteCategory({{ $category->id }}, {{ json_encode($category->name) }})">
            <i class="fas fa-trash"></i>
            Sil
        </button>
    </div>
</div>
@php $nextAncestors = array_merge($ancestors, [$category->id]); @endphp
@foreach($category->children->sortBy('order') as $child)
    @if(in_array($child->id, $nextAncestors, true))
        @continue
    @endif
    @include('qr-menu.manager.partials.category-manager-node', [
        'category' => $child,
        'qrMenu' => $qrMenu,
        'depth' => $d + 1,
        'ancestorIds' => $nextAncestors,
        'orphan' => false,
    ])
@endforeach
@endif
