<div class="form-group">
    @if ($attributes->has('title'))
        <label class="form-label">{{ $attributes->get('title') }}</label>
    @endif

    @isset($copy)
        <input type="hidden" value="{{ $copy }}" name="{{ $name }}" />
    @endisset

    <label class="form-check form-switch">
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
    </label>

    {!! $help ?? null !!}

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
