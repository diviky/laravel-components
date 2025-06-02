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

@if ($enabled)
    @if ($divider || $separator)
        <div class="dropdown-divider"></div>
    @endif

    <x-link :href="$href"
        {{ $attributes->class(['dropdown-item d-flex', 'active' => $active, 'disabled' => $disabled]) }}>

        @if ($icon)
            <x-icon name="{{ $icon }}" />
        @endif

        {{ $label }}
        {{ $title }}
        {!! $slot ?? null !!}
    </x-link>
@endif
