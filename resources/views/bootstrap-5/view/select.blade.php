@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@if ($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {!! $label !!}

        @if (is_array($value) || $value instanceof \ArrayAccess)
            @if (isset($value['color']))
                <span @class([
                    'text-' . $value['color'] => $value['color'],
                ])>
                    {!! $value['name'] !!}
                </span>
            @elseif (isset($value['name']))
                {!! $value['name'] !!}
            @endif

            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value['name'] }}" />
            @endif
        @else
            {!! $value !!}

            @if ($copy)
                <x-icon name="copy" class="cursor-pointer" title="copy to clipboard"
                    data-clipboard="{{ $value }}" />
            @endif
        @endif

    </span>
@endif
