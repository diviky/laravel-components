@props([
'header',
'body',
'filters',
'footer',
])

<div {!! $attributes->merge(['class' => 'card']) !!}>
    @isset($header)
    <x-card-header :attributes="$header->attributes">{!! $header !!}</x-card-header>
    @endisset

    @isset($filters)
    <x-card-filter :attributes="$filters->attributes">{!! $filters !!}</x-card-filter>
    @endisset

    @isset($body)
    <x-card-body :attributes="$body->attributes">{!! $body !!}</x-card-body>
    @endisset

    {!! $slot !!}

    @isset($footer)
    <x-card-footer :attributes="$footer->attributes">{!! $footer !!}</x-card-footer>
    @endisset
</div>
