@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div
    {{ $attributes->only(['class'])->class([
        Shadcn::Field => !$inline,
        'relative' => $floating,
    ]) }}>
    @if (!$floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    <div @class([
        'flex flex-row flex-wrap gap-4' => $inline,
    ])>
        {!! $slot !!}
    </div>

    @if ($floating)
        <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" :for="$id()" />
    @endif

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" />
</div>
