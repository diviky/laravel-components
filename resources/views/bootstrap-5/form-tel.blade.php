@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'tel'])">
    @isset($prepend)
        <x-slot:prepend :attributes="$prepend->attributes">
            {!! $prepend !!}
        </x-slot:prepend>
    @endisset

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

    @isset($help)
        <x-slot:help>
            {!! $help !!}
        </x-slot:help>
    @endisset

    {!! $slot !!}
</x-form-input>
