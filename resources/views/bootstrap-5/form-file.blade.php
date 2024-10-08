@props([
    'extraAttributes' => [],
])

<div class="form-group">
    <x-form-label :label="$label" :required="$attributes->has('required')" :for="$attributes->get('id') ?: $id()" />

    <input name="{{ $name }}" type="file" {!! $attributes->merge($extraAttributes)->merge(['data-filepond' => 'true', 'accept' => $accept]) !!} />

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif

    <x-help> {!! $help ?? null !!} </x-help>

</div>
