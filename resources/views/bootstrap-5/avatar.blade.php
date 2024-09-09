@if ($stacked)
    <div class="avatar-list avatar-list-stacked">
@endif
@if ($image)
    <span
        {{ $attributes->merge(['class' => 'avatar'])->class([
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            'avatar-sm' => $attributes->has('sm'),
        ]) }}
        style="background-image: url({{ $image }})">
        {!! $slot ?? null !!}
    </span>
@else
    <span
        {{ $attributes->merge(['class' => 'avatar'])->class([
            'avatar-' . $size => $size,
            'rounded-circle' => $attributes->has('circle'),
            'rounded' => $attributes->has('rounded'),
            'avatar-sm' => $attributes->has('sm'),
            'avatar-lg' => $attributes->has('lg'),
            'avatar-xl' => $attributes->has('xl'),
            'avatar-md' => $attributes->has('md'),
            'avatar-sm' => $attributes->has('sm'),
            $color => $color,
        ]) }}>{{ $label }}
        {!! $slot ?? null !!}
    </span>
@endif
@if ($stacked)
    </div>
@endif
