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
    @if (is_array($value) || $value instanceof \ArrayAccess)

        @php
            $color = $value['color'] ?? $color;
        @endphp

        <span
            {{ $attributes->class([
                'badge' => true,
                'bg-' . ($color = $color),
            ]) }}>

            <x-icon :name="$icon" />
            {!! $label !!}

            {{ $value['name'] }}

            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value['name'] }}" />
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
