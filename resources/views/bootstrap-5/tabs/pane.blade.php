@props([
    'id' => '',
    'active' => false,
])

<div {!! $attributes->merge(['class' => 'tab-pane', 'id' => $id])->class(['active' => $active, 'show' => $active]) !!}>
    {!! $slot !!}
</div>
