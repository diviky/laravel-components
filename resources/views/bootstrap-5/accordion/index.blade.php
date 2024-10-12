@props([
    'id' => 'accordion',
])

<div {{ $attributes->merge(['class' => 'accordion']) }}>
    {!! $slot !!}
</div>
