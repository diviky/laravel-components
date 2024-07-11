<x-form-input :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
    'placeholder' => 'Select Date',
    'date-format' => 'MMM DD, YYYY',
    'type' => 'text',
    $selector => $selector,
    'class' => 'datepicker',
])" name="{{ $name }}" value="{{ $value }}">
    {!! $slot !!}

    @slot('icon')
        <i class="{{ $attributes->has('icon') ? $attributes->get('icon') : 'ti ti-calendar-month' }}"></i>
    @endslot
</x-form-input>
