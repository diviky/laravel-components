<input {!! $attributes->except(['extra-attributes'])->merge([
        'type' => $type,
        'value' => $value,
        'name' => $name,
        'id' => $id(),
    ])->class([
        'btn-check' => true,
        'is-invalid' => $hasError($name),
    ]) !!} {{ $extraAttributes ?? '' }} @checked($checked) />

<label for="{{ $id() }}" type="button" class="btn">{!! $slot !!} {{ $label }}</label>
