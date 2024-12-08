@props([
    'active' => false,
    'link' => null,
    'route' => null,
    'label' => null,
])

@php
    if (isset($route)) {
        $link = route($route);
    }
@endphp

<li @class(['breadcrumb-item', 'active' => $active])>
    @if ($label)
        <x-link :href="$link" :attributes="$attributes"> {{ $label }}</x-link>
    @else
        {!! $slot !!}
    @endif
</li>
