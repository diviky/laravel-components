@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
    'valueField' => 'name',
    'colorField' => 'color',
])

@php
    $color = $settings[$colorField] ?? 'primary';
@endphp

@if ($value)
    @if (is_array($value) || $value instanceof \ArrayAccess)

        @php
            $color = $value[$colorField] ?? $color;
        @endphp

        <span
            {{ $attributes->class([
                'badge' => true,
                'bg-' . ($color = $color),
            ]) }}>

            <x-icon :name="$icon" />
            {!! $label !!}

            {{ $value[$valueField] }}

            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value[$valueField] }}" />
            @endif
        </span>
    @else
        <span
            {{ $attributes->class([
                'badge' => true,
                'badge-' . ($color = $color),
            ]) }}>

            <x-icon :name="$icon" />
            {!! $label !!}
            {{ $value }}
            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value }}" />
            @endif
        </span>
    @endif
@endif
