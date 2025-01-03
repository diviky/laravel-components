@props([
    'extraAttributes' => [],
    'selector' => 'data-datepicker',
    'type' => 'text',
    'format' => null,
    'name' => null,
])

<x-form-input name="{{ $name }}" :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
    'placeholder' => 'Select Date',
    'data-date-format' => $format,
    'type' => $type,
    $selector => $selector,
    'class' => 'datepicker',
])">
    {!! $slot !!}

    @slot('icon')
        {{ $attributes->has('icon') ? $attributes->get('icon') : 'calendar-month' }}
    @endslot
</x-form-input>
