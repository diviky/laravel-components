<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-cancel'])->except(['label']) }}
    data-modal-dismiss>
    {{ isset($label) && $label != null ? $label : ($slot->isNotEmpty() ? $slot : __('Submit')) }}
</button>
