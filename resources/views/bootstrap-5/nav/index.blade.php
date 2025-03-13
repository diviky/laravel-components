@props([
    'pills' => false,
    'card' => false,
    'segmented' => false,
])

<nav {!! $attributes->class([
    'nav',
    'nav-segmented' => $segmented,
    'nav-pills' => $pills,
    'card-header-pills' => $card,
    'text-nowrap flex-nowrap',
]) !!} role="tablist">
    {!! $slot !!}
</nav>
