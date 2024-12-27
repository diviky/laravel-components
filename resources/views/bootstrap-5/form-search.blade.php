@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'text'])">
    @slot('icon')
        <x-icon name="search" />
    @endslot
    {!! $slot !!}
</x-form-input>
