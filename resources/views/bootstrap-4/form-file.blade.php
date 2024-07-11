@props([
    'extraAttributes' => [],
])
<x-form-input name="{{ $name }}" :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'file', 'data-filepond' => 'true', 'accept' => $accept])"> {!! $slot !!} </x-form-input>
