<button {!! $attributes->merge([
    'class' => 'btn' . ($attributes->has('class') ? null : ' btn-primary'),
    'type' => 'button',
    'title' => $attributes->has('title')
        ? $attributes->get('title')
        : ($slot->isNotEmpty() ? strip_tags($slot) : null),
])->except(['label']) !!} >
    {{ (isset($label) && $label != null) ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</button>
