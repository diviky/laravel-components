<div {{ $attributes->only(['class'])->class(['form-group']) }}>
    <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />

    <input {!! $attributes->except(['extra-attributes', 'class'])->merge([
            'type' => 'range',
            'name' => $inputName(),
            'id' => $id(),
            'value' => $value,
        ])->class([
            'form-range',
            'is-invalid' => $hasError($inputName()),
        ]) !!} {{ $wire() }} {{ $extraAttributes ?? '' }} />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" />
</div>
