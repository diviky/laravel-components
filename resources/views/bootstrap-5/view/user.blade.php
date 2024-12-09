@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'size' => 'xs',
    'shape' => 'circle',
    'compact' => false,
    'settings' => [],
])

@php
    $size = $settings['size'] ?? $size;
    $shape = $settings['shape'] ?? $shape;
@endphp

@if ($value)
    <span {{ $attributes->class([
        'd-flex' => false,
        'align-items-center' => false,
    ]) }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}

        @if (!empty($value['avatar']))
            <span
                {{ $attributes->class([
                    'avatar mr-1',
                    'rounded-circle' => $shape == 'circle',
                    'rounded' => $shape == 'rounded',
                    'avatar-' . $size => $size,
                ]) }}
                style="background-image: url({{ $value['avatar'] }})">
            </span>
        @else
            <span
                {{ $attributes->class([
                    'avatar mr-1',
                    'rounded-circle' => $shape == 'circle',
                    'rounded' => $shape == 'rounded',
                    'avatar-' . $size => $size,
                ]) }}>
                {{ $value['label'] ?? 'A' }}
            </span>
        @endif

        @if (!$compact)
            {{ $value['name'] }}
        @endif

        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value['name'] }}" />
        @endif
    </span>
@endif
