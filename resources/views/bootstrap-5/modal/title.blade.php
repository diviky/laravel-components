@props(['total' => null, 'title' => null, 'sm' => null])

<h5 {!! $attributes->merge(['class' => 'modal-title'])->class([
    'h5' => true,
]) !!}>
    @isset($total)
        <span ajax-total>{{ $total }}</span>
    @endisset
    {!! $slot !!}
    @isset($title)
        {{ $title }}
    @endisset
</h5>
