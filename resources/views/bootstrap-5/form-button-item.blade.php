<input {!! $attributes->except(['extra-attributes'])->merge([
        'type' => $type,
        'value' => $value,
        'name' => $name,
        'id' => $id(),
    ])->class([
        'btn-check' => true,
        'is-invalid' => $hasError($name),
    ]) !!} {{ $extraAttributes ?? '' }} @checked($checked) {{ $wire() }} />

<label for="{{ $id() }}" type="button"
    @if ($attributes->has('title')) title="{{ $attributes->get('title') }}" data-toggle="tooltip" @endif
    class="btn">{!! $slot !!}
    {{ $label }}
</label>
