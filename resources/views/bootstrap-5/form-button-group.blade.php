@props([
    'type' => 'checkbox',
])

@if ($label)
    <div class="form-group">
        <x-form-label :label="$label" :required="$isRequired()" :for="$attributes->get('id') ?: $id()" />
@endif

<div {!! $attributes->except(['extra-attributes'])->merge([
        'class' => 'btn-group',
    ])->class([
        'd-flex' => !$attributes->has('inline'),
        'is-invalid' => $hasError($name),
        'btn-group-vertical' => $attributes->has('vertical'),
    ]) !!} {{ $extraAttributes ?? '' }}>

    {!! $before ?? null !!}

    @forelse($options as $key => $option)
        <x-form-button-item type="{{ $type }}" name="{{ $name }}" value="{{ $optionValue($option) }}"
            :default="$isSelected($optionValue($option))" :attributes="$attributes->whereStartsWith('wire:')" :disabled="$optionIsDisabled($option)">
            {{ $optionLabel($option) }}
        </x-form-button-item>
    @empty
        {!! $slot !!}
    @endforelse

    {!! $after ?? null !!}

</div>

{!! $help ?? null !!}

<x-form-errors :name="$name" />

@if ($label)
    </div>
@endif
