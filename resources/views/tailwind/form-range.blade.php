@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([Shadcn::Field]) }}>
    <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />

    <input {!! $attributes->except(['extra-attributes', 'class'])->merge([
            'type' => 'range',
            'name' => $inputName(),
            'id' => $id(),
            'value' => $value,
        ])->class([
            Shadcn::Range,
        ]) !!} {{ $wire() }} {{ $extraAttributes ?? '' }}
        @if ($hasError($inputName())) aria-invalid="true" @endif />

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" />
</div>
