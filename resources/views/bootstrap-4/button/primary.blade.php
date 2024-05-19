<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-primary'])->except(['label']) }}>
    {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</button>
