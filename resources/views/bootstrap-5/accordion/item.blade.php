@props([
    'id' => 'accordion',
    'heading' => null,
    'expanded' => false,
    'disabled' => false,
])

<div {{ $attributes->merge(['class' => 'accordion-item']) }}>
    @if ($heading)
        <x-accordion.heading>{{ $heading }}</x-accordion.heading>
    @endif

    {!! $slot !!}
</div>
