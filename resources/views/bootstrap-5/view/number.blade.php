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
        <x-icon :name="$icon" class="me-1"/>
        {!! $label !!}
        @isset($settings['format'])
            @if ($settings['format'] == 'percent')
                {{ \Illuminate\Support\Number::percentage($value) }}
            @elseif ($settings['format'] == 'abbreviate')
                {{ \Illuminate\Support\Number::abbreviate($value) }}
            @elseif ($settings['format'] == 'number')
                {{ \Illuminate\Support\Number::format($value) }}
            @elseif ($settings['format'] == 'currency')
                {{ \Illuminate\Support\Number::currency($value) }}
            @elseif ($settings['format'] == 'normal')
                {{ $value }}
            @endif
        @else
            {{ \Illuminate\Support\Number::format($value) }}
        @endisset
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endisset
