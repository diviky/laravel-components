@props([
    'header',
    'body',
    'filters',
    'footer',
    'status' => null,
    'statusSide' => 'top',
    'ribbon' => null,
    'title' => null,
    'subtitle' => null,
    'image' => null,
    'imagePosition' => 'top',
    'borderColor' => null,
    'textColor' => null,
    'bgColor' => null,
    'size' => null,
])

<div {!! $attributes->merge(['class' => 'card'])->class([
    'card-stacked' => $attributes->has('stacked'),
    "border-$borderColor" => $borderColor,
    "text-$textColor" => $textColor,
    "bg-$bgColor" => $bgColor,
    "bg-$size" => $size,
]) !!}>
    @if ($status)
        <div class="card-status-{{ $statusSide }} bg-{{ $status }}"></div>
    @endif

    @if ($ribbon)
        <div class="ribbon bg-{{ $ribbon['color'] ?? 'primary' }}">
            {{ $ribbon['text'] ?? '' }}
        </div>
    @endif

    @if ($image && $imagePosition === 'top')
        <img src="{{ $image }}" class="card-img-top" alt="Card image">
    @endif

    @isset($header)
        <x-card.header :attributes="$header->attributes">{!! $header !!}</x-card.header>
    @endisset

    @isset($filters)
        <x-card.filter :attributes="$filters->attributes">{!! $filters !!}</x-card.filter>
    @endisset

    @isset($body)
        <x-card.body :attributes="$body->attributes">
            @if ($title)
                <h5 class="card-title">{{ $title }}</h5>
            @endif

            @if ($subtitle)
                <h6 class="card-subtitle mb-2 text-muted">{{ $subtitle }}</h6>
            @endif

            {!! $body !!}
        </x-card.body>
    @elseif($title || $subtitle)
        <div class="card-body">
            @if ($title)
                <h5 class="card-title">{{ $title }}</h5>
            @endif

            @if ($subtitle)
                <h6 class="card-subtitle mb-2 text-muted">{{ $subtitle }}</h6>
            @endif
        </div>
    @endisset

    {!! $slot !!}

    @if ($image && $imagePosition === 'bottom')
        <img src="{{ $image }}" class="card-img-bottom" alt="Card image">
    @endif

    @isset($footer)
        <x-card.footer :attributes="$footer->attributes">{!! $footer !!}</x-card.footer>
    @endisset
</div>
