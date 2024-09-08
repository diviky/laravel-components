@props(['header', 'body', 'footer', 'size' => null, 'toggle'])

@isset($toggle)
    <x-modal.toggle :attributes="$toggle->attributes">{!! $toggle !!}</x-modal.toggle>
@endisset

<div {!! $attributes->merge(['class' => 'modal'])->class([
    'modal-blur' => true,
    'fade' => true,
    'modal-box' => true,
]) !!}>
    <div @class([
        'modal-dialog' => true,
        'modal-sm' => $attributes->has('small'),
        'modal-lg' => $attributes->has('large'),
        'modal-dialog-centered' => $attributes->has('center'),
        'modal-dialog-scrollable' => $attributes->has('scrollable'),
    ])>
        <div class="modal-content">
            @isset($header)
                <x-modal.header :attributes="$header->attributes">{!! $header !!}</x-modal.header>
            @endisset

            @isset($body)
                <x-modal.body :attributes="$body->attributes">{!! $body !!}</x-modal.body>
            @endisset

            {!! $slot !!}

            @isset($footer)
                <x-modal.footer :attributes="$footer->attributes">{!! $footer !!}</x-modal.footer>
            @endisset
        </div>
    </div>
</div>
