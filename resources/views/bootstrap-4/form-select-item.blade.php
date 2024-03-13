<label class="selectgroup-item">
    <input {!! $attributes->merge(['type' => 'radio', 'class' => 'selectgroup-input ' . ($hasError($name) ? 'is-invalid' : '')]) !!}
        value="{{ $value }}"

        @if($isWired())
            wire:model{!! $wireModifier() !!}="{{ $name }}"
        @endif

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        @if($checked)
            checked="checked"
        @endif
    />

    <span class="selectgroup-button">{{ $label }} </span>
</label>
