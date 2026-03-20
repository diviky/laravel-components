@if ($stacked)
    <div class="avatar-list avatar-list-stacked">
@endif
@if ($src)
    <span
        {{ $attributes->class([
            'avatar',
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-xs' => $attributes->has('xs'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            'avatar-' . $size => $size,
            'bg-' . $color => $color,
        ]) }}
        style="background-image: url({{ $src }})">
        {!! $slot ?? null !!}
        <x-icon :name="$icon" />
        @isset($badge)
            {!! $badge !!}
        @endisset
    </span>
@else
    <span
        {{ $attributes->class([
            'avatar',
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-xs' => $attributes->has('xs'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            'avatar-' . $size => $size,
            'bg-' . $color => $color,
        ]) }}>
        {{ $initials }}
        {!! $slot ?? null !!}
        <x-icon :name="$icon" />
        @isset($badge)
            {!! $badge !!}
        @endisset
    </span>
@endif
@if ($stacked)
    </div>
@endif
