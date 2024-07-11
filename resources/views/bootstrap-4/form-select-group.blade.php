@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" />
    @endisset
    <div {!! $attributes->except(['extra-attributes'])->merge([
            'class' => 'form-selectgroup ' . ($hasError($name) ? 'is-invalid' : ''),
        ])->class(['form-selectgroup-pills' => $attributes->has('pills')])->except('pills') !!} {{ $extraAttributes ?? '' }}>

        @forelse($options as $key => $option)
            <x-form-select-item name="{{ $name }}" value="{{ $key }}" type="{{ $type }}">
                {!! $option !!}
            </x-form-select-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $help ?? null !!}

        @if ($hasErrorAndShow($name))
            <x-form-errors :name="$name" class="d-block" />
        @endif

    </div>
    @isset($label)
    </div>
@endisset
