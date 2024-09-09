<label class="form-selectgroup-item flex-fill">
    <input {!! $attributes->except(['extra-attributes'])->merge([
            'type' => $type,
            'name' => $name,
            'id' => $id(),
            'value' => $value,
            'class' => 'form-selectgroup-input',
        ])->class([
            'is-invalid' => $hasError($name),
        ]) !!} {{ $extraAttributes ?? '' }}
        @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
        @checked($checked) />

    <span class="form-selectgroup-label d-flex align-items-center">
        @if ($attributes->has('show'))
            <div class="me-3">
                <span class="form-selectgroup-check"></span>
            </div>
        @endif
        <div class="form-selectgroup-label-content d-flex align-items-center">
            {!! $slot !!} {{ $label }}
        </div>
    </span>
</label>