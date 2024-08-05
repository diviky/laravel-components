@props([
    'sticky' => false,
])

<tr {!! $attributes->class([
    'sticky-top' => $sticky,
]) !!}>
    {!! $slot !!}
</tr>
