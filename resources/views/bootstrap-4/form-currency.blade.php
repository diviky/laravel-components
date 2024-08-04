@props([
    'extraAttributes' => [],
])
<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge(['type' => 'number'])">
    @slot('icon')
        <i class="ti ti-coin-rupee"></i>
    @endslot
    {!! $slot !!}
</x-form-input>
