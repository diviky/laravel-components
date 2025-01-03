@props([
    'selector' => 'data-time',
    'extraAttributes' => [],
    'name' => null,
])

<x-form-date name="{{ $name }}" :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
    'placeholder' => 'Select Time',
    'class' => 'date-time',
])" icon="clock" selector="{{ $selector }}">
    {!! $slot !!}
</x-form-date>
