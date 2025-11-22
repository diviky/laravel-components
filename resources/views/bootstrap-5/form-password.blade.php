@props([
    'extraAttributes' => [],
])

<div x-data="{ show: true }">
    <x-form-input ::type="show ? 'password' : 'text'" :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'password'])">
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

        <x-slot name="append" :attributes="$append?->attributes ?? ''">
            @isset($append)
                {!! $append !!}
            @endisset

            <a href="#" class="input-group-link hidden" :class="{ 'hidden': !show, 'block': show }"
                x-on:click="show = !show">
                <x-icon name="eye-closed" size="md" />
            </a>

            <a href="#" class="input-group-link hidden" :class="{ 'hidden': show, 'block': !show }"
                x-on:click="show = !show">
                <x-icon name="eye" size="md" />
            </a>
        </x-slot>

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
</div>
