@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

<x-icon :name="$icon" />
{!! $label !!}
@if ($value == 1)
    <span {{ $attributes->merge(['class' => 'badge badge-success']) }}>Active</span>
@else
    <span {{ $attributes->merge(['class' => 'badge badge-warning']) }}>Inactive</span>
@endif
@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
