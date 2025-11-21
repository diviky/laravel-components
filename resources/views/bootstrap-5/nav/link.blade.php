@props([
    'icon' => null,
    'disabled' => false,
    'active' => false,
])

<button {!! $attributes->class(['nav-link', 'disabled' => $disabled, 'active' => $active]) !!} role="tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1">
    <x-icon :name="$icon" class="me-1" />
    {{ $slot }}
</button>
