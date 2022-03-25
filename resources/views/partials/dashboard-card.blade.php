<div class="col-lg-3 col-md-6 mb-4">
    <a href="{{ $actionURL ?? '#' }}" class="border rounded p-3 d-flex flex-column card-full" data-placement="{{ $placement }}"
       data-toggle="tooltip" title="{{ $cardDescription }}">
        <div class="d-flex justify-content-between">
            <i class="bi bi-{{ $icon }} fs-48 text-accent"></i>
        </div>
        <h3 class="fs-20 font-weight-bold text-black">
            {{ $cardTitle }}
        </h3>
        @if(!is_string($totalCount))
            <span class="text-gray">Total: {{ $totalCount }}</span>
        @else
            <span class="text-gray">{{ $totalCount }}</span>
        @endif
    </a>
</div>
