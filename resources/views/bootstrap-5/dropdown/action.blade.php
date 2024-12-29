@props([
    'icon' => 'dots',
    'position' => 'right',
    'header' => null,
    'label' => null,
    'inline' => true,
    'link' => null,
    'toggle' => false,
    'autoClose' => 'true',
    'dropend' => false,
    'vertical' => false,
    'menu' => null,
])

<div @class([
    'dropdown' => true,
    'align-self-center' => true,
    'd-inline' => $inline,
    'dropend' => $dropend,
])>
    @isset($link)
        {!! $link !!}
    @else
        <x-link data-bs-toggle="dropdown" data-bs-auto-close="{{ $autoClose }}"
            {{ $attributes->merge(['href' => '#'])->class([
                'dropdown-toggle' => $toggle,
            ]) }}>
            @if ($vertical)
                <x-icon name="dots-vertical" />
            @else
                <x-icon :name="$icon" />
            @endif
            @if ($label)
                <span class="ps-1">{{ $label }}</span>
            @endif
        </x-link>
    @endisset

    {!! $slot ?? null !!}
</div>
