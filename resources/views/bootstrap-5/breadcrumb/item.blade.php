@props([
    'active' => false,
    'link' => null,
    'route' => null,
    'label' => null,
    'icon' => null,
])

@php
    if (isset($route)) {
        $link = route($route);
    }
@endphp

<li @class(['breadcrumb-item', 'active' => $active])>
    @if ($label)
        <x-link :href="$link" :icon="$icon" :attributes="$attributes"> {{ $label }}</x-link>
    @else
        @if ($icon)
            <x-icon :name="$icon" />
        @endif

        {!! $slot !!}
    @endif
</li>
