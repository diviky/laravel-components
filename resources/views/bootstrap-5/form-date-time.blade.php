@props([
    'stacked' => false,
])

@if ($stacked || (isset($settings['stacked']) && $settings['stacked']))
    <div x-data="{
        init() {
            let data = {{ $setup() }};
            const picker = new tempusDominus.TempusDominus(this.$refs.container, data);
    
            this.$refs.container.addEventListener('change.td', (event) => {
                const date = picker.dates.lastPicked ? picker.dates.formatInput(picker.dates.lastPicked) : '';
    
                this.$refs.container.dispatchEvent(new CustomEvent('picked', {
                    detail: { value: date },
                    bubbles: true
                }));
            });
        }
    }">
        <x-form-input name="{{ $name }}" :label="$label" :default="$defaultValue()" :value="$defaultValue()" :settings="$settings"
            :extra-attributes="$properties" :attributes="$attributes->merge([
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
        dateValue: '{{ $defaultDate() }}',
        timeValue: '{{ $defaultTime() }}',
        current: '{{ $defaultValue() }}',
        updateDate(event) {
            if (event.detail && event.detail.value) {
                this.dateValue = event.detail.value;
            }
            this.updateCurrent();
        },
        updateTime(event) {
            if (event.detail && event.detail.value) {
                this.timeValue = event.detail.value;
            }
            this.updateCurrent();
        },
        updateCurrent() {
            this.current = `${this.dateValue} ${this.timeValue}`.trim();
        }
    }">
        <div class="col">
            <x-form-date :default="$defaultDate()" :value="$defaultDate()" :settings="$settings" :label="$label"
                @picked="updateDate($event)" :extra-attributes="$properties" :attributes="$attributes" x-model="dateValue" />
        </div>
        <div class="col-4">
            <x-form-time :default="$defaultTime()" :value="$defaultTime()" :settings="$settings" label="Time" x-model="timeValue"
                @picked="updateTime($event)" :extra-attributes="$properties" :attributes="$attributes" />
        </div>
        <x-form-hidden name="{{ $name }}" x-model="current" :attributes="$attributes" :default="$defaultValue()" />
    </div>
@endif
