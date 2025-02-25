@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'linked' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" class="me-1" />

        {!! $label !!}

        @if ($linked)
            {{ $value }}
        @else
            <a href="mailto:{{ $value }}">{{ $value }}</a>
        @endif

        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
