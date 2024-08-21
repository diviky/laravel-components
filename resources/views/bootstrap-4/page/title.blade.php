@props([
    'title' => null,
])

<h2 {!! $attributes->merge([
    'class' => 'page-title',
]) !!}>{!! $slot !!}</h2>
