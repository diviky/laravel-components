@props([
    'value' => null,
    'icon' => null,
    'color' => 'primary',
    'label' => null,
    'copy' => false,
    'as' => 'div',
    'size' => null,
    'settings' => [],
])

@if ($as == 'button')
    <button
        {{ $attributes->class(['badge', 'bg-' . $color => $color, 'text-' . $color . '-fg' => $color, 'badge-' . $size => $size]) }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        {!! $slot !!}
    </button>
@elseif ($as == 'link')
    <a href="#"
        {{ $attributes->class(['badge', 'bg-' . $color => $color, 'text-' . $color . '-fg' => $color, 'badge-' . $size => $size]) }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        {!! $slot !!}
    </a>
@else
    <span
        {{ $attributes->class(['badge', 'bg-' . $color => $color, 'text-' . $color . '-fg' => $color, 'badge-' . $size => $size]) }}>
        <x-icon :name="$icon" class="me-1" />
        {!! $label !!}
        {!! $slot !!}
    </span>
@endif

@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
