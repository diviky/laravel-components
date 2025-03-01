@props([
    'type' => 'info',
    'dismissible' => false,
    'icon' => null,
    'title' => null,
])

<div role="alert"
    {{ $attributes->merge(['class' => 'alert text-sm max-w-xl'])->class([
        'alert-info' => $type == 'info',
        'alert-info' => $type == 'help',
        'alert-success' => $type == 'success',
        'alert-warning' => $type == 'warning',
        'alert-danger' => $type == 'danger',
        'alert-dismissible' => $dismissible,
    ]) }}>
    <div @class(['d-flex' => $icon])>
        @if ($icon)
            <div>
                <x-icon :name="$icon" class="me-2" />
            </div>
        @endif
        <div>
            @if ($title)
                <h4 class="alert-title">{{ $title }}</h4>
            @endif
            {!! $slot !!}
        </div>
    </div>
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
