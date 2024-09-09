@props(['title', 'close' => true])
<div {!! $attributes->merge(['class' => 'modal-header']) !!}>
    @isset($title)
        <x-modal.title>{!! $title !!}</x-modal.title>
    @endisset

    @if ($close)
        <button type="button" class="close modal-close" data-dismiss="modal" data-bs-dismiss="modal"></button>
    @endif

    {!! $slot !!}
</div>
