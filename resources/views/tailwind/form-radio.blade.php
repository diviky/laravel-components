@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([
    'inline-flex items-start gap-2' => null !== $attributes->get('inline'),
    'flex items-start gap-2' => null === $attributes->get('inline'),
]) }}>
    <input {!! $attributes->except(['extra-attributes', 'class'])->class([
            Shadcn::Radio,
            'mt-0.5' => $label,
        ]) !!} type="radio" value="{{ $value }}" {{ $extraAttributes ?? '' }}
        {{ $wire() }} name="{{ $inputName() }}" @if ($label && !$attributes->get('id')) id="{{ $id() }}" @endif
        @checked($checked)
        @if ($hasError($inputName())) aria-invalid="true" @endif />

    <div class="grid gap-1 leading-none">
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()"
            class="font-normal cursor-pointer" />

        <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    </div>

    <x-form-errors :name="$inputName()" :input-id="$id()" />
</div>
