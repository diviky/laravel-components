@props([
    'show' => false,
])

@aware(['id' => null])

<div id="collapse-{{ $id }}" @class(['accordion-collapse collapse', 'show' => $show]) data-bs-parent="#{{ $id }}">
    <div {{ $attributes->merge(['class' => 'accordion-body']) }}>
        {!! $slot !!}
    </div>
</div>
