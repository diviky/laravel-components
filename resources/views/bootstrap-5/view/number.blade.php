@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
    'format' => null,
])

@php
    if ($format) {
        $settings['format'] = $format;
    }
@endphp

@isset($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {!! $label !!}
        @isset($settings['format'])
            @if ($settings['format'] == 'percent')
                {{ $value }}%
            @elseif ($settings['format'] == 'currency')
                ${{ number_format($value) }}
            @elseif ($settings['format'] == 'normal')
                {{ $value }}
            @endif
        @else
            {{ number_format($value) }}
        @endisset
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endisset
