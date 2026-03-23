@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
    'format' => null,
    'precision' => 2,
])

@php
    if ($format) {
        $settings['format'] = $format;
    }
    if ($precision) {
        $settings['precision'] = $precision;
    }
@endphp

@isset($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        @isset($settings['format'])
            @if ($settings['format'] == 'percent' || $settings['format'] == 'percentage')
                {{ \Illuminate\Support\Number::percentage($value, precision: $settings['precision'], maxPrecision: $settings['precision']) }}
            @elseif ($settings['format'] == 'abbreviate')
                {{ \Illuminate\Support\Number::abbreviate($value) }}
            @elseif ($settings['format'] == 'number')
                {{ \Illuminate\Support\Number::format($value) }}
            @elseif ($settings['format'] == 'currency')
                {{ \Illuminate\Support\Number::currency($value) }}
            @elseif ($settings['format'] == 'normal')
                {{ $value }}
            @else
                {{ \Illuminate\Support\Number::format($value) }}
            @endif
        @else
            {{ \Illuminate\Support\Number::format($value) }}
        @endisset
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endisset
