<input {!! $attributes->except(['extra-attributes'])->merge([
        'type' => 'hidden',
        'name' => $inputName(),
        'id' => $id(),
        'placeholder' => null,
        'value' => $value,
    ]) !!} {{ $extraAttributes ?? '' }} {{ $wire() }} />
