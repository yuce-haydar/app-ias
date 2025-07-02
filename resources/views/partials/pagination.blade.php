@if ($paginator->hasPages())
<ul class="pagination-menu">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li class="disabled"><span>&lsaquo;</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a></li>
    @endif

    {{-- Page Numbers --}}
    @php
        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
        $start = max(1, $current - 2);
        $end = min($last, $current + 2);
    @endphp

    @if ($start > 1)
        <li><a href="{{ $paginator->url(1) }}">1</a></li>
        @if ($start > 2)
            <li class="disabled"><span>...</span></li>
        @endif
    @endif

    @for ($i = $start; $i <= $end; $i++)
        @if ($i == $current)
            <li><a href="#" class="current">{{ $i }}</a></li>
        @else
            <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endif
    @endfor

    @if ($end < $last)
        @if ($end < $last - 1)
            <li class="disabled"><span>...</span></li>
        @endif
        <li><a href="{{ $paginator->url($last) }}">{{ $last }}</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a></li>
    @else
        <li class="disabled"><span>&rsaquo;</span></li>
    @endif
</ul>
@endif 