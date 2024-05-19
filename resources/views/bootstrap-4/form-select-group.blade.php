@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" />
    @endisset
    <div {!! $attributes->merge([
        'class' =>
            'form-selectgroup ' .
            (($hasError($name) ? 'is-invalid' : '') . $inline ? 'd-flex flex-row flex-wrap inline-space' : ''),
    ]) !!}>

        @forelse($options as $key => $option)
            <x-form-select-item name="{{ $key }}" type="{{ $type }}">
                {!! $option !!}
            </x-form-select-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $slot !!}

        {!! $help ?? null !!}

        @if ($hasErrorAndShow($name))
            <x-form-errors :name="$name" class="d-block" />
        @endif

    </div>
    @isset($label)
    </div>
@endisset
