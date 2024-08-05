@props([
    'sticky' => false,
])

<td {!! $attributes->class([
    'sticky-top' => $sticky,
]) !!}>
    {!! $slot !!}
</td>
