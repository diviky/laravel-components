@props([
    'value' => null,
    'icon' => 'null',
    'label' => null,
    'copy' => false,
    'settings' => [],
])

@isset($value)
    <span {{ $attributes }}>
        <x-icon :name="$icon" />
        {!! $label !!}
        {{ \Illuminate\Support\Number::currency($value) }}
        @if ($copy)
            <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
        @endif
    </span>
@endisset
