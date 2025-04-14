@props([
    'show' => false,
])

<label class="form-selectgroup-item flex-fill">
    <input {!! $attributes->except(['extra-attributes'])->merge([
            'type' => $type,
            'name' => $name,
            'id' => $id(),
            'value' => $value,
        ])->class(['form-selectgroup-input', 'is-invalid' => $hasError($name)]) !!} {{ $extraAttributes ?? '' }} {{ $wire() }} @checked($checked) />

    <span class="form-selectgroup-label d-flex align-items-center">
        @if ($show)
            <div class="me-3">
                <span class="form-selectgroup-check"></span>
            </div>
        @endif
        <div class="form-selectgroup-label-content d-flex align-items-center">
            @if ($attributes->has('icon'))
                <x-icon :name="$attributes->get('icon')" class="me-1" />
            @endif
            {!! $slot !!} {{ $label }}
        </div>
    </span>
</label>
