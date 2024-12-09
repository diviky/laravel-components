@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'settings' => [],
])

<x-icon :name="$icon" class="me-1" />
{!! $label !!}
@if (!empty($value))
    <span {{ $attributes->merge(['class' => 'badge badge-success']) }}>Yes</span>
@else
    <span {{ $attributes->merge(['class' => 'badge badge-warning']) }}>No</span>
@endif
@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
