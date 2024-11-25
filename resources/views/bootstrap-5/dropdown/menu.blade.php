@props([
    'position' => null,
    'header' => null,
    'visible' => false,
    'show' => false,
])

<div
    {{ $attributes->class([
        'dropdown-menu',
        'overflow-x-visible !max-h-none' => $visible,
        'dropdown-menu-' . $position => $position,
        'show' => $show,
    ]) }}>
    @if ($header)
        <span class="dropdown-header">{{ $header }}</span>
    @endif
    {!! $slot ?? null !!}
</div>
