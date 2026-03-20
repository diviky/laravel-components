@aware(['id' => null, 'disabled' => false])

<div {{ $attributes->merge(['class' => 'accordion-header', 'disabled' => $disabled]) }}>
    <button class="accordion-button" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapse-{{ $id }}">
        {!! $slot !!}

        <div class="accordion-button-toggle">
            <x-icon name="chevron-down" class="icon-1" />
        </div>
    </button>
</div>
