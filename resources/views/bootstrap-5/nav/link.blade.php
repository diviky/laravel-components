@props([
    'icon' => null,
])

<button class="nav-link" role="tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1">
    <x-icon :name="$icon" class="me-1" />
    {{ $slot }}
</button>
