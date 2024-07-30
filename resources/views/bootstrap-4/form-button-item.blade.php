<input {!! $attributes->except(['extra-attributes'])->merge(['class' => 'btn-check' . ($hasError($name) ? ' is-invalid' : '')]) !!} type="{{ $type }}" value="{{ $value }}" {{ $extraAttributes ?? '' }}
    name="{{ $name }}" @if (!$attributes->get('id')) id="{{ $id() }}" @endif
    @if ($checked) checked="checked" @endif />

<label for="{{ $id() }}" type="button" class="btn">{!! $slot !!} {{ $label }}</label>
