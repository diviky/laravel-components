@props([
    'route' => null,
    'icon' => null,
    'label' => null,
])

<div {!! $attributes->merge(['class' => 'nav-item']) !!}>
    <a href="{{ $route ? route($route) : '#' }}" @class([
        'active' => $route && request()->routeIs($route),
    ])>
        <x-icon :name="$icon" />
        {!! $slot !!} {{ $label }}
    </a>
</div>
