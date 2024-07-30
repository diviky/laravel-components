@props([
    'border' => false,
])
<div {!! $attributes->merge(['class' => 'page-header'])->class([
    'page-header-border' => $border,
]) !!}>
    {!! $slot !!}
</div>
