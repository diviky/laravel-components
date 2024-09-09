@props([
    'icon' => 'dots-vertical',
    'position' => 'right',
    'header' => null,
    'label' => null,
    'inline' => true,
    'link' => null,
])

<div @class([
    'dropdown' => true,
    'align-self-center' => true,
    'd-inline' => $inline,
])>
    @isset($link)
        {!! $link !!}
    @else
        <x-link data-bs-toggle="dropdown"
            {{ $attributes->merge(['href' => '#'])->class([
                'btn-link' => !$attributes->has('class'),
            ]) }}>
            <x-icon :name="$icon" /> {{ $label }}
        </x-link>
    @endisset

    <div class="dropdown-menu dropdown-menu-{{ $position }}">
        @if ($header)
            <span class="dropdown-header">{{ $header }}</span>
        @endif
        {!! $slot ?? null !!}
    </div>
</div>
