@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'email'])"> {!! $slot !!} </x-form-input>
