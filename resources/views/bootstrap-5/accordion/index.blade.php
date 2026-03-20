@props([
    'id' => 'accordion',
    'tabs' => false,
    'variant' => null,
    'transition' => false,
    'exclusive' => false,
])

<div {{ $attributes->class([
    'accordion' => true,
    'accordion-tabs' => $tabs,
]) }}>
    {!! $slot !!}
</div>
