@props([
    'stacked' => false,
])

@if ($stacked || (isset($settings['stacked']) && $settings['stacked']))
    <div x-data="{
        picker: null,
        initPicker() {
            // Clean up existing picker if it exists
            if (this.picker) {
                try {
                    this.picker.dispose();
                } catch (e) {
                    // Ignore disposal errors
                }
            }

            let data = {{ $setup() }};
            this.picker = new tempusDominus.TempusDominus(this.$refs.container, data);

            // Store reference to this context
            const self = this;

            // Remove existing event listeners to prevent duplicates
            this.$refs.container.removeEventListener('change.td', this.boundHandleChange);

            // Create bound event handler
            this.boundHandleChange = (event) => {
                const date = self.picker.dates.lastPicked ? self.picker.dates.formatInput(self.picker.dates.lastPicked) : '';

                self.$refs.container.dispatchEvent(new CustomEvent('picked', {
                    detail: { value: date },
                    bubbles: true
                }));
            };

            // Add event listener
            this.$refs.container.addEventListener('change.td', this.boundHandleChange);
        }
    }" x-init="initPicker();

    // Reinitialize after Livewire updates
    $nextTick(() => {
        Livewire.hook('morph.updated', () => {
            $nextTick(() => initPicker());
        });
    });" x-on:livewire:navigated.window="initPicker()">
        <x-form-input name="{{ $name }}" :label="$label" :default="$defaultValue()" :value="$defaultValue()" :settings="$settings"
            :extra-attributes="$properties" :attributes="$attributes->merge([
                'placeholder' => 'Select Date',
                'type' => $type,
                'class' => 'date',
                'x-ref' => 'container',
            ])">
            @isset($prepend)
                <x-slot:prepend :attributes="$prepend->attributes">
                    {!! $prepend !!}
                </x-slot:prepend>
            @endisset

            @isset($before)
                <x-slot:before>
                    {!! $before !!}
                </x-slot:before>
            @endisset

            <x-slot:icon>
                @isset($icon)
                    {!! $icon !!}
                @else
                    {{ $attributes->has('icon') ? $attributes->get('icon') : 'calendar-month' }}
                @endisset
            </x-slot:icon>

            @isset($append)
                <x-slot:append :attributes="$append->attributes">
                    {!! $append !!}
                </x-slot:append>
            @endisset

            @isset($after)
                <x-slot:after>
                    {!! $after !!}
                </x-slot:after>
            @endisset

            <x-slot:help>{{ $help ?? '' }}</x-slot:help>

            {!! $slot !!}
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
