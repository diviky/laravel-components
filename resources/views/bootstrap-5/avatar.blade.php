@if ($stacked)
    <div class="avatar-list avatar-list-stacked">
@endif
@if ($image)
    <span
        {{ $attributes->class([
            'avatar',
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-' . $size => $size,
            'avatar-xs' => $attributes->has('xs'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            $color => $color,
        ]) }}
        style="background-image: url({{ $image }})">
        {!! $slot ?? null !!}
    </span>
@else
    <span
        {{ $attributes->class([
            'avatar',
            'avatar-' . $size => $size,
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-xs' => $attributes->has('xs'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            $color => $color,
        ]) }}>
        {{ $label }}
        {!! $slot ?? null !!}
    </span>
@endif
@if ($stacked)
    </div>
@endif
