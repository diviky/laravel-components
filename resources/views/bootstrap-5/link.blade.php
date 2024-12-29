<a {!! $attributes->merge($defaults)->merge([
        'class' => 'cursor-pointer',
        'id' => $id(),
    ])->class([
        'btn' => $button,
        'active' => $active,
        'btn-' . $attributes->get('color') => $attributes->has('color'),
        'btn-sm' => $attributes->has('sm'),
        'btn-lg' => $attributes->has('lg'),
        'btn-link' => $attributes->has('link'),
        'disabled' => $disabled,
        'btn-' . $outline . 'primary' => $attributes->has('primary'),
        'btn-' . $outline . 'secondary' => $attributes->has('light'),
        'btn-' . $outline . 'success' => $attributes->has('success'),
        'btn-' . $outline . 'warning' => $attributes->has('warning'),
        'btn-' . $outline . 'info' => $attributes->has('info'),
        'btn-' . $outline . 'danger' => $attributes->has('danger'),
        'btn-' . $outline . 'dark' => $attributes->has('dark'),
        'btn-' . $outline . 'loading' => $attributes->has('loading'),
        'btn-square' => $attributes->has('square'),
        'btn-pill' => $attributes->has('pill'),
        'btn-block' => $attributes->has('full'),
        'text-danger' => !$button && $attributes->has('danger'),
        'text-success' => !$button && $attributes->has('success'),
        'text-info' => !$button && $attributes->has('info'),
        'text-primary' => !$button && $attributes->has('primary'),
        'text-warning' => !$button && $attributes->has('warning'),
    ]) !!} {{ $extraAttributes ?? '' }} @if ($modal) tooltip="modal" @endif
    @if ($attributes->has('title')) data-toggle="tooltip" @endif
    @if ($attributes->has('delete') || $attributes->has('rm')) data-method="delete" data-delete @endif
    @if ($attributes->has('dropdown')) data-bs-toggle="dropdown" @endif {{-- Model related attributes --}}
    @if ($attributes->has('md')) data-size="medium" @endif
    @if ($attributes->has('small')) data-size="small" @endif
    @if ($attributes->has('large')) data-size="large" @endif
    @if ($attributes->has('xl')) data-size="large" @endif
    @if ($attributes->has('center')) data-position="center" @endif
    @if ($attributes->has('right')) data-position="right" @endif
    @if ($attributes->has('size')) data-size="{{ $attributes->get('size') }}" @endif
    @if ($attributes->has('position')) data-position="{{ $attributes->get('position') }}" @endif
    @if ($attributes->has('scrollable')) data-scrollable="true" @endif {{-- Model related attributes end --}}
    @if ($attributes->has('turbo')) data-pjax @endif
    @if ($attributes->has('id')) data-id="{{ $attributes->get('id') }}" @endif
    @if ($attributes->has('export')) ajax-export @endif @if ($slideover) tooltip="modal" @endif
    @if ($external || $attributes->has('away')) target="_blank" @endif
    @if ($disabled) disabled="disabled" @endif>
    @if ($icon)
        @if ($slot->isEmpty())
            <x-icon :name="$icon" />
        @else
            <x-icon :name="$icon" class="me-1" />
        @endif
    @endif
    {!! $slot !!}
    @if ($badge)
        <span class="badge badge-ghost badge-sm {{ $badgeClasses }}">{{ $badge }}</span>
    @endif
</a>
