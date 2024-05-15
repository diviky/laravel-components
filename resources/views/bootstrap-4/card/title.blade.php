@props(['total', 'title'])

<h2 {!! $attributes->merge(['class' => 'card-title']) !!}>
    @isset($total)
        <span ajax-total>{{ $total }}</span>
    @endisset
    {!! $slot !!}
    @isset($title)
        {{ $title }}
    @endisset
</h2>
