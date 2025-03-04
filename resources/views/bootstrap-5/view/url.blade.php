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
        <x-icon :name="$icon" class="me-1" />

        {!! $label !!}

        @if (is_array($value))
            <a href="{{ $value['url'] }}" target="{{ $target }}">{{ $value['label'] }}</a>
            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value['label'] }}" />
            @endif
        @else
            <a href="{{ $value }}" target="{{ $target }}">{{ $value }}</a>

            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value }}" />
            @endif
        @endif
    </span>
@endif
