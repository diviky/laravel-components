<button {!! $attributes->merge([
        'class' => 'btn',
        'type' => 'button',
        'title' => $attributes->has('title'),
    ])->class([
        'dropdown-toggle' => $attributes->has('dropdown'),
        'disabled' => $attributes->has('disabled'),
        'btn-sm' => $attributes->has('sm') || $attributes->has('small'),
        'btn-lg' => $attributes->has('lg') || $attributes->has('large'),
        'btn-link' => $attributes->has('link'),
        'btn-' . $outline . 'primary' => $attributes->has('primary') && !$attributes->has('link'),
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
        'btn-block' => $attributes->has('full'),
        'btn-primary' => !$attributes->has('class') && !$attributes->has('link') && !$attributes->has('variant'),
        'btn-' . $attributes->get('color') => $attributes->has('color'),
        'btn-' . $attributes->get('size') => $attributes->has('size'),
        'btn-' . $attributes->get('variant') => $attributes->has('variant'),
        'btn-square' => $attributes->has('square'),
        'btn-pill' => $attributes->has('pill'),
        'btn-block' => $attributes->has('full'),
    ])->except(['label']) !!} @if ($attributes->has('dropdown')) data-bs-toggle="dropdown" @endif>

    @if ($attributes->has('icon'))
        <x-icon :name="$attributes->get('icon')" />
    @endif

    {{ isset($label) ? $label : $slot }}
</button>
