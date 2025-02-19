@props([
    'extraAttributes' => [],
    'name' => null,
    'stacked' => true,
])

@if ($stacked)
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
                    format: 'MMMM d yyyy hh:mm T',
                },
            };
            new tempusDominus.TempusDominus(this.$refs.container, data);
        }
    }">
        <x-form-input name="{{ $name }}" :label="$label" :default="$defaultDate()" :extra-attributes="$extraAttributes" :attributes="$attributes->merge([
            'placeholder' => 'Select Date',
            'type' => $type,
            'class' => 'date',
            'x-ref' => 'container',
        ])">
            {!! $slot !!}

            <x-slot:help>{{ $help ?? '' }}</x-slot:help>

            @slot('icon')
                {{ $attributes->has('icon') ? $attributes->get('icon') : 'calendar-month' }}
            @endslot
        </x-form-input>
    </div>
@else
    <div class="row" x-data="{
        current: ''
    }">
        <div class="col">
            <x-form-date name="{{ $name }}[date]" :extra-attributes="$extraAttributes" :attributes="$attributes" />
        </div>
        <div class="col-4">
            <x-form-time name="{{ $name }}[time]" :extra-attributes="$extraAttributes" :attributes="$attributes" />
        </div>
        <x-form-hidden name="{{ $name }}" x-model="current" :default="$default" />
    </div>
@endif
