@if ($stacked)
    <div class="avatar-list avatar-list-stacked">
@endif
@if ($image)
    <span {{ $attributes->merge(['class' => 'avatar']) }} style="background-image: url({{ $image }})">
        {!! $slot ?? null !!}
    </span>
@else
    <span
        {{ $attributes->class(['avatar-' . $size => $size])->merge(['class' => 'avatar ' . $color]) }}>{{ $label }}
        {!! $slot ?? null !!}
    </span>
@endif
@if ($stacked)
    </div>
@endif
