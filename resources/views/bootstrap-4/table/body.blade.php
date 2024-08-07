@props([
    'fragment' => null,
])

<tbody {!! $attributes->merge(['class' => 'table-body']) !!} @if (isset($fragment)) ajax-content="{{ $fragment }}" @endif>
    @if (isset($fragment))
        @fragment($fragment)
        @endif

        {!! $slot !!}

        @if (isset($fragment))
        @endfragment
    @endif
</tbody>
