@props([
    'icon' => null,
    'toggle' => false,
    'autoClose' => 'outside',
])

<div data-bs-toggle="dropdown" data-bs-auto-close="{{ $autoClose }}"
    {{ $attributes->class(['cursor-pointer', 'dropdown-toggle' => $toggle]) }}>

    <x-icon :name="$icon" class="me-1" />
    {!! $slot ?? null !!}
</div>
