@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'text'])">
    @slot('icon')
        <i class="ti ti-search"></i>
    @endslot
    {!! $slot !!}
</x-form-input>
