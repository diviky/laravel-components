@props([
    'type' => 'checkbox',
])
@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" />
    @endisset
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
                :default="$isSelected($optionValue($option))" :disabled="$optionIsDisabled($option)">
                {{ $optionLabel($option) }}
            </x-form-button-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $after ?? null !!}

    </div>
    {!! $help ?? null !!}

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif

    @isset($label)
    </div>
@endisset
