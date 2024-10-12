<div class="form-group">
    <x-form-label :label="$label" :required="$attributes->has('required')" :for="$attributes->get('id') ?: $id()" />

    <input name="{{ $name }}" type="file" {!! $attributes->merge(['data-filepond' => 'true', 'accept' => $accept]) !!} {{ $extraAttributes }} />

    <x-form-errors :name="$name" />
    <x-help> {!! $help ?? null !!} </x-help>
</div>
