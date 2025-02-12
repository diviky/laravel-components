@props([
    'selector' => 'data-dateranges',
    'format' => 'MMM DD, YYYY',
    'extraAttributes' => [],
    'name' => '',
    'type' => 'text',
])

<x-form-input name="{{ $name }}" :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
    'placeholder' => 'Select Date Range',
    'data-date-format' => $format,
    'type' => $type,
    $selector => $selector,
    'class' => 'range-picker',
])">
    {!! $slot !!}

    <x-slot:help>{{ $help ?? '' }}</x-slot:help>

    @slot('icon')
        {{ $attributes->has('icon') ? $attributes->get('icon') : 'calendar-month' }}
    @endslot
</x-form-input>
