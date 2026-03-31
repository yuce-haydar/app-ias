{{-- Tüm kategoriler düz liste: önce her ana kategori, hemen altında kendi alt kategorileri; kalanlar sonda --}}
@php
    $sel = $selectedId ?? null;
    $ordered = collect();
    $roots = $categories->whereNull('parent_id')->sortBy('order');
    foreach ($roots as $root) {
        $ordered->push($root);
        foreach ($root->children->sortBy('order') as $sub) {
            $ordered->push($sub);
        }
    }
    $rest = $categories->whereNotIn('id', $ordered->pluck('id')->all())->sortBy('order');
    $ordered = $ordered->merge($rest);
@endphp
@foreach($ordered as $cat)
    <option value="{{ $cat->id }}" @if((string)$sel === (string)$cat->id) selected @endif>
        @if($cat->parent_id)
            {{ $cat->parent ? $cat->parent->name . ' › ' : '' }}
        @endif
        {{ $cat->name }}
    </option>
@endforeach
