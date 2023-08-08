
<div class="row">
    <div class="col-md-12 text-center">
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                @if (!$paginator->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
                @endif
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link" style="cursor: text;">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if (!$paginator->onLastPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
