@props([
    'extraAttributes' => [],
    'currency' => 'USD',
])

@php
    $currency = $currency ?? \Illuminate\Support\Number::defaultCurrency();
@endphp

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'number'])">
    @slot('prepend')
        {{ $currency }}
    @endslot
    <x-slot:help>{{ $help ?? '' }}</x-slot:help>
    {!! $slot !!}
</x-form-input>
