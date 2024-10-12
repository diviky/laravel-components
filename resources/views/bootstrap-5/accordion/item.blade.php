@props([
    'id' => 'accordion',
])

<div {{ $attributes->merge(['class' => 'accordion-item']) }}>
    {!! $slot !!}
</div>
