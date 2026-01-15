@props([
    'extraAttributes' => null,
])

<input {!! $attributes->except(['extra-attributes'])->merge([
    'type' => 'hidden',
    'name' => $inputName(),
    'id' => $id(),
    'value' => $value ?? null,
]) !!} {{ $extraAttributes ?? '' }} {{ $wire() }} />
