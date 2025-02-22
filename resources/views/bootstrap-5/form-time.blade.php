<div x-data="{
    init() {
        let data = {
            {{ $setup() }}
        };
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
