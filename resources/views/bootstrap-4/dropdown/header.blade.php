@props([
    'icon' => null,
    'label' => null,
])

<div class="dropdown-header">
    <x-icon name="{{ $icon }}" />
    {{ $label }}
</div>
{!! $slot ?? null !!}
