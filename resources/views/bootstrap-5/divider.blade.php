@props(['position', 'color'])

<div
    {{ $attributes->merge(['class' => 'hr-text'])->class([
        'text-' . $color => $color,
        'hr-text-' . $position => $position,
    ]) }}>
    {{ $slot }}
</div>
