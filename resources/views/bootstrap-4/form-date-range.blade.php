@props([
    'selector' => 'dateranges',
])

<x-form-date :attributes="$attributes->merge(['placeholder' => 'Select Date Range'])" selector="{{ $selector }}"> {!! $slot !!} </x-form-date>
