@props([
    'selector' => 'dateranges',
    'format' => 'MMM DD, YYYY',
])

<x-form-date :attributes="$attributes->merge([
    'placeholder' => 'Select Date Range',
    'date-format' => $format,
    'class' => 'date-range-picker',
])" selector="{{ $selector }}"> {!! $slot !!} </x-form-date>
