@props([
    'value' => null,
    'icon' => null,
    'color' => 'primary',
    'label' => null,
    'copy' => false,
    'settings' => [],
])

<x-icon :name="$icon" class="me-1" />

<span {{ $attributes->class(['badge', 'badge-' . $color => $color]) }}>
    {!! $label !!}
    {!! $slot !!}
</span>

@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
