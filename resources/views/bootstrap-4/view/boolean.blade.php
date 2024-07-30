@props([
    'value' => null,
    'icon' => null,
])

@if ($value)
    <span {{ $attributes->merge(['class' => 'badge badge-success']) }}>Yes</span>
@else
    <span {{ $attributes->merge(['class' => 'badge badge-warning']) }}>No</span>
@endif
