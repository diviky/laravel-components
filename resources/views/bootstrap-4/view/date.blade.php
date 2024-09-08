@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes->merge(['class' => 'view-date']) }}>
        <x-icon :name="$icon" />
        {!! $label !!}
        {{ carbon($value, 'M d, Y') }}
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
