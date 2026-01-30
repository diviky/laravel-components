@props([
    'label' => '',
    'id' => '',
    'active' => false,
    'icon' => null,
])

@aware(['default'])

<li class="nav-item">
    <a {!! $attributes->merge([
            'class' => 'nav-link',
            'href' => '#' . $id,
        ])->class(['active' => $active || $default == $id]) !!} data-bs-toggle="tab" tabindex="-1">
        @if (isset($icon) && $icon != null)
            <x-icon :name="$icon" class="me-1" />
        @endif
        {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Tab')) }}
    </a>
</li>
