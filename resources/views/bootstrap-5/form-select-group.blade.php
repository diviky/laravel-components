@props([
    'type' => 'checkbox',
])
@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" :required="$isRequired()" />
    @endisset
    <div {!! $attributes->except(['extra-attributes'])->class([
            'form-selectgroup',
            'form-selectgroup-pills' => $attributes->has('pills'),
            'form-selectgroup-boxes' => $attributes->has('boxes'),
            'is-invalid' => $hasError($name),
            'd-flex' => true,
            'flex-column' => $attributes->has('full'),
        ])->except('pills') !!} {{ $extraAttributes ?? '' }}>

        @forelse($options as $key => $option)
            <x-form-select-item name="{{ $name }}" :attributes="$attributes->whereStartsWith('wire:')" value="{{ $optionValue($option) }}"
                type="{{ $type }}" :show="$attributes->has('show')">
                {!! $optionLabel($option) !!}
            </x-form-select-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $help ?? null !!}

        <x-form-errors :name="$name" />
    </div>
    @isset($label)
    </div>
@endisset
