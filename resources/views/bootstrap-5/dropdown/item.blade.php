@props([
    'icon' => null,
    'href' => '#',
    'divider' => false,
    'separator' => false,
    'active' => false,
    'disabled' => false,
    'label' => null,
    'title' => null,
    'enabled' => true,
])

<x-link :href="$href" :enabled="$enabled"
    {{ $attributes->class(['active' => $active, 'disabled' => $disabled])->merge(['class' => 'dropdown-item']) }}>

    @if ($icon)
        <x-icon name="{{ $icon }}" />
    @endif

    @if ($divider || $separator)
        <div class="dropdown-divider"></div>
    @endif

    {{ $label }}
    {{ $title }}
    {!! $slot ?? null !!}
</x-link>
