@if ($button)
    <button {!! $attributes->merge($defaults)->merge(['type' => 'button', 'class' => 'btn' . ($attributes->has('class') ? null : ' btn-primary')]) !!} @if ($modal) tooltip="modal" @endif @if ($slideover) tooltip="modal" @endif
        @if ($attributes->has('title')) data-toggle="tooltip" @endif>
        {{ $slot }}
    </button>
@else
    <a {!! $attributes->merge($defaults) !!} @if ($modal) tooltip="modal" @endif
        @if ($attributes->has('title')) data-toggle="tooltip" @endif @if ($slideover) tooltip="modal" @endif>
        {{ $slot }}
    </a>
@endif
