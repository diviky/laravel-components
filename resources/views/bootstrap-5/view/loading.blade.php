@props([
    'target' => null,
])

<div wire:loading.flex @if ($target) wire:target="{{ $target }}" @endif
    {{ $attributes->class([
        'position-absolute',
        'top-0',
        'start-0',
        'w-100',
        'h-100',
        'align-items-center',
        'justify-content-center',
        'bg-body',
        'bg-opacity-75',
    ]) }}
    style="z-index: 10;" role="status" aria-live="polite" aria-busy="true">
    @if ($slot->isEmpty())
        <div class="spinner-border text-primary" role="presentation">
            <span class="visually-hidden">{{ __('Loading...') }}</span>
        </div>
    @else
        {{ $slot }}
    @endif
</div>
