@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'target' => '_blank',
    'settings' => [],
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {!! $label !!}
        <a href="{{ $value }}" target="{{ $target }}">{{ $value }}</a>
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
