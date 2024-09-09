@props([
    'name' => null,
])

<div {!! $attributes !!} @if ($attributes->has('sortable')) grid-sortable @endif fragment="{{ $name }}">
    @fragment($name)
        <!--[fragment {{ $name }}]>-->
        {!! $slot !!}
        <!--<![fragment]-->
    @endfragment
</div>
