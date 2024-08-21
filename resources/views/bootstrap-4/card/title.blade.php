@props(['total' => null, 'title' => null, 'sm' => null])

<h4 {!! $attributes->merge(['class' => 'card-title'])->class([
    'h5' => $sm,
]) !!}>
    @isset($total)
        <span ajax-total>{{ $total }}</span>
    @endisset
    {!! $slot !!}
    @isset($title)
        {{ $title }}
    @endisset
</h4>
