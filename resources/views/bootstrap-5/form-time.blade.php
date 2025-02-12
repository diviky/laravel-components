<div x-data="{
    init() {
        let restrictions = {
            minDate: undefined,
            maxDate: undefined,
            disabledDates: [],
            enabledDates: [],
            daysOfWeekDisabled: [],
            disabledTimeIntervals: [],
            disabledHours: [],
            enabledHours: []
        };

        let data = {
            keepInvalid: true,
            restrictions: { ...restrictions, ...{{ json_encode($restrictions()) }} },
            @if ($defaultDate()) defaultDate: {{ json_encode($defaultDate()) }}, @endif
            display: {
                sideBySide: false,
                viewMode: 'clock',
                components: {
                    calendar: false,
                    date: false,
                    month: false,
                    year: false,
                    decades: false,
                },
                icons: {
                    time: 'ti ti-clock',
                    date: 'ti ti-calendar-month',
                    up: 'ti ti-arrow-up',
                    down: 'ti ti-arrow-down',
                    previous: 'ti ti-chevron-left',
                    next: 'ti ti-chevron-right',
                    today: 'ti ti-calendar',
                    clear: 'ti ti-x',
                    close: 'ti ti-square-x',
                },
            },
            localization: {
                format: 'h:mm T',
            },
        };
        new tempusDominus.TempusDominus(this.$refs.container, data);
    }
}">
    <x-form-input name="{{ $name }}" :default="$defaultDate()" :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
        'placeholder' => 'Select Date',
        'type' => $type,
        'class' => 'date',
        'x-ref' => 'container',
    ])">
        {!! $slot !!}

        <x-slot:help>{{ $help ?? '' }}</x-slot:help>

        @slot('icon')
            {{ $attributes->has('icon') ? $attributes->get('icon') : 'clock' }}
        @endslot
    </x-form-input>
</div>
