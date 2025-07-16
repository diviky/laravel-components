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
    <x-form-input name="{{ $name }}" :label="$label" :default="$defaultValue()" :extra-attributes="$properties" :attributes="$attributes->merge([
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
