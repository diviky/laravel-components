@props([
    'id' => 'accordion',
    'tabs' => false,
])

<div {{ $attributes->merge(['class' => 'accordion'])->class(['accordion-tabs' => $tabs]) }}>
    {!! $slot !!}
</div>
