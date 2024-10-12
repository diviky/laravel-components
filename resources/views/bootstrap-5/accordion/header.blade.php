@aware(['id' => null])

<h2 {{ $attributes->merge(['class' => 'accordion-header']) }}>
    <button class="accordion-button" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapse-{{ $id }}">
        {!! $slot !!}
    </button>
</h2>
