@props([
    'value' => null,
    'icon' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $value['label'] !!}
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                data-clipboard="{{ $value['label'] }}" />
        @endif
    </span>
@endif
