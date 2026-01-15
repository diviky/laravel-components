<div @class([
    'form-group' => true,
    'form-check-inline' => $attributes->has('inline'),
])>
    @if ($attributes->has('title'))
        <label class="form-label">{{ $attributes->get('title') }}</label>
    @endif

    @if ($copy !== false)
        <input type="hidden" value="{{ $copy }}" name="{{ $inputName() }}" />
    @endif

    <label @class([
        'form-check' => true,
        'form-switch' => true,
        'form-check-inline' => $attributes->has('inline'),
    ])>
        <input {!! $attributes->class([
                'is-invalid' => $hasError($inputName()),
            ])->merge([
                'class' => 'form-check-input',
                'id' => $id(),
                'name' => $inputName(),
                'type' => 'checkbox',
                'value' => $value,
            ]) !!} {{ $wire() }} @checked($checked) {{ $extraAttributes ?? '' }} />

        <span class="form-check-label">{{ $label }}</span>
        <span class="form-check-description">
            <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
        </span>
    </label>

    {!! $help ?? null !!}

    <x-form-errors :name="$inputName()" />
</div>
