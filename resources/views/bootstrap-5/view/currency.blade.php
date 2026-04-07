@props([
    'value' => null,
    'icon' => 'null',
    'label' => null,
    'copy' => false,
    'settings' => [],
    'currency' => null,
    'precision' => 2,
])

@isset($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        @if ($currency)
            {{ \Illuminate\Support\Number::currency($value, in: $currency, precision: $precision) }}
        @else
            {{ \Illuminate\Support\Number::currency($value, precision: $precision) }}
        @endif
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endisset
