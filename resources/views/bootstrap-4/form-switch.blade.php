<div class="form-group">
    @if ($attributes->has('title'))
        <label class="form-label">{{ $attributes->get('title') }}</label>
    @endif

    <label class="form-check form-switch">
        <input notchecked="0" {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!} type="checkbox" value="{{ $value }}"
            @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            name="{{ $name }}" @if ($label && !$attributes->get('id')) id="{{ $id() }}" @endif
            @if ($checked) checked="checked" @endif />

        <span class="form-check-label text-upper">{{ $label }}</span>
    </label>

    {!! $help ?? null !!}

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
