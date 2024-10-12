@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'number'])">
    @slot('icon')
        <i class="ti ti-coin-rupee"></i>
    @endslot
    <x-slot:help>{{ $help ?? '' }}</x-slot:help>
    {!! $slot !!}
</x-form-input>
