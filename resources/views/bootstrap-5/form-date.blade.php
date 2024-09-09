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
        <i class="{{ $attributes->has('icon') ? $attributes->get('icon') : 'ti ti-calendar-month' }}"></i>
    @endslot
</x-form-input>
