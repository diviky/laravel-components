@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes->merge(['class' => 'view-datetime']) }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        {{ datetime($value) }}
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
