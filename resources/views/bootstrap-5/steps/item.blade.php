@props(['id' => null, 'index' => 0])

<div class="{{ $id }}" {{ $attributes }} data-step-content
    style="display:@if ($index == 0) block @else none @endif">
    {!! $slot !!}
</div>
