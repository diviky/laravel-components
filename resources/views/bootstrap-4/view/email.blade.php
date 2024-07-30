@props([
    'value' => null,
    'icon' => null,
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        <a href="mailto:{{ $value }}">{{ $value }}</a>
    </span>
@endif
