    @props([
        'show' => false,
    ])

    @aware([
    'id' => null,
    'exclusive' => false,
    'expanded' => false,
])

    <div id="collapse-{{ $id }}" @class(['accordion-collapse collapse', 'show' => $show || $expanded])
        @if (!$exclusive) data-bs-parent="#{{ $id }}" @endif>
        <div {{ $attributes->merge(['class' => 'accordion-body']) }}>
            {!! $slot !!}
        </div>
    </div>
