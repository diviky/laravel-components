@props([
    'title' => null,
])

<h2 {!! $attributes->merge([
    'class' => 'page-subtitle mb-0 mt-2',
]) !!}>{!! $slot !!}</h2>
