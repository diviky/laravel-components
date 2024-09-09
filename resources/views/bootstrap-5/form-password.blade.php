@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'password'])"> {!! $slot !!} </x-form-input>
