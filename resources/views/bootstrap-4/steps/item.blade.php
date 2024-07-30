@props([
    'step' => collect(),
    'loop',
])

<div class="{{ $step['id'] }}" data-step-content
    style="display:@if ($loop->index == 0) block @else none @endif">
    {!! $slot !!}
</div>
