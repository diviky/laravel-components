@props(['title'])
<div {!! $attributes->merge(['class' => 'card-header']) !!}>
    {!! $slot !!}
    @isset($title)
        <x-card.title>{!! $title !!}</x-card.title>
    @endisset

    @isset($options)
        <x-card.options>{!! $options !!}</x-card.options>
    @endisset
</div>
