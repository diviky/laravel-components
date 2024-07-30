@props([
    'fragment' => null,
])

<div {!! $attributes->merge(['class' => 'page-body']) !!} @if (isset($fragment)) ajax-content="{{ $fragment }}" @endif>
    @if (isset($fragment))
        @fragment($fragment)
        @endif

        {!! $slot !!}

        @if (isset($fragment))
        @endfragment
    @endif
</div>
