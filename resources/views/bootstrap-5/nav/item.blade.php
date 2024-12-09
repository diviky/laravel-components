<div {!! $attributes->merge(['class' => 'nav-item']) !!}>
    <a @if ($link) href="{{ $link }}"
        @if ($away)
        target="_blank" @endif
        @endif
        @class([
            'active' => $active || $routeMatches(),
            'nav-link' => $tab,
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
</div>
