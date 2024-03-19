@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" />
    @endisset
    <div {!! $attributes->merge([
        'class' =>
            'selectgroup ' .
            (($hasError($name) ? 'is-invalid' : '') . $inline ? 'd-flex flex-row flex-wrap inline-space' : ''),
    ]) !!}>

        @isset($item)
            <x-form-select-item :attributes="$header->attributes">{!! $item !!}</x-form-select-item>
        @endisset

        {!! $slot !!}

        {!! $help ?? null !!}

        @if ($hasErrorAndShow($name))
            <x-form-errors :name="$name" class="d-block" />
        @endif

    </div>
    @isset($label)
    </div>
@endisset
