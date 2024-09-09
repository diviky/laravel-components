@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'number'])">
    {!! $slot !!}
</x-form-input>
