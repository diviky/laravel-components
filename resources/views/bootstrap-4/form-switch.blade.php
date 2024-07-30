<div class="form-group">
    @if ($attributes->has('title'))
        <label class="form-label">{{ $attributes->get('title') }}</label>
    @endif

    @isset($copy)
        <input type="hidden" value="{{ $copy }}" name="{{ $name }}" />
    @endisset

    <label class="form-check form-switch">
        <input {!! $attributes->merge(['class' => 'form-check-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!} type="checkbox" value="{{ $value }}"
            @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            name="{{ $name }}" @if ($label && !$attributes->get('id')) id="{{ $id() }}" @endif
            @if ($checked) checked="checked" @endif {{ $extraAttributes ?? '' }} />

        <span class="form-check-label text-upper">{{ $label }}</span>
    </label>

    {!! $help ?? null !!}

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
