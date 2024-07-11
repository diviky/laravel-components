@if ($button)
    <a {!! $attributes->merge($defaults)->class(['btn-sm' => $attributes->has('sm'), 'btn-secondary' => $attributes->has('light')])->merge(['type' => 'button', 'class' => 'btn' . ($attributes->has('class') ? null : ' btn-primary')])->except(['sm']) !!} @if ($modal) tooltip="modal" @endif
        @if ($slideover) tooltip="modal" @endif
        @if ($attributes->has('md')) data-styles="modal-md" @endif
        @if ($attributes->has('xl')) data-styles="modal-xl" @endif
        @if ($attributes->has('title')) data-toggle="tooltip" @endif {{ $extraAttributes ?? '' }}>
        {{ $slot }}
    </a>
@else
    <a {!! $attributes->merge($defaults) !!} @if ($modal) tooltip="modal" @endif
        @if ($attributes->has('title')) data-toggle="tooltip" @endif
        @if ($attributes->has('md')) data-styles="modal-md" @endif
        @if ($attributes->has('xl')) data-styles="modal-xl" @endif
        @if ($slideover) tooltip="modal" @endif {{ $extraAttributes ?? '' }}>
        {{ $slot }}
    </a>
@endif
