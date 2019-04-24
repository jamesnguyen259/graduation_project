@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                    <i class="fa fa-caret-left"></i>
            @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="prevposts-link">
                        <i class="fa fa-caret-left"></i>
                    </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="blog-page current-page transition">{{ $page }}</a>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <a href="{{ $url }}" class="blog-page transition">{{ $page }}</a>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <i class="fa fa-ellipsis-h"></i>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }} " class="nextposts-link">
                        <i class="fa fa-caret-right"></i>
                    </a>
            @else
                <i class="fa fa-caret-right"></i>
            @endif
    </div>
    <!-- Pagination -->
@endif
