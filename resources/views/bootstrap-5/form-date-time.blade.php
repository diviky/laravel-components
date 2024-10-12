@props([
    'extraAttributes' => [],
    'name' => null,
    'stacked' => true,
])

@if ($stacked)
    <x-form-date :extra-attributes="$extraAttributes" name="{{ $name }}" :attributes="$attributes->merge(['selector' => 'data-datetime'])">
        <x-slot:help>{{ $help ?? '' }}</x-slot:help>
    </x-form-date>
@else
    <div class="row">
        <div class="col">
            <x-form-date name="{{ $name }}[date]" :extra-attributes="$extraAttributes" :attributes="$attributes" />
        </div>
        <div class="col-4">
            <x-form-time name="{{ $name }}[time]" :extra-attributes="$extraAttributes" :attributes="$attributes" />
        </div>
    </div>
@endif
