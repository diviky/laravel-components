@props(['title', 'close' => true])
<div {!! $attributes->merge(['class' => 'modal-header']) !!}>
    @isset($title)
        <x-modal.title>{!! $title !!}</x-modal.title>
    @endisset

    @if ($close)
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    @endif

    {!! $slot !!}
</div>
