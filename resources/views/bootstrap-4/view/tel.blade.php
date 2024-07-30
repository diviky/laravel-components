@props([
    'value' => null,
    'icon' => null,
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        <a href="tel:{{ $value }}">{{ $value }}</a>
    </span>
@endif
