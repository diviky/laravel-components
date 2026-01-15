<div @class([
    'form-group' => true,
    'form-check-inline' => $attributes->has('inline'),
])>
    @if ($attributes->has('title'))
        <div class="mb-2 text-bold">{{ $attributes->get('title') }}</div>
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

        <span class="form-check-label">
            {{ $label }}
            @if ($attributes->has('hint'))
                <span title="{{ $attributes->get('hint') }}" data-bs-toggle="tooltip">
                    <x-icon name="help" />
                </span>
            @endif
        </span>
        <span class="form-check-description">
            <x-help> {!! $help ?? $attributes->get('help') !!} </x-help>
        </span>
    </label>

    <x-form-errors :name="$inputName()" />
</div>
