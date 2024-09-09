@props([
    'sticky' => false,
])

<th {!! $attributes->class([
    'sticky-top' => $sticky,
]) !!}>
    {!! $slot !!}
</th>
