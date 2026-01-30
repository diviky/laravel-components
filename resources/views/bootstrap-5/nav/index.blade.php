@props([
    'pills' => false,
    'card' => false,
    'segmented' => false,
    'size' => null,
    'vertical' => false,
    'type' => null,
])

<nav {!! $attributes->class([
    'nav',
    'nav-segmented' => $segmented || $type === 'segmented',
    'nav-segmented-vertical' => ($segmented || $type === 'segmented') && $vertical,
    'nav-pills' => $pills || $type === 'pills',
    'card-header-pills' => $card,
    'nav-sm' => $size === 'sm',
    'nav-lg' => $size === 'lg',
    'text-nowrap flex-nowrap',
    'data-pjax' => $attributes->has('turbo'),
]) !!} role="tablist" @if ($attributes->has('turbo')) data-pjax @endif>
    {!! $slot !!}
</nav>
