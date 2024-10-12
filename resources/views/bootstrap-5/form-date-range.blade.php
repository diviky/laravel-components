@props([
    'selector' => 'data-dateranges',
    'format' => 'MMM DD, YYYY',
    'extraAttributes' => [],
])

<x-form-date :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
    'placeholder' => 'Select Date Range',
    'date-format' => $format,
    'class' => 'date-range-picker',
])" selector="{{ $selector }}"> <x-slot:help>{{ $help ?? '' }}</x-slot:help> {!! $slot !!} </x-form-date>
