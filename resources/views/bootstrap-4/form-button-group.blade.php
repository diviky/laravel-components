@isset($label)
    <div class="form-group">
        <x-form-label :label="$label" />
    @endisset
    <div {!! $attributes->except(['extra-attributes'])->merge([
        'class' => 'btn-group d-flex ' . ($hasError($name) ? 'is-invalid' : ''),
    ]) !!} {{ $extraAttributes ?? '' }}>

        {!! $before ?? null !!}

        @forelse($options as $key => $option)
            <x-form-button-item name="{{ $name }}" value="{{ $key }}" type="{{ $type }}">
                {!! $option !!}
            </x-form-button-item>
        @empty
            {!! $slot !!}
        @endforelse

        {!! $after ?? null !!}

    </div>
    {!! $help ?? null !!}

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" class="d-block" />
    @endif

    @isset($label)
    </div>
@endisset
