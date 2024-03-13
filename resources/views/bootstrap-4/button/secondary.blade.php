<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary'])->except(['label']) }}
>
    {{ (isset($label) && $label != null) ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</button>
