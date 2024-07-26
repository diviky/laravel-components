@if (strlen($label ?? '') > 0)
    <div class="inline-flex items-center gap-1">
@endif
@if (!empty($action))
    <a onclick="{!! $action !!}" class="cursor-pointer">
@endif
<i class="{{ $icon() }}" $attributes></i>
@if (!empty($action))
    </a>
@endif

@if (strlen($label ?? '') > 0)
    <div class="{{ $labelClasses() }}">
        {{ $label }}
    </div>
    </div>
@endif
