@props([
    'extraAttributes' => [],
])

<div x-data="{ show: true }">
    <x-form-input ::type="show ? 'password' : 'text'" :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'password'])">
        {!! $slot !!}
        <x-slot:append>
            <a href="#" class="input-group-link hidden" :class="{ 'hidden': !show, 'block': show }"
                x-on:click="show = !show">
                <x-icon name="eye-closed" size="md" />
            </a>

            <a href="#" class="input-group-link hidden" :class="{ 'hidden': show, 'block': !show }"
                x-on:click="show = !show">
                <x-icon name="eye" size="md" />
            </a>
        </x-slot:append>
    </x-form-input>
</div>
