@props([
    'value' => null,
    'icon' => null,
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {{ ago($value) }}
    </span>
@endif
