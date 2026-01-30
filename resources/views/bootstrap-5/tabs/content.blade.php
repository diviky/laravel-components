@props([
    'default' => null,
    'enabled' => true,
])
@if ($enabled)
    <div {!! $attributes->merge(['class' => 'tab-content']) !!}>
        {!! $slot !!}
    </div>
@endif
