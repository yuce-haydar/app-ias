{{-- categoriesFlatOrdered + categorySelectLabels: tek menü, DFS sıra, çakışan / hatalı üst etiketleri ayırt edilir --}}
@foreach($categoriesFlatOrdered as $cat)
    <option value="{{ $cat->id }}" @if((string)($selectedId ?? '') === (string)$cat->id) selected @endif>
        {{ $categorySelectLabels[$cat->id] ?? $cat->name }}
    </option>
@endforeach
