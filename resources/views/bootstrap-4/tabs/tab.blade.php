@props([
    'label' => '',
    'target' => '',
    'active' => false,
])
<li class="nav-item">
    <a {!! $attributes->merge(['class' => 'nav-link'])->class(['active' => $active]) !!} data-toggle="tab" href="#{{ $target }}">
        {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Tab')) }}
    </a>
</li>
