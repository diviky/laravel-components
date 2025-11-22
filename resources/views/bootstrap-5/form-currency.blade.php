@props([
    'extraAttributes' => [],
    'currency' => 'USD',
])

@php
    $currency = $currency ?? \Illuminate\Support\Number::defaultCurrency();
@endphp

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'number'])">
    <x-slot:prepend {{ $prepend?->attributes ?? '' }}>
        @isset($prepend)
            {!! $prepend !!}
        @else
            {{ $currency }}
        @endisset
    </x-slot:prepend>

    @isset($before)
        <x-slot:before>
            {!! $before !!}
        </x-slot:before>
    @endisset

    @isset($icon)
        <x-slot:icon>
            {!! $icon !!}
        </x-slot:icon>
    @endisset

    @isset($append)
        <x-slot:append :attributes="$append->attributes">
            {!! $append !!}
        </x-slot:append>
    @endisset

    @isset($after)
        <x-slot:after>
            {!! $after !!}
        </x-slot:after>
    @endisset

    <x-slot:help>{{ $help ?? '' }}</x-slot:help>
    
    {!! $slot !!}
</x-form-input>
