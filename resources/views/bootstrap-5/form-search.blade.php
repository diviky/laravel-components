@props([
    'extraAttributes' => [],
])

<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'text'])">
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

    <x-slot:icon>
        @isset($icon)
            {!! $icon !!}
        @else
            search
        @endisset
    </x-slot:icon>

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
