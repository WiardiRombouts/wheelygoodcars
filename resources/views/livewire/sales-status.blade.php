<div>
    <div wire:click="toggle()" style="font-weight: bold;">
        @if (Auth::user())
            @isset($car->sold_at)
                <p class="status_text border border-dark rounded text-light bg-danger">verkocht</p>
            @endisset
            @empty($car->sold_at)
                <p class="status_text border border-dark rounded text-light bg-success">te koop</p>
            @endempty
        @endif
    </div>
    <div class="no-login-sale-status">
        @if (!Auth::user())
            @isset($car->sold_at)
                <p class="status_text border border-dark rounded text-light fw-bold bg-danger">verkocht</p>
            @endisset
            @empty($car->sold_at)
                <p class="status_text border border-dark rounded text-light fw-bold bg-success">te koop</p>
            @endempty
        @endif
    </div>
</div>
