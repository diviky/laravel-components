@props([
    'fragment' => null,
])

<tbody {!! $attributes->merge(['class' => 'table-body']) !!} @if ($attributes->has('sortable')) grid-sortable @endif
    @if ($attributes->has('draggable')) grid-draggable @endif
    @if (isset($fragment)) ajax-content="{{ $fragment }}" @endif>
    @if (isset($fragment))
        @fragment($fragment)
        @endif

        {!! $slot !!}

        @if (isset($fragment))
        @endfragment
    @endif
</tbody>
