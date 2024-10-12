@props([
    'type' => 'tabs',
])
<ul {!! $attributes->merge(['class' => 'nav'])->class([
    'nav-tabs' => $type == 'tabs',
    'nav-pills mb-2' => $type == 'pills',
]) !!}>
    {!! $slot !!}
</ul>
