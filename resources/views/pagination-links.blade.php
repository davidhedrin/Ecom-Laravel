@if ($paginator->hasPages())
<div class="bootstrap-pagination">
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <span class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span> 
                        <span class="sr-only">Previous</span>
                    </span>
                </li>
            @else
                <li class="page-item" wire:click="previousPage">
                    <span class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </span>
                </li>
            @endif



            @foreach ($elements as $element)

                @if (is_array($element))

                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <li class="page-item active" Wire:click="gotoPage({{ $page }})">
                                <span class="page-link">{{ $page }}</span>
                            </li>

                        @else
                        
                            <li class="page-item" Wire:click="gotoPage({{ $page }})">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                            
                        @endif

                    @endforeach

                @endif
                
            @endforeach



            @if ($paginator->hasMorePages())

                <li class="page-item" wire:click="nextPage">
                    <span class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </span>
                </li>
            @else

                <li class="page-item">
                    <span class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </span>
                </li>
                
            @endif
        </ul>
    </nav>
</div>

{{-- <ul class="d-flex">
    @if ($paginator->onFirstPage())

        <li class="mx-3 px-2 py-1 text-center rounded border bg-gray">Prev</li>

    @else

        <li class="mx-3 px-2 py-1 text-center rounded border bg-white" wire:click="previousPage">Prev</li>
    
    @endif



    @foreach ($elements as $element)

        @if (is_array($element))

            @foreach ($element as $page => $url)

                @if ($page == $paginator->currentPage())

                    <li class="mx-1 px-2 py-1 text-center text-white rounded border bg-primary" Wire:click="gotoPage({{ $page }})">{{ $page }}</li>

                @else
                
                    <li class="mx-1 px-2 py-1 text-center rounded border" Wire:click="gotoPage({{ $page }})">{{ $page }}</li>
                    
                @endif

            @endforeach

        @endif
        
    @endforeach



    @if ($paginator->hasMorePages())

        <li class="mx-3 px-2 py-1 text-center rounded border bg-white" wire:click="nextPage">Next</li>
    
    @else

        <li class="mx-3 px-2 py-1 text-center rounded border bg-gray">Next</li>
        
    @endif

</ul> --}}
@endif