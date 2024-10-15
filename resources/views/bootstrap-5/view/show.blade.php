@props([
    'enabled' => true,
])

@if ($enabled)
    {!! $slot !!}
@endif
