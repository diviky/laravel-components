@props([
    'show' => true,
])

@if ($show)
    {!! $slot !!}
@endif
