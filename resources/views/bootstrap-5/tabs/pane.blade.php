@props([
    'target' => '',
    'active' => false,
])

<div {!! $attributes->merge(['class' => 'tab-pane', 'id' => $target])->class(['active' => $active, 'show' => $active]) !!}>
    {!! $slot !!}
</div>
