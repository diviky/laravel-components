<button {!! $attributes->merge([
        'class' =>
            'btn' .
            ($attributes->has('class') ? null : ' btn-primary') .
            ($attributes->has('color') ? null : ' btn-' . $attributes->get('color')),
        'type' => 'button',
        'title' => $attributes->has('title'),
    ])->class([
        'disabled' => $attributes->has('disabled'),
        'btn-sm' => $attributes->has('sm') || $attributes->has('small'),
        'btn-lg' => $attributes->has('lg') || $attributes->has('large'),
        'btn-link' => $attributes->has('link'),
        'btn-' . $outline . 'primary' => $attributes->has('primary'),
        'btn-' . $outline . 'secondary' => $attributes->has('light'),
        'btn-' . $outline . 'success' => $attributes->has('success'),
        'btn-' . $outline . 'warning' => $attributes->has('warning'),
        'btn-' . $outline . 'info' => $attributes->has('info'),
        'btn-' . $outline . 'danger' => $attributes->has('danger'),
        'btn-' . $outline . 'dark' => $attributes->has('dark'),
        'btn-' . $outline . 'cancel' => $attributes->has('cancel'),
        'btn-loading' => $attributes->has('loading'),
        'btn-square' => $attributes->has('square'),
        'btn-pill' => $attributes->has('pill'),
    ])->except(['label']) !!} @if ($attributes->has('dropdown')) data-bs-toggle="dropdown" @endif>

    @if ($attributes->has('icon'))
        <x-icon :name="$attributes->get('icon')" />
    @endif

    {{ isset($label) ? $label : $slot }}
</button>
