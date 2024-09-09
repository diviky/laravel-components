@props([
    'sticky' => false,
])

<thead {!! $attributes->merge(['class' => 'table-head'])->class([
    'sticky-top' => $sticky,
]) !!}>
    {!! $slot !!}
</thead>
