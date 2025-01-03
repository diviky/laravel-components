@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
    'options' => [
        '1' => 'Active',
        '0' => 'Inactive',
    ],
])

<x-icon :name="$icon" class="me-1" />
{!! $label !!}
@if ($value == 1)
    <span {{ $attributes->merge(['class' => 'badge badge-success']) }}>{{ $options['1'] }}</span>
@else
    <span {{ $attributes->merge(['class' => 'badge badge-warning']) }}>{{ $options['0'] }}</span>
@endif
@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
