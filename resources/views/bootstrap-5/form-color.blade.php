@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'color', 'class' => 'form-control-color'])"> {!! $slot !!} </x-form-input>
