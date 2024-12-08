@props([
    'pills' => false,
    'card' => false,
])

<div {!! $attributes->class(['nav', 'nav-pills' => $pills, 'card-header-pills' => $card, 'text-nowrap flex-nowrap']) !!}>
    {!! $slot !!}
</div>
