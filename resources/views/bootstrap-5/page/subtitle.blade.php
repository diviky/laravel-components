@props([
    'title' => null,
])

<h2 {!! $attributes->merge([
    'class' => 'page-subtitle',
]) !!}>{!! $slot !!}</h2>
