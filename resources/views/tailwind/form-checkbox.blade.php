@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div {{ $attributes->only(['class'])->class([
    'inline-flex' => null !== $attributes->get('inline'),
]) }}>
    @if ($attributes->has('title'))
        <div class="mb-2 text-sm font-medium">{{ $attributes->get('title') }}</div>
    @endif

    <div @class([
        'flex items-start gap-2',
        'inline-flex' => null !== $attributes->get('inline'),
    ])>
        @if ($copy !== false)
            <input type="hidden" value="{{ $copy }}" name="{{ $inputName() }}" />
        @endif

        <input {!! $attributes->except(['extra-attributes', 'class'])->class([
                Shadcn::Checkbox,
            ])->merge([
                'id' => $id(),
                'name' => $inputName(),
                'type' => 'checkbox',
                'value' => $value,
            ]) !!} {{ $extraAttributes ?? '' }} {{ $wire() }} @checked($checked)
            @if ($hasError($inputName())) aria-invalid="true" @endif />

        <div class="grid gap-1 leading-none">
            <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()"
                class="font-normal cursor-pointer" />

            <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
        </div>
    </div>

    <x-form-errors :name="$inputName()" :input-id="$id()" />
</div>
