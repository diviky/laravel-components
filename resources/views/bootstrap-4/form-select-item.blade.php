<label class="form-selectgroup-item">
    <input {!! $attributes->except(['extra-attributes'])->merge([
        'type' => 'radio',
        'class' => 'form-selectgroup-input ' . ($hasError($name) ? 'is-invalid' : ''),
    ]) !!} {{ $extraAttributes ?? '' }} value="{{ $value }}"
        @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
        name="{{ $name }}" @if (!$attributes->get('id')) id="{{ $id() }}" @endif
        @checked($checked) />

    <span class="form-selectgroup-label">{!! $slot !!} {{ $label }} </span>
</label>
