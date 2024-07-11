@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'url'])"> {!! $slot !!} </x-form-input>
