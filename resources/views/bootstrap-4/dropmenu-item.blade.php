@props([
    'icon' => null,
    'href' => '#',
    'divider' => false,
    'active' => false,
    'disabled' => false,
    'label' => null,
])

<x-link :href="$href"
    {{ $attributes->class(['active' => $active, 'disabled' => $disabled])->merge(['class' => 'dropdown-item']) }}>

    @if ($icon)
        <x-icon name="{{ $icon }}" />
    @endif

    @if ($divider)
        <div class="dropdown-divider"></div>
    @endif

    {{ $label }}
    {!! $slot ?? null !!}
</x-link>
