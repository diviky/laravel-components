@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value && (is_array($value) || $value instanceof \ArrayAccess))
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {!! $label !!}

        @if (!empty($value['thumb']))
            <span {{ $attributes->merge(['class' => 'avatar mr-1'])->class(['rounded', 'avatar-sm']) }}
                style="background-image: url({{ $value['thumb'] }})">
            </span>
        @else
            {{ $value['file_name'] }}
        @endif

        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endif
