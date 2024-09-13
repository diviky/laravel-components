<div {!! $attributes->merge(['class' => 'nav-item']) !!}>
    <a @if ($link) href="{{ $link }}"
        @if ($external)
        target="_blank" @endif
        @endif
        @class([
            'active' => $active || $routeMatches(),
        ])>
        <x-icon :name="$icon" />
        @if ($title || $slot->isNotEmpty())
            @if ($title)
                {{ $title }}

                @if ($badge)
                    <span class="badge badge-ghost badge-sm {{ $badgeClasses }}">{{ $badge }}</span>
                @endif
            @else
                {{ $slot }}
            @endif
        @endif
    </a>
</div>
