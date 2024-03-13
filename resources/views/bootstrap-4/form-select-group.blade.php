<div {!! $attributes->merge(['class' => 'selectgroup '  . (($hasError($name) ? 'is-invalid' : '').($inline) ? 'd-flex flex-row flex-wrap inline-space' : '' )]) !!}>

    {!! $slot !!}

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" class="d-block" />
    @endif
</div>
