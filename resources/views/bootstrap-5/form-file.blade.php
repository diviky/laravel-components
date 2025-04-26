<div class="form-group">
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    <input name="{{ $name }}" type="file" {!! $attributes->except(['extra-attributes'])->merge(['data-filepond' => 'true', 'accept' => $accept]) !!} {{ $extraAttributes }} {{ $wire() }} />

    <x-form-errors :name="$name" />
    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
