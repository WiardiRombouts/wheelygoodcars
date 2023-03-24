<div>
    <div wire:click="toggle()" style="font-weight: bold;">
        @isset($car->sold_at)
            <p class="status_text border border-dark rounded text-light bg-danger">verkocht</p>
        @endisset
        @empty($car->sold_at)
            <p class="status_text border border-dark rounded text-light bg-success">te koop</p>
        @endempty
    </div>
</div>
