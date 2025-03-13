@props([
    'color' => 'primary',
    'pill' => false,
    'size' => null,
    'href' => null,
    'dismissible' => false,
])

@php
    $classes = [
        'badge',
        'bg-' . $color,
        $pill ? 'rounded-pill' : '',
        $size ? 'badge-' . $size : '',
        $dismissible ? 'badge-dismissible' : '',
    ];

    $attributes = $attributes->class([implode(' ', array_filter($classes))]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
        @if ($dismissible)
            <button type="button" class="btn-close" data-bs-dismiss="badge" aria-label="Close"></button>
        @endif
    </a>
@else
    <span {{ $attributes }}>
        {{ $slot }}
        @if ($dismissible)
            <button type="button" class="btn-close" data-bs-dismiss="badge" aria-label="Close"></button>
        @endif
    </span>
@endif
