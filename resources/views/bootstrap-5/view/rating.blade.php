@props([
    'value' => 0,
    'icon' => null,
    'label' => null,
    'rating' => 5,
    'settings' => [],
])

@php
    $icon = $settings['icon'] ?? $icon;
    $rating = $settings['rating'] ?? $rating;
@endphp

<span {{ $attributes }}>
    @for ($i = 1; $i <= $rating; $i++)
        <span @class([
            'rounded-sm w-8 m-0 cursor-pointer',
            'text-primary' => $value >= $i,
            'text-gray-400' => $value < $i,
        ])>
            @if ($icon == 'number')
                <span @class(['badge', 'text-gray-400', 'bg-primary' => $value >= $i])>{{ $i }}</span>
            @else
                @if ($value >= $i)
                    <x-icon name="{{ $icon }}-filled" />
                @else
                    <x-icon name="{{ $icon }}" />
                @endif
            @endif
        </span>
    @endfor
</span>
