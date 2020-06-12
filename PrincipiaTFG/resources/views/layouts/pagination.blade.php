<div class="pagination">
    @if ($paginator->lastPage() > 1)
    <ul class="pagination-nav">
        <a class="pagination-link" href="{{ $paginator->url(1) }}">
            <li class="pagination-first {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                << 
            </li>
        </a>

        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ( $paginator->currentPage()-2 < $i && $i < $paginator->currentPage()+2 )
                <a class="pagination-link" href="{{ $paginator->url($i) }}">
                    <li class="pagination-item {{ ($paginator->currentPage() == $i) ? 'pag-active active' : '' }}">
                        {{ $i }}
                    </li>
                </a>
                @endif
                @endfor

                <a class="pagination-link" href="{{ $paginator->url($paginator->lastPage()) }}">
                    <li
                        class="pagination-last {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                        >>
                    </li>
                </a>
    </ul>
    @endif
</div>