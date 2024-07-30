<a {!! $attributes->merge($defaults)->merge([
        'class' => $attributes->has('color') ? null : ' btn-' . $attributes->get('color'),
    ])->class([
        'btn' => $button,
        'btn-sm' => $attributes->has('sm'),
        'btn-lg' => $attributes->has('lg'),
        'btn-link' => $attributes->has('link'),
        'disabled' => $attributes->has('disabled'),
        'btn-' . $outline . 'primary' => $button || $attributes->has('primary'),
        'btn-' . $outline . 'secondary' => $attributes->has('light'),
        'btn-' . $outline . 'success' => $attributes->has('success'),
        'btn-' . $outline . 'warning' => $attributes->has('warning'),
        'btn-' . $outline . 'info' => $attributes->has('info'),
        'btn-' . $outline . 'danger' => $attributes->has('danger'),
        'btn-' . $outline . 'dark' => $attributes->has('dark'),
        'btn-' . $outline . 'loading' => $attributes->has('loading'),
        'btn-square' => $attributes->has('square'),
        'btn-pill' => $attributes->has('pill'),
    ]) !!} @if ($modal) tooltip="modal" @endif
    @if ($attributes->has('title')) data-toggle="tooltip" @endif
    @if ($attributes->has('rm')) data-method="delete" data-delete @endif
    @if ($attributes->has('md')) data-styles="modal-md" @endif
    @if ($attributes->has('dropdown')) data-bs-toggle="dropdown" @endif
    @if ($attributes->has('xl')) data-styles="modal-xl" @endif @if ($attributes->has('export')) ajax-export @endif
    @if ($slideover) tooltip="modal" @endif {{ $extraAttributes ?? '' }}>
    @if ($icon)
        <x-icon :name="$icon" />
    @endif
    {{ $slot }}
</a>
