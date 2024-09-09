@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@php
    $size = $settings['size'] ?? 'xs';
    $shape = $settings['shape'] ?? 'circle';
@endphp

@if ($value)
    <span {{ $attributes->class([
        'd-flex' => true,
        'align-items-center' => true,
    ]) }}>
        <x-icon :name="$icon" />
        {!! $label !!}

        @if (!empty($settings['image']))
            <span
                {{ $attributes->merge(['class' => 'avatar mr-1'])->class([
                    'rounded-circle' => $shape == 'circle',
                    'rounded' => $shape == 'rounded',
                    'avatar-' . $size => $size,
                ]) }}
                style="background-image: url({{ $image }})">
            </span>
        @else
            <span
                {{ $attributes->merge(['class' => 'avatar mr-1'])->class([
                    'rounded-circle' => $shape == 'circle',
                    'rounded' => $shape == 'rounded',
                    'avatar-' . $size => $size,
                ]) }}>
                {{ $settings['label'] ?? 'A' }}
            </span>
        @endif

        {!! $value !!}

        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
