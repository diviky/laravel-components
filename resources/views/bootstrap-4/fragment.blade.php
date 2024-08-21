@props([
    'name' => null,
])

<div {!! $attributes !!} @if ($attributes->has('sortable')) grid-sortable @endif ajax-content="{{ $name }}">
    @fragment($name)
        {!! $slot !!}
    @endfragment
</div>
