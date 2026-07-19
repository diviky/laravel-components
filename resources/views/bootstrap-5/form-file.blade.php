@props([
    'pond' => true,
    'livewire' => false,
])
<div {{ $attributes->only(['class'])->class(['form-group']) }}>
    <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />

    @if ($livewire)
        <x-filepond::upload :attributes="$attributes
    ->except(['extra-attributes', 'class'])
    ->class(['form-control'])
    ->merge(['accept' => $accept])" />
    @else
        <input name="{{ $inputName() }}" type="file" {!! $attributes->except(['extra-attributes', 'class'])->class(['form-control'])->merge(['accept' => $accept]) !!} {{ $extraAttributes }}
            {{ $wire() }} @if ($pond) data-filepond @endif />
    @endif

    <x-form-errors :name="$inputName()" />
    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
</div>
