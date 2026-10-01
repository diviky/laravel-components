@if ($name)
    @if (strlen($label ?? '') > 0)
        <div class="inline-flex items-center gap-1">
    @endif
    @if (!empty($action))
        <button type="button" onclick="{!! $action !!}" class="cursor-pointer inline-flex">
    @endif
    <i {{ $attributes->merge(['class' => $icon()])->class([
        'ti-md' => $size == 'md',
        'ti-lg' => $size == 'lg',
        'ti-sm' => $size == 'sm',
        'me-1' => $gap,
    ]) }}
        @if ($attributes->has('title')) title="{{ $attributes->get('title') }}" @endif></i>
    @if (!empty($action))
        </button>
    @endif

    @if (strlen($label ?? '') > 0)
        <div class="{{ $labelClasses() }}">
            {{ $label }}
        </div>
        </div>
    @endif
@endif
