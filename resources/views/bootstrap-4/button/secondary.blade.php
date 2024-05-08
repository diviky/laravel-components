<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary'])->class(['active' => isset($active) && $active])->except(['label']) }}>
    {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</button>
