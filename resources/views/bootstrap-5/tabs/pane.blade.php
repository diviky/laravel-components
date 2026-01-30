@props([
    'id' => '',
    'active' => false,
    'enabled' => true,
])

@aware(['default'])

@if ($enabled)
    <div {!! $attributes->merge(['class' => 'tab-pane', 'id' => $id])->class(['active' => $active || $default == $id, 'show' => $active || $default == $id]) !!}>
        {!! $slot !!}
    </div>
@endif
