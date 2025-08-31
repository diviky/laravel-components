@props([
    'type' => 'info',
    'dismissible' => false,
    'icon' => null,
    'title' => null,
    'message' => null,
])

@php
    if (empty($icon)) {
        $icons = [
            'info' => 'info-circle',
            'help' => 'help',
            'success' => 'rosette-discount-check',
            'warning' => 'alert-triangle',
            'danger' => 'alert-hexagon',
        ];
        $icon = $icons[$type] ?? null;
    }
@endphp

<div role="alert"
    {{ $attributes->merge(['class' => 'alert text-sm max-w-xl'])->class([
        'alert-info' => $type == 'info',
        'alert-info' => $type == 'help',
        'alert-success' => $type == 'success',
        'alert-warning' => $type == 'warning',
        'alert-danger' => $type == 'danger',
        'alert-dismissible' => $dismissible,
    ]) }}>
    <div @class(['d-flex align-items-center' => $icon])>
        @if ($icon)
            <div>
                <x-icon :name="$icon" size="md" class="me-2" />
            </div>
        @endif
        <div class="flex-grow-1">
            @if ($title)
                <h4 class="alert-title">{{ $title }}</h4>
            @endif
            @if ($message)
                <p class="mb-0">{!! $message !!}</p>
            @else
                {!! $slot !!}
            @endif
        </div>
    </div>
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
