@props([
    'color' => 'primary',
    'dot' => false,
    'animated' => false,
])

<span {{ $attributes->class([
    'status' => true,
    'status-' . $color => $color,
    'text-small',
]) }}>

    @if ($dot || $animated)
        <span @class(['status-dot', 'status-dot-animated' => $animated])></span>
    @endif

    {{ $slot }}
</span>
