@props([
    'dropdown' => false,
    'disabled' => false,
])
<div {!! $attributes->class([
    'nav-item',
    'dropdown' => $dropdown,
    'tab' => $tab,
    'active' => $active || $routeMatches(),
    'disabled' => $disabled,
]) !!}>
    <a @if ($href) href="{{ $href }}"
        @if ($away) target="_blank" @endif
        @endif
        @if ($dropdown) data-bs-toggle="dropdown" @endif
        @class([
            'active' => $active || $routeMatches(),
            'nav-link' => $tab,
            'nav-link dropdown-toggle' => $dropdown,
        ])>
        <x-icon :name="$icon" class="me-1" />
        @if ($title || $slot->isNotEmpty())
            @if ($title)
                {{ $title }}
            @else
                {{ $slot }}
            @endif

            @if ($badge)
                <span class="badge badge-ghost badge-sm {{ $badgeClasses }}">{{ $badge }}</span>
            @endif
        @endif
    </a>

    @if ($dropdown)
        {!! $slot !!}
    @endif
</div>
