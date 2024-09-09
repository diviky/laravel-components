@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'tel'])"> {!! $slot !!} </x-form-input>
