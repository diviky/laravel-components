@props([
    'dropdown' => false,
    'disabled' => false,
])

@aware(['format' => null])

<div {!! $attributes->class([
    'nav-item',
    'dropdown' => $dropdown,
    'tab' => $tab || $format == 'tab',
    'active' => $active || $routeMatches(),
    'disabled' => $disabled,
]) !!}>
    <a @if ($href) href="{{ $href }}"
        @if ($away) target="_blank" @endif
        @endif
        @if ($attributes->has('turbo') && !$attributes->has('data-inertia')) data-pjax @endif
        @if ($dropdown) data-bs-toggle="dropdown" @endif
        @if ($attributes->has('data-inertia')) data-inertia @endif
        @if ($attributes->has('nojax')) nojax @endif
        @if ($attributes->has('data-nojax')) data-nojax @endif
        @class([
            'active' => $active || $routeMatches(),
            'nav-link' => $tab || $format == 'tab',
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
