@if ($name)
    @if (strlen($label ?? '') > 0)
        <div class="inline-flex items-center gap-1">
    @endif
    @if (!empty($action))
        <a onclick="{!! $action !!}" class="cursor-pointer">
    @endif
    <i {{ $attributes->merge(['class' => $icon()]) }}></i>
    @if (!empty($action))
        </a>
    @endif

    @if (strlen($label ?? '') > 0)
        <div class="{{ $labelClasses() }}">
            {{ $label }}
        </div>
        </div>
    @endif
@endif
