@props([
    'icon' => 'dots-vertical',
    'position' => 'right',
    'header' => null,
    'label' => null,
])

<div class="dropdown">
    <x-link data-bs-toggle="dropdown" {{ $attributes->merge(['class' => 'btn-link', 'href' => '#']) }}>
        <x-icon :name="$icon" />{{ $label }}
    </x-link>

    <div class="dropdown-menu dropdown-menu-{{ $position }}">
        @if ($header)
            <span class="dropdown-header">{{ $header }}</span>
        @endif
        {!! $slot ?? null !!}
    </div>
</div>
