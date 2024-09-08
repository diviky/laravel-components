@props(['title'])
<div {!! $attributes->merge(['class' => 'card-header']) !!}>
    @isset($title)
        <x-card.title>{!! $title !!}</x-card.title>
    @endisset
    {!! $slot !!}
    @isset($options)
        <x-card.options>{!! $options !!}</x-card.options>
    @endisset
</div>
