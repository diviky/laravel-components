@props([
    'label' => '',
    'id' => '',
    'active' => false,
])
<li class="nav-item">
    <a {!! $attributes->merge([
            'class' => 'nav-link',
            'href' => '#' . $id,
        ])->class(['active' => $active]) !!} data-bs-toggle="tab" tabindex="-1">
        {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Tab')) }}
    </a>
</li>
