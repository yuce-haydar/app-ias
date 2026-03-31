@php
    $roots = $categories->whereNull('parent_id')->sortBy('order');
    $renderedIds = collect();
    $sel = $selectedId ?? null;
@endphp
@foreach($roots as $root)
    @php $renderedIds->push($root->id); @endphp
    @if($root->children->isEmpty())
        <option value="{{ $root->id }}" @if((string)$sel === (string)$root->id) selected @endif>{{ $root->name }}</option>
    @else
        <optgroup label="{{ $root->name }}">
            <option value="{{ $root->id }}" @if((string)$sel === (string)$root->id) selected @endif>{{ $root->name }}</option>
            @foreach($root->children->sortBy('order') as $sub)
                @php $renderedIds->push($sub->id); @endphp
                <option value="{{ $sub->id }}" @if((string)$sel === (string)$sub->id) selected @endif>{{ $sub->name }}</option>
            @endforeach
        </optgroup>
    @endif
@endforeach
@foreach($categories->whereNotIn('id', $renderedIds->unique()->all()) as $cat)
    <option value="{{ $cat->id }}" @if((string)$sel === (string)$cat->id) selected @endif>{{ $cat->parent ? $cat->parent->name . ' › ' : '' }}{{ $cat->name }}</option>
@endforeach
