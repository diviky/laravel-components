<div @class([
    'form-group' => true,
    'form-check-inline' => $attributes->has('inline'),
])>
    @if ($attributes->has('title'))
        <label class="form-label">{{ $attributes->get('title') }}</label>
    @endif

    @if ($copy !== false)
        <input type="hidden" value="{{ $copy }}" name="{{ $name }}" />
    @endif

    <label @class([
        'form-check' => true,
        'form-switch' => true,
        'form-check-inline' => $attributes->has('inline'),
    ])>
        <input {!! $attributes->class([
                'is-invalid' => $hasError($name),
            ])->merge([
                'class' => 'form-check-input',
                'id' => $id(),
                'name' => $name,
                'type' => 'checkbox',
                'value' => $value,
            ]) !!}
            @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            @checked($checked) {{ $extraAttributes ?? '' }} />

        <span class="form-check-label">{{ $label }}</span>
        <span class="form-check-description">
            <x-help> {!! $help ?? null !!} </x-help>
        </span>
    </label>

    {!! $help ?? null !!}

    <x-form-errors :name="$name" />
</div>
