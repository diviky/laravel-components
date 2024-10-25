@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" :required="$attributes->has('required')" />
    @endisset
    <div {!! $attributes->except(['extra-attributes'])->merge([
            'class' => 'form-selectgroup',
        ])->class([
            'form-selectgroup-pills' => $attributes->has('pills'),
            'form-selectgroup-boxes' => $attributes->has('boxes'),
            'is-invalid' => $hasError($name),
            'd-flex' => true,
            'flex-column' => $attributes->has('full'),
        ])->except('pills') !!} {{ $extraAttributes ?? '' }}>

        @forelse($options as $key => $option)
            <x-form-select-item name="{{ $name }}" value="{{ $key }}" type="{{ $type }}"
                :show="$attributes->has('show')">
                {!! $option !!}
            </x-form-select-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $help ?? null !!}

        @if ($hasErrorAndShow($name))
            <x-form-errors :name="$name" />
        @endif

    </div>
    @isset($label)
    </div>
@endisset
