@if ($stacked)
    <div class="avatar-list avatar-list-stacked">
@endif
@if ($url)
    <span {{ $attributes->merge(['class' => 'avatar']) }} style="background-image: url({{ $url }})">
        {!! $slot ?? null !!}
    </span>
@else
    <span {{ $attributes->merge(['class' => 'avatar ' . $color]) }}>{{ $name }} {!! $slot ?? null !!}</span>
@endif
@if ($stacked)
    </div>
@endif
