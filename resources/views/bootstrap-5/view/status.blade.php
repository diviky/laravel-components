@props([
    'value' => null,
    'icon' => null,
    'label' => null,
    'copy' => false,
    'dot' => false,
    'animated' => false,
    'settings' => [],
    'options' => [
        '1' => 'Active',
        '0' => 'Inactive',
    ],
])

<x-icon :name="$icon" class="me-1" />
{!! $label !!}

@php
    $optionValue = $options[$value] ?? null;
    $badgeClass = 'status';
    $badgeText = '';

    if (is_array($optionValue)) {
        $badgeText = $optionValue['text'] ?? '';
        $badgeColor = $optionValue['color'] ?? 'secondary';
        $badgeClass .= ' status-' . $badgeColor;
        $animated = $optionValue['animated'] ?? $animated;
    } else {
        $badgeText = $optionValue;
        $badgeClass .= $value == 1 ? ' status-success' : ' status-warning';
    }

    if ($dot) {
        $badgeClass .= ' status-dot';
    }

    if ($animated) {
        $badgeClass .= ' status-dot-animated';
    }
@endphp

<span {{ $attributes->merge(['class' => $badgeClass]) }}>{{ $badgeText }}</span>

@if ($copy)
    <x-icon name="copy" class="cursor-pointer" title="copy to clipboard" data-clipboard="{{ $value }}" />
@endif
