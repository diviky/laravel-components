@php
    use Diviky\LaravelComponents\Support\ShadcnTailwindClasses as Shadcn;
@endphp

<div class="{{ Shadcn::Field }}">
    <x-form-label :label="$label" :required="$isRequired()" :title="$attributes->get('title')" />

    <div {!! $attributes->class([
        'flex w-full items-stretch',
        'has-[:aria-invalid=true]:*:border-destructive' => $hasError($inputName()),
    ]) !!}>
        {!! $slot !!}
    </div>

    <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
    <x-form-errors :name="$inputName()" />
</div>
