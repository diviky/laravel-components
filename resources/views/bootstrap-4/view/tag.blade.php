@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@php
    $color = $settings['color'] ?? 'primary';
@endphp

@if ($value)
    <span {{ $attributes->class([
        'badge' => true,
        'badge-' . ($color = $color),
    ]) }}>
        <x-icon :name="$icon" />
        {!! $label !!}
        {{ $value }}
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
