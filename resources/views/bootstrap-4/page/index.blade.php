@props([
    'header' => null,
    'body' => null,
    'footer' => null,
])

<div {!! $attributes->merge([
    'class' => 'page-wrapper',
]) !!}>
    @isset($header)
        <x-page.header :attributes="$header->attributes">{!! $header !!}</x-page.header>
    @endisset

    @isset($body)
        <x-page.body :attributes="$body->attributes">{!! $body !!}</x-page.body>
    @endisset

    {!! $slot !!}

    @isset($footer)
        <x-page.footer :attributes="$footer->attributes">{!! $footer !!}</x-page.footer>
    @endisset
</div>
